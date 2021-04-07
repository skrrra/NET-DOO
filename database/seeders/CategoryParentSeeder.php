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
            ['category_id' => 2, 'parent_id' => 1],

            ['category_id' => 3, 'parent_id' => 2],
            ['category_id' => 4, 'parent_id' => 2],
            ['category_id' => 5, 'parent_id' => 2],
            ['category_id' => 6, 'parent_id' => 2],
            ['category_id' => 7, 'parent_id' => 2],
            ['category_id' => 8, 'parent_id' => 2],
            ['category_id' => 9, 'parent_id' => 1],

            ['category_id' => 10, 'parent_id' => 1],
            ['category_id' => 11, 'parent_id' => 1],
            ['category_id' => 12, 'parent_id' => 1],
            ['category_id' => 13, 'parent_id' => 1],

            ['category_id' => 14, 'parent_id' => 13],
            ['category_id' => 15, 'parent_id' => 13],

            ['category_id' => 16, 'parent_id' => 1],
            ['category_id' => 17, 'parent_id' => 1],
            ['category_id' => 18, 'parent_id' => 1],
            ['category_id' => 19, 'parent_id' => 1],
            ['category_id' => 20, 'parent_id' => 1],
            ['category_id' => 21, 'parent_id' => 1],
            ['category_id' => 22, 'parent_id' => 1],
            ['category_id' => 23, 'parent_id' => 1],
            ['category_id' => 24, 'parent_id' => 1],
            ['category_id' => 25, 'parent_id' => 1],
            ['category_id' => 26, 'parent_id' => 1],

            ['category_id' => 28, 'parent_id' => 27],
            ['category_id' => 29, 'parent_id' => 28],
            ['category_id' => 30, 'parent_id' => 28],
            ['category_id' => 31, 'parent_id' => 28],
            ['category_id' => 32, 'parent_id' => 28],
            ['category_id' => 33, 'parent_id' => 28],
            ['category_id' => 34, 'parent_id' => 28],
            ['category_id' => 35, 'parent_id' => 28],
            ['category_id' => 36, 'parent_id' => 28],
            ['category_id' => 37, 'parent_id' => 28],
            ['category_id' => 38, 'parent_id' => 28],
            ['category_id' => 39, 'parent_id' => 28],

            ['category_id' => 40, 'parent_id' => 27],

            ['category_id' => 42, 'parent_id' => 48],
            ['category_id' => 43, 'parent_id' => 48],
            ['category_id' => 44, 'parent_id' => 48],
            ['category_id' => 45, 'parent_id' => 48],
            ['category_id' => 46, 'parent_id' => 48],
            ['category_id' => 47, 'parent_id' => 48],
            ['category_id' => 48, 'parent_id' => 48],

            ['category_id' => 50, 'parent_id' => 49],
            ['category_id' => 51, 'parent_id' => 49],
            ['category_id' => 52, 'parent_id' => 49],
            ['category_id' => 53, 'parent_id' => 49],
            
            ['category_id' => 55, 'parent_id' => 54],
            ['category_id' => 56, 'parent_id' => 55],
            ['category_id' => 57, 'parent_id' => 55],
            ['category_id' => 58, 'parent_id' => 54],
            ['category_id' => 59, 'parent_id' => 54],
            ['category_id' => 60, 'parent_id' => 54],
        ];

        DB::table('category_parents')->insert($categories);
    }
}
