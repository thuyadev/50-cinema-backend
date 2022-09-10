<div x-data="{ isOpen: true, isOpenModal: false, isTrailerOpen: false }">
    <div class="imdb-search relative" >
        <span class="absolute top-1 bottom-0 left-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </span>
        <input @click.away="isOpen = false"
               @focus="isOpen = true"
               @keydown="isOpen = true"
               type="text"
               wire:model.debounce.300ms="search_imdb" name="search" id="search" class="block w-full h-9 pl-9 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
               placeholder="Search From MovieDB..." autocomplete="off">
        <svg wire:loading class="absolute top-2 right-2 spinner animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>

        @if (!is_null($imdb_movies) && count($imdb_movies) > 0)
            <div class="absolute bg-gray-800 rounded w-64 mt-1"
                 x-show.transition.opacity="isOpen"
                 @keydown.escape.window="isOpen = false"
            >
                <ul>
                    @forelse ($imdb_movies as $im_movie)
                        @if ($loop->index < 5)
                            <li class="border-b bg-gray-700 px-3 py-3">
                                <div class="block hover:bg-gray-700 cursor-pointer dark:text-white text-sm">
                                    <div class="flex justify-between">
                                        <div class="movie-image-title flex items-center">
                                            @if ($im_movie['poster_path'])
                                                <img src="https://image.tmdb.org/t/p/w92/{{ $im_movie['poster_path'] }}" alt="movie poster" class="w-7 mr-2">
                                            @else
                                                <img src="https://via.placeholder.com/50x75" alt="movie poster" class="w-8 mr-2">
                                            @endif
                                            {{ $im_movie['title'] }}
                                        </div>
                                        <button
                                            @click="
                                                       isOpen = false
                                                       $wire.getFromImdb({{ $im_movie['id'] }})
                                                       isOpenModal = true
                                                    "
                                                type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                            </svg>
                                            <span class="sr-only">Icon description</span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @empty
                        <li class="border-b bg-gray-700 px-3 py-3">
                            No results found for "{{ $search_imdb }}"
                        </li>
                    @endforelse
                </ul>
            </div>
        @endif

    </div>

    <div x-show="isOpenModal" id="extralarge-modal" tabindex="-1" class="dark:bg-gray-700/70 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full" style="z-index: 1000;">
        @if($imdb_movie)
            <div class="relative p-4 w-full max-w-7xl h-full md:h-auto m-auto">
            <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                         <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-0">
                            Confirmation
                         </h3>
                        <button @click="isOpenModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="extralarge-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="movie-info p-6 space-y-6">
                        <div class="container mx-auto flex flex-col md:flex-row">
                            <img src="{{ $imdb_movie['movie_poster'] }}" alt="movie image" class="w-96">

                            <div class="md:ml-24">
                                <h2 class="text-4xl mt-4 md:mt-0 font-semibold text-white">{{ $imdb_movie['name'] }}</h2>
                                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                                    <span>{{ $imdb_movie['release_date'] }}</span>
                                    <span class="mx-2">|</span>
                                    <span>
                                        @foreach ($imdb_movie['genres'] as $genre)
                                            {{ $genre['name'] }}@if (!$loop->last),@endif
                                        @endforeach
                                    </span>
                                </div>

                                <p class="text-gray-300 mt-8">
                                    {{ $imdb_movie['description'] }}
                                </p>

                                <h4 class="text-white font-semi-bold">Director</h4>
                                <div class="flex mt-2">
                                    <div class="mr-8">
                                        <div>{{ $imdb_movie['director'] ? $imdb_movie['director']['original_name'] : $imdb_movie }}</div>
                                    </div>
                                </div>

                                @if ($imdb_movie['trailer'])
                                    <div class="mt-12">
                                        <button
                                            @click="isTrailerOpen = true"
                                            class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                            <span class="ml-2">Play Trailer</span>
                                        </button>
                                    </div>

                                    <template x-if="isTrailerOpen">
                                        <div
                                            style="background-color: rgba(0, 0, 0, .5);"
                                            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                        >
                                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                                <div class="bg-gray-900 rounded">
                                                    <div class="flex justify-end pr-4 pt-2">
                                                        <button
                                                            @click="isTrailerOpen = false"
                                                            @keydown.escape.window="isTrailerOpen = false"
                                                            class="text-3xl leading-none hover:text-gray-300">&times;
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-8 py-8">
                                                        <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                            <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $imdb_movie['trailer'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                @endif

                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <x-button @click="
                                isOpenModal = false
                                $wire.emit('createMovie', {{ $imdb_movie }})
                        " data-modal-toggle="extralarge-modal" type="button">Accept</x-button>
                        <x-cancel-button-component @click="isOpenModal = false" data-modal-toggle="extralarge-modal" type="button">Cancel</x-cancel-button-component>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
