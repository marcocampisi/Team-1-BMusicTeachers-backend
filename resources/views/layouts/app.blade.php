<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img class="logo-bellissimo" src="{{ Vite::asset('file-img-pdf/logo/logo.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">I nostri teacher</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Chi siamo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Assistenza</a>
                            </li>
                        </ul>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-outline-success">
                                Sei un Insegnante?
                            </button>
                            <!-- Alessio, ci manchi un sacco un sacco uno slug-->
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container py-4">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
