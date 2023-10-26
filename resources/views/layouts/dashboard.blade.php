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
        @vite('resources/js/chartRatings.js')
        @vite('resources/js/chartMessages.js')
    </head>
    <body>
        <div class="bg-dashboard  d-flex">
            <aside class="ms-header">
                <div class="container h-100">
                    <nav class="navbar navbar-dark navbar-expand-md d-flex flex-column align-items-center justify-content-between h-100">
                        <div class="w-100">
                            <a class="navbar-brand text-center mx-0" href="">
                                <img class="logo-mt" src="{{ Vite::asset('file-img-pdf/logo/logo.png') }}" alt="">
                            </a>
                            
                        
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-column w-100">
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('user.teachers.index') }}">I nostri teacher</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('user.messages.index') }}">Messaggi</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="{{ route('user.reviews.index') }}">Reviews</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link text-light" href="">Assistenza</a>
                                </li>
        
                            </ul>
                        </div>    
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn button-logout">
                                Log Out
                            </button>
                        </form>               
                    </nav>
                </div>
            </aside>


    
            <main class="py-4 ms-dashboard-main">
                <div class="main-header text-light d-flex justify-content-between align-items-center">
                    <h2>Welcome, {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }} </h2>
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <a href="{{ route('user.teachers.show', ['teacher' => auth()->user()->teacher->id]) }}">Visualizza Profilo</a>
                        <img class="ms-img-dashboard" src="/storage/{{ auth()->user()->teacher->photo }}" alt="">
                    </div>
                </div>
                <div>
                    @yield('main-content')
                </div>
            </main>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        
    </body>
</html>
