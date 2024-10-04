<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE Clients</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        /* Customize Swiper button colors */
        .swiper-button-next, .swiper-button-prev {
            color: #000;
        }

        .divider {
            border-left: 1px solid #000;
        }
    </style>
</head>

<body class="bg-white">

    <!-- Clients Section -->
    <div class="container mx-auto py-12 flex">
        <!-- Left Section: Our Clients Title -->
        <div class="w-1/4 flex flex-col justify-center">
            <h1 class="text-5xl font-bold tracking-wide">OUR CLIENTS</h1>
        </div>

        <!-- Divider -->
        <div class="divider h-auto mx-8"></div>
@foreach($clients as client)
        <!-- Right Section: Categories and Logos -->
        <div class="w-3/4">
            <!-- Aerospace Logos Carousel -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold mb-4  ">AEROSPACE</h2>
                <div class="swiper mySwiperAerospace">
                    <div class="swiper-wrapper">
                        <!-- Logo 1 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/isro.png') }}" alt="ISRO Logo" class="h-24">
                        </div>
                        <!-- Logo 2 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/ge.png') }}" alt="GE Logo" class="h-24">
                        </div>
                        <!-- Logo 3 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/hal.png') }}" alt="HAL Logo" class="h-24">
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/hal.png') }}" alt="HAL Logo" class="h-24">
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/hal.png') }}" alt="HAL Logo" class="h-24">
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/hal.png') }}" alt="HAL Logo" class="h-24">
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/hal.png') }}" alt="HAL Logo" class="h-24">
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/hal.png') }}" alt="HAL Logo" class="h-24">
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- Manufacturing Logos Carousel -->
            <div class="mb-12">
                <h2 class="text-2xl font-semibold mb-4 ">MANUFACTURING</h2>
                <div class="swiper mySwiperManufacturing">
                    <div class="swiper-wrapper">
                        <!-- Logo 4 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/tata_steel.png') }}" alt="Tata Steel Logo" class="h-24">
                        </div>
                        <!-- Logo 5 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/sieger.png') }}" alt="Sieger Logo" class="h-24">
                        </div>
                        <!-- Logo 6 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/havells.png') }}" alt="Havells Logo" class="h-24">
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <!-- Defence Logos Carousel -->
            <div>
                <h2 class="text-2xl font-semibold mb-4 ">DEFENCE</h2>
                <div class="swiper mySwiperDefence">
                    <div class="swiper-wrapper">
                        <!-- Logo 7 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/logo7.png') }}" alt="Defence Logo 1" class="h-24">
                        </div>
                        <!-- Logo 8 -->
                        <div class="swiper-slide flex justify-center">
                            <img src="{{ asset('path_to_image/logo8.png') }}" alt="Defence Logo 2" class="h-24">
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper with Autoplay for Aerospace
        var swiperAerospace = new Swiper(".mySwiperAerospace", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },

        });

        // Initialize Swiper with Autoplay for Manufacturing
        var swiperManufacturing = new Swiper(".mySwiperManufacturing", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Initialize Swiper with Autoplay for Defence
        var swiperDefence = new Swiper(".mySwiperDefence", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

</body>

</html>
