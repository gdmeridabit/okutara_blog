<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $username = $faker->userName;
    static $password;
    return [
        'username' => $username,
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});
