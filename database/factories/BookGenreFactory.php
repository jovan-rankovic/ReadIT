<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookGenre;
use Faker\Generator as Faker;

$factory->define(BookGenre::class, function (Faker $faker) {
    return [
        'book_id' => $faker->numberBetween($min = 1, $max = 8),
        'genre_id' => $faker->numberBetween($min = 1, $max = 3)
    ];
});
