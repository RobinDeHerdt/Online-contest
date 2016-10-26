<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'email' => $faker->unique()->safeEmail,
        'ip_adress' => $faker->ipv4, 
        'isAdmin' => false,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Creation::class, function (Faker\Generator $faker) {
    return [
    	'image_url' => $faker->shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'),													
    	'description' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});

$factory->define(App\Vote::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'creation_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});