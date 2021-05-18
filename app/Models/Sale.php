<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Sale extends Model
{
    use HasFactory;

    protected $table = 'product_sale';

    protected $fillable = [
        'percent_off',
        'product_id'
    ];

    public function onsale(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
