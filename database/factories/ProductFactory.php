<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {

    $categoryIds = \App\Category::pluck('id')->all();

    return [
        'title' => $faker->word,
        'description' => $faker->words(50, true),
        'image' => $faker->imageUrl(),
        'category_id' => array_rand($categoryIds)
    ];
});
