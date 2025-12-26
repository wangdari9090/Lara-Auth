<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

// Auth routes
    Route::get('login', [AuthController::class,'showLogin'])->name('show.login');
    Route::post('login', [AuthController::class,'login'])->name('login');

    Route::get('register', [AuthController::class,'showRegister'])->name('show.register');
    Route::post('register', [AuthController::class,'register'])->name('register');


// Protected admin routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'index'])->name('admin.dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //  Route::get('/student', [AdminController::class, 'showStudent'])->name('show_student');
    //  Route::get('/create.student', [AdminController::class, 'createStudent'])->name('create.student');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('courses', CourseController::class);
    Route::post('students/import', [StudentController::class, 'import'])->name('students.import');
    Route::get('students/export', [StudentController::class, 'export'])->name('students.export');
});
