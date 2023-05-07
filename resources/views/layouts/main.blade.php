<!doctype html>
<html lang="en" @if(date('H:i') > config('app.dark_theme_on')) data-bs-theme="dark" @endif @if(date('H:i') < config('app.dark_theme_off')) data-bs-theme="dark" @else data-bs-theme="light" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        .main {
            min-height: calc(100vh - 210px);
        }
    </style>
    <title>@yield('title', config('app.name'))</title>
</head>
<body>
<div class="container">
    <div class="row sticky-top mt-4 mb-4">
        <div class="col">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('posts.index') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Bootstrap" width="30" height="24">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('posts.index') }}">{{ __('Index Page') }}</a>
                            </li>
                            @auth()
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('Action') }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('posts.create') }}">{{ __('Add Post') }}</a></li>
                                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                                        <li class="container">
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }} | {{ auth()->user()->name }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endauth
                        </ul>
                        <form action="{{ route('search') }}" class="d-flex" role="search">
                            <input name="s" required class="form-control me-2" type="search" placeholder="{{ __('Search') }}" aria-label="Search">
                            <button type="submit" class="btn btn-outline-primary">{{ __('Search') }}</button>
                        </form>
                        @guest()
                            <div class="text-end ms-5">
                                <a class="btn btn-outline-primary me-1" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
                                <a class="btn btn-outline-primary" href="{{ route('register') }}" role="button">{{ __('Sign-up') }}</a>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row main">
        <div class="col-3">
            @include('include.menu')
        </div>
        <div class="col-9">
            @if (session()->has('message'))
                <div class="alert alert-info text-center mb-4">{{ __(session()->get('message')) }}</div>
            @endif
            @if (session()->has('error_message'))
                <div class="alert alert-danger text-center mb-4">{{ __(session()->get('error_message')) }}</div>
            @endif
            @yield('content')
        </div>
    </div>
    <div class="row">
        <div class="col">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <span class="mb-3 mb-md-0 text-body-secondary">{{ date('Y') }} Розробник billetweb</span>
                </div>
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="me-3"><a class="text-body-secondary" href="#" title="Telegram">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="me-3"><a class="text-body-secondary" href="#" title="Facebook">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                    </li>
                    <li><a class="text-body-secondary" href="#" title="Twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </footer>
        </div>
    </div>
</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
