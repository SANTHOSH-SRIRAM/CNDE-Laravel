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
        <div>
            <span class="text-4xl font-bold">OUR VALUES</span>
        </div>
        <div class="flex flex-col md:flex-row gap-6 my-12">
            <div>
            <img src="\images\OurValues.png" alt="Our Values" class="w-full rounded-lg shadow-lg h-96">

            </div>
            <div class="flex flex-col">
                <div class="flex flex-row">
                    <div>
                    <x-svg.iconSvg type="value1" class="h-8 w-8 mr-2" aria-label="Products Icon" />

                    </div>
                    <div class="flex flex-col">
                        <span>MISSION</span>
                        <p>Deep-research based non-destructive technologies for improved performance, enhanced safety, and increased life for industrial applications and relevant technologies for societal well-being.</p>
                    </div>
                </div>
                <div class="flex flex-row">
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
                <div class="flex flex-row">
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