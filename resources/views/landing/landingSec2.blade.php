<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container mx-auto px-4 flex border-y-black py-10 border-y">
        <header class=" w-1/2 border-x-black border-r flex flex-col gap-3">
            <h1 class="text-7xl font-extrabold text-left ">OUR</h1>
            <h1 class="text-7xl font-extrabold text-left ">OUTPUT</h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 w-full ml-6">
            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex  ">
                    <x-svg.iconSvg type="products" class="h-6 w-6 mr-2" aria-label="Products Icon" />
                </div>
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold">PRODUCTS</h2>

                    <p class="text-gray-700">Our team has developed cutting-edge solutions to address various challenges in non-destructive evaluation, pushing the boundaries of what's possible in this field.</p>
                </div>
            </div>

            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex">
                    <x-svg.iconSvg type="startups" class="h-6 w-6 mr-2" aria-label="Startups Icon" />
                </div>
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold">STARTUPS</h2>

                    <p class="text-gray-700">Explore the entrepreneurial spirit of CNDE lab as we introduce you to the startups that have sprouted from our innovative research. These ventures aim to transform our research findings into real-world solutions.</p>
                </div>
            </div>

            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex ">
                    <x-svg.iconSvg type="publications" class="h-6 w-6 mr-2" aria-label="Publications Icon" />
                </div>
                <div class="flex flex-col">
                    <h2 class="text-xl font-semibold">PUBLICATIONS</h2>


                    <p class="text-gray-700">Delve into the wealth of knowledge that CNDE lab has contributed to the field of non-destructive evaluation. Our publications cover a wide range of topics, providing valuable insights and research findings.</p>
                </div>
            </div>
            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex ">
                    <x-svg.iconSvg type="patents" class="h-6 w-6 mr-2" aria-label="Patents Icon" />
                </div>
                <div class="flex flex-col">

                <h2 class="text-xl font-semibold">PATENTS</h2>

                <p class="text-gray-700">Innovation is at the core of CNDE lab, and our patent portfolio is a testament to this commitment. Discover the groundbreaking technologies and inventions that have earned us patents.</p>
                </div>
            </div>


            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex ">
                    <x-svg.iconSvg type="awards" class="h-6 w-6 mr-2" aria-label="Awards Icon" />
                </div>
                <div class="flex flex-col">

                <h2 class="text-xl font-semibold">AWARDS & CERTIFICATES</h2>

                <p class="text-gray-700">CNDE lab's dedication to excellence is acknowledged through various awards and certificates. Explore our achievements and the recognition we've received for our contributions to the field.</p>
                </div>
            </div>

            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex ">
                    <x-svg.iconSvg type="talent-development" class="h-6 w-6 mr-2" aria-label="Talent Development Icon" />
                </div>
                <div class="flex flex-col">
                <h2 class="text-xl font-semibold">TALENT DEVELOPMENT</h2>

                <p class="text-gray-700">We believe in nurturing the next generation of NDE experts. Learn about our talent development programs and how we're shaping the future of non-destructive evaluation through education and mentorship.</p>
                </div>
            </div>

            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex ">
                    <x-svg.iconSvg type="publications" class="h-6 w-6 mr-2" aria-label="Collaborations Icon" />
                </div>
                <div class="flex flex-col">
                <h2 class="text-xl font-semibold">COLLABORATIONS</h2>

                <p class="text-gray-700">Collaboration is key to our success. Explore the partnerships and collaborations that have allowed CNDE lab to pool resources, expertise, and creativity, resulting in impactful advancements in NDE.</p>
                </div>
            </div>



            <div class="flex flex-row p-4 border border-gray-200 rounded-lg gap-2">
                <div class="flex ">
                    <x-svg.iconSvg type="social-impacts" class="h-6 w-6 mr-2" aria-label="Social Impacts Icon" />
                </div>
                <div class="flex flex-col">
                <h2 class="text-xl font-semibold">SOCIAL IMPACTS</h2>

                <p class="text-gray-700">Beyond the lab, CNDE is making a difference in society. Discover the positive social impacts our research and initiatives have had, from safety enhancements to environmental benefits.</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>