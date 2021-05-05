<?php

namespace Database\Seeders\Categories;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gaming = [
            ['name' => 'Gaming', 'root' => 1],
            ['name' => 'Gaming računari', 'root' => 0],
            ['name' => 'Gaming laptopi', 'root' => 0],
            ['name' => 'Gaming tastature', 'root' => 0],
            ['name' => 'Gaming miševi', 'root' => 0],
            ['name' => 'Gaming stolice', 'root' => 0],
            ['name' => 'Gaming headseti', 'root' => 0],
            ['name' => 'Gaming stolice', 'root' => 0],
            ['name' => 'Polovna gaming oprema', 'root' => 0],
        ];
        DB::table('categories')->insert($gaming);
    }
}
