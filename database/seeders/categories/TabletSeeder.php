<?php

namespace Database\Seeders\Categories;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TabletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableti = [
            ['name' => 'Tableti', 'root' => 1],

            // kompletna ponuda
            ['name' => 'Apple tableti', 'root' => 0],
            ['name' => 'Android tableti', 'root' => 0],
            ['name' => 'Windows tableti', 'root' => 0],
            ['name' => 'Polovni tableti', 'root' => 0],
        ];
        DB::table('categories')->insert($tableti);
    }
}
