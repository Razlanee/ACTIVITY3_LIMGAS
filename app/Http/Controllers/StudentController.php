<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
{
    // Use paginate() instead of all()
    $students = Student::paginate(10);  // Change the number to however many items per page you want
    return view('students.index', compact('students'));
}

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'course' => 'required',
        ]);

        Student::create($validated);

        return redirect()->route('students.index');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'course' => 'required',
        ]);

        $student->update($validated);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
