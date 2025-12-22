<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-dark bg-success fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <button class="btn btn-outline-light me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>

        <span class="navbar-brand mb-0 h1">Admin Panel</span>

        <form class="ms-auto" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="d-flex">
    @include('admin.sidebar')

    <!-- Main content -->
   <div class="container-fluid" style="margin-top:56px;">
    <div class="row">
        <main id="main-content" class="col-lg-12 px-md-4 d-flex justify-content-center">
            <div class="w-100" >
                @yield('dashboard') 
                @yield('student_index') 
                @yield('show_student')
                @yield('create_student')
                @yield('edit_student')
                
            </div>
        </main>
    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            const sidebarEl = document.getElementById("sidebar");
            const mainContent = document.getElementById("main-content");

            // Disable backdrop and allow scroll
            const bsOffcanvas = new bootstrap.Offcanvas(sidebarEl, {
                backdrop: false,
                // scroll: true,
            });

            // Add margin to content when sidebar is open
            sidebarEl.addEventListener("show.bs.offcanvas", function () {
                mainContent.classList.add("ms-220");
            });

            sidebarEl.addEventListener("hidden.bs.offcanvas", function () {
                mainContent.classList.remove("ms-220");
            });
        </script>
        <script src="{{ asset('js/student.js') }}"></script>

</body>
</html>
