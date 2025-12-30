@extends('layouts.admin_main')

@section('content')
<div class="container-fluid py-4 col-lg-5 col-md-8 col-sm-10 justify-content-center">
    <div class="d-flex align-items-center mb-4">
            <a href="{{ route('users.index') }}" class="btn btn-light  rounded-circle shadow-sm me-4" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h3 class="fw-bold mb-1">Edit User</h3>
            </div>
        </div>

    <div class="row">
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">FULL NAME</label>
                        <div class="input-group bg-light rounded-pill px-3 py-1 border @error('name') border-danger @enderror">
                            <i class="bi bi-person text-muted pt-1 me-2"></i>
                            <input type="text" name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   class="form-control border-0 bg-transparent shadow-none" 
                                   style="font-size: 14px;">
                        </div>
                        @error('name')
                            <div class="text-danger small mt-1 ms-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">EMAIL ADDRESS</label>
                        <div class="input-group bg-light rounded-pill px-3 py-1 border @error('email') border-danger @enderror">
                            <i class="bi bi-envelope me-2 pt-1"></i>
                            <input type="email" name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   class="form-control border-0 bg-transparent shadow-none" 
                                   style="font-size: 14px;">
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1 ms-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn pb-2 rounded-pill px-4 text-white shadow-sm " 
                                style="background-color: var(--main-color); min-width: 140px;">
                            <i class="bi bi-check-lg me-1"></i> Save Changes
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-light rounded-pill px-4 pb-2" 
                           style="height: 42px; border-color: var(--main-color);">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
    </div>
</div>
@endsection