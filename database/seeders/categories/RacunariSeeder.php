<?php

namespace Database\Seeders\Categories;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacunariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $racunari = [

            // ROOT CATEGORY
            ['name' => 'Računari', 'root' => 1],

            // Brand name category and children
            ['name' => 'Brand name računari', 'root' => 0],
            ['name' => 'Asus računari', 'root' => 0],
            ['name' => 'HP računari', 'root' => 0],
            ['name' => 'Dell računari', 'root' => 0],
            ['name' => 'Lenovo računari', 'root' => 0],
            ['name' => 'Apple računari', 'root' => 0],
            ['name' => 'MSG računari', 'root' => 0],

            ['name' => 'Polovni računari', 'root' => 0],
            // Tastature and children
            ['name' => 'Tastature', 'root' => 0],

            // Miševi and children 
            ['name' => 'Miševi', 'root' => 0],

            // Komponente and children
            ['name' => 'Komponente', 'root' => 0],

            // Procesori and children
            ['name' => 'Procesori', 'root' => 0],
            // kompletna ponuda
            ['name' => 'Intel procesori', 'root' => 0],
            ['name' => 'AMD procesori', 'root' => 0],

            // Maticne ploce and children
            ['name' => 'Matične ploce', 'root' => 0],
            ['name' => 'RAM memorije', 'root' => 0],
            ['name' => 'Napojne jedinice', 'root' => 0],
            ['name' => 'Grafičke kartice', 'root' => 0],
            ['name' => 'Hard diskovi', 'root' => 0],
            ['name' => 'SSD diskovi', 'root' => 0],
            ['name' => 'Kućišta za PC', 'root' => 0],
            ['name' => 'Hladnjaci i kuleri', 'root' => 0],
            ['name' => 'Zvučne kartice', 'root' => 0],
            ['name' => 'Eksterni hard diskovi', 'root' => 0],
            ['name' => 'Kućišta za hard diskove', 'root' => 0],
        ];

        DB::table('categories')->insert($racunari);
    }
}
