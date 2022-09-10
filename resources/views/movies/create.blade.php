@extends('layouts.main')

@section('content')
    <x-page-header-only>Create movie</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5 mb-3">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="name" name="name" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('name')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                                <input datepicker datepicker-format="dd-mm-yyyy" type="text" id="initial_release_date" name="initial_release_date" aria-describedby="initial_release_date_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('initial_release_date')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" />
                                <label for="initial_release_date" class="absolute text-gray-300 text-sm @error('initial_release_date')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Released Date <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="initial_release_date_error" class="@error('initial_release_date')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('initial_release_date')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-5 mb-3">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="production_company" name="production_company" aria-describedby="production_company_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('production_company')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="name" class="absolute text-gray-300 text-sm @error('production_company')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Production Company <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="production_company_error" class="@error('production_company')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('production_company')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="distributed_by" name="distributed_by" aria-describedby="distributed_by_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('distributed_by')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="name" class="absolute text-gray-300 text-sm @error('distributed_by')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Distributed By</label>
                            </div>
                            <p id="distributed_by_error" class="@error('distributed_by')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('distributed_by')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-5 mb-3">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="movie_length" name="movie_length" aria-describedby="distributed_by_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('movie_length')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="name" class="absolute text-gray-300 text-sm @error('movie_length')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Movie Length <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="distributed_by_error" class="@error('movie_length')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('movie_length')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="language" id="language" aria-describedby="language_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('language')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option value="af">Afrikaans</option>
                                    <option value="sq">Albanian - shqip</option>
                                    <option value="am">Amharic - አማርኛ</option>
                                    <option value="ar">Arabic - العربية</option>
                                    <option value="an">Aragonese - aragonés</option>
                                    <option value="hy">Armenian - հայերեն</option>
                                    <option value="ast">Asturian - asturianu</option>
                                    <option value="az">Azerbaijani - azərbaycan dili</option>
                                    <option value="eu">Basque - euskara</option>
                                    <option value="be">Belarusian - беларуская</option>
                                    <option value="bn">Bengali - বাংলা</option>
                                    <option value="bs">Bosnian - bosanski</option>
                                    <option value="br">Breton - brezhoneg</option>
                                    <option value="bg">Bulgarian - български</option>
                                    <option value="ca">Catalan - català</option>
                                    <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                    <option value="zh">Chinese - 中文</option>
                                    <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                    <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                    <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                    <option value="co">Corsican</option>
                                    <option value="hr">Croatian - hrvatski</option>
                                    <option value="cs">Czech - čeština</option>
                                    <option value="da">Danish - dansk</option>
                                    <option value="nl">Dutch - Nederlands</option>
                                    <option value="en">English</option>
                                    <option value="en-AU">English (Australia)</option>
                                    <option value="en-CA">English (Canada)</option>
                                    <option value="en-IN">English (India)</option>
                                    <option value="en-NZ">English (New Zealand)</option>
                                    <option value="en-ZA">English (South Africa)</option>
                                    <option value="en-GB">English (United Kingdom)</option>
                                    <option value="en-US">English (United States)</option>
                                    <option value="eo">Esperanto - esperanto</option>
                                    <option value="et">Estonian - eesti</option>
                                    <option value="fo">Faroese - føroyskt</option>
                                    <option value="fil">Filipino</option>
                                    <option value="fi">Finnish - suomi</option>
                                    <option value="fr">French - français</option>
                                    <option value="fr-CA">French (Canada) - français (Canada)</option>
                                    <option value="fr-FR">French (France) - français (France)</option>
                                    <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                    <option value="gl">Galician - galego</option>
                                    <option value="ka">Georgian - ქართული</option>
                                    <option value="de">German - Deutsch</option>
                                    <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                    <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                    <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                    <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                    <option value="el">Greek - Ελληνικά</option>
                                    <option value="gn">Guarani</option>
                                    <option value="gu">Gujarati - ગુજરાતી</option>
                                    <option value="ha">Hausa</option>
                                    <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                    <option value="he">Hebrew - עברית</option>
                                    <option value="hi">Hindi - हिन्दी</option>
                                    <option value="hu">Hungarian - magyar</option>
                                    <option value="is">Icelandic - íslenska</option>
                                    <option value="id">Indonesian - Indonesia</option>
                                    <option value="ia">Interlingua</option>
                                    <option value="ga">Irish - Gaeilge</option>
                                    <option value="it">Italian - italiano</option>
                                    <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                    <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                    <option value="ja">Japanese - 日本語</option>
                                    <option value="kn">Kannada - ಕನ್ನಡ</option>
                                    <option value="kk">Kazakh - қазақ тілі</option>
                                    <option value="km">Khmer - ខ្មែរ</option>
                                    <option value="ko">Korean - 한국어</option>
                                    <option value="ku">Kurdish - Kurdî</option>
                                    <option value="ky">Kyrgyz - кыргызча</option>
                                    <option value="lo">Lao - ລາວ</option>
                                    <option value="la">Latin</option>
                                    <option value="lv">Latvian - latviešu</option>
                                    <option value="ln">Lingala - lingála</option>
                                    <option value="lt">Lithuanian - lietuvių</option>
                                    <option value="mk">Macedonian - македонски</option>
                                    <option value="ms">Malay - Bahasa Melayu</option>
                                    <option value="ml">Malayalam - മലയാളം</option>
                                    <option value="mt">Maltese - Malti</option>
                                    <option value="mr">Marathi - मराठी</option>
                                    <option value="mn">Mongolian - монгол</option>
                                    <option value="ne">Nepali - नेपाली</option>
                                    <option value="no">Norwegian - norsk</option>
                                    <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                    <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                    <option value="oc">Occitan</option>
                                    <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                    <option value="om">Oromo - Oromoo</option>
                                    <option value="ps">Pashto - پښتو</option>
                                    <option value="fa">Persian - فارسی</option>
                                    <option value="pl">Polish - polski</option>
                                    <option value="pt">Portuguese - português</option>
                                    <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                    <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                    <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                    <option value="qu">Quechua</option>
                                    <option value="ro">Romanian - română</option>
                                    <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                    <option value="rm">Romansh - rumantsch</option>
                                    <option value="ru">Russian - русский</option>
                                    <option value="gd">Scottish Gaelic</option>
                                    <option value="sr">Serbian - српски</option>
                                    <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                    <option value="sn">Shona - chiShona</option>
                                    <option value="sd">Sindhi</option>
                                    <option value="si">Sinhala - සිංහල</option>
                                    <option value="sk">Slovak - slovenčina</option>
                                    <option value="sl">Slovenian - slovenščina</option>
                                    <option value="so">Somali - Soomaali</option>
                                    <option value="st">Southern Sotho</option>
                                    <option value="es">Spanish - español</option>
                                    <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                    <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                    <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                    <option value="es-ES">Spanish (Spain) - español (España)</option>
                                    <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                    <option value="su">Sundanese</option>
                                    <option value="sw">Swahili - Kiswahili</option>
                                    <option value="sv">Swedish - svenska</option>
                                    <option value="tg">Tajik - тоҷикӣ</option>
                                    <option value="ta">Tamil - தமிழ்</option>
                                    <option value="tt">Tatar</option>
                                    <option value="te">Telugu - తెలుగు</option>
                                    <option value="th">Thai - ไทย</option>
                                    <option value="ti">Tigrinya - ትግርኛ</option>
                                    <option value="to">Tongan - lea fakatonga</option>
                                    <option value="tr">Turkish - Türkçe</option>
                                    <option value="tk">Turkmen</option>
                                    <option value="tw">Twi</option>
                                    <option value="uk">Ukrainian - українська</option>
                                    <option value="ur">Urdu - اردو</option>
                                    <option value="ug">Uyghur</option>
                                    <option value="uz">Uzbek - o‘zbek</option>
                                    <option value="vi">Vietnamese - Tiếng Việt</option>
                                    <option value="wa">Walloon - wa</option>
                                    <option value="cy">Welsh - Cymraeg</option>
                                    <option value="fy">Western Frisian</option>
                                    <option value="xh">Xhosa</option>
                                    <option value="yi">Yiddish</option>
                                    <option value="yo">Yoruba - Èdè Yorùbá</option>
                                    <option value="zu">Zulu - isiZulu</option>
                                </select>
                                <label for="name" class="absolute text-gray-300 text-sm @error('language')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Language <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="language_error" class="@error('language')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('language')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                </div>

                <div class="dark:bg-gray-800 py-4 px-4 mt-5 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5 mb-3">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="genre_ids[]" id="genre_ids" aria-describedby="genre_ids_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('genre_ids')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" multiple>
                                    @forelse($genres as $genre)
                                        <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                                    @empty
                                        <option>No Items Found!</option>
                                    @endforelse
                                </select>
                                <label for="name" class="absolute text-gray-300 text-sm @error('genre_ids')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Genre <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="genre_ids_error" class="@error('genre_ids')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('genre_ids')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <select name="crew_ids[]" id="crew_ids" aria-describedby="crew_ids_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('crew_ids')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" multiple>
                                    @forelse($crews as $crew)
                                        <option value="{{ $crew['id'] }}">{{ $crew['name'] }} - {{ $crew['status'] == 1 ? 'Cast' : 'Director' }}</option>
                                    @empty
                                        <option>No Items Found!</option>
                                    @endforelse
                                </select>
                                <label for="crew_ids" class="absolute text-gray-300 text-sm @error('crew_ids')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Crews <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="crew_ids_error" class="@error('crew_ids')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('crew_ids')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                </div>

                <div class="dark:bg-gray-800 py-4 px-4 mt-5 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5 mb-3">
                        <div class="col-span-6 flex @error('movie_poster')flex-col @enderror">
                            <label class="block flex items-center">
                                <span class="sr-only cursor-pointer text-sm">Choose photo</span>
                                <input type="file" name="movie_poster" class="cursor-pointer block w-full text-sm text-gray-300
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-gradient-cyan file:text-gray-300
                                  hover:file:bg-violet-100
                                "/>
                            </label>
                            <p id="movie_poster_error" class="@error('movie_poster')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('movie_poster')
                                {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="trailer" name="trailer" aria-describedby="trailer_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('trailer')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
                                <label for="trailer" class="absolute text-gray-300 text-sm @error('trailer')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Trailer Link <span class="text-red-700 text-sm ml-1">*</span></label>
                            </div>
                            <p id="trailer_error" class="@error('trailer')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                                @error('trailer')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="relative z-0">
                            <textarea rows="2" name="description" id="description" aria-describedby="trailer_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('description')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" autocomplete="off"></textarea>
                            <label for="trailer" class="absolute text-gray-300 text-sm @error('description')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description <span class="text-red-700 text-sm ml-1">*</span></label>
                        </div>
                        <p id="trailer_error" class="@error('description')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>

                </div>

                <div class="dark:bg-gray-800 py-4 px-4 mt-5 transition-all shadow-none duration-250 ease-soft-in rounded-xl">
                    <div class="mt-5">
                        <label class="block">
                            <span class="sr-only cursor-pointer text-sm">Choose photos</span>
                            <input type="file" name="images[]" multiple class="cursor-pointer block w-full text-sm text-gray-300
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-gradient-cyan file:text-gray-300
                                  hover:file:bg-violet-100
                                "/>
                        </label>
                        <p id="movie_poster_error" class="@error('images')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
                            @error('images')
                                {{ $message }}
                            @enderror
                        </p>
                    </div>
                </div>

                <div class="flex">
                    <x-button class="mt-5 mr-2">Create</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('movies.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ now() }}" />
    </div>
@endsection
