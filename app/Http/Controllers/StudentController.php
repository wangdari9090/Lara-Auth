<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Imports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'student_code' => 'required|unique:students,student_code',
        'student_name' => 'required|string',
        'course'       => 'required|string',
        'branch_name'  => 'required|string',
        'status'       => 'required|in:active,inactive',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added successfully.');

        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_code' => 'required|unique:students,student_code,' . $student->id,
            'student_name' => 'required|string',
            'course'       => 'required|string',
            'branch_name'  => 'required|string',
            'status'       => 'required|in:active,inactive',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
                        ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Students imported successfully.');
    }
    public function export()
{
    // return Excel::download(new StudentsExport, 'students.xlsx');
}

}
