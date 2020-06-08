<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductGallery;
use Faker\Generator as Faker;

$factory->define(ProductGallery::class, function (Faker $faker) {
    return [
        "image" => $faker->imageUrl(),
        "image_path" => "",
        "product_id" => $faker->numberBetween(1,10)
    ];
});
