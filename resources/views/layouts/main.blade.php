<!doctype html>
<html lang="en" @if(date('H:i') > config('app.dark_theme_on')) data-bs-theme="dark" @endif @if(date('H:i') < config('app.dark_theme_off')) data-bs-theme="dark" @else data-bs-theme="light" @endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- include simditor css -->
    <link rel="stylesheet" href="{{ asset('css/simditor/simditor.css') }}">
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

                <form action="{{ route('search') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input name="s" type="search" class="form-control" placeholder="{{ __('Search') }} ..." aria-label="Search" required>
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-secondary text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        @if(isset(auth()->user()->avatar))
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" style="width: 28px; height: 28px; object-fit: cover;" class="rounded-circle">
                        @else
                            <svg class="bi" width="28" height="28" fill="currentColor">
                                <use xlink:href="{{ asset('icons/bootstrap-icons.svg#person') }}"/>
                            </svg>
                        @endif
                    </a>
                    <ul class="dropdown-menu text-small">
                        @auth()
                            <li><a class="dropdown-item" href="{{ route('posts.create') }}">{{ __('Add Post') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }} | {{ auth()->user()->name }}</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endauth
                        @guest()
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('Sign-up') }}</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main class="row">
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
<!-- include simditor js -->
<script src="{{ asset('js/simditor/jquery.min.js') }}"></script>
<script src="{{ asset('js/simditor/module.js') }}"></script>
<script src="{{ asset('js/simditor/hotkeys.js') }}"></script>
<script src="{{ asset('js/simditor/simditor.js') }}"></script>
<!-- activate simditor -->
<script>
    var editor = new Simditor({
        textarea: $('#editor'),
        toolbar: [
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'fontScale', 'alignment', '|',
            'ol', 'ul', '|',
            'hr'
        ],
    });
</script>
<!-- scrolls top -->
<style>
    #btnTop {
        display: none;
        position: fixed;
        bottom: 83px;
        right: 19px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        /*background-color: #dee2e6;*/
        background-color: #8b9297;
        color: #212529;
        cursor: pointer;
        padding: 5px;
        border-radius: 4px;
    }

    #btnTop:hover {
        background-color: #1b74f9;
        color: white;
    }
</style>
<button onclick="topFunction()" id="btnTop">
    <svg class="bi" width="24" height="24" fill="currentColor">
        <use xlink:href="{{ asset('icons/bootstrap-icons.svg#arrow-up') }}"/>
    </svg>
</button>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
        if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
            document.getElementById("btnTop").style.display = "block";
        } else {
            document.getElementById("btnTop").style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
</body>
</html>
