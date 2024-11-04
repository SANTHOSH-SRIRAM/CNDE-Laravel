<!-- resources/views/research/show.blade.php -->

@extends('layouts.app')

@section('content')
@include('layouts.bigHeading', ['submenuName' => $submenu->name] , 'submenuimg'=>$researches->submenu->image])


@foreach($researches as $research)
<div class="container justify-between flex items-stretch ">
    <div>
        <h1 class="text-7xl font-bold">{{ $research ->name }}</h1>
    </div>

    <div class="flex-col items-center">
        @foreach($research->methods as $method)
        <div class="mt-10"> <img src="{{ asset('storage/' . $method['photo'] )}}" alt="">
            <h2 class="flex justify-center text-3xl font-bold mt-5">{{ $method['method'] }}</h2>
            <a href="">{{ $method['description'] }}</a>
        </div>
        @endforeach
    </div>






</div>
@endforeach

@endsection
