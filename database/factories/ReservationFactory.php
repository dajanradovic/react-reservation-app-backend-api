<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'apartment'=>$faker->word,
        'startDate'=>$faker->dateTimeBetween('+0 days', '+2 years')->format('Y-m-d'),
        'endDate'=>$faker->dateTimeBetween('+0 days', '+2 years')->format('Y-m-d'),
        'reservationType'=>$faker->word,
        'price'=>$faker->numberBetween($min = 100, $max = 1000),
        'numberOfNights'=>$faker->numberBetween($min = 1, $max = 15)



    ];
});
