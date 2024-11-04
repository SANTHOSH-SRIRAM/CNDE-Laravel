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
        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
        }

        .divider {
            border-left: 1px solid #000;
        }
    </style>
</head>

<body class="bg-white">

    <!-- Clients Section -->
    <div class="mx-auto w-full flex border-y-black py-10 border-y justify-between">
        <!-- Left Section: Our Clients Title -->
        <div class="w-1/3 border-x-black border-r flex">
            <h1 class="text-7xl font-montserrat font-[600] text-left w-1/2">OUR CLIENTS</h1>
        </div>

       

        <!-- Right Section: Categories and Logos -->
        <div class="w-2/3">

            <div class="flex flex-col gap-8">
                @foreach($clients as $client)
                    <div class="w-full flex justify-center">
                        <h2 class="text-2xl font-semibold border-y-black py-4 border-y">{{ $client->section }}</h2>
                    </div>

                    <div class="mb-10"> <!-- Added margin-bottom for gap between clients -->
                        <div class="swiper mySwiperAerospace">
                            <div class="swiper-wrapper">
                                @if(!empty($client->logo_paths))
                                    @foreach($client->logo_paths as $logo)
                                        <div class="swiper-slide flex justify-center">
                                            <!-- Check if logo path exists -->
                                            @if(isset($logo['logo']))
                                                <img src="{{ asset('storage/' . $logo['logo']) }}" alt="Client Logo" class="h-24">
                                            @else
                                                <p>No logo available</p>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="swiper-slide flex justify-center">
                                        <p>No logos available</p>
                                    </div>
                                @endif
                            </div>
                            <!-- Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

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
