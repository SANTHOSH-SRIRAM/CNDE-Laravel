<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE Clients</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <!-- Main Image Section -->
    <div class="relative">
        @if($landing)
        <img src="{{ asset('storage/' . $landing->footer_img) }}" alt="" class="w-full h-[68.92vh]">
        @else
        <!-- Optional: Display a default image or message -->
        <p>No footer image available.</p>
        @endif
    </div>

    <!-- Container -->
    <div class="relative   px-4 py-8 flex justify-between items-start bg-white rounded-t-xl w-full -mt-20 border border-b-black">

        <!-- Left Section -->
        <div class="w-1/2 flex flex-col gap-5 ">
            <!-- Logo -->
            <x-svg.iconSvg type="cnde-logo" class="h-10 w-10" />


            <!-- Address Information -->
            <h1 class="text-3xl font-montserrat font-[500] w-1/2">CENTER FOR NON DESTRUCTIVE EVALUATION</h1>
            <p class="mt-2">Room 312, Machine Design Section,</p>
            <p>Indian Institute of Technology Madras</p>
            <p>Chennai 600036 India</p>

            <!-- Social Icons -->
            <div class="flex space-x-4 mt-6">
                <x-svg.iconSvg type="linkedin" class="h-2 w-6" />
                <x-svg.iconSvg type="instagram" class="h-2 w-6" />
                <x-svg.iconSvg type="facebook" class="h-2 w-6" />
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-1/2 text-left flex justify-between">
            <div class="w-1/3">
                <h2 class="text-xl font-bold mb-4">Pages</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-lg text-gray-700 hover:text-black">RESEARCH</a></li>
                    <li><a href="#" class="text-lg text-gray-700 hover:text-black">STARTUPS</a></li>
                    <li><a href="#" class="text-lg text-gray-700 hover:text-black">ACADEMICS</a></li>
                    <li><a href="#" class="text-lg text-gray-700 hover:text-black">FACILITIES</a></li>
                    <li><a href="#" class="text-lg text-gray-700 hover:text-black">COLLABORATION</a></li>
                    <li><a href="#" class="text-lg text-gray-700 hover:text-black">BE INSPIRED</a></li>
                </ul>
            </div>

            <!-- Google Map -->
            <div class="w-2/3">
                <iframe class="w-full h-80" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.232649839081!2d79.14099701532491!3d13.00646919082598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267d2df2f5f65%3A0xa291b6051f2923dc!2sIndian%20Institute%20of%20Technology%20Madras!5e0!3m2!1sen!2sin!4v1626423093123!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="text-center py-4">
        <p class="text-sm text-gray-500">&copy; 2024 COPYRIGHT BY CNDE IIT MADRAS.</p>
    </div>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</body>

</html>