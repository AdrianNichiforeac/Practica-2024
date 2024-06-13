<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'about' => $faker->realText(9999),
        'requisites' => $faker->sentence,
        'organization_chart' => $faker->imageUrl('900', '300'),
    ];
});
