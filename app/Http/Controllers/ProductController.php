<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin-panel.products.index', [
            'products' => \App\Models\Product::with(['categories' => function($query){
                $query->select('name');
            }])->paginate(30, ['id', 'name', 'price', 'amount', 'state', 'active', 'image']),
            'categories' => \App\Models\Category::all(['id', 'name'])
        ]);
    }

    public function show(Product $id)
    {
        return view('admin-panel.products.show', [
            'product' => $id->load('categories')
        ]);
    }

    public function create()
    {
        return view('admin-panel.products.create', [
            'categories' => \App\Models\Category::where('root', 0)->orderBy('name', 'ASC')->get(['id', 'name'])
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $imageName = '/images/image-' . strtolower('netdoo') . '-' . date('Y') . '-' . time() . '.' . request()->image->extension();        

        $product = new \App\Models\Product($request->validated());
        $product->image = $imageName;
        $product->save();

        request()->image->move(public_path('images'), $imageName);

        $this->addProductCategories(explode(',', $request->categories), (int)$product->id);

        return redirect()->back()->with('Success', 'Proizvod spašen!');
    }

    public function edit($id)
    {
        return view('admin-panel.products.edit', [
            'product' => \App\Models\Product::find($id)->load('categories'),
            'categories' => \App\Models\Category::all('id', 'name'),
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if(!isset($request->image))
        {
            $product->update($request->validated());
            $product->save();
            $this->updateProductCategories(explode(',', $request->categories), (int)$product->id);

            return redirect()->back()->with('Success', 'Promjene spašene!');
        }else{
            $imageName = '/images/image-' . strtolower('netdoo') . '-' . date('Y') . '-' . time() . '.' . request()->image->extension();        
            $oldImage = $product->image;
            $product->update($request->validated());
            $product->image = $imageName;
            $product->save();
            request()->image->move(public_path('images'), $imageName);
            File::delete(public_path(). $oldImage);    
            $this->updateProductCategories(explode(',', $request->categories), (int)$product->id);

            return redirect()->back()->with('Success', 'Promjene spašene!');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        File::delete(public_path(). $product->image);
        return redirect('/admin-panel/product')->with('delete-success', 'Proizvod izbrisan');
    }

    public function search(Request $request)
    {
        // GET request ordering parameters
        $order = $request->order;
        $order = explode(',', $order);

        // If the request does not contain a category id return all products
        if(intval($request->category) === 0)
        {
            return view('admin-panel.products.index', [
                'products' => Product::orderBy($order[0], $order[1])->with('categories')->paginate(intval($request->perPage), ['id', 'name', 'price', 'amount', 'state', 'active', 'image']),
                'categories' => \App\Models\Category::all('id', 'name')
            ]);
        }

        // If the request contains a category return category products
        return view('admin-panel.products.index', [
            'products' => Category::find($request->category)->products()->orderBy($order[0], $order[1])->paginate(intval($request->perPage)),
            'currentCategory' => Category::find($request->category),
            'categories' => \App\Models\Category::all('id', 'name')->except($request->category),
        ]);
    }

    protected function addProductCategories($categories, $id)
    {
        foreach($categories as $productCategory)
        {
            $productCategory = new CategoryProduct([
                'category_id' => $productCategory,
                'product_id' => $id
            ]);
            $productCategory->save();
        }
    }

    protected function updateProductCategories($categories, $id)
    {
        $currentProductCategories = CategoryProduct::where('product_id', $id)->get();
        foreach($currentProductCategories as $categoryToDelete){
            $categoryToDelete->delete();
        }

        foreach($categories as $productCategory)
        {
            $productCategory = new CategoryProduct([
                'category_id' => $productCategory,
                'product_id' => $id
            ]);
            $productCategory->save();
        }
    }
}
