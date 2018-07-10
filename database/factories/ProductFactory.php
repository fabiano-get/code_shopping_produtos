<?php

use Faker\Generator as Faker;

$factory->define(CodeShopping\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->colorName,
        'slug' => 'slug',
        'description' => $faker->text,
        'price' => $faker->randomFloat(6,0,null)
    ];
});