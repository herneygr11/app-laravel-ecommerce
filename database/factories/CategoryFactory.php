<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {

    $name = $faker->name;

    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'icon' => $faker->randomElement([
            '<i class="fab fa-android"></i>',
            '<i class="fab fa-avianex"></i>'
        ])
    ];
});
