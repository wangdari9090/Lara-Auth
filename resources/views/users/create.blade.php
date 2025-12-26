@extends('layouts.admin_main')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4">
        <a href="{{ route('users.index') }}" class="text-decoration-none text-muted small d-flex align-items-center">
            <i class="bi bi-arrow-left me-1"></i> Back to User Management
        </a>
        <h2 class="fw-bold text-dark mt-2">Add New User</h2>
    </div>

    <div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <form action="{{ route('users.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="form-label small fw-bold text-muted">FULL NAME</label>
                        <div class="input-group bg-light rounded-pill px-3 border @error('name') border-danger @enderror d-flex align-items-center" style="height: 46px;">
                            <i class="bi bi-person text-muted me-2 pb-1"></i> <input type="text" name="name" value="{{ old('name') }}" 
                                   class="form-control border-0 bg-transparent shadow-none p-0" 
                                   placeholder="Enter user's full name" 
                                   style="font-size: 14px; height: 100%; line-height: 46px;">
                        </div>
                        @error('name') <div class="text-danger small mt-1 ms-3">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label small fw-bold text-muted">EMAIL ADDRESS</label>
                        <div class="input-group bg-light rounded-pill px-3 border @error('email') border-danger @enderror d-flex align-items-center" style="height: 46px;">
                            <i class="bi bi-envelope text-muted me-2 pb-1"></i> <input type="email" name="email" value="{{ old('email') }}" 
                                   class="form-control border-0 bg-transparent shadow-none p-0" 
                                   placeholder="example@mail.com" 
                                   style="font-size: 14px; height: 100%; line-height: 46px;">
                        </div>
                        @error('email') <div class="text-danger small mt-1 ms-3">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="d-flex gap-2 pt-3">
                    <button type="submit" class="btn rounded-pill px-4 text-white shadow-sm d-flex align-items-center justify-content-center border-0" 
                            style="background-color: var(--accent); height: 42px; min-width: 160px;">
                        <i class="bi bi-person-plus me-2"></i> <span>Create User</span>
                    </button>
                    <a href="{{ route('users.index') }}" class="btn btn-light rounded-pill px-4 d-flex align-items-center justify-content-center" 
                       style="height: 42px; border: 1px solid #dee2e6;"> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection