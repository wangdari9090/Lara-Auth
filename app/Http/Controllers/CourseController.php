<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
    {
        $query = Course::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('course_title', 'LIKE', "%{$search}%");
            });
        }
        if ($request->filled('branch')) {
            $query->where('branch_name', $request->branch);
        }
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        $courses = $query->orderBy('id', 'desc')->paginate(10)->withQueryString();
        $coursesCount = $query->count();

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
            'name'       => 'required|string|max:255',
            'course_title' => 'nullable|string',
            'description' => 'nullable|string',
            'branch_name' => 'required|string',
        ]);

        Course::create([
            'name'       => $request->name,
            'course_title' => $request->course_title,
            'description' => $request->description,
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
        return view('courses.edit', compact('course'))->with('success', 'Course update successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = \App\Models\Course::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'course_title'  => 'required|string|max:255',
            'description'    => 'required|string|max:255',
            'branch_name'   => 'required|string|max:255',
            'description'   => 'nullable|string',
        ]);

        $course->name         = $request->name;
        $course->course_title = $request->course_title;
        $course->description   = $request->description;
        $course->branch_name  = $request->branch_name;
        $course->description  = $request->description;
        
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
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