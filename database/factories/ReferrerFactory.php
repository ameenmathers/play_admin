<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Referrer;
use Faker\Generator as Faker;

$factory->define(Referrer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
