<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_parents')->delete();

        $categories = [
            ['category_id' => 2, 'parent_id' => 1]
        ];

        DB::table('category_parents')->insert($categories);
    }
}
