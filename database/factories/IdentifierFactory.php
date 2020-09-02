<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Identifier::class, function (Faker $faker) {
    return [
        'identifier' => $faker->unique()->randomNumber(5, true),
        'name' => $faker->name,
        'unit' => $faker->company,
    ];
});
