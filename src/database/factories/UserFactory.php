<?php

use App\Entities\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
    	'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => md5('password')
    ];
});