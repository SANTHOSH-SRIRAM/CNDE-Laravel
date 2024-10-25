@extends('layouts.app')

@section('content')
@include('layouts.bigHeading', ['submenuName' => $startup->submenu->name])

<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold">{{ $startup->submenu->name }}</h1>
    <p><strong>Vision:</strong> {{ $startup->vision }}</p>
    <p><strong>Mission:</strong> {{ $startup->mission }}</p>
    <p><strong>About:</strong> {{ $startup->about }}</p>

    <!-- Display Menu Information -->


    <script>
        // Log the ID to the console
        console.log('Startup ID:', '{{ $startup->id }}');
    </script>
</div>
@endsection
