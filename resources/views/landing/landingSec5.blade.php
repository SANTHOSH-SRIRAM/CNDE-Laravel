<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mx-auto px-4 border-y-black py-10 border-y">
        <!-- Main Section -->
        <div class="flex flex-col md:flex-row gap-6 my-12 ">
            <!-- Left Heading Section -->
            <div class="w-full md:w-1/3 border-r-black py-10 border-r">
                <h1 class="text-7xl font-extrabold text-left">OUR STARTUPS</h1>
            </div>

            <!-- Right Content Section -->
            <div class="w-full md:w-2/3 flex flex-col gap-y-4">
                <!-- First Full-width Image with Caption -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 ">
                    <!-- Second Image with Caption -->
                    @foreach ($startups as $startup)
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72 ">
                        <img src="{{ $startup->submenu->image ? asset('storage/' . $startup->submenu->image) : '' }}" alt="">
                        <span>{{ $startup->submenu->name }}</span>
                        
                    </div>
                    @endforeach
                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                        
                    <x-svg.iconSvg type="planys" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                        <span>Planys Technology</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Second Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                        
                    <x-svg.iconSvg type="detect" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                    <span>Detect Technologies</span>
                        
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                    <x-svg.iconSvg type="maximl" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                        
                    <span>Maximal Labs</span>
                        
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Second Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                    <x-svg.iconSvg type="solinas" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                    <span>Solinas Integrity</span>
                        
                        
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                    <x-svg.iconSvg type="DAI" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                    <span>Dhvani Analytic Intelligence</span>
                        
                        
                    </div>
                </div>
                <!-- Two-column Layout for the Next Images -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Second Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                    <x-svg.iconSvg type="dhvani" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                    <span>Dhvani Inspection Technologies</span>
                        
                        
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                    <x-svg.iconSvg type="xyma" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                    <span>Xyma Analytics</span>
                        
                        
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Second Image with Caption -->
                    <div class="flex flex-col items-center bg-[#F0F0F0] rounded-3xl h-72">
                    <x-svg.iconSvg type="azeriri" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                    <span>Azeriri</span>
                        
                        
                    </div>

                    <!-- Third Image with Caption -->

                </div>
            </div>
        </div>
    </div>
</body>
</html>