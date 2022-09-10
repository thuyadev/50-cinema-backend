@extends('layouts.main')

@section('content')
    <x-page-header-only>Create Movie Show Time</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('showtimes.store') }}" method="POST">
                @csrf

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <div date-rangepicker class="flex items-center">
                                    <div class="relative">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input name="start_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                    </div>
                                    <span class="mx-4 text-gray-500">to</span>
                                    <div class="relative">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input name="end_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                                    </div>
                                </div>
                            </div>
                            <p id="start_date_error_help" class="@error('start_date')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('start_date')
                                    {{ $message }}
                                @enderror
                            </p>
                            <p id="end_date_error_help" class="@error('end_date')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('end_date')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="movie_id" id="movie_id" aria-describedby=movie_id_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('movie_id')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    @forelse($movies as $movie)
                                        <option value="{{ $movie['id'] }}">{{ $movie['name'] }}</option>
                                    @empty
                                        <option >Items Not Found!</option>
                                    @endforelse
                                </select>
                                <label for="movie_id" class="absolute text-gray-300 text-sm @error('movie_id')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Movie <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="status_error_help" class="@error('movie_id')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('movie_id')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                </div>

                @livewire('show-times.theater-show-time-create')

                <div class="flex">
                    <x-button class="mt-5 mr-2">Create</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('showtimes.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ now() }}" />
    </div>
@endsection
