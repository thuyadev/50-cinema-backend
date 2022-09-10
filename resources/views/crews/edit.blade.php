@extends('layouts.main')

@section('content')
    <x-page-header-only>Edit crew</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('crews.update', $crew['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="name" name="name" value="{{ $crew['name'] }}" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('name')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="name" class="absolute text-gray-300 text-sm @error('name')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="name_error" class="@error('name')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="status" id="status" aria-describedby="status_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('status')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option @if($crew['status'] == 1) selected @endif value="1">Cast</option>
                                    <option @if($crew['status'] == 2) selected @endif value="2">Director</option>
                                    {{-- <option value="3">Producer</option> --}}
                                </select>
                                <label for="role" class="absolute text-gray-300 text-sm @error('status')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Role <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="status_error" class="@error('status')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('status')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <x-button class="mt-5 mr-2">Update</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('crews.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ $crew['created_at'] }}" modifiedAt="{{ $crew['updated_at'] }}" />
    </div>
@endsection
