<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Okutara is a blog/vlog shring site for Okutama. It aims to promote the beauty of Okutama.">
    <meta name="keywords" content="Okutama, 奥多摩, Tokyo, 東京">
    <meta name="author" content="Okutama-plus Education">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('img/logo1_black.png') }}">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script src="https://cdn.tiny.cloud/1/qb9lqkpakab0bxj1707omfwo19xv2ei47t077uc54uk2g7nq/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tinymce',
            menubar: false,
            body_class: 'description_display'
        });
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar fixed-top navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li>
                        <a class="nav-link" href="/"><i class="fas fa-home pr-2"></i>@lang('nav.home')</a>
                    </li>
                    <!-- <li>
                      <a class="nav-link" href="/"><i class="fas fa-info-circle pr-2"></i> About</a>
                    </!-->
                    <li>
                        <a class="nav-link" href="{{ route('categories', ['locale' => App::getLocale()]) }}"><i class="fas fa-list-ul pr-2"></i>
                            @lang('nav.category')</a>
                    </li>
                </ul>
                <a class="navbar-brand" href="{{ url('/') }}" >
                    <img src="{{ asset('img/logo1_white.png') }}" style="height: 50px;"/>
                </a>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('nav.register')</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-user" href="{{ route('login') }}">@lang('auth.login')</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create', ['locale' => App::getLocale()]) }}"><i class="fas fa-pen-fancy pr-2"></i> Add New
                            Post</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="btn btn-user dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <strong>{{ Auth::user()->name }}</strong> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="fas fa-user-alt mr-2"></i> {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home', ['locale' => 'en']) }}">EN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ja') }}">日本語</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main style="min-height: 80vh">
        @yield('content')
    </main>
    <footer class="text-center footer-container">
        <span class="small">All rights reserved © 2019 Okutara</span>
    </footer>
</div>
</body>
</html>
