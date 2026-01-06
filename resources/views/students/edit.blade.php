@extends('layouts.admin_main')

@section('content')
<div class="container-fluid mt-4 pb-5">
    <div class="mx-auto col-12 col-lg-9">
        
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('students.index') }}" class="btn btn-light rounded-circle shadow-sm me-4" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h3 class="fw-bold mb-0">Edit Student</h3>
                <p class="text-muted small mb-0">Update information for {{ $student->student_name }}</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6">
                        <label class="small text-muted fw-bold mb-1">Student Code</label>
                        <div class="sms-create-group @error('student_code') border-danger @enderror">
                            <i class="bi bi-hash"></i>
                            <input type="text" name="student_code" class="create-form-input" value="{{ old('student_code', $student->student_code) }}" required>
                        </div>
                        @error('student_code') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label class="small text-muted fw-bold mb-1">Student Name</label>
                        <div class="sms-create-group @error('student_name') border-danger @enderror">
                            <i class="bi bi-person"></i>
                            <input type="text" name="student_name" class="create-form-input" value="{{ old('student_name', $student->student_name) }}" required>
                        </div>
                        @error('student_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label class="small text-muted fw-bold mb-1">Course</label>
                        <div class="sms-create-group @error('course') border-danger @enderror">
                            <i class="bi bi-book"></i>
                            <input type="text" name="course" class="create-form-input" value="{{ old('course', $student->course) }}" required>
                        </div>
                        @error('course') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label class="small text-muted fw-bold mb-1">Branch Name</label>
                        <div class="sms-create-group @error('branch_name') border-danger @enderror">
                            <i class="bi bi-geo-alt"></i>
                            <input type="text" name="branch_name" class="create-form-input" value="{{ old('branch_name', $student->branch_name) }}" required>
                        </div>
                        @error('branch_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 mt-5">
                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('students.index') }}" class="btn btn-light rounded-pill px-4 fw-bold text-muted border">Cancel</a>
                            <button type="submit" class="btn text-white rounded-pill px-5 shadow-sm fw-bold" style="background-color: var(--main-color);">
                                <i class="bi bi-check-lg me-1"></i> Update Student
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-body text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-check-circle-fill" style="font-size: 2.5rem; color: var(--main-color);"></i>
                    </div>
                    <h5 class="fw-bold mb-1">Updated!</h5>
                    <p class="text-muted small mb-4">{{ session('success') }}</p>
                    <button type="button" class="btn btn-sm rounded-pill px-4 text-white fw-bold shadow-sm" 
                            style="background-color: var(--main-color);" 
                            data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('successModal'));
            myModal.show();
        });
    </script>
@endif

@endsection