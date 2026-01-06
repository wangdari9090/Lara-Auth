@extends('layouts.admin_main')

@section('content')

@if(session('success'))


{{-- Success Modal --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm"> <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-body text-center p-4">
                    
                    <div class="mb-3">
                        <i class="bi bi-check-circle-fill" style="font-size: 2.5rem; color: var(--main-color);"></i>
                    </div>
                    
                    <h5 class="fw-bold mb-1">Done!</h5>
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
<div class="container-fluid mt-4 pb-5"  >
    <div class="mx-auto col-12 col-lg-9">
        
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('courses.index') }}" class="btn btn-light  rounded-circle shadow-sm me-4" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <a href="{{route('courses.index')}}" style="text-decoration: none">
                    <h3 class="fw-bold mb-0" style="color: var(--main-color)">Create New Course</h3>
                </a>
                <p class="text-muted small mb-0">Fill in the details to add a new academic program</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Course Name</label>
                        <div class="sms-create-group @error('name') border-danger @enderror">
                            <i class="bi bi-book"></i>
                            <input type="text" name="name" class="create-form-input" placeholder="e.g. Advanced Web Development" value="{{ old('name') }}">
                        </div>
                        @error('name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Course Title</label>
                        <div class="sms-create-group @error('course_title') border-danger @enderror">
                            <i class="bi bi-book"></i>
                            <input type="text" name="course_title" class="create-form-input" placeholder="e.g. Advanced Web Development" value="{{ old('course_title') }}">
                        </div>
                        @error('course_title') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Description</label>
                        <div class="sms-create-group">
                            <i class="bi bi-card-text"></i>
                            <input type="text" name="description" class="create-form-input" placeholder="Short overview of the course..." value="{{ old('description') }}">
                        </div>
                        @error('description') <span class="text-danger extra-small">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label class="small text-muted fw-bold mb-1">Branch Name</label>
                        <div class="sms-create-group @error('branch_name') border-danger @enderror">
                            <i class="bi bi-geo-alt"></i>
                            <input type="text" name="branch_name" class="create-form-input" placeholder="e.g. Main Campus" value="{{ old('branch_name') }}">
                        </div>
                        @error('branch_name') <span class="text-danger extra-small">{{ $message }}</span> @enderror
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