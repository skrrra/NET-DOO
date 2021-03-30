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
        DB::table('categories')->truncate();

        $categories = [
            ['name' => 'Računari'],
            ['name' => 'Oprema za računare'],
            ['name' => 'Laptopi'],
            ['name' => 'Oprema za laptope'],
            ['name' => 'Tableti'],
            ['name' => 'Oprema za tableta'],
            ['name' => 'Mobiteli'],
            ['name' => 'Oprema za mobitele'],
            ['name' => 'Gaming'],
        ];

        DB::table('categories')->insert($categories);
    }
}
