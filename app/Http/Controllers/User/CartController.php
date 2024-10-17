<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // show cart page
    public function cartDetails()
    {
        $cartItems = Cart::content();
       
        
        return view('user.pages.cart-detail',compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        // check product quantity
        if($product->qty === 0){
            return response(['status' => 'error', 'message' => 'Product stock out']);
        }elseif($product->qty < $request->qty){
            return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        }

         /** check discount */
         $productPrice = 0;

         if(checkDiscount($product)){
             $productPrice = $product->offer_price;
         }else {
             $productPrice = $product->price;
         }
 

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        
        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart successfully!']);
    }

    /** Update product quantity */
    public function updateProductQty(Request $request)
    {
        // $productId = Cart::get($request->rowId)->id;
        // $product = Product::findOrFail($productId);

        // // check product quantity
        // if($product->qty === 0){
        //     return response(['status' => 'error', 'message' => 'Product stock out']);
        // }elseif($product->qty < $request->qty){
        //     return response(['status' => 'error', 'message' => 'Quantity not available in our stock']);
        // }

        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'message' => 'Product Quantity Updated!', 'product_total' => $productTotal]);
    }

      /** get product total */
      public function getProductTotal($rowId)
      {
         $product = Cart::get($rowId);
         $total = $product->price * $product->qty;
         return $total;
      }
  
       /** Remove product form cart */
        public function removeProduct($rowId)
        {
            Cart::remove($rowId);
            return redirect()->back();
        }


}
