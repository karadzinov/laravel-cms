<?php

use Faker\Generator as Faker;
use App\Models\{Category, Product, User};

$category = Category::first()->id;
$user = User::first()->id;

$factory->define(Product::class, function (Faker $faker) use ($category, $user) {
    return [
        "category_id"   => $category,
        "user_id"       => $user,
        "name"          => $faker->name(),
        "description"   => $faker->paragraph(3),
        "price"         => rand(100, 1000),
        "reduction"     => [10, 20, 30, 40, 50][rand(0, 4)],
        "quantity"      => rand(0, 100),
        "delivery"      => rand(0, 1),
        "main_image"    => $faker->word(),
        "video"         => "https://www.youtube.com/watch?v=Bey4XXJAqS8&t=4s"
    ];
});
