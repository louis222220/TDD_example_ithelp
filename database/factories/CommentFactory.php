<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use App\User;
use App\Post;

$factory->define(Comment::class, function (Faker $faker) {
    $post = factory(Post::class)->create();
    
    return [
        'post_id' => $post->id,
        'user_id' => $post->user->id,
        'comment_text' => $faker->text
    ];
});
