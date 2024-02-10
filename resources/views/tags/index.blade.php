@extends('layouts/main')

@section('title', '| All Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <hr>
            <table class='table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th># posts</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        @php
                            $post_count = $tag->posts->count();
                        @endphp
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td> <a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                            <td>{{ $post_count == 1 ? "$post_count post" : "$post_count posts" }}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class='card-title'> Add Tag</h4>
                    <form class='form' action="{{ route('tags.store') }}" method="post">
                        @csrf
                        <input class='form-control my-3' type="text" name="name" id="name"
                            placeholder="Type Tag Name">
                        <input class='btn btn-primary btn-block ' type="submit" value="Add New Tag">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
