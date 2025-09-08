<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><span>Study</span>Lab</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{route('courses')}}" class="nav-link">Course</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Instructor</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                 <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                

                {{-- Giriş yapmamış kullanıcılar için linkler --}}
                @guest
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endguest

                {{-- Giriş yapmış kullanıcılar için logout --}}
                @auth
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="display:inline; padding:0; border:none;">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
