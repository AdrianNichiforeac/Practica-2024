<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'contact_person' => $faker->name,
        'phone' => $faker->phoneNumber,
        'total_surface' => $faker->numberBetween(),
        'managed_surface' => $faker->numberBetween(),
        'description' => $faker->realText(),
        'region' => 1,

    ];
});
