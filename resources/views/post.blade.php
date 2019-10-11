@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4">Post:</h1>

            @foreach ($posts as $post)
                <p>
                    <div class="card">
                        <div class="card-header">{{ $post->user->name }}</div>

                        <div class="card-body">
                            {{ $post->post_text }}
                            
                            <p></p>
                            <div class="card">
                                <div class="card-header">Comments:</div>
                                
                                @foreach($post->comments as $comment)
                                    <div class="card-body">
                                        {{ $comment->comment_text }}    
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <form method="post" action="/post/comment">
                            @csrf
                            &nbsp;Leave a Comment:
                            <input type="text" size="30" name="comment_text">
                            <input type="hidden" name="post_id" value={{ $post->user->id }}>
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </p>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
