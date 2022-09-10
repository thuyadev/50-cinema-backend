<div class="dark:bg-gray-800 cinemas-table my-5 relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
    <div class="px-6 py-4 mb-0 bg-gray-500/10 rounded-t-2xl">
        {{-- <h6 class="text-gray-300">Authors table</h6> --}}
        <div class="movie-search float-right relative">
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
                    <th class="px-6 py-3 pl-2 font-bold text-left align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Town</th>
                    <th class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Visibility</th>
                    <th class="px-6 py-3 font-bold text-center align-middle bg-transparent border-b border-gray-200 shadow-none text-sm text-gray-300 border-b-solid tracking-none whitespace-nowrap text-slate-400">Created At</th>
                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                </tr>
                </thead>
                <tbody>
                    @forelse($cinemas as $cinema)
                        <tr>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <div class="flex px-2 py-1">
                                    <div>
                                        <img src="{{ asset($cinema['image']) }}" class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl" alt="user1" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h6 class="mb-0 leading-normal text-size-sm dark:text-gray-300">{{ $cinema['name'] }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <p class="mb-0 font-semibold leading-tight text-size-xs dark:text-gray-300">{{ $cinema['town'] }}</p>
                            </td>
                            <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap shadow-transparent">
                                @if ($cinema['visibility'])
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                            </td>
                            <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <span class="font-semibold leading-tight text-size-xs dark:text-gray-300">23/04/18</span>
                            </td>
                            <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                <a href="javascript:;" class="font-semibold leading-tight text-size-xs dark:text-gray-300">Edit</a>
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
        {{ $cinemas->links() }}
    </div>
</div>
