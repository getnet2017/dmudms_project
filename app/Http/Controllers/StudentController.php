<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:students|max:50',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|unique:students|max:50',
            'gender' => 'required',
            'status' => 'required',
            'citizenship' => 'nullable|max:50',
            'disability_status' => 'nullable|max:10',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|max:50|unique:students,student_id,' . $id,
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|max:50|unique:students,email,' . $id,
            'gender' => 'required',
            'status' => 'required',
            'citizenship' => 'nullable|max:50',
            'disability_status' => 'nullable|max:10',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}