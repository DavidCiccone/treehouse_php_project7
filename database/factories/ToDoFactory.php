<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ToDo;
use Faker\Generator as Faker;

$factory->define(ToDo::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name,
        'status' => $faker->sentence(3)
    ];
});
