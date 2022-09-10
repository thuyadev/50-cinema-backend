@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-12 gap-5 mt-4" x-data="{ isTrailerOpen: false }">
        <div class="col-span-9">
            <div class="dark:bg-gray-800 py-7 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">
                <div class="container mx-auto flex flex-col md:flex-row">
                    <img src="{{ $movie['movie_poster'] }}" alt="movie image" class="w-96">

                    <div class="md:ml-14">
                        <h2 class="text-4xl mt-4 md:mt-0 font-semibold text-white">{{ $movie['name'] }}</h2>
                        <div class="flex flex-wrap items-center text-gray-400 text-sm">
                            <span>{{ $movie['movie_length'] }} min</span>
                            <span class="mx-2">|</span>
                            <span>{{ $movie['initial_release_date'] }}</span>
                            <span class="mx-2">|</span>
                            <span>
                                @foreach ($movie['movie_genres'] as $genre)
                                    {{ $genre['name'] }}@if (!$loop->last),@endif
                                @endforeach
                            </span>
                        </div>

                        <h4 class="text-white font-semi-bold mt-5">Director</h4>
                        <div class="flex mt-2">
                            <div class="mr-8">
                                <div>{{ $movie['director_name'] }}</div>
                            </div>
                        </div>

                        <h4 class="text-white font-semi-bold mt-5">Fetured Casts</h4>
                        <div class="flex mt-2">
                            <div class="mr-8">
                                @foreach ($movie['movie_crews'] as $crew)
                                    @if($crew['status'] == 1)
                                        {{ $crew['name'] }}@if (!$loop->last),@endif
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <h4 class="text-white font-semi-bold mt-5">Language</h4>
                        <div class="flex mt-2">
                            <div class="mr-8">
                                {{ $movie['language'] }}
                            </div>
                        </div>

                        @if ($movie['trailer'])
                            <div class="mt-5">
                                <x-button @click="isTrailerOpen = true" class="mt-5 mr-2">
                                    <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                    <span class="ml-2">Play Trailer</span>
                                </x-button>
                            </div>

                            <template x-if="isTrailerOpen">
                                <div
                                    style="background-color: rgba(0, 0, 0, .5); z-index: 1000;"
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
                                                    <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $movie['trailer'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        @endif

                    </div>
                </div>
                <p class="text-gray-300 mt-8">
                    {{ $movie['description'] }}
                </p>
            </div>
        </div>

        <x-created-at-card-component createdAt="{{ $movie['created_at'] }}" modifiedAt="{{ $movie['updated_at'] }}" />
    </div>
@endsection
