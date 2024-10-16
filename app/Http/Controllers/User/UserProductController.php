<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function showProduct(string $slug)
    {
        $product = Product::where('slug', $slug)->where('status',1)->first();
        return view('user.pages.product-detail', compact('product'));
    }
}
