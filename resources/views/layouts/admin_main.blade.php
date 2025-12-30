<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: var(--bg-light)">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom bg-white shadow-sm" style="height: 58px; z-index: 1040;">
        <div class="container-fluid d-flex align-items-center">
            <button id="toggle-btn" class="btn border-0 shadow-none">
                <i class="bi bi-list fs-4"></i>
            </button>
            <span class="navbar-brand fs-4 fw-bold ms-2" style="color: var(--main-color);">Admin Panel</span>
            
            <form class="ms-auto" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-sm fw-semibold mb-2" style="color: var(--main-color);">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="d-flex">
        @include('admin.sidebar')

        <main id="main-content" class="flex-grow-1 px-4" style="transition: all 0.3s ease;">
            <div class="py-4">
                @yield('content')
            </div>
        </main>
    </div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById("toggle-btn");
    
    toggleBtn.addEventListener("click", function (e) {
        e.preventDefault();
        document.body.classList.toggle("toggled");
    });
});
    </script>
</body>
</html>