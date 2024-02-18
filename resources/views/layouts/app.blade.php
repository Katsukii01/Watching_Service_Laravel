<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MyJujutsuKaisenPage</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <script>
    function confirmDelete() {
        return confirm("Czy na pewno chcesz usunąć?");
    }
    </script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-attachment: fixed;
                   background-image: url('https://images.alphacoders.com/133/1334857.png'); background-size: cover; background-position: center; height: 100vh;" class="bg-dark text-light">
<nav class="navbar navbar-expand navbar-dark bg-primary shadow-sm px-3">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav col-2 ps-2" >
                        <h1><a class="navbar-brand" href="/"> Main page</a></h1>
                    </div>

                    <!-- Right Side Of Navbar -->
                    @guest
                        <!-- Tu możesz umieścić treść, która będzie widoczna dla niezalogowanych użytkowników -->
                        <div class="navbar-nav col-4 ps-2"> 
                        </div>
                    @else
                        @if(auth()->check() && auth()->user()->id == 2)
                        <div class="navbar-nav col-1 ps-2"> 
                        </div>
                        <div  class="navbar-nav col-3 ps-2">
                        <li  class="nav-item dropdown"> 
                                    <a style="color:red" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                       Admin panel
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <div class="mb-3 d-flex flex-column align-items-center">                  
                                        <a style="color:red" class="nav-link" href="/anime/create">Manage episodes</a>
                                        <a style="color:red" class="nav-link" href="/comments">Manage comments</a>
                                        <a style="color:red" class="nav-link" href="/users">Manage users</a>
                                        </div>
                                    </div>
                             </li>
                            </div>
                        @else
                        <div class="navbar-nav col-4 ps-2"> 
                        </div>
                        @endif
                    @endguest
                    <div class="navbar-nav col-2 ps-2" >
                        <a class="nav-link" href="/anime">Episodes</a>
                    </div>
                    <div class="navbar-nav col-2 ps-2" >
                         <a class="nav-link" href="/about">About JJK</a>
                    </div>
                    <div class="col-1 ps-2" >
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown"> 
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <div class="mb-3 d-flex flex-column align-items-center">
                                        <img class="img-fluid rounded-circle mb-2" src="{{ url(Auth::user()->img) }}" style="width: 40px; height: 40px">
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                           Profile
                                        </a>
                                        <a class="dropdown-item" href="/watched">
                                           Watched list
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        </div>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
        </nav>

        <main  class=" container-fluid py-4">
            @yield('content')
        </main>
</body>
</html>
