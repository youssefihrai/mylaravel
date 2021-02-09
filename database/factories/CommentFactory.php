<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'updated_at' => $faker->dateTimeBetween('-1 years'),
        'content' => $faker->sentence(10)
    ];
});
