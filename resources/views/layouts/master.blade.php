<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    {{-- <link rel="stylesheet" href=""> --}}
</head>
<body>
    @include('layouts.partials.nav')
    <main class = "page">
        @yield('content')

    </main>
    @include('layouts.partials.footer')
</body>
</html>