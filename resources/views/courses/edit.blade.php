@extends('layouts.admin_main')

@section('content')
{{-- @if(session('success'))
    <div class="alert alert-success border-0 shadow-sm rounded-4 d-flex align-items-center mb-4" role="alert" style="background-color: #eef7e8; border-left: 5px solid #99CC00 !important;">
        <i class="bi bi-check-circle-fill me-2" style="color: #99CC00;"></i>
        <div class="fw-medium text-dark">
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close ms-auto shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger border-0 shadow-sm rounded-4 d-flex align-items-start mb-4" role="alert" style="background-color: #fff5f5; border-left: 5px solid #dc3545 !important;">
        <i class="bi bi-exclamation-triangle-fill me-2 mt-1" style="color: #dc3545;"></i>
        <div>
            <div class="fw-bold text-dark mb-1">Please fix the following errors:</div>
            <ul class="mb-0 ps-3 small text-secondary">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn-close ms-auto shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}
<div class="container-fluid mt-4 pb-5"  >
    <div class="mx-auto col-12 col-lg-9">
        
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('courses.index') }}" class="btn btn-light  rounded-circle shadow-sm me-4" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h3 class="fw-bold mb-0">Edit Course</h3>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Course Name</label>
                        <div class="sms-create-group @error('name') border-danger @enderror">
                            <i class="bi bi-book"></i>
                            <input type="text" name="name" class="create-form-input" placeholder="e.g. Advanced Web Development" value="{{ old('name', $course->name) }}">
                        </div>
                        @error('name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Course Title</label>
                        <div class="sms-create-group @error('course_title') border-danger @enderror">
                            <i class="bi bi-book"></i>
                            <input type="text" name="course_title" class="create-form-input" placeholder="e.g. Advanced Web Development" value="{{ old('course_title', $course->course_title) }}">
                        </div>
                        @error('course_title') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Description</label>
                        <div class="sms-create-group @error('description') border-danger @enderror">
                            <i class="bi bi-building"></i>
                            <input type="text" name="description" class="create-form-input" placeholder="e.g. School of Computing" value="{{ old('description', $course->description) }}">
                        </div>
                        @error('description') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Branch Name</label>
                        <div class="sms-create-group @error('branch_name') border-danger @enderror">
                            <i class="bi bi-geo-alt"></i>
                            <input type="text" name="branch_name" class="create-form-input" placeholder="e.g. Main Campus" value="{{ old('branch_name', $course->branch_name) }}">
                        </div>
                        @error('branch_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Description</label>
                        <div class="sms-create-group">
                            <i class="bi bi-card-text"></i>
                            <input type="text" name="description" class="create-form-input" placeholder="Short overview of the course..." value="{{ old('description', $course->description) }}">
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('courses.index') }}" class="btn btn-light rounded-pill px-4 fw-bold text-muted border">Cancel</a>
                            <button type="submit" class="btn text-white rounded-pill px-5 shadow-sm fw-bold" style="background-color: var(--main-color);">
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