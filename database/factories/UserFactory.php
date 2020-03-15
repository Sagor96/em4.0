<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//$factory->define(\App\User::class, function (Faker $faker) {
  //  return [
    //    'name' => $faker->name,
      //  'email' => $faker->unique()->safeEmail,
        //'email_verified_at' => now(),
        //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //'remember_token' => Str::random(10),
        //'role_id' => 2,
    //];
//});

//food
$factory->define(\App\Food::class, function (Faker $faker) {
    return [
        'imagePath'=>'https://www.sneakyveg.com/wp-content/uploads/2017/01/healthy-party-food-sneaky-veg-landscape.jpg',
        'f_title'=>$fake->f_title,
        'slug'=>$fake->slug,
        'f_desc'=>$fake->f_dese,
        'price'=>3000.00,
    ];
});

