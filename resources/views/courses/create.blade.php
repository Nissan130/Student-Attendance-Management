@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Create New Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="course_code" class="form-label">Course Code</label>
            <input type="text" class="form-control" id="course_code" name="course_code" required>
        </div>
        <div class="mb-3">
            <label for="course_title" class="form-label">Course Title</label>
            <input type="text" class="form-control" id="course_title" name="course_title" required>
        </div>
        <div class="mb-3">
            <label for="section" class="form-label">Section</label>
            <input type="text" class="form-control" id="section" name="section" required>
        </div>
        <div class="mb-3">
            <label for="session" class="form-label">Session</label>
            <input type="text" class="form-control" id="session" name="session" required>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <button type="submit" class="btn btn-success">Save Course</button>
    </form>
@endsection
