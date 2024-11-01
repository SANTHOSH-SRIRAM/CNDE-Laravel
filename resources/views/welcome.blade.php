@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head class="w-full bg-white  px-6 flex flex-col gap-2 py-3">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="w-full bg-white  px-6 flex flex-col gap-2 py-3 h-max">
    <div class="flex flex-col gap-10">
    <img src="{{ asset('storage/' . $landing->hero_img)   }}" alt="" class="w-full h-[68.92vh]">

        <div>
            @include('landing.landingSec1', ['activeTab' => $activeTab, 'discovers' => $discovers, 'menus' => $menus])
        </div>
        <div>
            @include('landing.landingSec2', ['ouroutputs' => $ouroutputs])
        </div>
        <div>
            @include('landing.landingSec3')
        </div>
        <div>
            @include('landing.landingSec4')
        </div>
        <div>
            @include('landing.landingSec5')
        </div>
        <div>
            @include('landing.landingSec6', ['clients' => $clients])
        </div>
        <div>
            @include('landing.landingSec7')
        </div>
        <div>
            @include('landing.landingSec8')
        </div>
    </div>
</body>

</html>

@endsection
