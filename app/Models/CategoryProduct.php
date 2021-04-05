<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_id'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
