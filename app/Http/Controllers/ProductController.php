<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('admin-panel.products.index');
    }

    public function create(Request $request)
    {
        return view('admin-panel.products.create', [
            'categories' => \App\Models\Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required',
            'amount' => 'required',
            'state' => 'required'
        ]);

        $product = new \App\Models\Product($validated);
        $product->save();

        $productCategoryAttributes = [
            'category_id' => (int)$request->category,
            'product_id' => (int)$product->id
        ];

        $productCategory = new \App\Models\CategoryProduct($productCategoryAttributes);
        $productCategory->save();

        return redirect()->back()->with('Success', 'Product created!');
    }
}
