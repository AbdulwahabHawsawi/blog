@extends('layouts/main')

@section('title', '| Create New Post')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/parsley.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <form method='POST' action="{{ route('posts.store') }}" data-parsley-validate>
                @csrf
                <label for="title">Title: </label>
                <input class="form-control" type="text" id="title" name="title" data-parsley-required="">
                <label for="category">Category: </label>
                <select class="form-select" name="category_id">
                    <option>Select a Category:</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </ul>
                </select>
                <label for="slug">Slug: </label>
                <input class="form-control" type="text" id="title" name="slug" data-parsley-required="">
                <label for="body">Post Body: </label>
                <textarea class="form-control" rows=20 name="body" id="body" data-parsley-required=""></textarea>
                <div class="d-grid gap-2 my-3">
                    <input class="btn btn-success btn-lg btn-block" type="submit" value="Create New Post">
                </div>

            </form>
        </div>
    </div>
@endsection
