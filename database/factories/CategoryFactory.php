<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cover' => str_replace('public/', '', $faker->image('public/storage/upload'))
    ];
});
