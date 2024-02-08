@extends('layouts/main')

@section('title', '| All Categories')

@section('content')

<div class="row">
    <div class="col-md-8">
        <h1>Categories</h1>
        <hr>
        <table class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class='card-title'> Add Category</h4>
                <form class='form' action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <input class='form-control my-3' type="text" name="name" id="name" placeholder="Type category name">
                    <input class='btn btn-primary btn-block ' type="submit" value="Add New Category">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
