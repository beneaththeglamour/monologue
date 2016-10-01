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
        'name' => $faker->userName,
        'display_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    $tag = $faker->unique()->jobTitle;

    return [
        'name' => $tag,
        'slug' => strtolower(str_slug($tag))
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
	$title = $faker->sentence(7);
	$content = $faker->paragraphs(10);
	$created_at = $faker->dateTimeThisDecade();

    return [
        'title' => $title,
        'subtitle' => $faker->sentence(5),
        'slug' => strtolower(str_slug($title)),
        'summary' => $content[0],
        'content' => "<p>".implode("</p>\n\n<p>", $content)."</p>",
        'created_at' => $created_at,
        'updated_at' => $created_at,
        'published_at' => $created_at
    ];
});
