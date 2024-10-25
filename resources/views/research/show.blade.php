@extends('layouts.app')

@section('content')
@include('layouts.bigHeading', ['submenuName' => $research->submenu->name])

<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold">{{ $research->submenu->name }}</h1>
    <h1 class="text-2xl font-bold">{{ $research->name }}</h1>
    <h3 class="text-lg font-medium mt-2">Methods:</h3>
            <ul class="list-disc pl-5 mt-1">
                @foreach($research->methods as $method)
                    <li>{{ $method['method'] }}</li>
                    <img src="{{ asset('storage/' . $method['photo'] )}}" alt="">
                    <a href="">{{ $method['description'] }}</a>
                @endforeach
            </ul>
            

    <!-- Display Menu Information -->



</div>
@endsection