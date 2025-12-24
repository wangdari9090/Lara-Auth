@extends('layouts.admin_main')

@section('create_student')
<div class="container mt-4 col-lg-10">
    <h2 class="mb-4 fs-3 text-muted">Add New Student</h2>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form class="form-control border rounded shadow-sm py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-5">
            <form class="form-control border rounded shadow-sm py-3">
                <div class="form-grid">
                    <!-- STUDENT CODE -->
                    <div class="row form-group g-0 mb-3 align-items-center">
                        <div class="col-auto pe-4">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <div class="col">
                            <div class="form-floating custom-floating">
                                <input type="text" class="form-control" id="student_code" placeholder=" ">
                                <label for="student_code">STUDENT CODE</label>
                            </div>
                        </div>
                    </div>

                    <!-- STUDENT NAME -->
                    <div class="row form-group g-0 mb-3 align-items-center">
                        <div class="col-auto pe-4">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="col">
                            <div class="form-floating custom-floating">
                                <input type="text" class="form-control" id="student_name" placeholder=" ">
                                <label for="student_name">STUDENT NAME</label>
                            </div>
                        </div>
                    </div>

                    <!-- COURSE -->
                    <div class="row form-group g-0 mb-4 align-items-center">
                        <div class="col-auto pe-4">
                            <i class="bi bi-book"></i>
                        </div>
                        <div class="col">
                            <div class="form-floating custom-floating">
                                <input type="text" class="form-control" id="course" placeholder=" ">
                                <label for="course">COURSE</label>
                            </div>
                        </div>
                    </div>

                    <!-- CITY SELECTS -->
                    <div class="row g-0 mb-3 align-items-center">
                        <div class="col-auto pe-4">
                            <i class="bi bi-building fs-4" style="color:#9acd32 "></i>
                        </div>
                        <div class="col">
                            <div class="row g-2">
                                <div class="col">
                                    <select class="form-select" id="city1">
                                        <option value="" selected disabled>Choose City</option>
                                        <option value="yangon">Yangon</option>
                                        <option value="mandalay">Mandalay</option>
                                        <option value="naypyitaw">Naypyitaw</option>
                                        <option value="bagan">Bagan</option>
                                        <option value="taunggyi">Taunggyi</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="city2">
                                        <option value="" selected disabled>Choose City</option>
                                        <option value="yangon">Yangon</option>
                                        <option value="mandalay">Mandalay</option>
                                        <option value="naypyitaw">Naypyitaw</option>
                                        <option value="bagan">Bagan</option>
                                        <option value="taunggyi">Taunggyi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

</form>


</div>
@endsection
