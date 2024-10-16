<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial','asc')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home',1)->where('status', 1)->get();
        
        return view('user.home.home',
            compact(
                'sliders',
                'flashSaleDate',
                'flashSaleItems'
            ));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        $sliders = Slider::where('status', 1)->orderBy('serial','asc')->get();
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home',1)->where('status', 1)->get();

        if($usertype == '1')
        {
            return view('admin.dashboard');
        }
        else{
            return view('user.home.home',
            compact(
                'sliders',
                 'flashSaleDate',
                'flashSaleItems'
            ));
        }
    }
}
