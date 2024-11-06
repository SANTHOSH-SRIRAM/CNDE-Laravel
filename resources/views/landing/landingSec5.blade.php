<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="mx-auto w-full">
        <!-- Main Section -->
        <div class="flex justify-between" id="verticalstartup">
            <!-- Left Heading Section -->
            <div class="w-full md:w-1/3 border-r-black border-r py-10">
                <h1 class="2xl:text-7xl md:text-4xl font-montserrat font-[600] text-left 2xl:rotate-0 md:rotate-90 2xl:m-0 md:m-20" id="col_leftstartup">OUR STARTUPS</h1>
            </div>

            <!-- Right Content Section -->
            <div class="w-3/5 grid 2xl:grid-cols-2 gap-10 items-center justify-center">
                <!-- Loop through each startup -->
                @foreach ($startups as $startup)
                <div class="flex flex-col items-center justify-center bg-[#F0F0F0] rounded-3xl h-72">
                    <div class="flex flex-col w-96 mr-2 items-center">
                        <img src="{{ $startup->submenu->image ? asset('storage/' . $startup->submenu->image) : '' }}" alt="" class="object-contain">
                    </div>
                    <span class="mt-4 font-semibold text-lg">{{ $startup->submenu->name }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

            const section_1 = document.getElementById("verticalstartup");
            const col_left = document.getElementById("col_leftstartup");

            const updateHeight = () => {
                const height = section_1.offsetHeight - col_left.offsetHeight - 100;

                const timeln = gsap.timeline({ paused: true });
                timeln.fromTo(col_left, { y: 0 }, { y: height, duration: 1, ease: 'none' });

                ScrollTrigger.create({
                    animation: timeln,
                    trigger: section_1,
                    start: 'top top',
                    end: `+=${height}`,
                    scrub: true
                });
            };

            window.addEventListener("load", updateHeight);
            window.addEventListener("resize", updateHeight);
        });
    </script>

</body>
</html>
