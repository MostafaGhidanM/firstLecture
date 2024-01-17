<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('library.ico')}}" />
    <title>@yield('title','Default Title')</title>
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
    <div class="container py-5">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    @yield('scripts')
</body>
</html>