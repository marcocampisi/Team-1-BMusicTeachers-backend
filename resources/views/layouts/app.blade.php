<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
        <!-- google font link -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>


        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="bg-mt">
            <header>
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand" href="/">
                            <img class="logo-mt" src="{{ Vite::asset('file-img-pdf/logo/logo.png') }}" alt="">
                        </a>
                        <button class="navbar-toggler btn-wight" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item ">
                                    <a class="nav-link fs-5 text-light" href="{{ route('admin.dashboard') }}">Home</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link fs-5 text-light" href="{{ route('admin.teachers.index') }}">I nostri teacher</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link fs-5 text-light" href="">Messaggi</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link fs-5 text-light" href="">Assistenza</a>
                                </li>
                            </ul>
                            
    
                                <a href="{{ route('admin.teachers.create') }}">Sei un Insegnante?</a>
                                <!-- Alessio, ci manchi un sacco un sacco uno slug-->
                            
                        </div>
                    </div>
                </nav>
            </header>
    
            <main class="py-4">
                <div>
                    @yield('main-content')
                </div>
            </main>
        </div>
    </body>
</html>
