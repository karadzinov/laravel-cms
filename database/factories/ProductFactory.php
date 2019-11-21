<?php

use Faker\Generator as Faker;
use App\Models\{Category, Language, Product, User};

$category = Category::where('name', '=', 'Exemple Product Category that should be edited')->first()->id;
$user = User::first()->id;
$language = Language::where('active', '=', '1')->first()->code;

$factory->define(Product::class, function (Faker $faker) use ($category, $user, $language) {
    $words = $faker->sentence(3);


    return [
        "category_id"   => $category,
        "language"      => $language,
        "user_id"       => $user,
        "name"          => $words,
        "slug"          => str_slug($words, '-'),
        "short_description"=> $faker->sentence(),
        "description"   => $faker->paragraph(3),
        "price"         => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1500),
        "reduction"     => [10, 20, 30, 40, 50][rand(0, 4)],
        "quantity"      => rand(0, 100),
        "delivery"      => rand(0, 1),
        "main_image"    => $faker->word(),
        "video"         => "https://www.youtube.com/watch?v=Bey4XXJAqS8&t=4s"
    ];
});
