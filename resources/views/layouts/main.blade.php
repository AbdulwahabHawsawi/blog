<!doctype html>
<html lang="en">

@include('partials/_head')

<body>
    @include('partials/_navbar')
    <div class="container">
        @include('partials/_message')
        @yield('content')
    </div>
    @include('partials/_footer')
</body>

</html>