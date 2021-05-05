<?php

namespace Database\Seeders\Categories;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaptopiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $laptopi = [
            ['name' => 'Laptopi', 'root' => 1],
            // kompletna ponuda

            // Brand name laptopi and children
            ['name' => 'Brand name laptopi', 'root' => 0],
            ['name' => 'Acer laptopi', 'root' => 0],
            ['name' => 'Asus laptopi', 'root' => 0],
            ['name' => 'Apple laptopi', 'root' => 0],
            ['name' => 'HP laptopi', 'root' => 0],
            ['name' => 'Dell laptopi', 'root' => 0],
            ['name' => 'Fujitsu laptopi', 'root' => 0],
            ['name' => 'Lenovo laptopi', 'root' => 0],
            ['name' => 'MSI laptopi', 'root' => 0],
            ['name' => 'Panasonic laptopi', 'root' => 0],
            ['name' => 'Toshiba laptopi', 'root' => 0],
            ['name' => 'Samsung laptopi', 'root' => 0],
            ['name' => 'Polovni laptopi', 'root' => 0],
        ];

        DB::table('categories')->insert($laptopi);
    }
}
