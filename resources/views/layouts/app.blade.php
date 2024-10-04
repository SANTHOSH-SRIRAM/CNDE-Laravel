<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
        <div class="w-full bg-white  px-6 flex flex-col gap-2 py-3">
    <div class="flex flex-row gap-2 w-full justify-end px-3">
      <div class="w-24 border-r-2 border-black">
        <button type="" class="bg-black text-white font-thin text-xs w-20 h-7 font-poppins rounded-lg">CONTACT</button>
      </div>

      <div class="flex flex-row gap-2">
        <x-svg.iconSvg type="linkedin" class="h-2 w-6" />
        <x-svg.iconSvg type="instagram" class="h-2 w-6" />
        <x-svg.iconSvg type="facebook" class="h-2 w-6" />
      </div>
    </div>
    <div class="flex flex-row items-center  gap-32 px-20">
      <div class="flex flex-row gap-10">
        <x-svg.iconSvg type="iit-logo" class="h-2 w-6" />
        <x-svg.iconSvg type="cnde-logo" class="h-6 w-6" />
      </div>
      <label for="Title" class="font-montserrat font-bold text-4xl ">CENTER FOR NON DESTRUCTIVE EVALUATION</label>
    </div>
    <div class="w-full h-16 border-t border-b border-[#444f5f]/90 py-4 flex px-16 items-center">
      <div class="w-20 border-r border-[#444f5f]/90">
        <label for="">News</label>
      </div>
      @if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
        @auth
        @include('layouts.navigation')

        @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Log in
        </a>

        @if (Route::has('register'))
        <a
            href="{{ route('register') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Register
        </a>
        @endif
        @endauth
    </nav>
    @endif
    </div>
    <div>
      @include('menuItems')
    </div>

  </div>

<!-- Page Heading -->
@isset($header)
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
@endisset

<div class="w-full bg-white  px-6 flex flex-col gap-2 py-3">
            @yield('content')
            <!-- Page Content -->

            </div>     
        </div>
    </body>
    
</html>
