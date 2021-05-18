<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Sale;

class SalesController extends Controller
{
    public function index(){
        $products = Sale::with('onsale')->get();

        return view('admin-panel.sales.index',[
            'products' => $products
        ]);

    }

    public function show(Product $product){
        return view('admin-panel.sales.create', [
            'product' => $product
        ]);
    }

    public function create(Request $request, Product $product){

        $validate = $request->validate([
            'percent_off' => 'required|bail',
            'product_id' => 'required|bail',
        ]);

        Sale::create($validate);

        $validate = $request->validate([
            'on_sale' => 'required|bail'
        ]);

        $product->fill($validate);
        $product->save();

        return redirect('/admin-panel/product')->with('Success', 'Popust uspješno kreiran!');

    }

    public function store(){
        
    }

    public function edit(Sale $sale){
        
        $product = Product::where('id', $sale->product_id)->first();
        $discount = $sale::where('id', $sale->id)->first();

        return view('admin-panel.sales.edit',[
            'product' => $product,
            'discount' => $discount
        ]);
    }

    public function update(Sale $sale, Request $request){
        $validate = $request->validate([
            'percent_off' => 'required | bail'
        ]);
        $sale->update($validate);
        return redirect('/admin-panel/sales')->with('Success', 'Novi popust proizvoda je uspešno spašen!');
    }

    public function destroy(Sale $sale){
        // Delete Product on sale sate
        $sale->delete();
        // Update on_sale column from "1" to null (1 indicates that product is on sale, null indicates that product is not on sale)
        $query = Product::where('id', $sale->product_id)->first();
        $query->update(['on_sale' => null]);
        return redirect()->back()->with('Success', 'Popust proizvoda je uspešno uklonjen!');
    }
}
