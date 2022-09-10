@extends('layouts.main')

@section('content')
    <x-page-header-only>Edit theater</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('theaters.update', $theater['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" value="{{ $theater['name'] }}" id="name" name="name" aria-describedby="title_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('name')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="name" class="absolute text-gray-300 text-sm @error('name')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="title_error_help" class="@error('name')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="cinema_id" id="cinema_id" aria-describedby="status_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('cinema_id')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    @forelse($cinemas as $cinema)
                                        <option value="{{ $cinema['id'] }}" @if($cinema['id'] == $theater['cinema_id']) selected @endif>{{ $cinema['name'] }}</option>
                                    @empty
                                        <option >Items Not Found!</option>
                                    @endforelse
                                </select>
                                <label for="cinema_id" class="absolute text-gray-300 text-sm @error('cinema_id')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cinema <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="status_error_help" class="@error('cinema_id')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('cinema_id')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                </div>

                @livewire('theaters.theater-seat-update-generator', [
                    'seats' => json_decode($chairs, true),
                    'rows' => $row_count,
                    'chair_per_row' => $chair_per_row_count,
                ])

                <div class="flex">
                    <x-button class="mt-5 mr-2">Update</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('theaters.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ $theater['created_at'] }}" modifiedAt="{{ $theater['updated_at'] }}" />
    </div>
@endsection
