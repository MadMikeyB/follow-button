<?php

use Faker\Generator as Faker;

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => str_slug($faker->sentence),
        'body' => $faker->paragraph,
        'user_id' => factory('App\User')->create()->id
    ];
});
