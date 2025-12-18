<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

<!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-dark bg-success fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <!-- Toggle button for small screens -->
        <button class="btn btn-outline-light d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>

        <span class="navbar-brand mb-0 h1">Admin Panel</span>

        <form class="ms-auto" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    </div>
</nav>


<!-- Sidebar -->
<div class="d-flex">
    @include('admin.sidebar')

    <!-- Main content -->
    <div class="flex-grow-1 p-4" style="margin-top: 56px;">
        @yield('dashboard')
        @yield('admin.sidebar')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
