<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto px-4">
        <!-- Main Section -->
        <div class="flex flex-col md:flex-row gap-6 my-12">
            <!-- Left Heading Section -->
            <div class="w-full md:w-1/3">
                <h1 class="text-4xl font-bold">RESEARCH WORK</h1>
            </div>

            <!-- Right Content Section -->
            <div class="w-full md:w-2/3">
                <!-- First Full-width Image with Caption -->
                <div class="flex flex-col items-center mb-8">
                    <img src="\images\StateofscientificKnowledge.jpg" alt="Scientific Knowledge" class="w-full rounded-lg shadow-lg h-96">
                    <p class="mt-4 text-lg font-semibold">State of the Scientific Knowledge</p>
                </div>

                <!-- Two-column Layout for the Next Images -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Second Image with Caption -->
                    <div class="flex flex-col items-center">
                        <img src="\images\ResearchThemes.png" alt="Research Themes" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Themes</p>
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center">
                        <img src="\images\ResearchAreas.png" alt="Research Areas" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Areas</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Second Image with Caption -->
                    <div class="flex flex-col items-center">
                        <img src="\images\ResearchProjects.jpg" alt="Research Themes" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Themes</p>
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center">
                        <img src="\images\researchTeam.webp" alt="Research Areas" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Areas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>