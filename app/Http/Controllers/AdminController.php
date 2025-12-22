<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showStudent()
    {
        return view('admin.show_student');
    }
    public function createStudent()
    {
        return view('admin.create_student');
    }
}
