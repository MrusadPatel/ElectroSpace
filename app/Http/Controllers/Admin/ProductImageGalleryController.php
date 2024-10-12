<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use Illuminate\Http\Request;
use File;

class ProductImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ProductImageGalleryDataTable $datatable)
    {
        $product = Product::findorFail($request->product);
        return $datatable->render('admin.product.image-gallery.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'iamge.*' => ['required','iamge','max:2048']
        ]);

        if($request->hasFile('image'))
        {
            // if(File::exists(public_path($user->profile_photo_path)))
            // {
            //     File::delete(public_path($user->profile_photo_path));
            // }

            $images = $request->image;
            $paths = [] ;
            foreach($images as $image)
            {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $paths[] = "/uploads/".$imageName;
            }
        }

        foreach($paths as $path)
        {
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

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
        $image =  ProductImageGallery::findorFail($id);
        if(File::exists(public_path($image->image)))
        {
                File::delete(public_path($image->image));
        }
        $image->delete();
        // $product = $image->product_id;
        // return redirect()->route('product-image-gallery.index',compact('product'));
        return redirect()->back();
    }
}
