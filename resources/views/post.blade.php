@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4">Post:</h1>

            @foreach ($posts as $post)
                <div class="card">
                    <div class="card-header">User: {{ $post->user_id }}</div>

                    <div class="card-body">
                        {{ $post->post_text }}
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
