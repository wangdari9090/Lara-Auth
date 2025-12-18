@extends('layouts.main')

@section('title', 'Home')

@section('home')

<!-- Hero Section -->
<div class="bg-primary text-white rounded p-5 mb-5">
    <div class="row align-items-center">
        <div class="col-md-7">
            <h1 class="display-5 fw-bold">Learn Anytime, Anywhere</h1>
            <p class="lead mt-3">
                Build your skills with high-quality online courses from expert instructors.
            </p>

            @guest
                <a href="{{ route('show.register') }}" class="btn btn-light btn-lg me-2">
                    Get Started
                </a>
                <a href="{{ route('show.login') }}" class="btn btn-outline-light btn-lg">
                    Login
                </a>
            @endguest

            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-lg">
                        Admin Dashboard
                    </a>
                @else
                    <a href="{{ route('home') }}" class="btn btn-light btn-lg">
                        My Dashboard
                    </a>
                @endif
            @endauth

        </div>

        <div class="col-md-5 text-center">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                 alt="Education"
                 class="img-fluid"
                 style="max-height: 280px;">
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="row text-center mb-5">
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">📚 Quality Courses</h5>
                <p class="card-text">
                    Carefully designed courses for students of all levels.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">👩‍🏫 Expert Teachers</h5>
                <p class="card-text">
                    Learn from industry professionals and experienced educators.
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">🎓 Certification</h5>
                <p class="card-text">
                    Earn certificates to boost your career and knowledge.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Popular Courses -->
<h2 class="text-center mb-4">Popular Courses</h2>

<div class="row mb-5">
    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">Web Development</h5>
                <p class="card-text">
                    Learn HTML, CSS, JavaScript, and Laravel from scratch.
                </p>
                <a href="#" class="btn btn-primary w-100">View Course</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">UI / UX Design</h5>
                <p class="card-text">
                    Design modern, user-friendly interfaces and experiences.
                </p>
                <a href="#" class="btn btn-primary w-100">View Course</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">Data Science</h5>
                <p class="card-text">
                    Analyze data and build smart solutions using Python.
                </p>
                <a href="#" class="btn btn-primary w-100">View Course</a>
            </div>
        </div>
    </div>
</div>

<!-- Call To Action -->
<div class="bg-light rounded p-5 text-center">
    <h2>Start Learning Today</h2>
    <p class="lead">
        Join thousands of students who are upgrading their skills.
    </p>

    @guest
        <a href="{{ route('show.register') }}" class="btn btn-success btn-lg">
            Create Free Account
        </a>
    @endguest
</div>

@endsection
