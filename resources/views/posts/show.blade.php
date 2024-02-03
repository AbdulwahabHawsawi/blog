@extends('layouts/main')

@section('title', '| View Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
    </div>

    <div class="col-md-4">
        <div class="card card-body bg-light">
            <dl>
                <dt>URL:</dt>
                <dd><a href="{{ url('blog/'.$post->slug)}}">{{ url('blog/'.$post->slug) }}</a></dd>
                <dt>Posted On:</dt>
                <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s',$post->created_at)->format('o M. j | G:i') }}</dd>
                <dt>Last Updated:</dt>
                <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s',$post->updated_at)->format('o M. j | G:i') }}</dd>
            </dl>
            <a class='btn btn-secondary btn-lg btn-block' href="{{ route('posts.index') }}">Go Back to All Posts</a>
            <a class="btn btn-primary btn-lg btn-block my-2"  href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
            
            <form id='deleteForm' method='POST' action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                @method("DELETE")
                @csrf
            </form>
            <input class="btn btn-danger btn-block btn-lg " type='submit' value='Delete' form='deletePost'>
        </div>
    </div>


</div>
@endsection