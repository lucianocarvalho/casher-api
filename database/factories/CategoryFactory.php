<?php

use App\Entities\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
	$users = \App\Entities\User::pluck('id')->toArray();

    return [
        'name' => $faker->sentence,
        'user_id' => $faker->randomElement($users)
    ];
});