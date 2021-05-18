<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'root'
    ];

    /*
        Calling the category relationship on a Category:class model
        returns the parent Category::class
    */

    public function parent_categories()
    {
        return $this->belongsToMany(Category::class, 'category_parents', 'category_id', 'parent_id');
    }

    /*
        Calling the categories relationship on a Category:class model
        returns all the child Category::class 
    */

    public function child_categories()
    {
        return $this->belongsToMany(Category::class, 'category_parents', 'parent_id');
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
