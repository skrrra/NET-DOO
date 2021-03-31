<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('admin-panel.products.index', [
            'products' => \App\Models\Product::with('categories')->get()
        ]);
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
            'state' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024'
        ]);

        $imageName = '/images/image-' . strtolower('netdoo') . '-' . date('Y') . '-' . time() . '.' . request()->image_url->extension();

        request()->image_url->move(public_path('images'), $imageName);

        $validated['image_url'] = $imageName;
        
        $product = new \App\Models\Product($validated);
        $product->save();
        
        $productCategoryAttributes = [
            'category_id' => (int)$request->category,
            'product_id' => (int)$product->id
        ];

        $productCategory = new \App\Models\CategoryProduct($productCategoryAttributes);
        $productCategory->save();

        return redirect()->back()->with('Success', 'Proizvod spašen!');
    }
}
