<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', $submenuName ?? 'Default Submenu') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="w-full h-dvh flex flex-row justify-center items-center border-b border-black">
        <h1 class="uppercase font-black text-8xl ">{{ $submenuName ?? 'Default Submenu' }}</h1>
        <img class="inline" src="{{ asset('storage/' . $submenuimg)   }}" alt="...">

    </div>
</body>

</html>