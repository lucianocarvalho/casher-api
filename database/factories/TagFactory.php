<?php

use App\Entities\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    $transactions = \App\Entities\Transaction::pluck('id')->toArray();

    return [
        'name' => $faker->sentence,
        'transaction_id' => $faker->randomElement($transactions),
    ];
});