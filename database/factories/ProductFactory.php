<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(25),
        'price' => $faker->randomFloat(2,0,99999),
        'sales_price' => $faker->randomFloat(2,0,99999),
        'featured' => $faker->numberBetween(0,1),
        'active' => $faker->numberBetween(0,1),
    ];
});
