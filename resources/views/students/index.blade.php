@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Manage Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sl. No</th>
                <th>Full Name</th>
                <th>Roll No</th>
                <th>Section</th>
                <th>Session</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->roll_no }}</td>
                    <td>{{ $student->section }}</td>
                    <td>{{ $student->session }}</td>
                    <td>{{ $student->department }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
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
