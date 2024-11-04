<div class="w-full bg-white flex flex-row gap-8">
    <ul class="flex gap-3">
        @foreach($menus as $menu)
        <li class="relative group hover:bg-slate-500">
            <a href="{{ $menu->url }}" class="text-black text-xs font-semibold uppercase font-montserrat px-5  hover:text-white flex items-center justify-center underline gap-2">
                {{ $menu->name }}
                @if ($menu->submenus->isNotEmpty())
                <x-svg.iconSvg type="menu-arrow" class="h-2 w-2" />
                @endif
            </a>
            @if($menu->submenus->isNotEmpty())
            <div class="w-full bg-white">
                <ul class="absolute left-0   flex-row  bg-white border border-gray-200 shadow-lg hidden group-hover:flex z-10">
                    @foreach($menu->submenus->groupBy('subparent_name') as $subparentName => $submenus)
                    <li class="flex flex-col w-96">
                        <span class="font-semibold  text-gray-700 px-4 py-2 bg-gray-100">{{ $subparentName }}</span>
                        <ul>
                            @foreach($submenus as $submenu)
                            <li class="px-4 py-1 hover:bg-gray-100">
                                <!-- Check if submenu has startups or research -->
                                @if ($submenu->startups->isNotEmpty() && $submenu->research->isNotEmpty())
                                <a href="{{ route('startups.show', $submenu->startups->first()->id) }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }} - Startup: {{ $submenu->startups->first()->name }}
                                </a>
                                <a href="{{ route('research.show', $submenu->research->first()->id) }}" class="text-gray-700 hover:text-black">
                                    - Research: {{ $submenu->research->first()->name }}
                                </a>
                                @elseif ($submenu->startups->isNotEmpty())
                                <a href="{{ route('startups.show', $submenu->startups->first()->id) }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }} - Startup: {{ $submenu->startups->first()->name }}
                                </a>
                                @elseif ($submenu->research->isNotEmpty())
                                <a href="{{ route('research.show', ['submenu_name' => $submenu->name]) }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }}
                                </a>


                                @elseif ($submenu->product->isNotEmpty())
                                <a href="{{ route('product.show', $submenu->product->first()->id) }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }}
                                </a>
                                @elseif ($submenu->fundedresearch->isNotEmpty())
                                <a href="{{ route('fundedresearch.show', $submenu->fundedresearch->first()->id) }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }}
                                </a>

                                @elseif ($submenu->students->isNotEmpty())
                                <a href="{{ route('students.show', $submenu->students->first()->id)  }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }}
                                </a>

                                @elseif ($submenu->professors->isNotEmpty())
                                <a href="{{ route('professor.index', $submenu->professors->first()->id) }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }}
                                </a>

                                @elseif ($submenu->name === 'Scientific Publications')
                                <a href="{{ route('publications.index') }}" class="text-gray-700 hover:text-black">
                                    {{ $submenu->name }}
                                </a>
                                @else
                                <span class="text-gray-700">{{ $submenu->name }} - No linked data</span>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
</div>