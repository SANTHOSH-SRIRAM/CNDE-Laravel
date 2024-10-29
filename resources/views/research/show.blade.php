<!-- resources/views/research/show.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Display the submenu name using the bigHeading layout -->
@include('layouts.bigHeading', ['submenuName' => $submenu->name])

<div class="container mx-auto mt-5">
    <h1 class="text-3xl font-bold">{{ $submenu->name }} - Research Entries</h1>

    <!-- Display each research entry -->
    @foreach ($researches as $research)
        <div class="mt-8 p-6 bg-white rounded-lg shadow-lg">
            <!-- Research Name -->
            <h2 class="text-2xl font-semibold mb-2">{{ $research->name }}</h2>

            <!-- Display Methods -->
            <h3 class="text-lg font-medium mt-4">Methods:</h3>
            <ul class="list-disc pl-5 mt-2">
                @foreach($research->methods as $method)
                    <li class="mb-4">
                        <strong>{{ $method['method'] }}</strong>
                        <div class="mt-2">
                            @if(isset($method['photo']))
                                <img src="{{ asset('storage/' . $method['photo']) }}" alt="Method Image" class="w-full h-auto mb-2">
                            @endif
                            <p>{{ $method['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>

@endsection
