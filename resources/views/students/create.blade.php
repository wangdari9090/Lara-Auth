@extends('layouts.admin_main')

@section('content')
@if(session('success'))
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
@endif
<div class="container-fluid mt-4 pb-5"  >
    <div class="mx-auto col-12 col-lg-9">
        
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('courses.index') }}" class="btn btn-light  rounded-circle shadow-sm me-4" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h3 class="fw-bold mb-0">Create New Student</h3>
                <p class="text-muted small mb-0">Fill in the details to add a new student</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Student Name</label>
                        <div class="sms-create-group @error('student_name') border-danger @enderror">
                            <i class="bi bi-person"></i>
                            <input type="text" name="student_name" class="create-form-input" placeholder="John Doe" value="{{ old('student_name') }}" required>
                        </div>
                        @error('student_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Student Code</label>
                        <div class="sms-create-group @error('student_code') border-danger @enderror">
                            <i class="bi bi-card-text"></i>
                            <input type="text" name="student_code" class="create-form-input"  required>
                        </div>
                        @error('student_code') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="small text-muted fw-bold mb-1">Course</label>
                            <div class="sms-create-group @error('course') border-danger @enderror">
                                <i class="bi bi-book"></i> <select name="course" class="create-form-input border-0 bg-transparent w-100 shadow-none" style="outline: none;" required>
                                    <option value="" selected disabled>Select Course</option>
                                    <option value="PHP Laravel" {{ old('course') == 'PHP Laravel' ? 'selected' : '' }}>PHP Laravel</option>
                                    <option value="Web Design" {{ old('course') == 'Web Design' ? 'selected' : '' }}>Web Design</option>
                                    <option value="Python Data Science" {{ old('course') == 'Python Data Science' ? 'selected' : '' }}>Python Data Science</option>
                                </select>
                            </div>
                            @error('course') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label class="small text-muted fw-bold mb-1">Branch Name</label>
                            <div class="sms-create-group @error('branch_name') border-danger @enderror">
                                <i class="bi bi-geo-alt"></i>
                                <select name="branch_name" class="create-form-input border-0 bg-transparent w-100 shadow-none" style="outline: none;" required>
                                    <option value="" selected disabled>Select Branch</option>
                                    <option value="Main Branch" {{ old('branch_name') == 'Main Branch' ? 'selected' : '' }}>Main Branch</option>
                                    <option value="City Center" {{ old('branch_name') == 'City Center' ? 'selected' : '' }}>City Center</option>
                                    <option value="ygn" {{ old('branch_name') == 'ygn' ? 'selected' : '' }}>YGN</option>
                                </select>
                            </div>
                            @error('branch_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
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