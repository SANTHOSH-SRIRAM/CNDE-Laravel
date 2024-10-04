<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNDE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="flex flex-row h-96">

        <div></div>
        <div class="flex flex-row bg-gray-500 w-screen">
            <div class="flex flex-row">
                <label for="">DISCOVER THE LATEST</label>
            </div>
            <div>
                <div class="w-2/3">
                    <div class="relative right-0">
                        <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60" role="list">
                            <li class="z-30 flex-auto text-center">
                                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" href="{{ route('tabs.show', 'news') }}">
                                    <span class="ml-1">NEWS</span>
                                </a>
                            </li>
                            <li class="z-30 flex-auto text-center">
                                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" href="{{ route('tabs.show', 'events') }}">
                                    <span class="ml-1">EVENTS</span>
                                </a>
                            </li>
                            <li class="z-30 flex-auto text-center">
                                <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit" href="{{ route('tabs.show', 'announcements') }}">
                                    <span class="ml-1">ANNOUNCEMENT</span>
                                </a>
                            </li>
                        </ul>

                        <div class="p-5">
                            @if ($activeTab === 'news')
                            <p>This is the News section content.</p>
                            @elseif ($activeTab === 'events')
                            <p>This is the Events section content.</p>
                            @elseif ($activeTab === 'announcements')
                            <p>This is the Announcements section content.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>
</body>

</html>