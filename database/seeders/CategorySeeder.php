<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [

            // RACUNARI
            ['name' => 'Računari', 'root' => 1],

            // GAMING
            ['name' => 'Gaming', 'root' => 1],
            ['name' => 'Gaming miševi', 'root' => 0],
            ['name' => 'Gaming računari', 'root' => 0],
        ];

        DB::table('categories')->insert($categories);
    }
}
