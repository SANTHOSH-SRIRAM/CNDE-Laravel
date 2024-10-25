@extends('layouts.app')

@section('content')
    <h1>{{ $submenu->name }}</h1>
    <p>{{ $submenu->description }}</p> <!-- Adjust this based on your submenu attributes -->
    <!-- Add any additional details for the submenu here -->
@endsection
