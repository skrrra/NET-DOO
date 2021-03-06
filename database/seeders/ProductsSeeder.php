<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $products = [
            [
                'name' => 'Rowenta usisivač RO4853EA',
                'price' => '180',
                'amount' => '1',
                'state' => '1',
                'active' => '1',
                'image' => '/images/nobg.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gaming računar Iron i5 4440/RX550 4GB/SSD/HDD',
                'price' => '769',
                'amount' => '1',
                'state' => '1',
                'active' => '1',
                'image' => '/images/nobg.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Thermaltake i5 4570/SSD/8GB/GTX1050TI CERBERUS',
                'price' => '820',
                'amount' => '1',
                'state' => '1',
                'active' => '1',
                'image' => '/images/nobg.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
