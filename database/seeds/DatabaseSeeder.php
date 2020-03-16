<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(CatagoriesTableSeeder::class);
        $this->call(VenuesTableSeeder::class);
    }
}
