<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryProduct;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            CategoryParentSeeder::class,
            // ProductsSeeder::class,
            RolesSeeder::class,
        ]);
            
        Product::factory()->has(ProductImage::factory()->count(3), 'images')->count(3)->create();
        CategoryProduct::factory()->count(4)->create();
        User::factory()->create(['role_id' => 2]);
        User::factory()->create();
    }
}
