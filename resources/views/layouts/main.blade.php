<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Colors</title>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand" style="margin-left: 10px">My Colors</span>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('palette.index') }}">See your palettes</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav ml-auto" style="margin-right: 10px">
            <li class="nav-item active">
                <span class="navbar-text mb-0 align-middle" style="margin-right: 10px">{{ auth()->user()->email }}</span>
            </li>
            <li class="nav-item active">
                <a class="nav-link btn btn-info" href="{{ route('auth.logout') }}">Logout</a>
            </li>
        </ul>
    </nav>
    @endauth
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://www.w3schools.com/lib/w3color.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>
    @stack('layout_end_body')
</body>
</html>