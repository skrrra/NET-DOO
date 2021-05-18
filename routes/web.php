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
    return view('welcome');
});

Route::view('/my-profile', 'myprofile');

// ADMIN DASHBOARD
Route::middleware(['auth'])->prefix('admin-panel')->group(function(){
    // ADMIN DASHBOARD -> INDEX
    Route::view('/', 'admin-panel');
    // ADMIN DASHBOARD -> THEME TOGGLE FOR AUTH USERS
    Route::post('/theme', 'App\Http\Controllers\UserController@theme');
});

Route::middleware(['auth'])->prefix('admin-panel/product')->group(function(){
    // ADMIN DASHBOARD -> PRODUCTS
    Route::get('/', 'App\Http\Controllers\ProductController@index')->name('admin-panel-product-index');
    Route::post('/', 'App\Http\Controllers\ProductController@store');
    Route::get('/search', 'App\Http\Controllers\ProductController@search')->name('admin-panel-product-search');
    Route::get('/create', 'App\Http\Controllers\ProductController@create')->name('admin-panel-product-create');
    Route::get('/{id}', 'App\Http\Controllers\ProductController@show')->name('admin-panel-product-show');
    Route::patch('/{id}', 'App\Http\Controllers\ProductController@update');
    Route::delete('/{id}', 'App\Http\Controllers\ProductController@destroy');
    Route::get('/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('admin-panel-product-edit');
});

Route::middleware(['auth'])->prefix('admin-panel/category')->group(function(){
    // ADMIN DASHBOARD -> CATEGORIES
    Route::get('/', 'App\Http\Controllers\CategoryController@index');
    Route::post('/', 'App\Http\Controllers\CategoryController@store');
    Route::get('/create', 'App\Http\Controllers\CategoryController@create');
    Route::post('/create', 'App\Http\Controllers\CategoryController@store');
    Route::delete('delete/{category:id}', 'App\Http\Controllers\CategoryController@destroy');
    Route::get('/edit/{category:id}', 'App\Http\Controllers\CategoryController@edit');
    Route::patch('/update/{category:id}', 'App\Http\Controllers\CategoryController@update');
    Route::get('/{id}', 'App\Http\Controllers\CategoryController@show');
});

Route::middleware(['auth'])->prefix('admin-panel/sales')->group(function(){
    // ADMIN DASHBOARD -> SALES
    Route::get('/', 'App\Http\Controllers\SalesController@index');
    Route::get('/create/{product:id}', 'App\Http\Controllers\SalesController@show');
    Route::post('/create/{product:id}', 'App\Http\Controllers\SalesController@create');
    Route::get('/{sale:id}/delete', 'App\Http\Controllers\SalesController@destroy');
    Route::get('/{sale:id}/edit', 'App\Http\Controllers\SalesController@edit');
    Route::post('/{sale:id}/update', 'App\Http\Controllers\SalesController@update');

});

require __DIR__.'/auth.php';
