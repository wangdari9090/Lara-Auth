@extends('layouts.admin_main')

@section('content')
<div class="container-fluid mt-4 pb-5">
    <div class="mx-auto col-12 col-lg-8">
        
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('courses.index') }}" class="btn btn-white rounded-circle shadow-sm me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h3 class="fw-bold mb-0">Create New Course</h3>
                <p class="text-muted small mb-0">Fill in the details to add a new academic program</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                
                <div class="row g-4">
                    <div class="col-12">
                        <label class="small text-muted fw-bold mb-1">Course Title</label>
                        <div class="sms-create-group @error('title') border-danger @enderror">
                            <i class="bi bi-book"></i>
                            <input type="text" name="title" class="create-form-input" placeholder="e.g. Advanced Web Development" value="{{ old('title') }}" required>
                        </div>
                        @error('title') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="small text-muted fw-bold mb-1">Department</label>
                        <div class="sms-create-group @error('department') border-danger @enderror">
                            <i class="bi bi-building"></i>
                            <input type="text" name="department" class="create-form-input" placeholder="e.g. School of Computing" value="{{ old('department') }}" required>
                        </div>
                        @error('department') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="small text-muted fw-bold mb-1">Branch Name</label>
                        <div class="sms-create-group @error('branch_name') border-danger @enderror">
                            <i class="bi bi-geo-alt"></i>
                            <input type="text" name="branch_name" class="create-form-input" placeholder="e.g. Main Campus" value="{{ old('branch_name') }}" required>
                        </div>
                        @error('branch_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label class="small text-muted fw-bold mb-1">Description</label>
                        <div class="sms-create-group">
                            <i class="bi bi-card-text"></i>
                            <input type="text" name="description" class="create-form-input" placeholder="Short overview of the course..." value="{{ old('description') }}">
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-check form-switch p-0 d-flex align-items-center gap-3">
                            <label class="small text-muted fw-bold m-0" for="is_active">Course Status:</label>
                            <input class="form-check-input ms-0 shadow-none" type="checkbox" name="is_active" id="is_active" checked style="width: 45px; height: 22px; cursor: pointer;">
                            <span class="small text-muted">Active (Visible to students)</span>
                        </div>
                    </div>

                    <div class="col-12 mt-5">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('courses.index') }}" class="btn btn-light rounded-pill px-4 fw-bold text-muted border">Cancel</a>
                            <button type="submit" class="btn text-white rounded-pill px-5 shadow-sm fw-bold" style="background-color: var(--accent);">
                                <i class="bi bi-check-lg me-1"></i> Save Course
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection