@extends('layouts/main')

@section('title', '| Reset Password')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h1 class='card-title'>Reset Password</h1>
                <form class='form' action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->token }}">

                    <label class='form-label' for="email">Email:</label>
                    <input class='form-control' type="email" name="email" id="email" value="{{  $request->email }}">

                    <label class='form-label' for="password">New Password:</label>
                    <input class="form-control my" type="password" name="password" id="password">

                    <label class='form-label' for="password_confirmation">Confirm New Password:</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">

                    <input class='btn btn-primary btn-block btn-lg my-3' type="submit" value="Reset Password">
                </form>

            </div>
        </div>
    </div>
</div>

@endsection