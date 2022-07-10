<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'room_number' => $faker->unique()->numberBetween(100, 300),
        'room_size' => $faker->numberBetween(1, 5),
        'price' => $faker->numberBetween(100, 600),
        'description' => $faker->text(1000),
    ];
});
