<div x-data="{ openDeleteModal: false, showtime_id: '' }" class="dark:bg-gray-800 cinemas-table my-5 relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="px-6 py-4 mb-0 bg-gray-500/10 rounded-t-2xl">
        {{-- <h6 class="text-gray-300">Authors table</h6> --}}
        <div class="show-time-search float-right relative">
            <span class="absolute top-1 bottom-0 left-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </span>
            <input type="text" wire:model.debounce.300ms="search" name="search" id="search" class="block w-full h-9 pl-9 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" placeholder="Search" autocomplete="off">
            <svg wire:loading class="absolute top-2 right-2 spinner animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    </div>

    <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
            <table class="border-collapse items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Name</th>
                        <th class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Start Date</th>
                        <th class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">End Date</th>
                        <th class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Created At</th>
                        <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                    </tr>
                </thead>
                <tbody id="accordion-collapse" data-accordion="collapse">
                    @forelse($show_times as $show_time)
                        <tr class="cursor-pointer" id="accordion-collapse-heading-{{ $show_time['id'] }}" data-accordion-target="#accordion-collapse-body-{{ $show_time['id'] }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $show_time['id'] }}">
                            <td class="px-6 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal text-size-sm dark:text-gray-300">{{ $show_time['movie']['name'] }}</h6>
                                </div>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <span class="font-semibold leading-tight text-size-xs dark:text-gray-300">{{ $show_time['start_date'] }}</span>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <span class="font-semibold leading-tight text-size-xs dark:text-gray-300">{{ $show_time['end_date'] }}</span>
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <span class="font-semibold leading-tight text-size-xs dark:text-gray-300">{{ $show_time['created_at'] }}</span>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <a href="{{ route('showtimes.edit', $show_time['id']) }}" class="font-semibold leading-tight text-size-xs dark:text-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:fill-current hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <button @click="
                                        openDeleteModal = true
                                        showtime_id = {{ $show_time['id'] }}
                                    " class="font-semibold leading-tight text-size-xs dark:text-gray-300" type="button" data-modal-toggle="popup-modal-delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:fill-current hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr id="accordion-collapse-body-{{ $show_time['id'] }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $show_time['id'] }}">
                            <td colspan="5" class="px-6 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div style="max-width: 700px;" class="detail-table mx-auto my-5 shadow-lg sm:rounded-lg">
                                    <div class="header flex justify-center px-6 py-4 mb-0 bg-gray-500/10 rounded-t-2xl">
                                        <h6 class="mb-0 flex-1 text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Cinema</h6>
                                        <h6 class="mb-0 flex-1 text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Theater</h6>
                                        <h6 class="mb-0 flex-1 text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Time</h6>
                                    </div>
                                    @foreach($show_time['theaterShowTimes'] as $theater_show_time)
                                        <div class="body flex justify-center px-6 py-4 border-b border-gray-200">
                                            <p class="font-semibold flex-1 leading-tight text-size-xs dark:text-gray-300 mb-0">{{ $theater_show_time['cinema']['name'] }}</p>
                                            <p class="font-semibold flex-1 leading-tight text-size-xs dark:text-gray-300 mb-0">{{ $theater_show_time['theater']['name'] }}</p>
                                            <p class="font-semibold flex-1 leading-tight text-size-xs dark:text-gray-300 mb-0">{{ $theater_show_time['time'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">No Items Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="px-6 py-4 mb-0 bg-gray-500/10 rounded-b-2xl">
        {{ $show_times->links() }}
    </div>

    <div x-show="openDeleteModal" id="popup-modal-delete" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center flex bg-gray-800/60">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button @click="openDeleteModal = false" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal-delete">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete?</h3>
                    <button @click="
                            openDeleteModal = false
                            $wire.showTimeDelete(showtime_id)
                        " data-modal-toggle="popup-modal-delete" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button @click="openDeleteModal = false" data-modal-toggle="popup-modal-delete" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

</div>
