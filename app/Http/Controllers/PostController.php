<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    
    public function insertPost(Request $request)
    {
        $post = new Post;
        $post->post_text = $request->input('post_text');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/post');
    }

    public function allPost()
    {
        return view('post')
                ->with('posts', Post::all());
    }

    public function insertComment(Request $request)
    {
        $comment = new Comment;
        $comment->post_id = $request->input('post_id');
        $comment->user_id = Auth::id();
        $comment->comment_text = $request->input('comment_text');
        $comment->save();
        return redirect('/post');
    }
}
