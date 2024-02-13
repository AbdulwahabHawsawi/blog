@extends('layouts/main')

@section('title', '| Edit Comment')

@section('content')

    <h2>Edit Comment</h2>

    <form action="{{ route('comments.update', $comment->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label name="name">Name: </label>
                    <input class="form-control" id="name" name="name" disabled value="{{ $comment->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label name="email">Email: </label>
                    <input class="form-control" id="email" name="email" disabled value="{{ $comment->email }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label name="comment">Comment: </label>
            <textarea class='form-control' name="comment" id="comment" cols="30" rows="10">{{ $comment->comment }}</textarea>
            <input class='btn btn-primary' type="submit" value="Edit Comment">
        </div>
    </form>

@endsection
