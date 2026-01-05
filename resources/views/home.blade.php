@extends('layouts.main')

@section('title', 'Home')

@section('home')

<div class="rounded-4 p-5 mb-5 shadow-sm hero-gradient text-white">
    <div class="row align-items-center">
        <div class="col-md-7">
            <h1 class="display-5 fw-bold mb-3">Learn Anytime, Anywhere</h1>
            <p class="lead mb-4 opacity-90">
                Build your skills with high-quality online courses from expert instructors.
            </p>

            <div class="d-flex gap-2">
                @guest
                    <a href="{{ route('show.register') }}" class="btn btn-light btn-lg px-4 rounded-3 fw-bold" style="color: var(--main-color);">Get Started</a>
                    <a href="{{ route('show.login') }}" class="btn btn-outline-light btn-lg px-4 rounded-3">Login</a>
                @endguest

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-lg px-4 rounded-3 fw-bold" style="color: var(--main-color);">
                            <i class="bi bi-speedometer2 me-2"></i>Admin Dashboard
                        </a>
                    @endif
                    <button class="btn btn-outline-light btn-lg px-4 rounded-3" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                    </button>
                @endauth
            </div>
        </div>

        <div class="col-md-5 text-center d-none d-md-block">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" alt="Education" class="img-fluid floating-animation" style="max-height: 280px;">
        </div>
    </div>
</div>

<div class="row g-4 text-center mb-5">
    @php
        $features = [
            ['icon' => 'book', 'color' => 'success', 'title' => 'Quality Courses'],
            ['icon' => 'person-video3', 'color' => 'primary', 'title' => 'Expert Teachers'],
            ['icon' => 'patch-check', 'color' => 'warning', 'title' => 'Certification']
        ];
    @endphp
    @foreach($features as $f)
    <div class="col-md-4">
        <div class="card h-100 border-0 shadow-sm rounded-4 transition-hover p-4">
            <div class="rounded-circle bg-light d-inline-flex p-3 mb-3 text-{{ $f['color'] }}">
                <i class="bi bi-{{ $f['icon'] }} fs-3"></i>
            </div>
            <h5 class="fw-bold">{{ $f['title'] }}</h5>
            <p class="text-muted small mb-0">High-quality education provided by professionals.</p>
        </div>
    </div>
    @endforeach
</div>

<div class="rounded-4 p-5 text-center border-0 shadow-sm mb-5 bg-white">
    <h2 class="fw-bold">Start Learning Today</h2>
    @guest
        <a href="{{ route('show.register') }}" class="btn btn-lg px-5 text-white rounded-3 shadow-sm border-0 mt-3" style="background-color: var(--main-color);">Create Free Account</a>
    @else
        <p class="text-muted">Welcome back, <strong>{{ auth()->user()->name }}</strong>!</p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        <a href="javascript:void(0)" class="btn btn-link text-danger text-decoration-none fw-bold" onclick="document.getElementById('logout-form').submit();">
            Not you? Logout
        </a>
    @endguest
</div>

<style>
    .hero-gradient { background: linear-gradient(135deg, var(--main-color) 0%, #88b029 100%); }
    .transition-hover:hover { transform: translateY(-5px); transition: 0.3s; }
    .floating-animation { animation: float 3s ease-in-out infinite; }
    @keyframes float { 
        0%, 100% { transform: translateY(0); } 
        50% { transform: translateY(-15px); } 
    }
</style>

@endsection