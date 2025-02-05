@extends('layouts.app')

@section('content')
    <h1 class="mt-4">Add New Student</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="roll_no" class="form-label">Roll No</label>
            <input type="text" class="form-control" id="roll_no" name="roll_no" required>
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
        <button type="submit" class="btn btn-success">Save Student</button>
    </form>
@endsection
