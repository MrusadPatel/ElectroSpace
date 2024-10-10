<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.sub-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required','max:200','unique:sub_categories,name'],
            'status' => ['required']
        ]);

        $subcategory = new SubCategory();
        
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()->route('sub-category.index');
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
        $categories = Category::all();
        $subcategory = SubCategory::findorFail($id);
        return view('admin.sub-category.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required','max:200','unique:sub_categories,name,'.$id],
            'status' => ['required']
        ]);

        $subcategory = SubCategory::findorFail($id);
        
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->slug = Str::slug($request->name);
        $subcategory->status = $request->status;
        $subcategory->save();

        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findorFail($id);
        $childCategory = ChildCategory::where('sub_category_id', $subcategory->id)->count();
        
        if($childCategory > 0){
            
            return redirect()->route('sub-category.index');
        }
        else{
        $subcategory->delete();
        return redirect()->route('sub-category.index');
        }
    }
}
