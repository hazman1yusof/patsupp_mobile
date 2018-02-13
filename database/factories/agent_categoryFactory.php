<?php

use Faker\Generator as Faker;

$factory->define(App\agent_category::class, function (Faker $faker) {
    return [
        'description' => $faker->unique()->randomElement($array = array ('Agent Category 1','Agent Category 2','Agent Category 3','Agent Category 4','Agent Category 5'))
    ];
});
