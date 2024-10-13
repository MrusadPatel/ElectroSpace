<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $datatable)
    {
        $flashSale = FlashSale::first();
        $products = Product::where('status',1)->get();
        return $datatable->render('admin.flash-sale.index',compact('flashSale','products'));
    }

    public function update(Request $request)
    {
       $request->validate([
        'sale_end_date' => ['required']
       ]);

       FlashSale::updateOrCreate(
        ['id' => 1],
        ['end_date'=> $request->sale_end_date]
       );

       return redirect()->back();
    }

    public function addProduct(Request $request)
    {
       $request->validate([
        'product' => ['required', 'unique:flash_sale_items,product_id'],
        'show_at_home' => ['required'],
        'status' => ['required'],
       ]);

       $flashsaleitem = new FlashSaleItem();    
       $flashSale = FlashSale::first();
       $flashsaleitem->flash_sale_id = $flashSale->id;
       $flashsaleitem->product_id = $request->product;
       $flashsaleitem->show_at_home = $request->show_at_home;
       $flashsaleitem->status =  $request->status;
       $flashsaleitem->save();

       return redirect()->back();
    }

    public function destroy(string $id)
    {
        $flashsaleitem =  FlashSaleItem::findOrFail($id); 
        $flashsaleitem->delete();
        return redirect()->back();
    }

    
}
