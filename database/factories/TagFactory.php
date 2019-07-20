<?php

use App\Entities\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {

	$movimentations = \App\Entities\Movimentation::pluck('id')->toArray();

    return [
        'name' => $faker->sentence,
        'movimentation_id' => $faker->randomElement($movimentations),
    ];
});