@extends('layouts/main')

@section('content')
<div class="row">
    <div class="h100 p-5 text-white bg-dark rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to my Blog!</h1>
            <p class="col-md-8 fs-4">Thank you for visiting my test blog. Built by Laravel</p>
            <button class="btn btn-outline-light" type="button">Click to read popular posts</button>
        </div> <!-- end of fluid container-->
    </div> <!-- end of rounded box-->
</div> <!-- end of row-->
</div> <!-- end of container-->

<div class="row">
    <div class="col-md-8">
        <div class="post">
            <h2>post title</h2>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem maiores voluptas molestiae non
                commodi mollitia repellat eveniet explicabo, fuga alias quisquam vitae neque voluptatum quaerat
                natus. Asperiores harum non nulla.
            </p>
            <div class="btn btn-primary"> Read more</div>
        </div>
        <hr>
        <div class="post">
            <h2>post title</h2>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem maiores voluptas molestiae non
                commodi mollitia repellat eveniet explicabo, fuga alias quisquam vitae neque voluptatum quaerat
                natus. Asperiores harum non nulla.
            </p>
            <div class="btn btn-primary"> Read more</div>
        </div>
        <hr>
        <div class="post">
            <h2>post title</h2>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem maiores voluptas molestiae non
                commodi mollitia repellat eveniet explicabo, fuga alias quisquam vitae neque voluptatum quaerat
                natus. Asperiores harum non nulla.
            </p>
            <div class="btn btn-primary"> Read more</div>
        </div>
        <hr>
        <div class="post">
            <h2>post title</h2>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem maiores voluptas molestiae non
                commodi mollitia repellat eveniet explicabo, fuga alias quisquam vitae neque voluptatum quaerat
                natus. Asperiores harum non nulla.
            </p>
            <div class="btn btn-primary"> Read more</div>
        </div>
    </div>

    <div class="col-md-3 offset-md-1">
        <h1>Sidebar</h1>
    </div>
@endsection