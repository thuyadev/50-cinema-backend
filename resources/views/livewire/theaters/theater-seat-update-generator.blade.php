<div class="seats-container" x-data="{
    open_row_model: false, open_col_model: false, open: false, seat_name: '', seat_price: '', seat_type: '', space_type: '', row: '', col: '', col_count: 0, is_couple: false,
}">
    <div class="mt-5 dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">
        <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300" for="small_size">Seat Manage</label>
        <input type="hidden" name="seat" value="{{ json_encode($chairs) }}" class="w-full text-xs text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="seat">
        <p class="@error('seat')!visible @enderror mb-4 mt-2 invisible peer-invalid:visible text-xs text-red-600 dark:text-red-400">
            @error('seat')
            {{ $message }}
            @enderror
        </p>

        <div class="seat-manager mt-2">
            <div class="flex items-center mb-4">
                <input wire:model="is_couple" wire:change="$emit('generateChairs')" id="is_couple" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-cyan-500 dark:focus:ring-cyan-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="is_couple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Is Couple Only?</label>
            </div>
            <div class="grid grid-cols-12 gap-5 mb-5">
                <div class="col-span-6">
                    <div class="relative z-0">
                        <input wire:model="chair_per_row" wire:change.debounce.500ms="$emit('generateChairs')" type="number" id="chair_per_row" name="chair_per_row" aria-describedby="chair_count_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('chair_per_row')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="$chair_per_row" class="absolute text-gray-300 text-sm @error('chair_per_row')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairs Per Row <span class="text-red-700 text-sm ml-1">*</span></label>
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="relative z-0">
                        <input wire:model="rows" wire:change.debounce.500ms="$emit('generateChairs')" type="number" id="rows" name="rows" max="34" aria-describedby="rows_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('rows')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                        <label for="rows" class="absolute text-gray-300 text-sm @error('rows')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rows <span class="text-red-700 text-sm ml-1">*</span></label>
                    </div>
                </div>
            </div>
{{--            <div class="grid grid-cols-12 gap-5 mb-5" x-show="is_couple">--}}
{{--                <div class="col-span-6">--}}
{{--                    <div class="relative z-0">--}}
{{--                        <input wire:model="couple_chair_count" wire:change.debounce.300ms="$emit('generateChairs')" type="number" id="couple_chair_count" name="couple_chair_count" aria-describedby="couple_chair_count_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('couple_chair_count')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />--}}
{{--                        <label for="couple_chair_count" class="absolute text-gray-300 text-sm @error('couple_chair_count')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Couple Chair Count</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-span-6">--}}
{{--                    <div class="relative z-0">--}}
{{--                        <input wire:model="couple_chair_rows" wire:change.debounce.300ms="$emit('generateChairs')" type="number" id="couple_chair_rows" name="couple_chair_rows" max="36" aria-describedby="couple_chair_rows_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('couple_chair_rows')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />--}}
{{--                        <label for="couple_chair_rows" class="absolute text-gray-300 text-sm @error('couple_chair_rows')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Couple Chair Rows</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </div>

    <div class="mt-5 dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">
        <label class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-300" for="seats">Seats</label>
        <div role="status" wire:loading class="text-center">
            <svg class="inline mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-cyan-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

        @if($chairs && count($chairs) > 0)
            <div class="screen bg-gray-600 p-2 text-center text-sm dark:text-white">Screen</div>
            <div class="prices justify-center text-sm flex mt-3">
                <div class="block mr-4">
                    <div class="border border-red-500 mx-2 text-black dark:text-white w-12 h-7 text-center text-sm cursor-pointer rounded-b-2"></div>
                    <p class="mt-1 text-center">$ 10.00</p>
                </div>
                <div class="block mr-4">
                    <div class="border border-orange-500 mx-2 text-black dark:text-white w-12 h-7 text-center text-sm cursor-pointer rounded-b-2"></div>
                    <p class="mt-1 text-center">$ 15.00</p>
                </div>
                <div class="block mr-4">
                    <div class="border border-green-500 mx-2 text-black dark:text-white w-12 h-7 text-center text-sm cursor-pointer rounded-b-2"></div>
                    <p class="mt-1 text-center">$ 20.00</p>
                </div>
                <div class="block mr-4">
                    <div class="border border-blue-500 mx-2 text-black dark:text-white w-12 h-7 text-center text-sm cursor-pointer rounded-b-2"></div>
                    <p class="mt-1 text-center">$ 30.00</p>
                </div>
            </div>

            <div class="seat-rows flex justify-center">
                <div class="mt-6 py-3 overflow-x-scroll block">
                    <div class="flex mb-3">
                        <div style="width: 9px;" class="mr-5">R/C</div>
                        <div class="flex">
                            @for($i = 0; $i < $max_col_count; $i++)
                                <div class="w-12 text-center mx-2 cursor-pointer hover:text-white"
                                     @click.prevent="
                                        open_col_model = true
                                        col = {{ $i+1 }}
                                        seat_price = 10.00
                                        col_count = {{ $max_col_count }}"

                                >{{ $i+1 }}</div>
                            @endfor
                        </div>
                    </div>
                    @foreach($chairs as $chair)
                        <div class="row flex mb-3">
                            <div style="width: 9px;" class="text-sm mr-5 cursor-pointer"
                                 @click.prevent="
                                    open_row_model = true
                                    row = '{{ $chair['name'] }}'">{{ $chair['name'] }}</div>
                            <div class="seats">
                                <div class="flex">
                                    @foreach($chair['data'] as $data)
                                        @if($data['name'] == 'space')
                                            <div class="mx-2 w-12"></div>
                                        @else
                                            <div @click.prevent="
                                                open = true
                                                seat_name = '{{ $data['name'] }}'
                                                seat_price = '{{ $data['price'] }}'
                                                seat_type = '{{ $data['type'] }}'
                                                row = '{{ $chair['name'] }}'"
                                                 style="border-color: {{ $data['color'] }}"
                                                 onmouseover="this.style.backgroundColor='{{ $data['color'] }}';" onmouseout="this.style.backgroundColor='transparent';"
                                                 class="border mx-2 text-black dark:text-white w-12 text-center text-sm cursor-pointer rounded-b-2">{{ $data['name'] }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div x-show="open" id="chair-manage-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex dark:bg-gray-800/60" x-transition>
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button @click="open = false" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Changing <span x-text="seat_name"></span> Data</h3>
                            <div class="relative z-0">
                                <select x-model="seat_price" name="seat_price" id="seat_price" aria-describedby="seat_price_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500   appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option value="10.00">$ 10.00</option>
                                    <option value="15.00">$ 15.00</option>
                                    <option value="20.00">$ 20.00</option>
                                </select>
                                <label for="seat_price_error_help" class="absolute text-gray-300 text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                            </div>

                            <div class="my-4">
                                <label class="mb-4 font-semibold text-gray-900 dark:text-white text-xl">Space to</label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="to_right" type="radio" x-model="space_type" value="right" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="to_right" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">To Right</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-id" x-model="space_type" type="radio" value="left" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-id" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">To Left</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="horizontal-list-radio-millitary" x-model="space_type" type="radio" value="itself" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-millitary" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Itself</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="my-4">
                                <label class="mb-4 font-semibold text-gray-900 dark:text-white text-xl">Type</label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="normal" type="radio" x-model="seat_type" value="right" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="normal" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Normal</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="couple" x-model="seat_type" type="radio" value="left" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="couple" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Couple</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="wheelchair" x-model="seat_type" type="radio" value="itself" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="wheelchair" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Wheelchair</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <x-button @click='open = false
                                    $wire.changeSeat(row, seat_name, seat_price, seat_type, space_type)' type="button" class="w-full">Submit</x-button>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="open_row_model" id="chair-row-manage-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex dark:bg-gray-800/60" x-transition>
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button @click="open_row_model = false" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Changing <span x-text="seat_name"></span> Data</h3>
                            <div class="relative z-0">
                                <select x-model="seat_price" name="seat_price" id="seat_price" aria-describedby="seat_price_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500   appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option value="10.00">$ 10.00</option>
                                    <option value="15.00">$ 15.00</option>
                                    <option value="20.00">$ 20.00</option>
                                    <option value="30.00">$ 30.00</option>
                                </select>
                                <label for="seat_price_error_help" class="absolute text-gray-300 text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                            </div>

                            <div class="my-4">
                                <label class="mb-4 font-semibold text-gray-900 dark:text-white text-xl">Space to</label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="to_above" type="radio" x-model="space_type" value="above" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="to_above" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">To Above</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="to_under" x-model="space_type" type="radio" value="under" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="to_under" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">To Under</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="my-4">
                                <label class="mb-4 font-semibold text-gray-900 dark:text-white text-xl">Type</label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="normal" type="radio" x-model="seat_type" value="normal" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="normal" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Normal</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="couple" x-model="seat_type" type="radio" value="couple" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="couple" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Couple</label>
                                        </div>
                                    </li>
                                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center pl-3">
                                            <input id="wheelchair" x-model="seat_type" type="radio" value="wheelchair" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="wheelchair" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">Wheelchair</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <x-button @click='open_row_model = false
                                    $wire.changeSeatRow(row, seat_price, seat_type, space_type)' type="button" class="w-full justify-center">Submit</x-button>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="open_col_model" id="chair-col-manage-modal" tabindex="-1" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex dark:bg-gray-800/60" x-transition>
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button @click="open_col_model = false" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="py-6 px-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Changing Data</h3>
                            <div class="relative z-0">
                                <select x-model="seat_price" name="seat_price" id="seat_price" aria-describedby="seat_price_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500   appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option value="10.00">$ 10.00</option>
                                    <option value="15.00">$ 15.00</option>
                                    <option value="20.00">$ 20.00</option>
                                    <option value="30.00">$ 30.00</option>
                                </select>
                                <label for="seat_price_error_help" class="absolute text-gray-300 text-sm duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
                            </div>

                            <div class="my-4">
                                <label class="mb-4 font-semibold text-gray-900 dark:text-white text-xl">Space to</label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <template x-if="col != col_count">
                                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="to_right" type="radio" x-model="space_type" value="right" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="to_right" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">To Right</label>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="col != 1">
                                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                            <div class="flex items-center pl-3">
                                                <input id="horizontal-list-radio-id" x-model="space_type" type="radio" value="left" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                <label for="horizontal-list-radio-id" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">To Left</label>
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                            </div>

                            <x-button @click='open_col_model = false
                                    $wire.changeSeatColumn(col, seat_price, space_type)' type="button" class="w-full justify-center">Submit</x-button>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>
</div>
