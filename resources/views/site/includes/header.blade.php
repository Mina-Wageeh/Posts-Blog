<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <a class="logo-container text-decoration-none" href="{{route('home.page')}}">
                <h1 class="M-logo">RTX</h1>
            </a>
            <ul class="navbar-nav">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="all-posts-btn nav-link text-white" aria-current="page" href="{{route('home.page')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="all-posts-btn nav-link" href="{{route('posts.index')}}">Posts</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white login-text" aria-current="page" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-white register-text" aria-current="page" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
            @auth
                <div class="auth-user">
                    <div class="dropdown col-12 d-flex flex-column justify-content-center">
                        <a class="text-decoration-none text-white col-12" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu p-0 text-center logout-drop col-12" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
