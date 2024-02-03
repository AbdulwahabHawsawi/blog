@extends('layouts/main')

@section('title', '| Forgot my Password')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h1 class='card-title'>Reset Password</h1>
                <form class='form' action="{{ route('forgot-password') }}" method="post">
                    @csrf
                    <label class='form-label' for="email">Email:</label>
                    <input class='form-control' type="email" name="email" id="email">
                    <input class='btn btn-primary btn-block btn-lg my-3' type="submit" value="Reset Password">
                </form>

            </div>
        </div>
    </div>
</div>

@endsection