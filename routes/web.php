<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('courses.index');
});

Auth::routes();


// Course Routes
Route::resource('courses', CourseController::class);

// Student Routes
Route::resource('students', StudentController::class);

Route::get('/attendance/take', [AttendanceController::class, 'take'])->name('attendance.take');
Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
Route::post('/attendance/fetch-students', [AttendanceController::class, 'fetchStudents'])->name('attendance.fetchStudents');