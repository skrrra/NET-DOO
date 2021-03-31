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
}
