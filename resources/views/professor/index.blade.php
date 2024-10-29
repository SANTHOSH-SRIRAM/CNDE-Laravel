<!-- resources/views/professor/index.blade.php -->

@extends('layouts.app') <!-- Extend your main layout file -->

@section('content')

@if($professors->isNotEmpty() && $professors->first()->submenu)
    @include('layouts.bigHeading', ['submenuName' => $professors->first()->submenu->name])
@endif

<div class="container my-10">


    <!-- Display each professor in a horizontal row format -->
    <div class="space-y-10">
        @foreach ($professors as $professor)
        <div class="flex flex-row gap-40 border-black border-y py-10"> 
            <div class="w-2/5 border-black border-r">
                Institute Professor
            </div>
            <div class="flex flex-col md:flex-col bg-white border rounded-lg shadow-md overflow-hidden">
                <!-- Professor's Photo -->
                <div class="flex-shrink-0 w-full  h-64 ">
                    <img src="{{ asset('storage/' . $professor->photo) }}" alt="{{ $professor->name }}" class="w-full h-full object-contain">
                </div>

                <!-- Professor's Details -->
                <div class="p-6 flex flex-col justify-between w-full md:w-2/3">
                    <div>
                        <h5 class="text-2xl font-semibold">{{ $professor->name }}</h5>
                        <h6 class="text-lg text-gray-600 mb-2">{{ $professor->submenu->name }}</h6>
                        <p class="mb-2"><strong>Designation:</strong> {{ $professor->designation }}</p>
                        <p class="mb-2"><strong>Mail ID:</strong> {{ $professor->mail_id }}</p>
                        <p class="mb-2">
                            <strong>LinkedIn:</strong>
                            <a href="{{ $professor->linkedin }}" target="_blank" class="text-blue-500 hover:underline">{{ $professor->linkedin }}</a>
                        </p>
                        <p class="mb-2">
                            <strong>Google Scholar:</strong>
                            <a href="{{ $professor->google_scholar }}" target="_blank" class="text-blue-500 hover:underline">{{ $professor->google_scholar }}</a>
                        </p>
                    </div>

                    <!-- Link to individual professor's details page -->
                    <div class="mt-4">
                        <a href="{{ route('professor.show', $professor->id) }}" class="btn btn-primary w-full md:w-auto text-center">View Details</a>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
