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
        @vite('resources/js/chartReviews.js')
    </head>
    <body>
        <div class="bg-dashboard d-flex">
            <nav class="navbar bg-dark fixed-top justify-content-between">
                <div class="container-fluid">
                    <a class="navbar-brand text-center mx-0" href=""><img class="logo-mt" src="{{ Vite::asset('file-img-pdf/logo/logo.png') }}" alt=""></a>
                    <a class="navbar-brand text-success fw-bold fs-5" href="#"><img class="ms-img-dashboard mx-2" src="/storage/{{ auth()->user()->teacher->photo }}" alt="">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</a>
                    <button class="navbar-toggler bg-success bg-outline-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a class="navbar-brand text-center mx-0" href=""><img class="logo-mt" src="{{ Vite::asset('file-img-pdf/logo/logo.png') }}" alt=""></a>Musicisti In Rete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.teachers.show', ['teacher' => auth()->user()->teacher->id]) }}" class="nav-link active" aria-current="page">Modifica Profilo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.messages.index') }}">Messaggi</a>
                          </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.reviews.index') }}">Recensioni</a>
                          </li>
                        <li class="ms-button">
                            <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="btn button-logout">Disconnetti</button></form>
                        </li>
                    </div>
                </div>
              </nav>
            <main class="py-4 w-100 my-5">
                <div class="main-header text-light my-4">
                    @yield('main-content')
                </div>
            </main>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
