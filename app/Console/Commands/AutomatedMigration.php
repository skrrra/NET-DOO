<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\BufferedOutput;

class AutomatedMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:fresh-automation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all, create all tables, seed all categories, execute sql export';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // First we want to call the existing php artisan migrate:fresh --seed command to get all tables and seed the pre defined categories
        $this->output = new BufferedOutput();
        $this->call('migrate:fresh');
        $this->call('db:seed');
        /*
            After the db is created and seeded we want to import the products and product-images sql file
            in order to get all the products and images(url's included) that we scraped with the pik-tracker
        */
        DB::unprepared(file_get_contents('C:/Users/halfamomo/Desktop/productsandimages3.sql'));
        echo "Created database, seeded categories and imported SQL file!";
    }
}
