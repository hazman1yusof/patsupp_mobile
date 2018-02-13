<?php

use Faker\Generator as Faker;

$factory->define(App\customer_category::class, function (Faker $faker) {
    return [
        'description' => $faker->unique()->randomElement($array = array ('User Category 1','User Category 2','User Category 3','User Category 4','User Category 5')),
    ];
});
