<div class="col-span-9">
    @if(session()->has('success'))
        <x-success-toast-component message="{{ session('success') }}"></x-success-toast-component>
    @endif

    <form wire:submit.prevent="editAdmin({{ $admin_id }})">

        <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-6">
                    <div class="relative z-0">
                        <input wire:model="name" type="text" id="name" name="name" value="{{ $name }}" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('name')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                        <input wire:model="email" type="text" id="email" name="email" value="{{ $email }}" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('email')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="email" class="absolute text-gray-300 text-sm @error('email')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email <span class="text-red-700 text-sm ml-1">*</span></label>
                    </div>
                    <p id="name_error" class="@error('email')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-6">
                    <div class="relative z-0">
                        <input wire:model="password" type="password" id="password" name="password" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('password')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="name" class="absolute text-gray-300 text-sm @error('password')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password <span class="text-red-700 text-sm ml-1">*</span></label>
                    </div>
                    <p id="name_error" class="@error('password')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="col-span-6">
                    <div class="relative z-0">
                        <input wire:model="confirm_password" type="password" id="confirm_password" name="confirm_password" value="{{ $confirm_password }}" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('confirm_password')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="email" class="absolute text-gray-300 text-sm @error('confirm_password')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password <span class="text-red-700 text-sm ml-1">*</span></label>
                    </div>
                    <p id="name_error" class="@error('confirm_password')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>
        </div>

        <div class="flex">
            <x-button class="mt-5 mr-2">Update</x-button>
            {{-- <x-cancel-button-component class="mt-5 mr-2" >Cancel</x-cancel-button-component>--}}
        </div>
    </form>
</div>
