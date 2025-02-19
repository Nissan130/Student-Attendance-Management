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
        $courses = Course::all();
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
            'course_code' => 'required',
            'course_title' => 'required',
            'section' => 'required',
            'session' => 'required',
            'department' => 'required',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the  resource.
     */
    public function edit(Course $course) {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the  resource in storage.
     */
    public function update(Request $request, Course $course) {
        $course->update($request->all());
        return redirect()->route('courses.index');
    }

    /**
     * Remove the  resource from storage.
     */
    public function destroy(Course $course) {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
