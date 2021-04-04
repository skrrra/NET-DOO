<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'categories' => Category::where('root', true)->with('categories.products', 'products')->get()
    ]);
});

// ADMIN DASHBOARD
Route::middleware(['auth'])->group(function(){

    Route::get('/admin-panel', function(){
        return view('admin-panel');
    });

    // ADMIN DASHBOARD -> PRODUCTS
    Route::get('/admin-panel/products', 'App\Http\Controllers\ProductController@index');
    Route::post('/admin-panel/products', 'App\Http\Controllers\ProductController@store');

    Route::get('/admin-panel/products/search', 'App\Http\Controllers\ProductController@search');
    
    Route::get('/admin-panel/products/create', 'App\Http\Controllers\ProductController@create');
    Route::patch('/admin-panel/products/{id}', 'App\Http\Controllers\ProductController@update');
    Route::delete('/admin-panel/products/{id}', 'App\Http\Controllers\ProductController@destroy');
    Route::get('/admin-panel/products/{id}/edit', 'App\Http\Controllers\ProductController@edit');

});

require __DIR__.'/auth.php';
