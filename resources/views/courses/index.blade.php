@extends('layouts.admin_main')

@section('content')
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
                        <a class="dropdown-item rounded-pill py-2 {{ request('branch') == 'City Center' ? 'active' : '' }}" 
                           href="{{ route('courses.index', array_merge(request()->query(), ['branch' => 'City Center'])) }}"
                           style="font-size: 13px;">
                            City Center
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item rounded-pill py-2 {{ request('branch') == 'ygn' ? 'active' : '' }}" 
                           href="{{ route('courses.index', array_merge(request()->query(), ['branch' => 'ygn'])) }}"
                           style="font-size: 13px;">
                            YGN
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Add New Button --}}
            <a href="{{ route('courses.create') }}" class="btn btn-sm rounded-pill px-4 text-white shadow-sm d-flex align-items-center" style="background-color: var(--main-color);">
                <i class="bi bi-plus-lg me-1"></i> Add New
            </a>
            
        </div>
    </div>

    <div class="card border-0 shadow-sm 2 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="theme-header" style="background-color: #09487e">
                    <tr style="background-color: #09487e">
                        <th class="ps-4 py-3 fw-semibold">ID</th>
                        <th class="ps-4 py-3 fw-semibold">Name</th>
                        <th class="ps-4 py-3 fw-semibold">Course Title</th>
                        <th class="ps-4 py-3 fw-semibold">Branch</th>
                       <th class="ps-4 py-3 fw-semibold">Description</th>
                       <th class="ps-4 py-3 fw-semibold">Status</th>
                        <th class="ps-4 py-3 fw-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td class="ps-4 text-muted small">
                            <span class="badge bg-light text-theme border border-primary-subtle rounded-pill px-3 fw-medium">
                                {{ $course->id }}
                            </span>
                        </td>
                        <td>{{ $course->name }}</td>
                        <td>
                            <div class="fw-semibold text-dark">{{ $course->course_title }}</div>
                            <div class="small text-muted text-truncate" style="max-width: 200px;">{{ $course->title }}</div>
                        </td>
                        <td><span class="small">{{ $course->branch_name }}</span></td>
                        <td><span class="small">{{ $course->description }}</span></td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $course->is_active ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' }} px-3">
                                {{ $course->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="btn-group shadow-sm border overflow-hidden bg-white rounded-pill">
                                <button type="button" class="btn btn-sm btn-light border-end" data-bs-toggle="modal" data-bs-target="#viewCourse{{ $course->id }}">
                                    <i class="bi bi-eye" style="color: var(--main-color);"></i>
                                </button>
                                
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-light border-end">
                                    <i class="bi bi-pencil-square" style="color: var(--main-color);"></i>
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
        <div class="modal-content border-0 shadow-lg rounded-4">
            
            <div class="modal-header border-0 bg-light rounded-top-4 px-4 py-3">
                <div class="d-flex align-items-center">
                    <div class="bg-white rounded-3 shadow-sm p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-book-half fs-5" style="color: var(--main-color)"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">Course Information</h5>
                        <p class="text-muted extra-small mb-0">ID: #{{ str_pad($course->id, 3, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body px-4 py-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="extra-small text-muted fw-bold text-uppercase mb-1 d-block" style="letter-spacing: 1px;">
                            Course Name
                        </label>
                        <p class="text-dark fw-medium mb-0">{{ $course->name }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="extra-small text-muted fw-bold text-uppercase mb-1 d-block" style="letter-spacing: 1px;">
                            Full Course Title
                        </label>
                        <p class="fw-bold fs-6 text-dark lh-sm mb-0">{{ $course->course_title }}</p>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="p-3 border rounded-3 bg-white shadow-sm h-100">
                            <label class=" extra-small fw-bold text-uppercase d-block mb-1">Campus Branch</label>
                            <span class="small fw-semibold text-dark">
                                <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $course->branch_name }}
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                    <label class=" extra-small fw-bold text-uppercase mb-2 d-block" style="letter-spacing: 1px;">Course Description</label>
                    <div class="p-3 rounded-3" style="background-color: #f8f9fa; border: 1px dashed #dee2e6;">
                        <p class="small text-secondary mb-0" style="line-height: 1.6; text-align: justify;">
                            {{ $course->description ?? 'No detailed description available for this curriculum.' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 px-4 pb-4 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold text-muted border shadow-sm" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('courses.edit', $course->id) }}" class=" rounded-pill px-4 fw-bold shadow-sm color-(--main-color) text-white text-decoration-none" style="background-color: var(--main-color);">
                    <i class="bi bi-pencil-square me-1"></i> Edit Course
                </a>
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
