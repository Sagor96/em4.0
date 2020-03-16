<?php

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service= new \App\Models\Service([
        	's_name'	=>'Food',
        	'slug'		=>'food',
        	's_desc'	=>'All type of Foods',
        ]);
        $service->save();

        $service= new \App\Models\Service([
        	's_name'	=>'Decoration',
        	'slug'		=>'decoration',
        	's_desc'	=>'All type of Decorations',
        ]);
        $service->save();

		$service= new \App\Models\Service([
        	's_name'	=>'Entertainment',
        	'slug'		=>'entertainment',
        	's_desc'	=>'All type of Entertainments',
        ]);
        $service->save();

        $service= new \App\Models\Service([
        	's_name'	=>'Transport',
        	'slug'		=>'transport',
        	's_desc'	=>'All type of Transports',
        ]);
        $service->save();

        $service= new \App\Models\Service([
            's_name'    =>'Venue',
            'slug'      =>'Venue',
            's_desc'    =>'All type of Venues',
        ]);
        $service->save();
    }
}
