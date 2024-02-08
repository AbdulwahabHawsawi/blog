@extends('layouts/main')

@section('title', '| Edit Title')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Edit Post</h1>
                <hr>
                <form method='POST' action="{{ route('posts.update', ['post' => $post->id]) }}" id="submitForm" data-parsley-validate>
                    @csrf
                    @method('PUT')
                    <label for="title">Title: </label>
                    <input class="form-control" type="text" id="title" name="title" value='{{ $post->title }}'>
                    <select class="form-select" name="category_id">
                        <option selected value="{{ $post->category_id }}">{{$post->category->name}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </ul>
                    </select>
                    <label for="slug">Slug: </label>
                    <input class="form-control" type="text" id="slug" name="slug" value='{{ $post->slug }}'>
                    <label for="body">Post Body: </label>
                    <textarea class="form-control" rows=20 name="body" id="body" data-parsley-required="">{{ $post->body }}</textarea>
                    <div class="d-grid gap-2 my-3">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-body bg-light">
            <dl>
                <dt>Posted On:</dt>
                <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s',$post->created_at)->format('o M. j | G:i') }}</dd>
                <dt>Last Updated:</dt>
                <dd>{{ DateTime::CreateFromFormat('Y-m-d G:i:s',$post->updated_at)->format('o M. j | G:i') }}</dd>
            </dl>

            <a class="btn btn-danger btn-block"  href="{{ route('posts.index') }}">Cancel</a>
            <input class="btn btn-success btn-lg btn-block my-3" form="submitForm" type="submit" value="Save">
        </div>
    </div>
</div>
@endsection
