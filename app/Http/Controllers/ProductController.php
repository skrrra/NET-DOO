<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['first_image', 'categories' => function($query){
            $query->select('name');
        }, 'images' => function($query){
            $query->select('id', 'product_id', 'image_url')->orderBy('id', 'ASC');
        }])->orderBy('id', 'DESC')->paginate(30, ['id', 'name', 'price', 'amount', 'state', 'active']);

        return view('admin-panel.products.index', [
            'products' => $products,
            'categories' => Category::withCount('products')->get()
        ]);
    }

    public function show(Product $id)
    {
        return view('admin-panel.products.show', [
            'product' => $id->load('categories', 'images')
        ]);
    }

    public function create()
    {
        if(! Gate::allows('create-product')){
            abort(403);
        }

        return view('admin-panel.products.create', [
            'categories' => \App\Models\Category::where('root', 0)->orderBy('name', 'ASC')->get(['id', 'name'])
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        if(! Gate::allows('create-product')){
            abort(403);
        }

        $product = new \App\Models\Product($request->validated());
        $product->save();
        
        foreach($request->image as $image){
            $imageName = '/images/image-' . strtolower('netdoo') . '-' . date('Y') . '-' . time() . Str::random() .  '.' . $image->extension();
            $productImage = new ProductImage([
                'product_id' => $product->id,
                'image_url' => $imageName
            ]);
            $productImage->save();
            $image->move(public_path('images'), $imageName);
        }

        $this->addProductCategories(explode(',', $request->categories), (int)$product->id);

        return redirect()->back()->with('Success', 'Proizvod spašen!');
    }

    public function edit($id)
    {
        if(! Gate::allows('edit-product')){
            abort(403);
        }

        return view('admin-panel.products.edit', [
            'product' => \App\Models\Product::find($id)->load('categories', 'images'),
            'categories' => \App\Models\Category::all('id', 'name'),
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        if(! Gate::allows('edit-product')){
            abort(403);
        }

        $product = Product::findOrFail($id);
        $product->fill($request->validated());

        if(isset($request->image)){

            $oldImages = $product->images;

            foreach($request->image as $image){
                $imageName = '/images/image-' . strtolower('netdoo') . '-' . date('Y') . '-' . time() . Str::random() .  '.' . $image->extension();
                $productImage = new ProductImage([
                    'product_id' => $product->id,
                    'image_url' => $imageName
                ]);
                $productImage->save();
                $image->move(public_path('images'), $imageName);
            }

            foreach ($oldImages as $oldImage) {
                File::delete(public_path() . $oldImage->image_url);
                $oldImage->delete();
            }

        }

        $product->save();
        $this->updateProductCategories(explode(',', $request->categories), (int)$product->id);
        return redirect()->back()->with('Success', 'Promjene spašene!');
    }

    public function destroy($id)
    {
        if(! Gate::allows('delete-product')){
            abort(403);
        }

        $product = Product::find($id);
        foreach ($product->images as $image) {
            File::delete(public_path() . $image->image_url);
            $image->delete();
        }
        $product->delete();
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
                'products' => Product::orderBy($order[0], $order[1])->with('categories', 'images')->paginate(intval($request->perPage), ['id', 'name', 'price', 'amount', 'state', 'active']),
                'categories' => \App\Models\Category::withCount('products')->get()
            ]);
        }

        // If the request contains a category return category products
        return view('admin-panel.products.index', [
            'products' => Category::find($request->category)->products()->orderBy($order[0], $order[1])->paginate(intval($request->perPage)),
            'currentCategory' => Category::find($request->category),
            'categories' => \App\Models\Category::withCount('products')->get()->except($request->category),
        ]);
    }

    protected function addProductCategories($categories, $id)
    {
        $casts = [];

        foreach($categories as $productCategory){
            $casts[] = [
                'category_id' => $productCategory,
                'product_id' => $id
            ];
        }
        CategoryProduct::insert($casts);
    }

    protected function updateProductCategories($categories, $id)
    {
        $currentProductCategories = CategoryProduct::where('product_id', $id)->delete();

        $casts = [];

        foreach($categories as $productCategory)
        {
            $casts[] = [
                'category_id' => $productCategory,
                'product_id' => $id
            ];
        }
        CategoryProduct::insert($casts);
    }
}
