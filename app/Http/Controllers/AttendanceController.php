<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Student;

class AttendanceController extends Controller
{
    // Show the attendance form
    public function take()
    {
        $courses = Course::all();
        return view('attendance.take', compact('courses'));
    }

    // Fetch students based on selected criteria (AJAX)
    public function fetchStudents(Request $request)
    {
        $students = Student::where('section', $request->section)
            ->where('session', $request->session)
            ->where('department', $request->department)
            ->get();

        return response()->json($students);
    }

    // Store attendance records
    public function store(Request $request)
    {
        $courseId = $request->input('selected_course_id');
        $section = $request->input('selected_section');
        $session = $request->input('selected_session');
        $department = $request->input('selected_department');
        $date = $request->input('selected_date');

        foreach ($request->input('attendance', []) as $studentId => $status) {
            Attendance::create([
                'course_id' => $courseId,
                'student_id' => $studentId,
                'section' => $section,
                'session' => $session,
                'department' => $department,
                'date' => $date,
                'status' => $status,
            ]);
        }

        return redirect()->route('attendance.take')->with('success', 'Attendance recorded successfully.');
    }
}
