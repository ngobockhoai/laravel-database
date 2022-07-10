<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl(),
        'imageable_id' => $faker->numberBetween(1,3),
        'imageable_type' => $faker->randomElement(['App\User', 'App\City']),
    ];
});
