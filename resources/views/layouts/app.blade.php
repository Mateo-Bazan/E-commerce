<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('DrugStore') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ __('DrugStore') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
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
                        
                        <!--LINKS AGREGADOS-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}"> Productos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.index') }}"> Categorías </a>
                        </li>
                        <!--LINKS AGREGADOS-->
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="mt-5 p-4 bg-secondary">
            <div class="container">
                <div class="row aling-items-start">
                    <div class="col-3">
                        <div class=" d-flex">
                            <h2 class="text-dark align-middle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bong" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M13 3v8.416c.134 .059 .265 .123 .393 .193l3.607 -3.609l2 2l-3.608 3.608a5 5 0 1 1 -6.392 -2.192v-8.416h4z" />
                                <path d="M8 3h6" />
                                <path d="M6.1 17h9.8" />
                            </svg>
                                DrugStore
                            </h2>
                        </div>
                        <p class="card-text">Drugstore, tu lugar de confianza para la compra de estupefacientes y otras cositas. 🥴</p>
                        <p class="card-text">Code licensed 7 II</p>
                        <p class="card-text">Currently vBeta</p>
                        <p class="card-text">Analytics by Spooky.</p>
                    </div>

                    <div class="col-3" style="">
                        <h3>Links</h3>
                        <div class="card-body list-unstyled">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}"> Productos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.index') }}"> Categorías </a>
                        </li>
                        </div>
                    </div>

                    <div class="col-3" style="">
                        <h3>Redes Sociales</h3>
                        <div class="card-body list-unstyled">
                            <li class="nav-item"><a href="#" class="nav-link">Instagram</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Twitter</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">E-mail</a></li>
                        </div>
                    </div>

                    <div class="col-3" style="">
                        <h3>Otros Proyectos</h3>
                        <div class="card-body list-unstyled">
                            <li class="nav-item"><a href="#" class="nav-link">Sistema de Gestión</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Geolocalización</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
