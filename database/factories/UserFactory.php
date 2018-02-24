<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'type' => $faker->randomElement($array = array ('agent','customer')),
        'email' => "hazman.yusof@gmail.com",
        'company' => $faker->company,
        'note' => $faker->catchPhrase,
        'password' => bcrypt('rahsia'),
        'remember_token' => str_random(10),
    ];
});
