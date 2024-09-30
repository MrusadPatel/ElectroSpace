<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use File;

class AdminController extends Controller
{

    public function profile()
    {
        return view('admin.profile.index');
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

    public function view_catagory()
    {
        return view('admin.category.category');
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->name;
        $data->save();
        return redirect()->back();

    }
}