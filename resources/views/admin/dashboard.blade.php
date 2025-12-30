@extends('layouts.admin_main')

@section('content')
<div class="container-fluid p-4">
    
    <div class="mx-auto col-12 col-lg-11 col-xl-10">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h1 class="fw-bold h3 mb-1" style="color: #2d3436;">School Overview</h1>
                <p class="text-muted small mb-0">Real-time statistics for your institution.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('students.create') }}" class="btn text-white px-4 py-2 rounded-3 shadow-sm border-0" style="background-color: var(--main-color); transition: 0.3s;">
                    <i class="bi bi-plus-lg me-2"></i>Enroll Student
                </a>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-2 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3" style="background: rgba(154, 205, 50, 0.1); color: #9acd32;">
                            <i class="bi bi-mortarboard-fill fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0 fw-bold text-uppercase" style="letter-spacing: 0.5px;">Students</p>
                            <h4 class="fw-bold mb-0 text-dark">
                                {{ number_format($studentCount ?? 0) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-2 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                            <i class="bi bi-journal-bookmark-fill fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0 fw-bold text-uppercase" style="letter-spacing: 0.5px;">Courses</p>
                            <h4 class="fw-bold mb-0 text-dark">
                                {{ number_format($coursesCount ?? 0) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-2 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0 fw-bold text-uppercase" style="letter-spacing: 0.5px;">Users</p>
                            <h4 class="fw-bold mb-0 text-dark">
                                {{ number_format($userCount ?? 0) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection