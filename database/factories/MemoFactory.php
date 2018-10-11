<?php

use Faker\Generator as Faker;

$factory->define(App\Memo::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'contents' => $faker->realText(200),
        'user_id' => 1
    ];
});
