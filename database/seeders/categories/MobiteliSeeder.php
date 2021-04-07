<?php

namespace Database\Seeders\Categories;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MobiteliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobiteli = [
            ['name' => 'Mobiteli', 'root' => 1],

            // Smartphones and children
            ['name' => 'Smartphones', 'root' => 0],
            ['name' => 'Apple smartphoni', 'root' => 0],
            ['name' => 'Android smartphoni', 'root' => 0],

            // Ostali and children
            ['name' => 'Ostali mobiteli', 'root' => 0],
            ['name' => 'Kućni mobiteli', 'root' => 0],
            ['name' => 'Economy mobiteli', 'root' => 0],

            ['name' => 'Polovni mobiteli', 'root' => 0],
        ];

        DB::table('categories')->insert($mobiteli);
    }
}
