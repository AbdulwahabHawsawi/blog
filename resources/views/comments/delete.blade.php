@extends('layouts/main')

@section('title', '| Confirm Comment Deletion')

@section('content')

    <h3>Are you sure about the deletion of the following comment: </h3>

    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
        @csrf
        @method('Delete')
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
            <textarea class='form-control' name="comment" id="comment" cols="30" rows="10" disabled>{{ $comment->comment }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-12 offset-md-5">
                <input class='btn btn-danger mt-3' type="submit" value="Delete Comment">
            </div>
        </div>
        
    </form>

@endsection
