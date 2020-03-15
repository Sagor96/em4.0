<?php

use Illuminate\Database\Seeder;

class CatagoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catagory= new \App\Models\Catagory([
        	'c_name'	=>'Celebrations',
        	'c_desc'	=>'fairs, parades, weddings, reunions, birthdays, anniversaries',
        ]);
        $catagory->save();

		$catagory= new \App\Models\Catagory([
        	'c_name'	=>'Education',
        	'c_desc'	=>'conferences, meetings, graduations',
        ]);
        $catagory->save();

        $catagory= new \App\Models\Catagory([
        	'c_name'	=>'Promotions',
        	'c_desc'	=>'product launches, political rallies, fashion shows',
        ]);
        $catagory->save();

        $catagory= new \App\Models\Catagory([
        	'c_name'	=>'Commemorations',
        	'c_desc'	=>'memorials, civic events',
        ]);
        $catagory->save();

    }
}
