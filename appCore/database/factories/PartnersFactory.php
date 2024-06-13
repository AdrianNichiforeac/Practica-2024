<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'requisites' => $faker->bankAccountNumber,
        'contact' => $faker->phoneNumber,
        'logo' => $faker->imageUrl('900', '300'),
        'link' =>$faker->url,
        'about' => $faker->realText(),
    ];
});
