<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
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
            'fullname'=>'required',
            'roll_no'=>'required',
            'section'=>'required',
            'session'=>'required',
            'department'=>'required'
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the  resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the  resource.
     */
    public function edit(Student $student) {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the  resource in storage.
     */
    public function update(Request $request, Student $student) {
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Remove the  resource from storage.
     */
    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('students.index');
    }
}
