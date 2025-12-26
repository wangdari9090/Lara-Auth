<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> --}}
    {{-- <link rel="stylesheet" href="cdn.jsdelivr.net"> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/student.css') }}"> --}}
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom bg-white shadow-sm" style="height: 58px;">
    <div class="container-fluid d-flex align-items-center">
        <button id="toggle-btn" class="btn border-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" style="color:#99CC00; font-size:1.5rem;">
            <i class="bi bi-list"></i>
        </button>

        <span class="navbar-brand fs-4 fw-bold ms-2" style="color: #99CC00;">Admin Panel</span>

        <form class="ms-auto" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm me-3 logout-btn fw-semibold" style="font-size:1rem; color: #99CC00;">
                <i class="bi bi-box-arrow-right me-1"></i> Logout
            </button>
        </form>
    </div>
</nav>

    @include('admin.sidebar')

    <!-- Main content -->
   <div style="margin-top: 58px; flex: 1;">
    <main id="main-content" class="px-3">
        @yield('content')
    </main>
</div>
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

</body>
</html>
