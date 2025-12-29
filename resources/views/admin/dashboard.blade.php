@extends('layouts.admin_main')

@section('content')
<div class="container-fluid p-4" style="background-color: #f4f7f6; min-height: 100vh;">
    
    <div class="mx-auto col-12 col-lg-11 col-xl-10">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h1 class="fw-bold h3 mb-1" style="color: #2d3436;">School Overview</h1>
                <p class="text-muted small mb-0">Academic Year 2024-2025 • <span class="badge bg-white text-dark shadow-sm border">Term 2</span></p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('students.create') }}" class="btn text-white px-4 py-2 rounded-3 shadow-sm" style="background-color: var(--main-color);">
                    <i class="bi bi-plus-lg me-2"></i>Enroll Student
                </a>
                <button class="btn btn-white border shadow-sm rounded-3"><i class="bi bi-download"></i></button>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3" style="background: rgba(154, 205, 50, 0.1); color: var(--main-color);">
                            <i class="bi bi-mortarboard-fill fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Students</p>
                            <h4 class="fw-bold mb-0">1,240</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3 text-info" style="background: rgba(13, 202, 240, 0.1);">
                            <i class="bi bi-calendar-check-fill fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Avg. Attendance</p>
                            <h4 class="fw-bold mb-0">94.2%</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3 text-warning" style="background: rgba(255, 193, 7, 0.1);">
                            <i class="bi bi-journal-text fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Courses</p>
                            <h4 class="fw-bold mb-0">48</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="rounded-3 p-3 me-3 text-danger" style="background: rgba(220, 53, 69, 0.1);">
                            <i class="bi bi-cash-stack fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted small mb-0">Unpaid Fees</p>
                            <h4 class="fw-bold mb-0">12</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Attendance Trends</h5>
                        <div class="d-flex align-items-end justify-content-between px-3" style="height: 200px;">
                            <div class="bg-light rounded-top" style="width: 40px; height: 60%;"></div>
                            <div class="bg-light rounded-top" style="width: 40px; height: 85%;"></div>
                            <div style="width: 40px; height: 95%; background-color: var(--main-color);" class="rounded-top shadow-sm"></div>
                            <div class="bg-light rounded-top" style="width: 40px; height: 70%;"></div>
                            <div class="bg-light rounded-top" style="width: 40px; height: 80%;"></div>
                            <div class="bg-light rounded-top" style="width: 40px; height: 50%;"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-3 text-muted small px-2">
                            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Recent Actions</h5>
                        <div class="timeline">
                            <div class="d-flex mb-4">
                                <div class="me-3"><i class="bi bi-circle-fill text-success small"></i></div>
                                <div>
                                    <h6 class="mb-0 fw-bold small">New Student Enrolled</h6>
                                    <p class="text-muted extra-small mb-0">John Doe • 5 mins ago</p>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="me-3"><i class="bi bi-circle-fill text-info small"></i></div>
                                <div>
                                    <h6 class="mb-0 fw-bold small">Fee Payment Received</h6>
                                    <p class="text-muted extra-small mb-0">Sarah Connor • 2 hours ago</p>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="me-3"><i class="bi bi-circle-fill text-warning small"></i></div>
                                <div>
                                    <h6 class="mb-0 fw-bold small">Course Updated</h6>
                                    <p class="text-muted extra-small mb-0">Advanced Math • Yesterday</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white border-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold m-0">Student Performance Directory</h5>
                    <div class="input-group w-auto">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search students...">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 custom-admin-table">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Student ID</th>
                            <th>Name</th>
                            <th>Current Course</th>
                            <th>Status</th>
                            <th>G.P.A</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#STU-001</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Alex+Smith&background=9acd32&color=fff" class="rounded-circle me-2" width="30">
                                    <span class="fw-semibold">Alex Smith</span>
                                </div>
                            </td>
                            <td>Computer Science</td>
                            <td><span class="badge rounded-pill bg-success bg-opacity-10 text-success">Active</span></td>
                            <td><span class="fw-bold">3.8</span></td>
                            <td class="text-end pe-4">
                                <button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></button>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection