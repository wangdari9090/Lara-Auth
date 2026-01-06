@extends('layouts.admin_main')

@section('title', 'Student Directory')

@section('content')

<div class="main-content"> 
    <div class="container-fluid mt-4 pb-5">
        <div class="mx-auto col-12 ">
            
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                   <a href="{{ route('students.index') }}" class="text-decoration-none">
                    <h3 class="fw-bold mb-1" style="color: #2d3436;">Student Directory</h3>
                </a>    
                    <p class="text-muted small mb-0">List of currently enrolled students</p>
                </div>

                <a href="{{ route('students.create') }}" class="btn btn-theme rounded-pill px-4 shadow-sm">
                    <i class="bi bi-plus-lg me-1"></i> New Student
                </a>
            </div>

            
   <form action="{{ route('students.index') }}" method="GET" autocomplete="off" class="mb-0">
    <div class="d-flex align-items-center gap-2">
        
        <div class="filter-control-group d-flex align-items-center px-3 bg-white border rounded-pill" style="width: 250px; height: 42px;">
            <input type="text" name="search" 
                   value="{{ request('search') }}" 
                   class="border-0 bg-transparent flex-grow-1" 
                   placeholder="Search student name..." 
                   style="outline: none; font-size: 13px; padding-bottom: 3px">

            <button type="submit" class="border-0 bg-transparent p-0 ms-2">
                <i class="bi bi-search text-muted small"></i>
            </button>
        </div>

        <div class="dropdown" style="min-width: 180px;">
    <button class="btn dropdown-toggle rounded-pill text-white w-100 d-flex justify-content-between px-3 pb-2" 
            type="button" 
            id="branchDropdown" 
            data-bs-toggle="dropdown" 
            style="background-color: var(--main-color); height: 39px; font-size: 14px; border:none;">
        {{ request('branch') ? request('branch') : 'All Branches' }}
    </button>
    
    <ul class="dropdown-menu border-0 shadow-sm rounded-4 mt-2 py-2" aria-labelledby="branchDropdown">
        <li><a class="dropdown-item py-2" href="{{ route('students.index', ['branch' => '']) }}">All Branches</a></li>
        <li><a class="dropdown-item py-2" href="{{ route('students.index', ['branch' => 'Main Branch']) }}">Main Branch</a></li>
        <li><a class="dropdown-item py-2" href="{{ route('students.index', ['branch' => 'City Center']) }}">City Center</a></li>
        <li><a class="dropdown-item py-2" href="{{ route('students.index', ['branch' => 'ygn']) }}">YGN</a></li>
    </ul>
</div>
    </div>
</form>
</div>
            <div class="rounded overflow-hidden">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">ID</th>
                                <th class="ps-4">Student Code</th>
                                <th>Student Name</th>
                                <th>Branch Name</th>
                                <th class="text-end pe-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td class="ps-4">
                                    <span class="badge bg-light text-theme border border-primary-subtle rounded-pill px-3 fw-medium">
                                        {{ $student->id }}
                                    </span>
                                </td>
                                <td class="ps-4">
                                    <span class="text-secondary" style="font-size: 14px;">{{ $student->student_code }}</span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                       <span class="text-secondary" style="font-size: 14px;">{{ $student->student_name }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="text-muted small">
                                        <i class="bi bi-geo-alt me-1"></i> {{ $student->branch_name ?? 'N/A' }}
                                    </div>
                                </td>

                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-light rounded-pill px-3 border shadow-none" title="Edit">
                                            <i class="bi bi-pencil-square me-1" style="color: var(--main-color);"></i>
                                        </a>
                                        
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Delete this record?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light rounded-pill px-3 border shadow-none" title="Delete">
                                                <i class="bi bi-trash3 text-danger me-1"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2 opacity-25"></i>
                                    No students found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
            
        </div>
    </div>
</div>
@endsection