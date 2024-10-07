<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Validation\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required','image', 'max:2000'],
            'type' => ['string', 'max:200'],
            'title' => ['required','max:200'],
            'strating_price' => ['max:200'],
            'btn_url' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
       ]);

       
        $slider = new Slider();

        
        if($request->hasFile('banner'))
        {
            // if(File::exists(public_path($user->profile_photo_path)))
            // {
            //     File::delete(public_path($user->profile_photo_path));
            // }

            $image = $request->banner;
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/".$imageName;
            $slider->banner = $path;

        }


       $slider->type = $request->type;
       $slider->title = $request->title;
       $slider->starting_price = $request->starting_price;
       $slider->btn_url = $request->btn_url;
       $slider->serial = $request->serial;
       $slider->status = $request->status;
       $slider->save();

    //    Cache::forget('sliders');

    //    toastr('Created Successfully!', 'success');

        
       return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
