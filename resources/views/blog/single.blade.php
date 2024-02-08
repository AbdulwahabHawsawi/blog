@extends('layouts/main')

@section('title', "|  $post->title ")

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <h3>Category: </h3> <p>{{ $post->category->name }}</p>
        </div>
    </div>

@endsection
