@extends('layouts.main')

@section('content')
    <x-page-header-only>Edit genre</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('genres.update', $genre['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <label for="Name" class="text-gray-300 text-sm">Name</label><span class="text-red-700 text-sm ml-1">*</span>
                            <input type="text" name="name" value="{{ $genre['name'] }}" id="name" class="block w-full h-9 pl-3 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" autocomplete="off">
                            <p class="@error('name')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <x-button class="mt-5 mr-2">Update</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('genres.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ $genre['created_at'] }}" modifiedAt="{{ $genre['updated_at'] }}" />
    </div>
@endsection
