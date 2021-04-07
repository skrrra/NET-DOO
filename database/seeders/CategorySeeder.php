<?php

namespace Database\Seeders;

use Database\Seeders\Categories\GamingSeeder;
use Database\Seeders\Categories\LaptopiSeeder;
use Database\Seeders\Categories\MobiteliSeeder;
use Database\Seeders\Categories\RacunariSeeder;
use Database\Seeders\Categories\TabletSeeder;
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

        $this->call([
            RacunariSeeder::class,
            LaptopiSeeder::class,
            GamingSeeder::class,
            TabletSeeder::class,
            MobiteliSeeder::class,
        ]);
    }
}
