<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use App\Models\CategoryProduct;
use App\Models\User;

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
            ProductsSeeder::class,
        ]);
            
        CategoryProduct::factory()->count(6)->create();
        User::factory()->count(1)->create();
    }
}
