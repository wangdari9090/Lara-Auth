@extends('layouts.main')

@section('title', 'Login')

@section('login')
<div class="d-flex justify-content-center  background-color: #f8f9fa;">
    <div class="card border-0 shadow-sm rounded-4" style="width: 400px;">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-2" 
                     style="width: 60px; height: 60px; background: rgba(154, 205, 50, 0.1); color: var(--main-color);">
                    <i class="bi bi-shield-lock-fill fs-2"></i>
                </div>
                <h3 class="fw-bold mb-1" style="color: #2d3436;">Welcome Back</h3>
                <p class="text-muted small">Please enter your details to login</p>
            </div>

            @if(session('error'))
                <div class="alert alert-danger border-0 rounded-3 small mb-3">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label small fw-bold text-muted">Email Address</label>
                    <input type="email"
                           name="email"
                           class="form-control rounded-3 py-2 @error('email') is-invalid @enderror"
                           id="email"
                           placeholder="name@example.com"
                           value="{{ old('email') }}"
                           style="font-size: 14px; border-color: #eee;">
                     <div class="invalid-feedback d-block" style="min-height: 20px;">
                        @error('email') {{ $message }} @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label small fw-bold text-muted">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control rounded-3 py-2 @error('password') is-invalid @enderror"
                           id="password"
                           style="font-size: 14px; border-color: #eee;">
                     <div class="invalid-feedback d-block" style="min-height: 20px;">
                        @error('password') {{ $message }} @enderror
                    </div>
                </div>

                <button type="submit" class="btn text-white w-100 py-2 rounded-3 shadow-sm border-0" 
                        style="background-color: var(--main-color); font-weight: 600; transition: 0.3s;">
                    Sign In
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="small text-muted">
                    Don't have an account? 
                    <a href="{{ route('show.register') }}" class="fw-bold text-decoration-none" style="color: var(--main-color);">
                        Create an Account
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection