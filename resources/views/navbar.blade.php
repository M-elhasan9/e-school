<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><span>Study</span>Lab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

       <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto d-flex align-items-center">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{ route('home') }}#about" class="nav-link">About</a></li>
        <li class="nav-item"><a href="{{ route('courses') }}" class="nav-link">Course</a></li>
        <li class="nav-item"><a href="{{ route('instructors') }}" class="nav-link">Instructor</a></li>
        <li class="nav-item"><a href="{{ route('blog.index') }}" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="{{ route('home') }}#contact" class="nav-link">Contact</a></li>

        @guest
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
        @endguest

        @auth
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="d-inline m-0 p-0">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link m-0 p-0"
                        style="color: white; text-decoration:none; border:none; background:none; outline:none; box-shadow:none;">
                        Logout
                    </button>
                </form>
            </li>
        @endauth
    </ul>
</div>

    </div>
</nav>
