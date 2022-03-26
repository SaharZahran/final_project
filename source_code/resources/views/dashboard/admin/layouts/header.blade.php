<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('pageTitle') | Dashboard</title>


    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_folders/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_folders/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('admin_folders/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_folders/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <script src={{ 'https://kit.fontawesome.com/0a8a24fb35.js' }} crossorigin="anonymous"></script>
    <!-- Main CSS-->
    <link href="{{asset('admin_folders/css/theme.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href={{ asset("css/adminDashboard.css") }}>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_images/logo.png')}}" alt="green market logo" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>admins
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo header__logo" >
                <a href={{ route('admin.home') }}>
                    <img src="{{asset('admin_images/logo.png')}}" alt="Green Market logo" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href={{ route('admin.users') }}>
                                <i class="fas fa-tachometer-alt"></i>users
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href={{ route('admin.orders.index') }}>
                                <i class="fas fa-tachometer-alt"></i>Orders
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href={{ route('admin.categories.index') }}>
                                <i class="fas fa-tachometer-alt"></i>Categories
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{ route('admin.subcategories.index') }}">
                                <i class="fas fa-tachometer-alt"></i>Sub-Categories
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href={{ route('admin.stores.index') }}>
                                <i class="fas fa-tachometer-alt"></i>Stores
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href={{ route('admin.products.index') }}>
                                <i class="fas fa-tachometer-alt"></i>Products
                            </a>
                        </li>
                        <li class="active has-sub">
                            <a class="js-arrow" href={{ route('admin.posts.index') }}>
                                <i class="fas fa-tachometer-alt"></i>Posts
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::guard('admin')->user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{Auth::guard('admin')->user()->name}}</a>
                                                    </h5>
                                                    <span class="email">{{Auth::guard('admin')->user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    @guest
                                                    @else
                                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                                    onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->