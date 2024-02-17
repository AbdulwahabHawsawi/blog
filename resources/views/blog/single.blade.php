@extends('layouts/main')

@section('title', "| $post->title ")

@section('content')

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <img src="{{ asset('images/' . $post->image) }}" alt="">
            <h1>{{ $post->title }}</h1>
            <div class="row">
                <div class="col-md-6">

                    <h5>Category: </h5>
                    <p>{{ $post->category->name }}</p>
                </div>
                <div class="col-md-6">
                    <p>Tags: </p>
                    <small>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}{{ $tag->name == $post->tags->last()->name ? '' : ', ' }}
                        @endforeach
                    </small>
                </div>
            </div>
            <hr>
            <p>{!! $post->body !!}</p>
            <hr>
            <h2>{{ $post->comments->count() }} Comments</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="POST" action="{{ route('comments.post', $post->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label name="name">Name: </label>
                                    <input class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label name="email">Email: </label>
                                    <input class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label name="comment">Comment: </label>
                            <textarea class="form-control" id="comment" name="comment" placeholder="Type Your Comment Here:" rows="4"></textarea>
                        </div>
                        <input class="btn btn-primary mt-2" type="submit" value="Submit Comment">
                    </form>
                </div>
            </div>

            <hr>
            @foreach ($post->comments as $comment)
                <div class="card card-body bg-light mt-1">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <div class="text-center">
                                <img class='author-image' src="https://www.gravatar.com/avatar/ {{ hash('sha256', strtolower(trim($comment->email))) }}?size=50&d=retro">
                            </div>
                            <br>
                            <div class='text-center'>{{ $comment->name }}</div>
                            {{ DateTime::CreateFromFormat('Y-m-d G:i:s', $comment->created_at)->format('y M. j | G:i') }}
                        </div>
                        <div class="col-md-10">
                            {{ $comment->comment }}
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

@endsection
