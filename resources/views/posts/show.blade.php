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
                <dt>Posted On:</dt>
                <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s',$post->created_at)->format('o M. j | G:i') }}</dd>
                <dt>Last Updated:</dt>
                <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s',$post->updated_at)->format('o M. j | G:i') }}</dd>
            </dl>

            <a class="btn btn-primary btn-lg btn-block"  href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
            <form method='POST' action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                @method("DELETE")
                @csrf
                <input class="btn btn-danger btn-lg btn-block my-3" type='submit' value='Delete'>
            </form>
        </div>
    </div>


</div>
@endsection