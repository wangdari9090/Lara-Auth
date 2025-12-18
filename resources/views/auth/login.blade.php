@extends('layouts.main')

@section('title', 'Login')

@section('login')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-sm" style="width: 400px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Login to Your Account</h3>

            <!-- Display Session Error -->
           <div style="min-height: 50px;">
    @if(session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
    @endif
</div>


            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                 <!-- Email -->
                <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email"
           name="email"
           class="form-control @error('email') is-invalid @enderror"
           id="email"
           value="{{ old('email') }}">

    <div class="invalid-feedback d-block" style="min-height: 20px;">
        @error('email') {{ $message }} @enderror
    </div>
</div>


                <!-- Password -->
                <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password"
           name="password"
           class="form-control @error('password') is-invalid @enderror"
           id="password">

    <div class="invalid-feedback d-block" style="min-height: 20px;">
        @error('password') {{ $message }} @enderror
    </div>
</div>


                <!-- Remember Me -->
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div> -->

                <!-- Submit -->
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

            <!-- Register Link -->
            <p class="mt-3 text-center">
                Don't have an account? <a href="{{ route('show.register') }}">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection
