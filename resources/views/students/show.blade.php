<!-- resources/views/students/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Details</h1>

    <div class="card">
        <div class="card-body">
            <h3>Menu: {{ $student->menu->name  }}</h3>
            <h4>Submenu: {{ $student->submenu->name  }}</h4>

            <h5>Students:</h5>
            <ul>
                @foreach ($student->students as $student)
                <li>{{ $student['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection