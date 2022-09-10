@extends('layouts.main')

@section('content')
    <x-page-header-only>Create cinema</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('cinemas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-6">
                            <label for="Name" class="text-gray-300 text-sm">Name</label><span class="text-red-700 text-sm ml-1">*</span>
                            <input type="text" name="name" id="name" class="block w-full h-9 pl-3 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" autocomplete="off">
                            <p class="@error('name')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                        <div class="col-span-6">
                            <label for="Name" class="text-gray-300 text-sm">Town</label><span class="text-red-700 text-sm ml-1">*</span>
                            <input type="text" name="town" id="town" class="block w-full h-9 pl-3 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" autocomplete="off">
                            <p class="@error('town')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                @error('town')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="min-h-6 mt-5 flex items-center">
                        <input id="visibility" name="visibility" class="rounded-10 duration-300 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-300 checked:after:translate-x-5.25 h-5-em mt-0.54-em relative float-left w-10 cursor-pointer appearance-none dark:bg-gray-700 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-gradient-cyan checked:bg-none checked:bg-right" type="checkbox" checked />
                        <label for="visibility" class="inline-block pl-3 mb-0 ml-0 font-normal cursor-pointer select-none text-size-sm text-gray-300">visibility for users</label>
                    </div>
                    <p class="@error('visibility')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                        @error('visibility')
                            {{ $message }}
                        @enderror
                    </p>

                    <div class="mt-5">
                        <label for="Address" class="text-gray-300 text-sm">Address</label><span class="text-red-700 text-sm ml-1">*</span>
                        <textarea rows="5" name="address" id="address" class="block w-full pl-3 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" autocomplete="off"></textarea>
                        <p class="@error('address')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                    <div class="flex items-center space-x-6 mt-5">
{{--                    <div class="shrink-0">--}}
{{--                        <img class="h-16 w-16 object-cover rounded-full" src="https://via.placeholder.com/640x460.png/0033dd?text=image" alt="Current photo" />--}}
{{--                    </div>--}}
                        <label class="block">
                            <span class="sr-only cursor-pointer text-sm">Choose photo</span>
                            <input type="file" name="image" class="cursor-pointer block w-full text-sm text-gray-300
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-gradient-cyan file:text-gray-300
                              hover:file:bg-violet-100
                            "/>
                        </label>
                    </div>
                    <p class="@error('image')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="flex">
                    <x-button class="mt-5 mr-2">Create</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('cinemas.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ now() }}" />
    </div>
@endsection
