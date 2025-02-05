@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Manage Courses</h1>
    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sl. No</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Section</th>
                <th>Session</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_title }}</td>
                    <td>{{ $course->section }}</td>
                    <td>{{ $course->session }}</td>
                    <td>{{ $course->department }}</td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
