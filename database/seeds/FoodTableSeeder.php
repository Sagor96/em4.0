<?php

use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $food= new \App\Models\Food([
        	'imagePath'=>'https://media-cdn.tripadvisor.com/media/photo-s/01/f6/b7/23/birthday-cake-1-pound.jpg',
        	'f_title'=>'Food 1',
        	'service_id'=>1,
        	'f_desc'=>'Weight:0.5kg',
        	'price'=>700.00,

        ]);
        $food->save();

        $food= new \App\Models\Food([
            'imagePath'=>'https://lh3.googleusercontent.com/proxy/pOk_eFC66P-RPz1U2JYf6PWQNOVbaIn_kgPf8gL-vaIr526WJH4qLGZ-33ilosHnMDG-7KzZFX_M08Pl0NPYKo28c4chUMJ7a89FfkRXH02ArlRk-0argvJOnLc8Mvcdkh-f2gcgRBiH44sIgN4Q',
            'f_title'=>'Food 2',
            'service_id'=>1,
            'f_desc'=>'Weight:1.0kg',
            'price'=>1400.00,
        ]);
        $food->save();

        $food= new \App\Models\Food([
            'imagePath'=>'https://www.bdrose.com/image/cache/catalog/data/cake/testytreat/marvail-1-1000x1000.jpg',
            'f_title'=>'Food 3',
            'service_id'=>1,
            'f_desc'=>'Weight:1.0kg',
            'price'=>1400.00,
        ]);
        $food->save();

        $food= new \App\Models\Food([
            'imagePath'=>'https://lh3.googleusercontent.com/proxy/pOk_eFC66P-RPz1U2JYf6PWQNOVbaIn_kgPf8gL-vaIr526WJH4qLGZ-33ilosHnMDG-7KzZFX_M08Pl0NPYKo28c4chUMJ7a89FfkRXH02ArlRk-0argvJOnLc8Mvcdkh-f2gcgRBiH44sIgN4Q',
            'f_title'=>'Food 2',
            'service_id'=>1,
            'f_desc'=>'Weight:1.0kg',
            'price'=>1400.00,
        ]);
        $food->save();

        $food= new \App\Models\Food([
            'imagePath'=>'https://www.bdrose.com/image/cache/catalog/data/cake/testytreat/marvail-1-1000x1000.jpg',
            'f_title'=>'Food 3',
            'service_id'=>1,
            'f_desc'=>'Weight:1.0kg',
            'price'=>1400.00,
        ]);
        $food->save();

    }
}
