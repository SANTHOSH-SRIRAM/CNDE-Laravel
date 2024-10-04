<div class="w-full bg-white flex flex-row gap-8">
    <ul class="flex gap-3">
        @foreach($menus as $menu)
            <li class="relative group hover:bg-slate-500">
                <a href="{{ $menu->url }}" class="text-black text-sm font-montserrat px-5 block hover:text-white flex items-center gap-2">
                    {{ $menu->name }}
                    @if ($menu->submenus->isNotEmpty())
                        <x-svg.iconSvg type="menu-arrow" class="h-6 w-6" />
                    @endif
                </a>
                @if($menu->submenus->isNotEmpty())
                    <div class="w-full bg-white">
                        <ul class="absolute left-0 mt-2 flex flex-col space-y-2 bg-white border border-gray-200 shadow-lg hidden group-hover:flex z-10">
                            @foreach($menu->submenus->groupBy('subparent_name') as $subparentName => $submenus)
                                <li class="flex flex-col w-96">
                                    <span class="font-semibold text-gray-700 px-4 py-2 bg-gray-100">{{ $subparentName }}</span>
                                    <ul>
                                        @foreach($submenus as $submenu)
                                            <li class="px-4 py-1 hover:bg-gray-100">
                                                <a href="{{ $submenu->url }}" class="text-gray-700 hover:text-black">{{ $submenu->name }}</a>
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
