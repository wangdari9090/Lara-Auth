@extends('layouts.admin_main')

@section('title', 'Student Dashboard')

@section('show_student')
<div class="container-fluid mt-4">

    <!-- Header: Actions & Filters -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h3>Studentsssss</h3>

        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-primary">Import</button>
            <button class="btn btn-secondary">Export</button>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="row mb-3">
        <div class="col-md-3 col-sm-6 mb-2">
            <input type="text" class="form-control" placeholder="Search student...">
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
            <select class="form-select">
                <option value="">Filter by user</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
        </div>
        <div class="col-md-3 col-sm-6 mb-2">
            <select class="form-select">
                <option value="">Sort by status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th scope="col">
                        <input type="checkbox">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                <tr>
                    <td>
                        <input type="checkbox" name="selected[]" value="{{ $i }}">
                    </td>
                    <td>{{ $i }}</td>
                    <td>Student {{ $i }}</td>
                    <td>student{{ $i }}@example.com</td>
                    <td>{{ $i % 2 == 0 ? 'Admin' : 'Student' }}</td>
                    <td>
                        <span class="badge {{ $i % 2 == 0 ? 'bg-success' : 'bg-secondary' }}">
                            {{ $i % 2 == 0 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-primary">Test</button>
                            <button class="btn btn-sm btn-danger">view</button>
                        </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between align-items-center mt-3">
        <span class="text-muted">Showing 1 to 50 of 200 entries</span>
        <nav>
            <ul class="pagination mb-0">
                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

</div>
@endsection
