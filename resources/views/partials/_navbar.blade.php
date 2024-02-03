<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Laravel Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? "active" : "" }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog') ? "active" : "" }}" aria-current="page" href="/blog">All Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about') ? "active" : "" }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact') ? "active" : "" }}" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
        @guest
            <a class='btn btn-light btn-lg mx-2' href="{{ route('login') }}">Login</a>
            <a class='btn btn-light btn-lg mx-2' href="{{ route('register') }}">Register</a>
        @endguest
        @auth
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"> Hello, {{ auth()->user()->name }} </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <hr>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <li><input type='submit' class='dropdown-item' value="Logout"></li>
                </form>
                
            </ul>
        </li>
    </ul>
        @endauth
    </div>
</nav>