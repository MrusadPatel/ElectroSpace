<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $datatable)
    {
        return $datatable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max: 600'],
            'long_description' => ['required'],
            'status' => ['required']
        ]);

        $product = new Product();

        /** Handle the image upload */
        if($request->hasFile('image'))
        {
            // if(File::exists(public_path($user->profile_photo_path)))
            // {
            //     File::delete(public_path($user->profile_photo_path));
            // }

            $image = $request->image;
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/".$imageName;
            $product->thumb_image  = $path;

        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('product.index');

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
        $product = Product::findorFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $subcategories = SubCategory::where('category_id',$product->category_id)->get();
        $childcategories = ChildCategory::where('sub_category_id', $product->sub_category_id)->get();
        return view('admin.product.edit',compact('product','categories','brands','subcategories','childcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max: 600'],
            'long_description' => ['required'],
            'status' => ['required']
        ]);

        $product =  Product::findorFail($id);

        /** Handle the image upload */
        if($request->hasFile('image'))
        {
            if(File::exists(public_path($product->thumb_image )))
            {
                File::delete(public_path($product->thumb_image ));
            }

            $image = $request->image;
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $path = "/uploads/".$imageName;
            $product->thumb_image  = $path;

        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->offer_start_date = $request->offer_start_date;
        $product->offer_end_date = $request->offer_end_date;
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $galleryImages = ProductImageGallery::where('product_id',$product->id)->get();
        // deletes product gallery images
        foreach($galleryImages as $image)
        {
            if(File::exists(public_path($image->image)))
            {
                File::delete(public_path($image->image));
            }
            $image->delete();
        }

        // delete product thumb image
        if(File::exists(public_path($product->thumb_image)))
        {
                File::delete(public_path($product->thumb_image));
        }

        $product->delete();

        return redirect()->back();

    }

     /**
     * Get all sub categories
     */
    public function getSubCategories(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->id)->get();
        return $subcategories;
    }

      /**
     * Get all child categories
     */
    public function getChildCategories(Request $request)
    {
        $childcategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childcategories;
    }
}
