@extends('layouts/main')

@section('title', '| View Post')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p class='lead'>This is the blog post</p>
@endsection