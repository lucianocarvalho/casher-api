<?php

use App\Entities\Movimentation;
use Faker\Generator as Faker;

$factory->define(Movimentation::class, function (Faker $faker) {

	$categories = \App\Entities\Category::pluck('id')->toArray();

    return [
        'type' => $faker->randomElement(array('C', 'D')),
        'name' => $faker->sentence,
        'value' => $faker->randomNumber(2),
        'date' => $faker->date(),
        'category_id' => $faker->randomElement($categories),
    ];
});