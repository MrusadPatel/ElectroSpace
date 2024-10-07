<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.dashboard.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required','max:100'] ,
            'email' => ['required','email','unique:users,email,'.Auth::user()->id],
            'image' => ['image','max:2048']
        ]);

        $user = Auth::user();

        if($request->hasFile('image'))
        {
            if(File::exists(public_path($user->profile_photo_path)))
            {
                File::delete(public_path($user->profile_photo_path));
            }

            $image = $request->image;
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/".$imageName;
            $user->profile_photo_path = $path;

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','current_password'] ,
            'password' => ['required','confirmed','min:8'],
        ]);

        $request->user()->update(
            [
                'password' =>  bcrypt($request->password)
            ]
        );

        return redirect()->back();
    }

}
