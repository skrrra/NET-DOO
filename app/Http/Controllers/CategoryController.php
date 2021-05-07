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

    public function show()
    {
        echo "SHOW";
    }

    public function create()
    {
        echo "CREATE";
    }   

    public function store()
    {

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
