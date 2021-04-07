<?php

namespace Database\Seeders;

use App\Models\CategoryParent;
use Illuminate\Database\Seeder;

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
    }
}
