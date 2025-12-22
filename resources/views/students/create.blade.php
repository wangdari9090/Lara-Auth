{{-- resources/views/students/create.blade.php --}}

@extends('layouts.admin_main')

@section('create_student')
<div class="container mt-4 col-lg-6">
    <h2 class="mb-4">Add New Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST" class="form-control shadow-sm p-4 bg-light">
        @csrf

        <div class="mb-3">
            <label for="student_code" class="form-label">Student Code</label>
            <input type="text" name="student_code" class="form-control" id="student_code" value="{{ old('student_code') }}" required>
        </div>

        <div class="mb-3">
            <label for="student_name" class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" id="student_name" value="{{ old('student_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" name="course" class="form-control" id="course" value="{{ old('course') }}" required>
        </div>

        <div class="mb-3">
            <label for="branch_name" class="form-label">Branch Name</label>
            <input type="text" name="branch_name" class="form-control" id="branch_name" value="{{ old('branch_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Created Time</label>
            <input type="datetime-local" name="created_at" class="form-control" id="created_at" value="{{ old('created_at', now()->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated Time</label>
            <input type="datetime-local" name="updated_at" class="form-control" id="updated_at" value="{{ old('updated_at', now()->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
</div>
@endsection
