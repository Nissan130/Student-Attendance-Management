<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

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
