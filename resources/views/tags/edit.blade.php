@extends('layouts/main')

@section('title', "| Edit $tag->name")

@section('content')

    <div class="row">
        <div class="col-md-4">
            <form class='form' action="{{ route('tags.update', $tag->id) }}" method="post">
                @csrf
                @method('PUT')
                <input class='form-control my-3' type="text" name="name" id="name" placeholder="Type tag name" value="{{ $tag->name }}">
                <input class='btn btn-primary btn-block' type="submit" value="Change Tag Name">
                <a class='btn btn-light btn-block' href="{{ route('tags.show', $tag->id) }}">Cancel</a>
            </form>
        </div>
    </div>

@endsection
