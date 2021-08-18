<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('cards.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                BuyME!
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories_list') }}">{{ __('Categories') }}</a>
                    </li>



                </ul>

                <span class="navbar-text">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-danger" tabindex="-1" role="button" aria-disabled="true">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-danger" tabindex="-1" role="button" aria-disabled="true">{{ __('Register') }}</a>

                    @else
                        <div class="btn-group">
                      <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                      </button>
                      <ul class="dropdown-menu bg-dark hover-dark">
                        <li><a class="dropdown-item" id="link" href="{{ route('new_auction') }}">{{ __('New auction') }}</a></li>
                        <li><a class="dropdown-item" id="link" href="{{ route('my_adverts') }}">{{ __('My auctions') }}</a></li>
                        <li><a class="dropdown-item" id="link" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider text-white"></li>
                        <li><a class="dropdown-item" id="link" href="{{ route('logout') }}">{{ __('Log out') }}</a></li>
                      </ul>
                    </div>
                </span>

                @endguest
            </div>
        </div>
    </nav>
    @yield('content')


    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            @yield('footer')
        </div>
        <!-- Copyright -->
    </footer>
</div>

<script>

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
