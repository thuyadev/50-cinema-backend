<div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease-soft" x-data="{ isGlobalOpen: false }">
    <span class="absolute top-1 bottom-0 left-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </span>
    <input @click.away="isGlobalOpen = false"
           @focus="isGlobalOpen = true" type="text" wire:model.debounce.300ms="global_search" name="global_search" id="global_search" class="block w-full h-9 pl-9 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Type Here..." autocomplete="off">
    <svg wire:loading class="absolute top-2 right-2 spinner animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>

    @if (!is_null($datas) && count($datas) > 0)
        <div style="height: 200px;" class="absolute bg-gray-800 rounded w-64 mt-1 z-10 top-10 overflow-y-auto"
             x-show.transition.opacity="isGlobalOpen"
             @keydown.escape.window="isGlobalOpen = false"
        >
            <ul>
                @if(count($datas['movies']) > 0)
                    <li class="border-b bg-gray-700 px-3 py-2">
                        <p class="font-bold mb-0 text-sm text-white">Movies</p>
                    </li>
                    @foreach ($datas['movies'] as $movie)
                        <li class="border-b bg-gray-700 px-3 py-3">
                            <div class="block hover:bg-gray-700 cursor-pointer dark:text-white text-sm">
                                <div class="flex justify-between">
                                    <div class="movie-image-title flex items-center">
                                        @if ($movie['movie_poster'])
                                            <img src="{{ $movie['movie_poster'] }}" alt="movie poster" class="w-6 mr-2">
                                        @else
                                            <img src="https://via.placeholder.com/50x75" alt="movie poster" class="w-6 mr-2">
                                        @endif
                                        {{ $movie['name'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif

                @if(count($datas['genres']) > 0)
                    <li class="border-b bg-gray-700 px-3 py-2">
                        <p class="font-bold mb-0 text-sm text-white">Genres</p>
                    </li>
                    @foreach ($datas['genres'] as $genre)
                        <li class="border-b bg-gray-700 px-6 py-3">
                            <div class="block hover:bg-gray-700 cursor-pointer dark:text-white text-sm">
                                <div class="flex justify-between">
                                    <div class="movie-image-title flex items-center">
                                        {{ $genre['name'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif

                @if(count($datas['users']) > 0)
                    <li class="border-b bg-gray-700 px-3 py-2">
                        <p class="font-bold mb-0 text-sm text-white">Users</p>
                    </li>
                    @foreach ($datas['users'] as $user)
                        <li class="border-b bg-gray-700 px-6 py-3">
                            <div class="block hover:bg-gray-700 cursor-pointer dark:text-white text-sm">
                                <div class="flex justify-between">
                                    <div class="movie-image-title flex items-center">
                                        {{ $user['name'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif

                @if(count($datas['crews']) > 0)
                    <li class="border-b bg-gray-700 px-3 py-2">
                        <p class="font-bold mb-0 text-sm text-white">Crews</p>
                    </li>
                    @foreach ($datas['crews'] as $crew)
                        <li class="border-b bg-gray-700 px-6 py-3">
                            <div class="block hover:bg-gray-700 cursor-pointer dark:text-white text-sm">
                                <div class="flex justify-between">
                                    <div class="movie-image-title flex items-center">
                                        {{ $crew['name'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>
    @endif
</div>
