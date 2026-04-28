<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tiMovie - @yield('title', 'Website')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- Memanggil Navbar --}}
    @include('partials.navbar')

    <div class="container my-2">
        {{-- Memanggil Alert secara global --}}
        @include('partials.alerts')
        
        @yield('content')
    </div>

    {{-- Memanggil Footer --}}
    @include('partials.footer')

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>