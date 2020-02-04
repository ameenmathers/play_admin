<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Referral;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(\App\Referral::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'referrer_id' => $faker->numberBetween(1,2),
        'email' => $faker->unique()->safeEmail,
    ];
});
