<!-- resources/views/students/show.blade.php -->

@extends('layouts.app')

@section('content')
@include('layouts.bigHeading', ['submenuName' => $professor->submenu->name ])

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

            <tbody>

                <tr class="h-24">
                <td class="text-center">{{ $professor['name'] }}</td>

                </tr>

            </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('professor.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection