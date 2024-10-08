<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial','asc')->get();
        
        return view('user.home.home',
            compact(
                'sliders'

            ));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.dashboard');
        }
        else{
            return view('user.home.home');
        }
    }
}
