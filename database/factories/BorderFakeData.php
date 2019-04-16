<?php

use Faker\Generator as Faker;

$factory->define(App\Deposit::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "balance" => $faker->postcode,
        "date" => $faker->date,
    ];
});
