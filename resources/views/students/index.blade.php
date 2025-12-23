@extends('layouts.admin_main')

@section('student_index')
<div class="m-4 my-3" style="overflow-x: auto;">
     <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h3 class="ms-3">Students</h3>

    <div class="d-flex flex-wrap gap-2 align-items-center me-4">
        <!-- Import Form -->
        <form id="import-form" action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap gap-2 align-items-center mb-0">
            @csrf
            <input type="file" name="file" id="import-file" class="d-none" required onchange="document.getElementById('import-form').submit()">
            <button type="button" class="btn btn-primary btn-sm" onclick="document.getElementById('import-file').click()">
                Import
            </button>
        </form>

        <!-- Export Button -->
        <a href="{{ route('students.export') }}" class="btn btn-secondary btn-sm">Export</a>
    </div>
</div>

    

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script src="{{ asset('js/student.js') }}"></script>
@endif


    {{-- <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a> --}}

    <table class="table table-bordered table-hover" style="min-width: 1200px;">
        <thead>
            <tr>
                <th>Student Code</th>
                <th>Name</th>
                <th>Course</th>
                <th>Branch</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{ $student->student_code }}</td>
                <td>{{ $student->student_name }}</td>
                <td>{{ $student->course }}</td>
                <td>{{ $student->branch_name }}</td>
                <td>{{ ucfirst($student->status) }}</td>
                <td>{{ $student->created_at->format('Y-m-d H:i') }}</td>
                <td>{{ $student->updated_at->format('Y-m-d H:i') }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No students found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

   <div class="d-flex justify-content-center">
    {{ $students->links() }}
</div>

</div>
@endsection
