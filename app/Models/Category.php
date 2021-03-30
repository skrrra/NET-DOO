<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /*
        Calling the category relationship on a Category:class model
        returns the parent Category::class
    */

    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    /*
        Calling the categories relationship on a Category:class model
        returns all the child Category::class 
    */

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_category_id', 'id');
    }

    /*
        Calling the categories relationship on a Category::class model
        returns all the products (Product::class) associated with that 
        class ( Database table => category_products )
    */

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }
}
