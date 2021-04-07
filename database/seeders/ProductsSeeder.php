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
                'name' => 'Računar i5 10400F/ 16GB DDR4/SSD/GTX1050TI Cerberus',
                'price' => '1330',
                'amount' => '1',
                'state' => '0',
                'active' => '1',
                'image_url' => '/images/1.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gaming računar Iron i7 4790/8GB/SSD 128GB / GTX1050TI',
                'price' => '870',
                'amount' => '1',
                'state' => '1',
                'active' => '1',
                'image_url' => '/images/2.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gaming računar Iron i5 4440/RX550 4GB/SSD/HDD',
                'price' => '769',
                'amount' => '1',
                'state' => '1',
                'active' => '1',
                'image_url' => '/images/3.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Thermaltake i5 4570/SSD/8GB/GTX1050TI CERBERUS',
                'price' => '820',
                'amount' => '1',
                'state' => '1',
                'active' => '1',
                'image_url' => '/images/4.jpg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
