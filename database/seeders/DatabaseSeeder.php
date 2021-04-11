<?php

namespace Database\Seeders;

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
            RolesSeeder::class,
        ]);
            
        CategoryProduct::factory()->count(6)->create();
        User::factory()->create(['role_id' => 2]);
        User::factory()->create();
    }
}
