<!doctype html>
<html lang="en" @if(date('H:i') > config('app.dark_theme_on')) data-bs-theme="dark" @endif @if(date('H:i') < config('app.dark_theme_off')) data-bs-theme="dark" @else data-bs-theme="light" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        main {
            min-height: calc(100vh - 159px);
        }
    </style>
    <title>@yield('title', config('app.name'))</title>
</head>
<body>
<div class="container">

    <header class="py-3 mb-4 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="{{ route('posts.index') }}" class="d-flex align-items-center mb-2 me-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}" width="24" height="24">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('posts.index') }}" class="nav-link px-2 link-body-emphasis">{{ __('Index Page') }}</a></li>
                </ul>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-secondary text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" style="width: 28px; height: 28px; object-fit: cover;" class="rounded-circle">
                        @else
                            <svg class="bi" width="28" height="28" fill="currentColor">
                                <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                            </svg>
                        @endif
                    </a>
                    <ul class="dropdown-menu text-small">
                        @auth()
                            <li><a class="dropdown-item" href="{{ route('dashboard.profile.avatar') }}">{{ __('Avatar Upload') }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }} | {{ auth()->user()->name }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="row">
        <div class="col-3">
            @include('include.admin_sidebar')
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
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-body-secondary">{{ date('Y') }} {{ config('app.app_version') }}</span>
        </div>
        @include('include.social')
    </footer>

</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
