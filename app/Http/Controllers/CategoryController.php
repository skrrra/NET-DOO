<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    // Returns category index page Route('/admin-panel/category')
    public function index()
    {

        return view('admin-panel.categories.index', [
            'categories' => Category::withCount(['products', 'parent_categories', 'child_categories'])->get()
        ]);
    }

    // Returns category view Route('/admin-panel/category/{category_id})
    public function show()
    {
        echo "SHOW";
    }

    // Returns create new category view Route('/admin-panel/category/create')
    public function create()
    {
        if(! Gate::allows('create-category')){
            abort(403);
        }

        return view('admin-panel.categories.create', [
            'categories' => Category::all(['id', 'name'])
        ]);
    }   

    // Store new category in database.
    public function store(StoreCategoryRequest $request)
    {
        
        if(! Gate::allows('create-category')){
            abort(403);
        }

        $category = new Category($request->validated());
        $category->save();
        return redirect('/admin-panel/category')->with('Success', 'Kategorija spašena!');
    }

    // Returns edit category view route->('/admin-panel/categories/edit').
    public function edit(Category $category)
    {
        if(! Gate::allows('edit-category')){
            abort(403);
        }
        return view('admin-panel.categories.edit', [
            'categories' => $category,
            'items' => Category::all()
        ]);

    }

    // Updates category changes.
    public function update(Request $request, Category $category)
    {
        if(! Gate::allows('edit-category')){
            abort(403);
        }

        $validate = $request->validate([
            'name' => 'bail|required',
            'root' => 'bail|required',
            'parent_categories' => 'bail|required',
            'child_categories' => 'bail|required'
        ]);

        $category->update($validate);

        return redirect('/admin-panel/category')->with('Success', 'Kategorija je uspješno izmjenjena!');

    }

    // Delete category from ('/admin-panel/category')->delete button under category description.
    public function destroy(Category $category)
    {
        if(! Gate::allows('delete-category')){
            abort(403);
        }

        $category->delete();

        return redirect()->back()->with('Success', 'Kategorija je uspešno izbrisana!');
    }
}
