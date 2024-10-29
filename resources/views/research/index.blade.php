@extends('layouts.app') <!-- Adjust this to your actual layout -->

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-5">All Research Entries</h1>

    @foreach($researches as $research)
        <div class="mb-6 p-4 border border-gray-300 rounded">
            <h2 class="text-xl font-semibold">{{ $research->name }}</h2>

            <!-- Display associated methods -->
            @if (!empty($research->methods))
                <h3 class="text-lg font-medium mt-2">Methods adad:</h3>
                <ul class="list-disc pl-5 mt-1">
                    @foreach($research->methods as $method)
                        <li>{{ $method['method'] }}</li>
                    @endforeach
                </ul>
            @else
                <p>No methods available for this research.</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
