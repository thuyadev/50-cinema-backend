<div class="theater-show-time">
    <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl mt-5">

        <input type="hidden" name="theater_show_times" value="{{ json_encode($show_times) }}">

        <div class="grid grid-cols-12 gap-5">

            <div class="col-span-4">
                <div class="relative z-0">
                    <select wire:model="cinema_id" name="cinema_id" id="cinema_id" wire:change="$emit('getTheaters')" aria-describedby="cinema_id_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500   appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                        <option>--Choose Cinema--</option>
                        @forelse($cinemas as $cinema)
                            <option value="{{ $cinema['id'] }}">{{ $cinema['name'] }}</option>
                        @empty
                            <option >Items Not Found!</option>
                        @endforelse
                    </select>
                    <label for="cinema_id" class="absolute text-gray-300 text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cinema <span class="text-red-700 text-sm ml-1">*</span></label>
                </div>
            </div>

            <div class="col-span-4">
                <div class="relative z-0">
                    <select wire:model="theater_id" wire:change="$emit('getTheaterName')" name="theater_id" id="theater_id" @if(count($theaters) == 0) disabled @endif aria-describedby="theater_id_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500   appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                        <option>--Choose Theater--</option>
                        @forelse($theaters as $theater)
                            <option value="{{ $theater['id'] }}">{{ $theater['name'] }}</option>
                        @empty
                            <option >Items Not Found!</option>
                        @endforelse
                    </select>
                    <label for="theater_id" class="absolute text-gray-300 text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Theater <span class="text-red-700 text-sm ml-1">*</span></label>
                </div>
            </div>

            <div class="col-span-3">
                <div class="relative z-0">
                    <input wire:model="time" type="time" id="time" name="time" @if($theater_id == null) disabled @endif aria-describedby="time_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500   appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                    <label for="time" class="absolute text-gray-300 text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Time <span class="text-red-700 text-sm ml-1">*</span></label>
                </div>
            </div>

            <div class="col-span-1 m-auto">
                <button wire:click="$emit('addShowTime')" @if($cinema_id == null || $theater_id == null || $time == null) disabled @endif type="button" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
            </div>

        </div>

    </div>

    <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl mt-5">
        <table class="border-collapse items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
                <tr>
                    <th class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Cinema</th>
                    <th class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Theater</th>
                    <th class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Time</th>
                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                </tr>
            </thead>
            <tbody>
            @forelse($show_times as $index => $show_time)
                <tr>
                    <td class="px-5 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <div class="flex flex-col justify-center">
                            <h6 class="mb-0 leading-normal text-size-sm dark:text-gray-300">{{ $show_time['cinema_name'] }}</h6>
                        </div>
                    </td>
                    <td class="px-6 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <div class="flex flex-col justify-center">
                            <h6 class="mb-0 leading-normal text-size-sm dark:text-gray-300">{{ $show_time['theater_name'] }}</h6>
                        </div>
                    </td>
                    <td class="px-6 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <div class="flex flex-col justify-center">
                            <h6 class="mb-0 leading-normal text-size-sm dark:text-gray-300">{{ $show_time['time'] }}</h6>
                        </div>
                    </td>

                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <button wire:click="$emit('deleteShowTime', {{ $index }})" class="font-semibold leading-tight text-size-xs dark:text-gray-300" type="button" data-modal-toggle="popup-modal-delete">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:fill-current hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">No Items Found!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
