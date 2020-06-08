<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {

    $name = $faker->streetName;

    return [
        "name"          => $name,
        "slug"          => Str::slug($name),
        "image"         => $faker->imageUrl(),
        "image_path"    => "",
        "price"         => $faker->randomFloat(),
        "in_discount"   => $faker->boolean(),
        "discount"      => $faker->randomFloat(),
        "description"   => $faker->sentence(),
        "status"        => $faker->boolean(),
        "category_id"   => $faker->numberBetween(1,5),
    ];
});
