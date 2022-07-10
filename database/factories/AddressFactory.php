<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'number' => $faker->numberBetween(1,10),
        'street' => $faker->streetName,
        'country' => $faker->country,
        'user_id' => $faker->unique()->numberBetween(1,3),
    ];
});
