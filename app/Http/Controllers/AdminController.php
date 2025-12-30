<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $studentCount = Student::count();
        $coursesCount = Course::count();
        $userCount = User::count();
        // dd(['students' => $studentCount, 'courses' => $coursesCount]);
        return view('admin.dashboard', compact('studentCount', 'coursesCount', 'userCount'));
    }

    public function showStudent()
    {   
        return view('admin.show_student');
    }
    public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role'     => 'required' 
    ]);

    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => $request->role,
    ]);
    return redirect()->route('users.index')->with('success', 'User created successfully!');
}

    public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('show.login'); 
    }
}