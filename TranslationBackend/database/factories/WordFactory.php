<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'language_id' => factory(App\Language::class),
        'translation_id' => factory(App\Translation::class)
    ];
});
