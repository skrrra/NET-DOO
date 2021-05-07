<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Gate;

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
        return view('admin-panel.categories.create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }   

    public function store(StoreCategoryRequest $request)
    {
        if(! Gate::allows('create-category')){
            abort(403);
        }

        $category = new Category($request->validated());
        $category->save();
        return redirect()->back()->with('Success', 'Kategorija spašena!');
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
