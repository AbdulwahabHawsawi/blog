@extends('layouts/main')

@section('title', "| $tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>{{ $tag->name }}</h1>
        </div>

        <div class="col-md-2">
            <div class="d-grid">
                <form id='deleteTag' method='POST' action="{{ route('tags.destroy', ['tag' => $tag->id]) }}">
                    @method('DELETE')
                    @csrf
                </form>
                <a class="btn btn-primary btn-block" href="{{ route('tags.edit', $tag->id) }}">Edit</a>
                <a class='btn btn-light btn-block mt-2' href="{{ route('tags.index') }}">Go Back to All Tags</a>
                <input class="btn btn-danger btn-block mt-2" type='submit' value='Delete Tag' form='deleteTag'>
            </div>
        </div>
    </div>
    <br>
    <table class='table'>
        <thead>
            <td>ID</td>
            <td>Title</td>
            <td>Body</td>
            <td>Category</td>
            <td>Tags</td>
            <td>Created At</td>
            <td></td>
        </thead>

        <tbody>
            @foreach ($tag->posts as $post)
                <tr>
                    <td>
                        <strong>{{ $post->id }}</strong>
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr($post->body, 0, 50) }} {{ strlen($post->body) > 50 ? '...' : '' }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}{{ $tag->name == $post->tags->last()->name ? '' : ', ' }}
                        @endforeach
                    </td>
                    <td>{{ DateTime::CreateFromFormat('Y-m-d G:i:s', $post->created_at)->format('M j, Y') }}</td>
                    <td>
                        <a class="btn btn-light" href="{{ route('posts.show', ['post' => $post->id]) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
