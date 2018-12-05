<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
    return [
        'title' => $title,
        'slide' => str_replace('public/','',$faker->image('public/storage/slide')),
        'slug' => str_slug($title,'-'),
        'id_category' => '2',
        'status' => '1',
        'tahun_perancangan' => $faker->year(),
        'tahun_pembangunan' => $faker->year(),
        'luas_tanah' => $faker->randomDigitNotNull,
        'luas_bangunan' => $faker->randomDigitNotNull,
        'description' => $faker->paragraphs($nb = 3, $asText = true) 
    ];
});
