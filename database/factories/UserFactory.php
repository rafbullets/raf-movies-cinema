<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
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
$factory->define(\App\Movie::class, function (Faker $faker) {
    return [
        "name" => $faker->word,
        "description" => $faker->text,
        "genre" => "comedy",
        "length" => $faker->randomNumber(3),
    ];
});

$factory->define(\App\CinemaHall::class, function (Faker $faker) {
    return [
        "hall_name" => $faker->name,
        "number_of_rows" => $faker->randomNumber(2),
        "seats_in_row" => $faker->randomNumber(1)
    ];
});

$factory->define(\App\Projection::class, function (Faker $faker) {
    return [
//        'movie_id' => 1,
//        "cinema_hall_id" => 1,
        "start_at" => "2019-06-25 02:25:48",
        "ticket_price" => $faker->randomNumber(2)
    ];
});
