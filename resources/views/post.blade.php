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
                        </div>
                    </div>
                </p>
            @endforeach
            
        </div>
    </div>
</div>
@endsection
