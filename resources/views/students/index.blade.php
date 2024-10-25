<!-- resources/views/students/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students List</h1>

    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Menu</th>
                <th>Submenu</th>
                <th>Students</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>

                    <td>{{ $student->menu->name ?? 'N/A' }}</td>
                    <td>{{ $student->submenu->name ?? 'N/A' }}</td>
                    <td>
                        <ul>
                            @foreach ($student->students as $student)
                                <li>{{ $student['name'] }}</li>
                            @endforeach
                        </ul>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
