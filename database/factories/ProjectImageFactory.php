<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProjectImage::class, function (Faker $faker) {
    return [
        'file_name' => str_replace('public/', '', $faker->image('public/storage/posts'))
    ];
});
