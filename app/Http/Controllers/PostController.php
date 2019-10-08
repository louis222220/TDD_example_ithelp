<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function insertPost(Request $request)
    {
        $post = new Post;
        $post->post_text = $request->input('post_text');
        $post->user_id = Auth::id();
        $post->save();
    }

    public function allPost()
    {
        $response = "All Posts: ";
        $posts = Post::all();
        foreach ($posts as $post) {
            $response .= $post;
        }
        return $response;
    }
}
