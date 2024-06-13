<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'password' => $faker->password,
        'name' => $faker->name,
        'surname' => $faker->name,
        'photo' => $faker->imageUrl('900', '300'),
        'patronymic' => $faker->sentence,
        'function' => $faker->sentence,
        'phone' => $faker->phoneNumber,
    ];
});
