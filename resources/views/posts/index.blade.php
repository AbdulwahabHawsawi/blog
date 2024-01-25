@extends('layouts/main')

@section('title', '| All Posts')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h1>All Posts</h1>
    </div>

    <div class="col-md-2">
        <a class="btn btn-primary btn-block btn-large my-2" href="{{ route('posts.create') }}">Create New Post</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class='table'>
                <thead>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Body</td>
                    <td>Created At</td>
                    <td></td>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>
                            <strong>{{ $post->id }}</strong>
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body, 0, 50) }} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
                        <td>{{DateTime::CreateFromFormat('Y-m-d G:i:s', $post->created_at)->format('M j, Y') }}</td>
                        <td>
                            <a class="btn btn-light" href="{{ route('posts.show', ['post' => $post->id]) }}">View</a>
                            <a class="btn btn-light my-1"
                                href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <hr>
</div>

@endsection