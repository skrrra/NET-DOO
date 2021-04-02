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
            ['name' => 'Brand name računari', 'root' => 0],
            ['name' => 'HP', 'root' => 0],
            ['name' => 'Asus', 'root' => 0],
            ['name' => 'Dell', 'root' => 0],
            ['name' => 'Lenovo', 'root' => 0],
            ['name' => 'Apple', 'root' => 0],
            ['name' => 'MSG', 'root' => 0],
            ['name' => 'Komponente i oprema', 'root' => 1],
            ['name' => 'PC komponente', 'root' => 0],
            ['name' => 'Procesori', 'root' => 0],
            ['name' => 'Maticne ploce', 'root' => 0],
            ['name' => 'RAM memorije', 'root' => 0],
            ['name' => 'Grafičke kartice', 'root' => 0],
            ['name' => 'Hard diskovi', 'root' => 0],
            ['name' => 'SSD diskovi', 'root' => 0],
            ['name' => 'Eksterni hard diskovi', 'root' => 0],
            ['name' => 'Kućišta za hard diskove', 'root' => 0],
            ['name' => 'Napojne jedinice', 'root' => 0],
            ['name' => 'Kućišta za PC', 'root' => 0],
            ['name' => 'Optički uređaji', 'root' => 0],
            ['name' => 'Zvučne kartice', 'root' => 0],
            ['name' => 'Hladnjaci i kuleri', 'root' => 0],
            ['name' => 'Monitori', 'root' => 0],
            ['name' => 'Do 24"', 'root' => 0],
            ['name' => 'Od 24" do 27""', 'root' => 0],
            ['name' => 'Preko 27"', 'root' => 0],
            ['name' => 'Tastature', 'root' => 0],
            ['name' => 'Žićne tastature i kompleti', 'root' => 0],
            ['name' => 'Bežićne tastature i kompleti', 'root' => 0],
            ['name' => 'Miševi', 'root' => 0],
            ['name' => 'Žićani miševi', 'root' => 0],
            ['name' => 'Bežićni miševi', 'root' => 0],
            ['name' => 'Podloge za miš', 'root' => 0],
            ['name' => 'Slušalice', 'root' => 0],
            ['name' => 'Žićane slušalice', 'root' => 0],
            ['name' => 'Bežićne slušalice', 'root' => 0],
            ['name' => 'Mikrofoni', 'root' => 0],
            ['name' => 'Zvučnici', 'root' => 0],
            ['name' => 'Zvučnici za računar', 'root' => 0],
            ['name' => 'Bluetooth zvučnici', 'root' => 0],
            ['name' => 'Bluetooth zvučnici', 'root' => 0],
            ['name' => 'Web kamere', 'root' => 0],
            ['name' => 'Pohrana podataka', 'root' => 0],
            ['name' => 'USB flash memorija', 'root' => 0],
            ['name' => 'Optički mediji', 'root' => 0],
            ['name' => 'Čitači kartica', 'root' => 0],
            ['name' => 'Eksterni hard diskovi', 'root' => 0],
            ['name' => 'PC kablovi', 'root' => 0],
            ['name' => 'Napojni kablovi', 'root' => 0],
            ['name' => 'HDMI kablovi', 'root' => 0],
            ['name' => 'VGA kablovi', 'root' => 0],
            ['name' => 'DVI kablovi', 'root' => 0],
            ['name' => 'Display port kablovi', 'root' => 0],
            ['name' => 'Adapteri - prelazi', 'root' => 0],
            ['name' => 'Ostali kablovi', 'root' => 0],

            // GAMING
            ['name' => 'Gaming', 'root' => 1],
            ['name' => 'Gaming miševi', 'root' => 0],
            ['name' => 'Gaming računari', 'root' => 0],
        ];

        DB::table('categories')->insert($categories);
    }
}
