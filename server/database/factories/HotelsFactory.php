<?php

use Faker\Generator as Faker;
use App\Hotel;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName,
        'slug' => $faker -> slug(),
        'stars' => $faker->numberBetween($min = 1, $max = 5),
        'country' => $faker->countryCode,
        'company' => $faker->company
    ];
});
