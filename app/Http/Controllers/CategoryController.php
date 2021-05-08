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
            'categories' => Category::withCount(['products', 'parent_categories', 'child_categories'])->get(['id', 'name', 'image_url']) 
        ]);
    }

    public function show()
    {
        echo "SHOW";
    }

    public function create()
    {
        if(! Gate::allows('create-category')){
            abort(403);
        }

        return view('admin-panel.categories.create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }   

    public function store(StoreCategoryRequest $request)
    {
        dd($request);
        if(! Gate::allows('create-category')){
            abort(403);
        }

        $category = new Category($request->validated());
        $category->save();
        return redirect()->back()->with('Success', 'Kategorija spašena!');
    }

    public function edit()
    {
        if(! Gate::allows('edit-category')){
            abort(403);
        }
    }

    public function update()
    {
        if(! Gate::allows('edit-category')){
            abort(403);
        }
    }

    public function destroy()
    {
        if(! Gate::allows('delete-category')){
            abort(403);
        }
    }
}
