<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plan;
use Faker\Generator as Faker;

$factory->define(Plan::class, function (Faker $faker) {
    return [
        'date_written' => $faker->dateTime,
        'date_plan' => $faker->dateTime,
        'plan_discussion' => $faker->realText(),
    ];
});
