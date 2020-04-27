<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Translation;
use Faker\Generator as Faker;

$factory->define(Translation::class, function (Faker $faker) {
    return [
        'name' => $faker->word 
    ];
});
