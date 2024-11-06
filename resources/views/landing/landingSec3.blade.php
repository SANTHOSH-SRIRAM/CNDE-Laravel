<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="mx-auto w-full  ">
        <!-- Main Section -->
        <div class="flex justify-between " id="verticalResearch">
            <!-- Left Heading Section -->
            <div class="w-1/3 border-x-black border-r">
                <h1 class="2xl:text-7xl md:text-4xl font-montserrat font-[600] text-left 2xl:rotate-0 md:rotate-90 2xl:m-0 md:m-20" id="col_leftResearch">RESEARCH WORK</h1>
            </div>

            <!-- Right Content Section -->
            <div class=" w-3/5">
                <!-- First Full-width Image with Caption -->
                <div class="flex flex-col items-center mb-8">
                    <img src="\images\StateofscientificKnowledge.jpg" alt="Scientific Knowledge" class="w-full rounded-lg shadow-lg h-96">
                    <p class="mt-4 text-lg font-semibold">State of the Scientific Knowledge</p>
                </div>

                <div class="grid 2xl:grid-cols-2 md:grid-cols-1 gap-8">

                    <div class="flex flex-col items-center">
                        <img src="\images\ResearchThemes.png" alt="Research Themes" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Themes</p>
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center">
                        <img src="\images\ResearchAreas.png" alt="Research Areas" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Areas</p>
                    </div>

                    <div class="flex flex-col items-center">
                        <img src="\images\ResearchProjects.jpg" alt="Research Projects" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Projects</p>
                    </div>

                    <!-- Third Image with Caption -->
                    <div class="flex flex-col items-center">
                        <img src="\images\researchTeam.webp" alt="Research Areas" class="w-full rounded-lg shadow-lg">
                        <p class="mt-4 text-lg font-semibold">Research Teams</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t))
        });

        function raf(time) {
            lenis.raf(time);
            ScrollTrigger.update();
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);

        const section_1 = document.getElementById("verticalResearch");
        const col_left = document.getElementById("col_leftResearch");
        const timeln = gsap.timeline({
            paused: true
        });

        const height = section_1.offsetHeight - col_left.offsetHeight - 100;

        timeln.fromTo(col_left, {
            y: 0
        }, {
            y: height,
            duration: 1,
            ease: 'none'
        }, 0);

        const scroll_1 = ScrollTrigger.create({
            animation: timeln,
            trigger: section_1,
            start: 'top top',
            end: 'bottom center',
            scrub: true
        });
    </script>


</body>

</html>