<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Visitor::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'location' => $faker->company,
        'phone' => $faker->randomNumber(9, true),
        'address' => $faker->address,
        'keperluan' => $faker->text,
    ];
});
