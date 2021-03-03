<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->company,
        'slug'=> Str::slug(name),
        'details'=>$faker->companyEmail,
        'price'=>$faker->randomDigit,
        'discription'=>$faker->paragraph,
    ];
});
