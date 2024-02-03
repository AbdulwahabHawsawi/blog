@extends('layouts/main')

@section('title', '| Register')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Register a New User</h1>

        <hr>

        <form class='form my-4' method="POST" action="{{ url('auth/register') }}">
            @csrf
            <label class='form-label' for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name">

            <label class='form-label' for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email">

            <label class='form-label' for="password">Password:</label>
            <input class="form-control my" type="password" name="password" id="password">

            <label class='form-label' for="password_confirmation">Confirm Password:</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">

            <br>
            <div class="row">
                <input class="btn btn-block btn-lg btn-success" type="submit" value="Register">
            </div>
        </form>


    </div>
</div>

@endsection