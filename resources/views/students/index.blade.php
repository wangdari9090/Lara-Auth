@extends('layouts.admin_main')

@section('title', 'Student Dashboard')

@section('content')
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
        <div class="row g-2 justify-content-lg-end align-items-center">
            
            <div class="col-12 col-md-4">
                <div class="filter-control-group d-flex align-items-center px-3 bg-white border rounded-pill" style="height: 40px;">
                    <i class="bi bi-search me-2 text-muted"></i>
                    <input type="text" 
                           class="filter-control-input flex-grow-1 border-0 shadow-none bg-transparent" 
                           placeholder="Search students..." 
                           style="outline: none; font-size: 14px;">
                </div>
            </div>

            <div class="col-6 col-md-3 col-lg-2">
    <div class="dropdown h-100">
        <button class="filter-control-group d-flex align-items-center px-3 bg-white border rounded-pill w-100 shadow-none" 
                type="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false" 
                style="height: 40px; font-size: 14px; color: #444; border-color: #dee2e6 !important;">
            <span class="flex-grow-1 text-start">Filter By User</span>
            <i class="bi bi-chevron-down small text-muted ms-1"></i>
        </button>

        <ul class="dropdown-menu shadow-sm border-0 rounded-4 mt-2 p-2" style="min-width: 100%; font-size: 14px;">
            <li>
                <a class="dropdown-item rounded-3 py-2 dropdown-item" href="#">
                    <i class="bi bi-circle-fill me-2 small text-muted"></i> All Roles
                </a>
            </li>
            <li>
                <a class="dropdown-item rounded-3 py-2 dropdown-item" href="#">
                    <i class="bi bi-shield-lock me-2 small text-muted"></i> Admin
                </a>
            </li>
            <li>
                <a class="dropdown-item rounded-3 py-2 dropdown-item" href="#">
                    <i class="bi bi-mortarboard me-2 small text-muted"></i> Student
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="col-6 col-md-3 col-lg-2">
    <div class="dropdown h-100">
        <button class="filter-control-group d-flex align-items-center px-3 bg-white border rounded-pill w-100 shadow-none" 
                type="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false" 
                style="height: 40px; font-size: 14px; color: #444; border-color: #dee2e6 !important;">
            <span class="flex-grow-1 text-start"> Sort By Status</span>
            <i class="bi bi-chevron-down small text-muted ms-1"></i>
        </button>

        <ul class="dropdown-menu shadow-sm border-0 rounded-4 mt-2 p-2" style="min-width: 100%; font-size: 14px;">
            <li>
                <a class="dropdown-item rounded-3 py-2 dropdown-item" href="#">
                    <i class="bi bi-circle-fill me-2 small text-muted"></i> All Roles
                </a>
            </li>
            <li>
                <a class="dropdown-item rounded-3 py-2 dropdown-item" href="#">
                    <i class="bi bi-shield-lock me-2 small text-muted"></i> Admin
                </a>
            </li>
            <li>
                <a class="dropdown-item rounded-3 py-2 dropdown-item" href="#">
                    <i class="bi bi-mortarboard me-2 small text-muted"></i> Student
                </a>
            </li>
        </ul>
    </div>
</div>

            {{-- <div class="col-6 col-md-3 col-lg-2">
                <button class="btn btn-sm rounded-pill w-100 fw-bold shadow-sm py-2 text-white" 
                        style="background-color: var(--accent); height: 40px; border: none;">
                    <i class="bi bi-filter me-1"></i> Filter
                </button>
            </div> --}}
            
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
    @forelse ($students as $student)
    <tr>
        <td class="ps-4">
            <input type="checkbox" name="selected[]" value="{{ $student->id }}" class="form-check-input">
        </td>
        <td class="text-muted small">
            {{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}
        </td>
        <td>
            <span class="fw-semibold text-dark">{{ $student->student_name }}</span>
        </td>
        <td class="text-muted small">
            {{ $student->student_code }}
        </td>
        <td>
            <span class="small">{{ $student->course }}</span>
        </td>
        <td>
            @if(strtolower($student->status) == 'active')
                <span class="badge rounded-pill bg-success-subtle text-success px-3">Active</span>
            @else
                <span class="badge rounded-pill bg-secondary-subtle text-secondary px-3">Inactive</span>
            @endif
        </td>
        <td class="text-end pe-4">
            <div class="btn-group shadow-sm rounded-pill overflow-hidden">
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-white border-end" title="Edit">
                    <i class="bi bi-pencil text-primary"></i>
                </a>
                
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-white text-danger" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7" class="text-center py-4 text-muted">
            No students found in the database.
        </td>
    </tr>
    @endforelse
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