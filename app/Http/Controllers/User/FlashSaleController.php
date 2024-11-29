<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index()
    {
        $flashSaleDate = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('status', 1)->paginate(7);
        return view('user.pages.flash-sale',
        compact(
            'flashSaleDate',
            'flashSaleItems'
        ));
    }
}
