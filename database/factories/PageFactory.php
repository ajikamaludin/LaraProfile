<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Page::class, function (Faker $faker) {
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
    return [
        'title' => $title,
        'body' => json_encode([
            'body' => [ $faker->randomHtml(2,3) ],
            'column' => 1
            ]),
        'slug' => str_slug($title, '-')
    ];
});
