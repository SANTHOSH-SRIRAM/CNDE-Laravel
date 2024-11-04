<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="mx-auto w-full  border-y-black py-10 border-y flex justify-between" id="verticalstartup">
        <!-- Main Section -->

        <!-- Left Heading Section -->
        <div class="w-full md:w-1/3 border-r-black  border-r py-10  ">
            <h1 class="text-7xl font-montserrat font-[600] text-left w-1/2" id="col_leftstartup">OUR STARTUPS</h1>
        </div>

        <!-- Right Content Section -->
        <div class="w-3/5 grid 2xl:grid-cols-2 gap-10 ">

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
            <div class="flex flex-col justify-center items-center bg-[#F0F0F0] rounded-2xl h-60">
                <x-svg.iconSvg type="maximl" class="h-8 w-8 mr-2" aria-label="Products Icon" />

                <h2>Maximal Labs</h2>

            </div>
            <div class="flex flex-col justify-center items-center bg-[#F0F0F0] rounded-2xl h-60">
                <x-svg.iconSvg type="solinas" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                <h2>Solinas Integrity</h2>


            </div>

            <!-- Third Image with Caption -->
            <div class="flex flex-col justify-center items-center bg-[#F0F0F0] rounded-2xl h-60">
                <x-svg.iconSvg type="DAI" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                <h2>Dhvani Analytic Intelligence</h2>


            </div>
            <div class="flex flex-col justify-center items-center bg-[#F0F0F0] rounded-2xl h-60">
                <x-svg.iconSvg type="dhvani" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                <h2>Dhvani Inspection Technologies</h2>


            </div>

            <!-- Third Image with Caption -->
            <div class="flex flex-col justify-center items-center bg-[#F0F0F0] rounded-2xl h-60">
                <x-svg.iconSvg type="xyma" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                <h2>Xyma Analytics</h2>


            </div>
            <div class="flex flex-col justify-center items-center bg-[#F0F0F0] rounded-2xl h-60">
                <x-svg.iconSvg type="azeriri" class="h-8 w-8 mr-2" aria-label="Products Icon" />
                <h2>Azeriri</h2>


            </div>
        </div>

    </div>
</body>

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

    const section_1 = document.getElementById("verticalstartup");
    const col_left = document.getElementById("col_leftstartup");
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

</html>