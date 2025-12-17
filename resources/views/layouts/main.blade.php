<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'MyApp')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

{{-- @include('partials.nav') --}}
<x-nav />
<x-sidebar />

<div class="container mt-4">
    @yield('content')
    @yield('login')
</div>
{{-- @include('partials.footer') --}}
<x-footer />

</body>
</html>
