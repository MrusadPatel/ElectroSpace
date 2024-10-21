<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
}
