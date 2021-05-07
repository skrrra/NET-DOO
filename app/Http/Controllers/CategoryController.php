<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin-panel.categories.index', [
            'categories' => Category::withCount(['products', 'category', 'categories'])->get(['id', 'name']) 
        ]);
    }

    public function create()
    {
        return view('admin-panel.categories.create', [
            'categories' => Category::where('root', 0)->orderBy('name', 'ASC')->get(['id', 'name'])
        ]);
    }

    public function store()
    {

    }

    public function show()
    {
        return view('admin-panel.categories.show');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
