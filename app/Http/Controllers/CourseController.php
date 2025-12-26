<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetches latest courses with pagination
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'department'  => 'required|string',
            'branch_name' => 'required|string',
        ]);

        Course::create([
            'title'       => $request->title,
            'description' => $request->description,
            'department'  => $request->department,
            'branch_name' => $request->branch_name,
            'is_active'   => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'department'  => 'required|string',
            'branch_name' => 'required|string',
        ]);

        $course->update([
            'title'       => $request->title,
            'description' => $request->description,
            'department'  => $request->department,
            'branch_name' => $request->branch_name,
            'is_active'   => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}