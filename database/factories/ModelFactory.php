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
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'role' => (rand(1, 3) == 1) ? 'administrator' : 'visitor', // new
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->paragraph(5),
        'status' => (rand(1, 10) == 1) ? 'opened' : 'closed',
        'published_at' => $faker->datetime('now'),
        'category_id' => rand(1, 2),
        'user_id' => rand(1, 3)
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'excerpt' => $faker->paragraph(2)
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});
