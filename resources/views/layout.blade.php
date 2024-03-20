<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('library.ico') }}" />
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('styles')
</head>

<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-size: cover;
            background-color: rgba(255, 255, 255, 0.487);
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('books.index') }}">Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    @yield('scripts')
</body>

</html>
