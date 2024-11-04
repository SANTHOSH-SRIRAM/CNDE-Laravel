<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div>
        <div class="border-y-black py-10 border-y w-full flex justify-center ">
            <span class="text-7xl font-montserrat font-[600]">OUR VALUES</span>
        </div>
        <div class="flex flex-col md:flex-row gap-6 my-12 border-y-black py-10 border-y">
            <div class="w-2/3 border-x-black pr-10 border-r">
            <img src="\images\OurValues.png" alt="Our Values" class="w-full rounded-lg  h-96">

            </div>
            <div class="flex flex-col gap-5">
                <div class="flex flex-row gap-3">
                    <div>
                    <x-svg.iconSvg type="value1" class="h-8 w-8 mr-2" aria-label="Products Icon" />

                    </div>
                    <div class="flex flex-col">
                        <span>MISSION</span>
                        <p>Deep-research based non-destructive technologies for improved performance, enhanced safety, and increased life for industrial applications and relevant technologies for societal well-being.</p>
                    </div>
                </div>
                <div class="flex flex-row gap-3">
                    <div>
                    <x-svg.iconSvg type="value2" class="h-8 w-8 mr-2" aria-label="Products Icon" />

                    </div>
                    <div class="flex flex-col">
                        <span>VISION</span>
                        <ul>
                            <li>To provide enhanced education and training in the area of NDE.</li>
                            <li>To perform basic scientific and /or industrially relevant research and to develop new understanding, and innovative products and processes.</li>
                            <li>To provide a focal point for information and technology transfer.</li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-row gap-3">
                    <div>
                    <x-svg.iconSvg type="value3" class="h-8 w-8 mr-2" aria-label="Products Icon" />

                    </div>
                    <div class="flex flex-col">
                        <span>PERCEPTION</span>
                        <ul>
                            <li>Raw Materials Qualification</li>
                            <li>Manufacturing Quality Assurance</li>
                            <li>Inservice Inspection</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>