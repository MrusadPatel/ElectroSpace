<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();

        $totalCouponAmount = 0;
    
        foreach ($orders as $order) {
            $coupon = json_decode($order->coupon);
            
            // Check if coupons exist and is not null
            if ($coupon) {
                
                    if (@$coupon->discount_type == 'amount') {
                        $totalCouponAmount += $coupon->discount;
                    } 
                    elseif (@$coupon->discount_type == 'percent') {
                        $totalCouponAmount += ($coupon->discount * $order->sub_total) / 100;
                    }
                
            }
        }

        $totalOrders = Order::where('user_id', Auth::user()->id)->count();
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->count();
        $pendingOrders = Order::where('user_id', Auth::user()->id)->where('order_status','pending')->count();
        $completedOrders = Order::where('user_id', Auth::user()->id)->where('order_status','delivered')->count();
        $totalMoney = Order::where('user_id', Auth::user()->id)->sum('amount');
        return view('user.dashboard.dashboard', compact('totalOrders','pendingOrders','completedOrders','wishlist','totalMoney','totalCouponAmount'));
    }
}
