@extends('layouts.admin_main')

@section('edit_student')
<div class="container">
    <h2 class="my-4">Edit Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="form-control shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Student Code</label>
            <input type="text" name="student_code" class="form-control" value="{{ old('student_code', $student->student_code) }}" required>
        </div>

        <div class="mb-3">
            <label>Student Name</label>
            <input type="text" name="student_name" class="form-control" value="{{ old('student_name', $student->student_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <input type="text" name="course" class="form-control" value="{{ old('course', $student->course) }}" required>
        </div>

        <div class="mb-3">
            <label>Branch Name</label>
            <input type="text" name="branch_name" class="form-control" value="{{ old('branch_name', $student->branch_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>

    </form>
</div>
@endsection
