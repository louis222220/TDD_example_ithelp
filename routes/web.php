<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Post;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/', function () {
    $response = "All Posts: ";
    $posts = Post::all();
    foreach ($posts as $post) {
        $response .= $post;
    }
    return $response;
});

Route::get('/posts/insert', function(Request $request) {
    $post = new Post;
    $post->post_text = $request->input('post_text');
    $post->save();
});
