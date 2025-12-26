@extends('layouts.admin_main')

@section('title', 'Student Dashboard')

@section('student_index')
<div class="container-fluid mt-4 pb-5">

    <div class="mx-auto col-12 col-lg-11 col-xl-10">
        
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h3 class="fw-bold mb-0">Student Directory</h3>
                <p class="text-muted small mb-0">Manage and monitor enrolled students</p>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 shadow-sm">
                    <i class="bi bi-file-earmark-arrow-up me-1"></i> Import
                </button>
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 shadow-sm">
                    <i class="bi bi-file-earmark-arrow-down me-1"></i> Export
                </button>
                <a href="{{ route('students.create') }}" class="btn text-white btn-sm rounded-pill px-4 shadow-sm" style="background-color: var(--accent);">
                    <i class="bi bi-plus-lg me-1"></i> New Student
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-3">
                <div class="row g-2">
                    <div class="col-md-5">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="Search by name or email...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select form-select-sm">
                            <option value="">Filter by Role</option>
                            <option value="admin">Admin</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select form-select-sm">
                            <option value="">Status: All</option>
                            <option value="active">Active Only</option>
                            <option value="inactive">Inactive Only</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0 student-table">
                    <thead class="theme-header">
                        <tr>
                            <th class="ps-4 py-3"><input type="checkbox" class="form-check-input"></th>
                            <th class="py-3">#</th>
                            <th class="py-3">Name</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Role</th>
                            <th class="py-3">Status</th>
                            <th class="text-end pe-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td class="ps-4"><input type="checkbox" class="form-check-input"></td>
                            <td class="text-muted small">{{ $i }}</td>
                            <td>
                                <span class="fw-semibold text-dark">Student {{ $i }}</span>
                            </td>
                            <td class="text-muted small">student{{ $i }}@school.edu</td>
                            <td><span class="small">{{ $i % 2 == 0 ? 'Admin' : 'Student' }}</span></td>
                            <td>
                                @if($i % 2 == 0)
                                    <span class="badge rounded-pill bg-success-subtle text-success px-3">Active</span>
                                @else
                                    <span class="badge rounded-pill bg-secondary-subtle text-secondary px-3">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm rounded-pill overflow-hidden">
                                    <button class="btn btn-sm btn-white border-end" title="Edit"><i class="bi bi-pencil text-primary"></i></button>
                                    <button class="btn btn-sm btn-white text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
            <span class="text-muted small">Showing 1 to 10 of 200 entries</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link shadow-none" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link shadow-none border-0" style="background-color: var(--accent);" href="#">1</a></li>
                    <li class="page-item"><a class="page-link shadow-none text-dark" href="#">2</a></li>
                    <li class="page-item"><a class="page-link shadow-none text-dark" href="#">3</a></li>
                    <li class="page-item"><a class="page-link shadow-none" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>
@endsection