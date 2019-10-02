<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;

$factory->define(Post::class, function () {
    return [
        'post_text' => "Hello, I'm Louis."
    ];
});
