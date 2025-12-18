<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});