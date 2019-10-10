<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Post;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_text' => $faker->text,
        'user_id' => factory(User::class)->create()->id
    ];
});
