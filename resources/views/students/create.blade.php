@extends('layouts.admin_main')

@section('content')
<div class="container mt-4">
    <div class="mx-auto" style="max-width: 450px;">
        
        <h2 class="mb-4 fs-3 text-muted">Add New Student</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="border rounded shadow-sm p-4 bg-white">
            <div class="container-fluid p-0">
                
                <div class="row g-0 mb-4 align-items-end">
                    <div class="col-auto pe-3">
                        <i class="bi bi-mortarboard fs-5" style="color:#9acd32"></i>
                    </div>
                    <div class="col">
                        <div class="form-floating custom-floating">
                            <input type="text" class="form-control create-form create-form" id="student_code" placeholder=" ">
                            <label for="student_code">STUDENT CODE</label>
                        </div>
                    </div>
                </div>

                <div class="row g-0 mb-4 align-items-end">
                    <div class="col-auto pe-3">
                        <i class="bi bi-person fs-5" style="color:#9acd32"></i>
                    </div>
                    <div class="col">
                        <div class="form-floating custom-floating">
                            <input type="text" class="form-control create-form" id="student_name" placeholder=" ">
                            <label for="student_name">STUDENT NAME</label>
                        </div>
                    </div>
                </div>

                <div class="row g-0 mb-4 align-items-end">
                    <div class="col-auto pe-3">
                        <i class="bi bi-book fs-5" style="color:#9acd32"></i>
                    </div>
                    <div class="col">
                        <div class="form-floating custom-floating">
                            <input type="text" class="form-control create-form" id="course" placeholder=" ">
                            <label for="course">COURSE</label>
                        </div>
                    </div>
                </div>

                <div class="row g-0 mb-4 align-items-center">
                    <div class="col-auto pe-3">
                        <i class="bi bi-building fs-5" style="color:#9acd32"></i>
                    </div>
                    <div class="col">
                        <select class="form-select shadow-none" id="city1">
                            <option value="" selected disabled>Choose City 1</option>
                            <option value="yangon">Yangon</option>
                            <option value="mandalay">Mandalay</option>
                        </select>
                    </div>
                </div>

                <div class="row g-0 mb-3 align-items-center">
                    <div class="col-auto pe-3">
                        <i class="bi bi-building fs-5" style="color:#9acd32"></i>
                    </div>
                    <div class="col">
                        <select class="form-select shadow-none" id="city2">
                            <option value="" selected disabled>Choose City 2</option>
                            <option value="yangon">Yangon</option>
                            <option value="mandalay">Mandalay</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn w-100 text-white" style="background-color: #9acd32;">Save Student</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection