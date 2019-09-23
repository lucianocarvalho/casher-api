<?php

use App\Entities\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

    $categories = \App\Entities\Category::pluck('id')->toArray();
    $users = \App\Entities\User::pluck('id')->toArray();

    return [
        'type' => $faker->randomElement(array('C', 'D')),
        'name' => $faker->sentence,
        'value' => $faker->randomNumber(2),
        'date' => $faker->date(),
        'category_id' => $faker->randomElement($categories),
        'user_id' => $faker->randomElement($users)
    ];
});