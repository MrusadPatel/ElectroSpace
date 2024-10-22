<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\RazorpaySetting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use Cart;
use Illuminate\Support\Facades\Auth;
use Str;

class PaymentController extends Controller
{
    public function index()
    {
        if(!Session::has('address'))
        {
            return redirect()->route('user.pages.checkout');
        }
        return view('user.pages.payment');
    }

    public function paymentSuccess()
    {
        return view('user.pages.payment-success');
    }

    public function storeOrder($paymentMethod, $paymentStatus, $transactionId)
    {
        

        $order = new Order();
        $order->invocie_id = rand(1, 999999);
        $order->user_id = Auth::user()->id;
        $order->sub_total = getCartTotal();
        $order->amount =  getFinalPayableAmount();
        $order->product_qty = \Cart::content()->count();
        $order->payment_method = $paymentMethod;
        $order->payment_status = $paymentStatus;
        $order->order_address = json_encode(Session::get('address'));
        $order->shpping_method = json_encode(Session::get('shipping_method'));
        $order->coupon = json_encode(Session::get('coupon'));
        $order->order_status = 'pending';
        $order->save();

        // store order products
        foreach(\Cart::content() as $item){
            $product = Product::find($item->id);
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $orderProduct->product_name = $product->name;
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();

            // update product quantity
            $updatedQty = ($product->qty - $item->qty);
            $product->qty = $updatedQty;
            $product->save();
        }

        // store transaction details
        $transaction = new Transaction();
        $transaction->order_id = $order->id;
        $transaction->transaction_id = $transactionId;
        $transaction->payment_method = $paymentMethod;
        $transaction->amount = getFinalPayableAmount();
        $transaction->save();

    }

    public function clearSession()
    {
        \Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
    }

    public function payWithRazorPay(Request $request)
    {
        $razorPaySetting = RazorpaySetting::first();
       $api = new Api($razorPaySetting->razorpay_key, $razorPaySetting->razorpay_secret_key);

       // amount calculation
       $total = getFinalPayableAmount();
       $payableAmount = round($total, 2);
       $payableAmountInPaisa = $payableAmount * 100;

       if($request->has('razorpay_payment_id') && $request->filled('razorpay_payment_id')){
            try{
                $response = $api->payment->fetch($request->razorpay_payment_id)
                    ->capture(['amount' => $payableAmountInPaisa]);
            }catch(\Exception $e){
                return redirect()->back()->with('error', 'Payment failed');
                return redirect()->back();
            }


            if($response['status'] == 'captured'){
                $this->storeOrder('razorpay', 1, $response['id']);
                // clear session
                $this->clearSession();

                return redirect()->route('user.payment.success');
            }

       }

    }

    /** pay with cod */
    public function payWithCod(Request $request)
    {
        $codPaySetting = CodSetting::first();
       
        if($codPaySetting->status == 0){
            return redirect()->back();
        }

        // amount calculation
       $total = getFinalPayableAmount();
       $payableAmount = round($total, 2);


        $this->storeOrder('COD', 0, \Str::random(10));
        // clear session
        $this->clearSession();

        return redirect()->route('user.payment.success');
            

    }


}
