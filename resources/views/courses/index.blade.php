@extends('layouts.admin_main')

@section('content')
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        
        <h2 class="fw-bold text-dark mb-0">Course Management</h2>

        <div class="d-flex align-items-center gap-2">
            
            {{-- Filter Dropdown --}}
            <div class="dropdown">
                <button class="btn btn-white border rounded-pill d-flex align-items-center px-3 shadow-none bg-white" 
                        type="button" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false" 
                        style="font-size: 13px; color: #444; min-width: 160px;">
                    <i class="bi bi-geo-alt me-2 text-muted small"></i>
                    <span class="flex-grow-1 text-start">
                        {{ request('branch') ? request('branch') : 'All Branches' }}
                    </span>
                    <i class="bi bi-chevron-down ms-2 small opacity-50"></i>
                </button>

                <ul class="dropdown-menu shadow-sm border-0 rounded-4 mt-2 p-2" style="min-width: 200px;">
                    <li class="mb-1">
                        <a class="dropdown-item rounded-pill py-2 {{ !request('branch') ? 'active bg-light text-dark' : '' }}" 
                           href="{{ route('courses.index', array_merge(request()->query(), ['branch' => ''])) }}" 
                           style="font-size: 13px;">
                            All Branches
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="dropdown-item rounded-pill py-2 {{ request('branch') == 'Main Branch' ? 'active' : '' }}" 
                           href="{{ route('courses.index', array_merge(request()->query(), ['branch' => 'Main Branch'])) }}"
                           style="font-size: 13px;">
                            Main Branch
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-pill py-2 {{ request('branch') == 'West Campus' ? 'active' : '' }}" 
                           href="{{ route('courses.index', array_merge(request()->query(), ['branch' => 'West Campus'])) }}"
                           style="font-size: 13px;">
                            West Campus
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Add New Button --}}
            <a href="{{ route('courses.create') }}" class="btn btn-sm rounded-pill px-4 text-white shadow-sm d-flex align-items-center" style="background-color: var(--accent);">
                <i class="bi bi-plus-lg me-1"></i> Add New
            </a>
            
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="theme-header">
                    <tr style="background-color: var(--accent); color: white;">
                        <th class="ps-4 py-3 text-white" style="background-color: var(--accent); border-top-left-radius: 15px;">ID</th>
                        <th class="py-3 text-white" style="background-color: var(--accent);">Department</th>
                        <th class="py-3 text-white" style="background-color: var(--accent);">Course Title</th>
                        <th class="py-3 text-white" style="background-color: var(--accent);">Branch</th>
                        <th class="py-3 text-center text-white" style="background-color: var(--accent);">Status</th>
                        <th class="text-end pe-4 py-3 text-white" style="background-color: var(--accent); border-top-right-radius: 15px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $course->id }}</td>
                        <td><span class="badge bg-light text-dark border fw-normal">{{ $course->department }}</span></td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $course->title }}</div>
                            <div class="small text-muted text-truncate" style="max-width: 200px;">{{ $course->description }}</div>
                        </td>
                        <td><span class="small">{{ $course->branch_name }}</span></td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $course->is_active ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }} px-3">
                                {{ $course->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group shadow-sm border overflow-hidden bg-white rounded-pill">
                                <button type="button" class="btn btn-sm btn-light border-end" data-bs-toggle="modal" data-bs-target="#viewCourse{{ $course->id }}">
                                    <i class="bi bi-eye" style="color: var(--accent);"></i>
                                </button>
                                
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-light border-end">
                                    <i class="bi bi-pencil-square" style="color: var(--accent);"></i>
                                </a>

                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light text-danger" onclick="return confirm('Delete course?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="viewCourse{{ $course->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow rounded-4">
                                <div class="modal-header border-0">
                                    <h5 class="fw-bold mb-0">Course Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <h6 class="text-muted small fw-bold">Title</h6>
                                    <p class="fw-bold fs-5">{{ $course->title }}</p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="text-muted small fw-bold">Department</h6>
                                            <p>{{ $course->department }}</p>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="text-muted small fw-bold">Branch</h6>
                                            <p>{{ $course->branch_name }}</p>
                                        </div>
                                    </div>
                                    <h6 class="text-muted small fw-bold">Description</h6>
                                    <p class="small text-secondary bg-light p-2 rounded">{{ $course->description ?? 'N/A' }}</p>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No courses found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
    <div class="pagination-wrapper">
        {{ $courses->links() }}
    </div>
</div>
</div>
@endsection
