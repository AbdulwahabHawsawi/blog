@extends('layouts/main')

@section('title', '| Login')

@section('content')

<div class="row">

    <div class="col-md-6 offset-md-3">
        <h1 class='my-3'>Login</h1>
        <hr>

        <form class='form my-4' method="post" action="{{ url('auth/login') }}">
            @csrf
            <label class='form-label' for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email">

            <label class='form-label' for="password">Password:</label>
            <input class="form-control my" type="password" name="password" id="password">

            <input class='form-check-input my-3' type="checkbox" name="remember-me" id="remember-me" value='true'>
            <label class='form-check-label my-3' for="remember-me">Remember Me</label>

            <br>
            <div class="row">
                <input class="btn btn-block btn-lg btn-success" type="submit" value="Login">
            </div>
        </form>
        <div class="text-center">
        <a class='text-center' href="{{ route('forgot-password') }}">Forgot Password?</a>
    </div>

    </div>
</div>

@endsection
@auth
    
@endauth
@guest
    
@endguest