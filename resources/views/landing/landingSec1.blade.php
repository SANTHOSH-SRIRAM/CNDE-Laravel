<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Tabs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex flex-row gap-5 h-screen w-full  bg-gray-100 p-5">
        <div class=" w-2/5 h-full flex align-middle items-center justify-center ">
            <img src="{{ asset('/images/fullimgcnde.jpg') }}" alt="" class="h-full ">
        </div>
        <div class="flex flex-col w-2/3 ">
            <div class="flex items-end ">
                <h1 class="font-montserrat text-7xl font-semibold text-left w-2/3 tracking-wider" for="">DISCOVER THE LATEST</h1>
                <div class=""> <x-svg.iconSvg type="discover_logo" />
                </div>


            </div>

            <div>
                

<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <li class="me-2">
            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Linkedin</a>
        </li>
        <li class="me-2">
            <a href="#" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500" aria-current="page">Events</a>
        </li>
        <li class="me-2">
            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Announcement</a>
        </li>
        <li class="me-2">
            <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Recent Conference</a>
        </li>
        <li>
            <a class="inline-block p-4 text-gray-400 rounded-t-lg cursor-not-allowed dark:text-gray-500">Recent Publications</a>
        </li>
    </ul>
</div>

            </div>
            <div>
                <div class="">
                    <div class="relative right-0">
                        <!-- Loop through the sections and display the names in the navigation list -->
                        <ul class="relative flex flex-row gap-4 p-1 list-none rounded-xl bg-blue-gray-50/60" role="list">
                            @foreach ($discovers as $discover)
                            @if (isset($discover['discovers']) && is_array($discover['discovers']))
                            @foreach ($discover['discovers'] as $section)
                            <li class="z-30 flex-auto text-center">
                                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" href="{{ route('tabs.show', $section['section_name']) }}">
                                    <span class="ml-1">{{ strtoupper($section['section_name']) }}</span>
                                </a>
                            </li>
                            @endforeach
                            @endif
                            @endforeach
                        </ul>

                        <div class="p-5">
                            <!-- Content based on the active tab -->


                            <!-- Display the corresponding content for the selected section -->
                            @foreach ($discovers as $discover)
                            @if (isset($discover['discovers']) && is_array($discover['discovers']))
                            @foreach ($discover['discovers'] as $section)
                            @if ($activeTab === $section['section_name'])

                            <img src="{{ asset('storage/' .$section['images']) }}" alt="{{ $section['section_name'] }}" class="w-56">
                            <p>{{ $section['description'] }}</p>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>