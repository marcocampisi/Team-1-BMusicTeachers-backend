<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="bg-guest">
            <header>
                <div class="container">
                    <nav class="navbar navbar-dark navbar-expand-md">
                        <a class="navbar-brand" href="">
                            <img class="logo-mt" src="{{ Vite::asset('file-img-pdf/logo/logo.png') }}" alt="">
                        </a>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="button-wrapper">
                                <button class="navbar-toggler btn-wight" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-column w-100">
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    @if(!Route::is('user.checkout'))
                                        <button type="submit" class="btn btn-outline-danger">
                                            Disconnettiti
                                        </button>
                                    @endif
                                </form>
                            @endauth
                        </div>
                    </nav>
                </div>
            </header>
            <main class="py-4">
                <div class="container">
                    @yield('main-content')
                </div>
            </main>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
