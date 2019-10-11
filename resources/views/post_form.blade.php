@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Something</div>

                <div class="card-body">

                    <form method="post" action="/post">
                        @csrf
                        <input type="text" size="50" name="post_text">
                        <input type="submit" value="Send the post">
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
