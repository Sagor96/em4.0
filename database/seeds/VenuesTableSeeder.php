<?php

use Illuminate\Database\Seeder;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venue= new \App\Models\Venue([
        	'imagePath'=>'https://drscdn.500px.org/photo/1008118073/q%3D80_h%3D450/v2?sig=543823b409ae6fe672454cf03faba978ec7622eca29860e9701e17280851c70b',
        	'v_title'=>'Hotel Sea',
        	'service_id'=>5,
        	'v_location'=>'Uttara',
        	'v_addr'=>'Road:13,Sector:9,Uttara,Dhaka',
        	'v_status'=>1,
        	'qty'=>1,
        	'price'=>17000.00,

        ]);
        $venue->save();

$venue= new \App\Models\Venue([
        	'imagePath'=>'https://drscdn.500px.org/photo/1008118073/q%3D80_h%3D450/v2?sig=543823b409ae6fe672454cf03faba978ec7622eca29860e9701e17280851c70b',
        	'v_title'=>'Hotel Sea',
        	'service_id'=>5,
        	'v_location'=>'Uttara',
        	'v_addr'=>'Road:13,Sector:9,Uttara,Dhaka',
        	'v_status'=>1,
        	'qty'=>1,
        	'price'=>17000.00,

        ]);
        $venue->save();

		$venue= new \App\Models\Venue([
        	'imagePath'=>'https://drscdn.500px.org/photo/91505199/m%3D900_s%3D1_k%3D1_a%3D1/v2?webp=true&v=7&sig=5f02b70eed269f05051f428dc9fe4ba5fdbfa67bc709e1e09754f97f55f38e3f',
        	'v_title'=>'Hotel R',
        	'service_id'=>5,
        	'v_location'=>'Uttara',
        	'v_addr'=>'Road:13,Sector:6,Uttara,Dhaka',
        	'v_status'=>1,
        	'qty'=>1,
        	'price'=>18000.00,

        ]);
        $venue->save();

		$venue= new \App\Models\Venue([
        	'imagePath'=>'https://drscdn.500px.org/photo/1008118073/q%3D80_h%3D450/v2?sig=543823b409ae6fe672454cf03faba978ec7622eca29860e9701e17280851c70b',
        	'v_title'=>'Hotel Glob',
        	'service_id'=>5,
        	'v_location'=>'Bonani',
        	'v_addr'=>'Road:13,Sector:4,Bonani,Dhaka',
        	'v_status'=>1,
        	'qty'=>1,
        	'price'=>19000.00,

        ]);
        $venue->save();

		$venue= new \App\Models\Venue([
        	'imagePath'=>'https://5.imimg.com/data5/VJ/WF/GLADMIN-40554017/venue-management-services-500x500.png',
        	'v_title'=>'Hotel Tan',
        	'service_id'=>5,
        	'v_location'=>'Bonani',
        	'v_addr'=>'Road:11,Sector:9,Bonani,Dhaka',
        	'v_status'=>1,
        	'qty'=>1,
        	'price'=>17000.00,

        ]);
        $venue->save();

		$venue= new \App\Models\Venue([
        	'imagePath'=>'https://www.mitophysiology.org/images/thumb/0/0e/Coimbra_1.jpg/500px-Coimbra_1.jpg',
        	'v_title'=>'S Ins',
        	'service_id'=>5,
        	'v_location'=>'Romona',
        	'v_addr'=>'Road:13,Sector:9,Romona,Dhaka',
        	'v_status'=>1,
        	'qty'=>1,
        	'price'=>10000.00,

        ]);
        $venue->save();

    }
}
