@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Take Attendance</h2>

    <!-- First Section: Select Course Details -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Select Course Details
        </div>
        <div class="card-body">
            <form id="attendanceForm">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="course_code" class="form-label">Course Code</label>
                        <select id="course_code" class="form-select" required>
                            <option value="">Select Course Code</option>
                            @foreach ($courses->unique('course_code') as $course)
                                <option value="{{ $course->id }}">{{ $course->course_code }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="course_title" class="form-label">Course Title</label>
                        <select id="course_title" class="form-select" required>
                            <option value="">Select Course Title</option>
                            @foreach ($courses->unique('course_title') as $course)
                                <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="section" class="form-label">Section</label>
                        <select id="section" class="form-select" required>
                            <option value="">Select Section</option>
                            @foreach ($courses->unique('section') as $course)
                                <option value="{{ $course->section }}">{{ $course->section }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="session" class="form-label">Session</label>
                        <select id="session" class="form-select" required>
                            <option value="">Select Session</option>
                            @foreach ($courses->unique('session') as $course)
                                <option value="{{ $course->session }}">{{ $course->session }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="department" class="form-label">Department</label>
                        <select id="department" class="form-select" required>
                            <option value="">Select Department</option>
                            @foreach ($courses->unique('department') as $course)
                                <option value="{{ $course->department }}">{{ $course->department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" id="date" class="form-control" required>
                    </div>
                </div>

                <button type="button" class="btn btn-success" id="loadStudents">Load Students</button>
            </form>
        </div>
    </div>

    <!-- Second Section: Student List -->
    <div class="card d-none" id="studentsSection">
        <div class="card-header bg-secondary text-white">
            Mark Attendance
        </div>
        <div class="card-body">
            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <input type="hidden" name="selected_course_id" id="selected_course_id">
                <input type="hidden" name="selected_section" id="selected_section">
                <input type="hidden" name="selected_session" id="selected_session">
                <input type="hidden" name="selected_department" id="selected_department">
                <input type="hidden" name="selected_date" id="selected_date">

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody id="studentList">
                        <!-- Students will be loaded dynamically -->
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary">Submit Attendance</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('loadStudents').addEventListener('click', function() {
        let courseCode = document.getElementById('course_code').value;
        let section = document.getElementById('section').value;
        let session = document.getElementById('session').value;
        let department = document.getElementById('department').value;

        if (!courseCode || !section || !session || !department) {
            alert('Please select all fields before loading students.');
            return;
        }

        fetch("{{ route('attendance.fetchStudents') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                section: section,
                session: session,
                department: department
            })
        })
        .then(response => response.json())
        .then(students => {
            let studentList = document.getElementById('studentList');
            studentList.innerHTML = ''; 

            students.forEach(student => {
                let row = `<tr>
                    <td>${student.name}</td>
                    <td>${student.roll}</td>
                    <td>
                        <input type="checkbox" name="attendance[${student.id}]" value="present"> Present
                    </td>
                </tr>`;
                studentList.innerHTML += row; 
            });

            document.getElementById('studentsSection').classList.remove('d-none');
        });
    });
</script>

@endsection
