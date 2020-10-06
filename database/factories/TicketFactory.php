<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'category_id'   => function () {
            return Category::all()->random();
        },
        'name'          => $faker->word(10),
        'price'        => rand(1, 1000),
        'type'         => $faker->word(5),
        'stock'         => rand(1, 30),
    ];
});
