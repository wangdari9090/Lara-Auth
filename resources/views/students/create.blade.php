{{-- resources/views/students/create.blade.php --}}

@extends('layouts.admin_main')

@section('create_student')
<div class="container mt-4 col-lg-10">
    <h2 class="mb-4">Add New Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-control border rounded shadow-sm">
    <div class="form-grid">

    <div class="form-group">
        <i class="bi bi-hash"></i>
        <label>Student Code</label>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Student Name</label>
        <i class="bi bi-person"></i>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Course</label>
        <i class="bi bi-book"></i>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Branch Name</label>
        <i class="bi bi-diagram-3"></i>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <i class="bi bi-info-circle"></i>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Created Time</label>
        <i class="bi bi-clock"></i>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Phone Number</label>
        <i class="bi bi-telephone"></i>
        <input type="text" class="form-control">
    </div>

    <div class="form-group">
        <label>Updated Time</label>
        <i class="bi bi-arrow-repeat"></i>
        <input type="text" class="form-control">
    </div>

</div>

</form>

</div>
@endsection
