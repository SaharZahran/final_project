<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('user_folders/images/logo.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('user_folders/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('user_folders/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('user_folders/css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/auth.css') }}>
    <link rel="stylesheet" href={{ asset('css/seller.css') }}>
    <link rel="stylesheet" href={{ asset('css/user.css') }}>
    <link rel="stylesheet" href={{ asset('css/sellerStore.css') }}>
    <title>@yield('title')</title>
</head>
<body>
    <div id="app">
        <nav class="first-navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="header-class">
                <!-- Left Side Of Navbar -->
                <a href="{{route('user.home')}}">
                <img src="{{asset('user_folders/images/logo.png')}}" alt="logo image" class="logo"></a>
                <!-- Right Side Of Navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                         @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{Auth::guard('seller')->user()->name}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('seller.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('seller.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li class="nav-item no-border">
                            <form action="#" method="post">
                                <div>
                                    <input type="text" class="search-bar" name="search" placeholder="Search for" style="border: 1px solid black">
                                     <i class="fas fa-search"></i>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <i class="fa fa-bars"></i>
            </div>
        </nav>
        <nav class="second-navbar">
            <ul>
                <li class="link"><a href={{ route('categoryFilter', ['id' => 1]) }}>Organic</a></li>
                <li class="link"><a href={{ route('categoryFilter', ['id' => 3]) }}>Plants</a></li>
                <li class="link"><a href={{ route('categoryFilter', ['id' => 2]) }}>Seeds</a></li>
                <li class="link"><a href={{ route('categoryFilter', ['id' => 5]) }}>Garden Supplies</a></li>
                <li class="link"><a href={{ route('categoryFilter', ['id' => 4]) }}>Indoor Plants</a></li>
                <li class="link"><a href="{{ route('blog.index') }}">Blog</a></li>
                <li class="link"><a href="{{ route('seller.shop.index') }}">Store</a></li>
                {{-- <li class="link"><a href={{ route('user.checkout.index') }} class="cart"><i class="fa fa-shopping-cart"></i>
                    @if (Session::has('cart_items'))<span class="cart_items">{{ Session::get('cart_items') }}</span>
                    @endif
                    </a>
                </li> --}}
            </ul>
        </nav>