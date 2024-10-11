<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Str;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $datatable)
    {
        return $datatable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['required','max:2000','image'],
            'name' => ['required','max:200'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $brand = new Brand();

        if($request->hasFile('logo'))
        {
            // if(File::exists(public_path($user->profile_photo_path)))
            // {
            //     File::delete(public_path($user->profile_photo_path));
            // }

            $logo = $request->logo;
            $logoName = time().'_'.$logo->getClientOriginalName();
            $logo->move(public_path('uploads'), $logoName);
            $path = "/uploads/".$logoName;
            $brand->logo = $path;

        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        return redirect()->route('brand.index');

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
        $brand = Brand::findorFail($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['max:2000','image'],
            'name' => ['required','max:200'],
            'is_featured' => ['required'],
            'status' => ['required']
        ]);

        $brand =  Brand::findorFail($id);

        if($request->hasFile('logo'))
        {
            if(File::exists(public_path($brand->logo)))
            {
                File::delete(public_path($brand->logo));
            }

            $logo = $request->logo;
            $logoName = time().'_'.$logo->getClientOriginalName();
            $logo->move(public_path('uploads'), $logoName);
            $path = "/uploads/".$logoName;
            $brand->logo = $path;

        }

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findorFail($id);
        if(File::exists(public_path($brand->logo)))
            {
                File::delete(public_path($brand->logo));
            }
        $brand->delete($id);
        return redirect()->route('brand.index');
    }
}
