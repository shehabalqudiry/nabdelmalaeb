<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'excerpt'   => $faker->realText($maxNbChars = 50, $indexSize = 2),
        'body'      => $faker->realText($maxNbChars = 400, $indexSize = 2),
        'slug'      => $faker->slug(),
        'league_id' => 1,
        'user_id'   => 1,
    ];
});
