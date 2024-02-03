@extends('layouts/main')

@section('title', '| Archive')

@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <h1>Blog</h1>
            <hr>
            @foreach ($posts as $post)
                <div class="row">
                    <div class="col-md-8 offset-md-1">
                        <h2>{{ $post->title }}</h2>
                        <h5>Published: {{DateTime::CreateFromFormat('Y-m-d G:i:s', $post->created_at)->format('o M. j | G:i')}}</h5>
                        <p>{{ substr($post->body, 0, 75) }} {{ $post->body > 50 ? "..." : "" }}</p>
                        <a class='btn btn-primary' href="{{ route('blog.single', $post->slug) }}">Read More</a>
                    </div>
                    <hr class='my-4'>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

@endsection