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
            <div class="flex flex-col ">
                <h1 class="text-7xl font-extrabold text-left w-2/4" for="">DISCOVER THE LATEST</h1>
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
