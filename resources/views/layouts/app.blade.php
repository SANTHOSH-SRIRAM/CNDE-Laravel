<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Montserrat -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1"></script>


</head>

<body class="font-montserrat antialiased">
  <div class="min-h-screen bg-gray-100">
    <div class="w-full bg-white  px-12 flex flex-col py-4 gap-4">

      <div class="flex justify-between items-center">
        <div class="flex flex-row 2xl:gap-7 md:gap-4 2xl:px-8 md:px-6">
          <x-svg.iconSvg type="iit-logo" class="h-3 w-6" />
          <x-svg.iconSvg type="cnde-logo" class="h-6 w-6" />
        </div>

        <div>
          <h2 class="font-montserrat font-[600] 2xl:text-[2.1rem] md:text-[1.1rem]  tracking-wider ">
            <span class="font-montserrat font-[600] 2xl:text-[2.4rem] md:text-[1.1rem] ">C</span>ENTER
            <span class="font-montserrat font-[600] 2xl:text-[2.4rem] md:text-[1.1rem] ">F</span>OR
            <span class="font-montserrat font-[600] 2xl:text-[2.4rem] md:text-[1.1rem]  ">N</span>ON
            <span class="font-montserrat font-[600] 2xl:text-[2.4rem] md:text-[1.1rem] ">D</span>ESTRUCTIVE
            <span class="font-montserrat font-[600] 2xl:text-[2.4rem] md:text-[1.1rem] "> E</span>VALUATION
          </h2>
        </div>

        <div class="flex flex-row gap-2  justify-end px-3">
          <div class="2xl:w-24 md:w-20 border-r-[0.1rem] border-black">
            <button type="" class="bg-black text-white font-thin 2xl:text-sm md:text-[.6rem] 2xl:w-20 md:w-16 2xl:h-7 md:h-7  rounded-lg">CONTACT</button>
          </div>

          <div class="flex flex-row gap-2">
            <x-svg.iconSvg type="linkedin" class="2xl:h-2 w-6 md:h-1 w-3" />
            <x-svg.iconSvg type="instagram" class="2xl:h-2 w-6 md:h-1 w-3" />
            <x-svg.iconSvg type="facebook" class="2xl:h-2 w-6 md:h-1 w-3" />
          </div>
        </div>

      </div>
      <div class="w-full h-12 border-t border-b border-[#444f5f]/90 py-4 flex px-16 items-center">
        <div class="w-20 border-r border-[#444f5f]/90">
          <h2 class="text-base font-medium">News</h2>
        </div>
        @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
          @auth
          @include('layouts.navigation')

          @else
          <a
          @else
          <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Log in
          </a>
          </a>

          @if (Route::has('register'))
          <a
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
    </div>


    <div class="w-full bg-white  px-12 flex flex-col gap-20 items-center">
      @yield('content')
      <!-- Page Content -->

    </div>
  </div>


  
</body>

</html>