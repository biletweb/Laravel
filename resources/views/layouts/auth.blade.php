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
                        <svg class="bi" width="28" height="28" fill="currentColor">
                            <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person-circle') }}"/>
                        </svg>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('Sign-up') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="row">
        <div class="col-12">
            @yield('content')
        </div>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-body-secondary">{{ date('Y') }} {{ config('app.app_version') }}</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="me-3"><a class="text-body-secondary" href="#" title="Telegram">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#telegram') }}"/>
                    </svg>
                </a>
            </li>
            <li class="me-3"><a class="text-body-secondary" href="#" title="Facebook">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#facebook') }}"/>
                    </svg>
                </a>
            </li>
            <li><a class="text-body-secondary" href="#" title="Twitter">
                    <svg class="bi" width="24" height="24" fill="currentColor">
                        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#twitter') }}"/>
                    </svg>
                </a>
            </li>
        </ul>
    </footer>

</div>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
