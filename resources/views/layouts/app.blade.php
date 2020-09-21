<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/custom-style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-custom-border shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/svg/e-commerce-50.png" class="pr-2 pb-4 mt-2">
                    <span class="site-name">{{ config('app.name') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(Request::url() === route('index') || Request::url() === route('index.search'))
                    <form class="custom-search-form" action="{{ route('index.search') }}" method="get">
                        @csrf
                        <div class="input-group mb-3 search-bar">
                            <input name="query" value="{{ $query ?? '' }}" type="text" class="form-control" placeholder="Product name">
                            <div class="input-group-append-custom">
                              <button class="btn btn-outline-secondary search-button" type="submit">Search</button>
                            </div>
                          </div>
                    </form>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link nav-link-custom" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link nav-link-custom"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="custom-link" href="{{ route('cart.index') }}">
                                    @if (\Cart::session(auth()->id())->getContent()->count())
                                        <img src="/svg/shopping-cart.svg" class="cart-icon" /><span
                                            class="badge badge-danger-custom">{{ \Cart::session(auth()->id())->getContent()->count() }}</span>
                                    @else
                                        <img src="/svg/shopping-cart.svg" class="cart-icon" />
                                    @endif
                                </a>

                            </li>

                            <li class="nav-item dropdown nav-link-custom">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        @if (session()->has('message'))
            <div class="alert alert-success alert-custom text-center" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger alert-custom text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
