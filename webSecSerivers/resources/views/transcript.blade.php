@extends('layouts.master')
@section('title', 'Student Transcript')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2><i class="fas fa-user-graduate"></i> Student Transcript</h2>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong><i class="fas fa-user"></i> Student Name:</strong> {{ $student_name }}</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <p><strong><i class="fas fa-id-card"></i> Student ID:</strong> {{ $student_id }}</p>
                </div>
                <div class="col-12 text-center">
                    <p><strong><i class="fas fa-calendar-alt"></i> Semester:</strong> {{ $semester }}</p>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>#</th>
                        <th><i class="fas fa-book"></i> Course Name</th>
                        <th><i class="fas fa-code"></i> Course Code</th>
                        <th><i class="fas fa-coins"></i> Credits</th>
                        <th><i class="fas fa-chart-line"></i> Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $index => $course)
                        <tr>
                            <td class="font-weight-bold">{{ $index + 1 }}</td>
                            <td>{{ $course['course'] }}</td>
                            <td>{{ $course['code'] }}</td>
                            <td>{{ $course['credits'] }}</td>
                            <td class="font-weight-bold 
                                @if($course['grade'] == 'A' || $course['grade'] == 'A-') text-success 
                                @elseif($course['grade'] == 'B+' || $course['grade'] == 'B') text-warning 
                                @else text-danger 
                                @endif">
                                {{ $course['grade'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

