<!-- resources/views/students/show.blade.php -->

@extends('layouts.app')

@section('content')
@include('layouts.bigHeading', ['submenuName' => $student->submenu->name , 'submenuimg'=>$student->submenu->image])

<div class="container">


    <div class="card mt-10">
        <div class="card-body">
            <table class="min-w-full bg-white border border-gray-300">
                <thead >
                    <tr class="bg-gray-200 h-10">

                        <th>Name</th>
                        <th>Photo</th>
                        <th>Period</th>
                        <th>Field</th>
                        <th>Guide</th>

                        
                    </tr>
                </thead>
            <!-- <h3>Menu: {{ $student->menu->name  }}</h3>
            <h4>Submenu: {{ $student->submenu->name  }}</h4>

            <h5>Students:</h5> -->
            <tbody>
                @foreach ($student->students as $student)
                <tr class="h-24">
                <td class="text-center">{{ $student['name'] }}</td>
                <td class="justify-center items-center flex flex-col h-24">
                   <img src="{{ asset('storage/' . $student['photo'] )}}" alt="" class="w-16 rounded-full"> </td>
                <td class="text-center">{{ $student['from_year'] }}-{{ $student['to_year'] }} </td>
                <td class="text-center">{{ $student['field'] }}</td>
                <td class="text-center">{{ $student['guide'] }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection