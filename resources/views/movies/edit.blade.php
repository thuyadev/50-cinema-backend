@extends('layouts.main')

@section('content')
    <x-page-header-only>Edit movie</x-page-header-only>

    <div class="grid grid-cols-12 gap-5 mt-4">
        <div class="col-span-9">
            <form action="{{ route('movies.update', $movie['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="dark:bg-gray-800 py-4 px-4 transition-all shadow-none duration-250 ease-soft-in rounded-xl">

                    <div class="grid grid-cols-12 gap-5 mb-3">
                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="name" name="name" value="{{ $movie['name'] }}" aria-describedby="name_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('name')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                                <input datepicker datepicker-format="dd-mm-yyyy" value="{{ $movie['initial_release_date'] }}" type="text" id="initial_release_date" name="initial_release_date" aria-describedby="initial_release_date_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('initial_release_date')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" />
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
                                <input type="text" id="production_company" name="production_company" value="{{ $movie['production_company'] }}" aria-describedby="production_company_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('production_company')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                                <input type="text" id="distributed_by" name="distributed_by" value="{{ $movie['distributed_by'] }}" aria-describedby="distributed_by_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('distributed_by')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                                <input type="text" id="movie_length" name="movie_length" value="{{ $movie['movie_length'] }}" aria-describedby="distributed_by_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('movie_length')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                                <select name="language" id="language" value="{{ $movie['language'] }}" aria-describedby="language_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('language')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer">
                                    <option @if($movie['language'] == "af") selected @endif value="af">Afrikaans</option>
                                    <option @if($movie['language'] == "sq") selected @endif value="sq">Albanian - shqip</option>
                                    <option @if($movie['language'] == "am") selected @endif value="am">Amharic - አማርኛ</option>
                                    <option @if($movie['language'] == "ar") selected @endif value="ar">Arabic - العربية</option>
                                    <option @if($movie['language'] == "an") selected @endif value="an">Aragonese - aragonés</option>
                                    <option @if($movie['language'] == "hy") selected @endif value="hy">Armenian - հայերեն</option>
                                    <option @if($movie['language'] == "ast") selected @endif value="ast">Asturian - asturianu</option>
                                    <option @if($movie['language'] == "az") selected @endif value="az">Azerbaijani - azərbaycan dili</option>
                                    <option @if($movie['language'] == "eu") selected @endif value="eu">Basque - euskara</option>
                                    <option @if($movie['language'] == "be") selected @endif value="be">Belarusian - беларуская</option>
                                    <option @if($movie['language'] == "bn") selected @endif value="bn">Bengali - বাংলা</option>
                                    <option @if($movie['language'] == "bs") selected @endif value="bs">Bosnian - bosanski</option>
                                    <option @if($movie['language'] == "br") selected @endif value="br">Breton - brezhoneg</option>
                                    <option @if($movie['language'] == "bg") selected @endif value="bg">Bulgarian - български</option>
                                    <option @if($movie['language'] == "ca") selected @endif value="ca">Catalan - català</option>
                                    <option @if($movie['language'] == "ckb") selected @endif value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                    <option @if($movie['language'] == "zh") selected @endif value="zh">Chinese - 中文</option>
                                    <option @if($movie['language'] == "zh-HK") selected @endif value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                    <option @if($movie['language'] == "zh-CN") selected @endif value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                    <option @if($movie['language'] == "zh-TW") selected @endif value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                    <option @if($movie['language'] == "co") selected @endif value="co">Corsican</option>
                                    <option @if($movie['language'] == "hr") selected @endif value="hr">Croatian - hrvatski</option>
                                    <option @if($movie['language'] == "cs") selected @endif value="cs">Czech - čeština</option>
                                    <option @if($movie['language'] == "da") selected @endif value="da">Danish - dansk</option>
                                    <option @if($movie['language'] == "nl") selected @endif value="nl">Dutch - Nederlands</option>
                                    <option @if($movie['language'] == "en") selected @endif value="en">English</option>
                                    <option @if($movie['language'] == "en-AU") selected @endif value="en-AU">English (Australia)</option>
                                    <option @if($movie['language'] == "en-CA") selected @endif value="en-CA">English (Canada)</option>
                                    <option @if($movie['language'] == "en-IN") selected @endif value="en-IN">English (India)</option>
                                    <option @if($movie['language'] == "en-NZ") selected @endif value="en-NZ">English (New Zealand)</option>
                                    <option @if($movie['language'] == "en-ZA") selected @endif value="en-ZA">English (South Africa)</option>
                                    <option @if($movie['language'] == "en-GB") selected @endif value="en-GB">English (United Kingdom)</option>
                                    <option @if($movie['language'] == "en-US") selected @endif value="en-US">English (United States)</option>
                                    <option @if($movie['language'] == "eo") selected @endif value="eo">Esperanto - esperanto</option>
                                    <option @if($movie['language'] == "et") selected @endif value="et">Estonian - eesti</option>
                                    <option @if($movie['language'] == "fo") selected @endif value="fo">Faroese - føroyskt</option>
                                    <option @if($movie['language'] == "fil") selected @endif value="fil">Filipino</option>
                                    <option @if($movie['language'] == "fi") selected @endif value="fi">Finnish - suomi</option>
                                    <option @if($movie['language'] == "fr") selected @endif value="fr">French - français</option>
                                    <option @if($movie['language'] == "fr-CA") selected @endif value="fr-CA">French (Canada) - français (Canada)</option>
                                    <option @if($movie['language'] == "fr-FR") selected @endif value="fr-FR">French (France) - français (France)</option>
                                    <option @if($movie['language'] == "fr-CH") selected @endif value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                    <option @if($movie['language'] == "gl") selected @endif value="gl">Galician - galego</option>
                                    <option @if($movie['language'] == "ka") selected @endif value="ka">Georgian - ქართული</option>
                                    <option @if($movie['language'] == "de") selected @endif value="de">German - Deutsch</option>
                                    <option @if($movie['language'] == "de-AT") selected @endif value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                    <option @if($movie['language'] == "de-DE") selected @endif value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                    <option @if($movie['language'] == "de-LI") selected @endif value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                    <option @if($movie['language'] == "de-CH") selected @endif value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                    <option @if($movie['language'] == "el") selected @endif value="el">Greek - Ελληνικά</option>
                                    <option @if($movie['language'] == "gn") selected @endif value="gn">Guarani</option>
                                    <option @if($movie['language'] == "gu") selected @endif value="gu">Gujarati - ગુજરાતી</option>
                                    <option @if($movie['language'] == "ha") selected @endif value="ha">Hausa</option>
                                    <option @if($movie['language'] == "haw") selected @endif value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                    <option @if($movie['language'] == "he") selected @endif value="he">Hebrew - עברית</option>
                                    <option @if($movie['language'] == "hi") selected @endif value="hi">Hindi - हिन्दी</option>
                                    <option @if($movie['language'] == "hu") selected @endif value="hu">Hungarian - magyar</option>
                                    <option @if($movie['language'] == "is") selected @endif value="is">Icelandic - íslenska</option>
                                    <option @if($movie['language'] == "id") selected @endif value="id">Indonesian - Indonesia</option>
                                    <option @if($movie['language'] == "ia") selected @endif value="ia">Interlingua</option>
                                    <option @if($movie['language'] == "ga") selected @endif value="ga">Irish - Gaeilge</option>
                                    <option @if($movie['language'] == "it") selected @endif value="it">Italian - italiano</option>
                                    <option @if($movie['language'] == "it-IT") selected @endif value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                    <option @if($movie['language'] == "it-CH") selected @endif value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                    <option @if($movie['language'] == "ja") selected @endif value="ja">Japanese - 日本語</option>
                                    <option @if($movie['language'] == "kn") selected @endif value="kn">Kannada - ಕನ್ನಡ</option>
                                    <option @if($movie['language'] == "kk") selected @endif value="kk">Kazakh - қазақ тілі</option>
                                    <option @if($movie['language'] == "km") selected @endif value="km">Khmer - ខ្មែរ</option>
                                    <option @if($movie['language'] == "ko") selected @endif value="ko">Korean - 한국어</option>
                                    <option @if($movie['language'] == "ku") selected @endif value="ku">Kurdish - Kurdî</option>
                                    <option @if($movie['language'] == "ky") selected @endif value="ky">Kyrgyz - кыргызча</option>
                                    <option @if($movie['language'] == "lo") selected @endif value="lo">Lao - ລາວ</option>
                                    <option @if($movie['language'] == "la") selected @endif value="la">Latin</option>
                                    <option @if($movie['language'] == "lv") selected @endif value="lv">Latvian - latviešu</option>
                                    <option @if($movie['language'] == "ln") selected @endif value="ln">Lingala - lingála</option>
                                    <option @if($movie['language'] == "lt") selected @endif value="lt">Lithuanian - lietuvių</option>
                                    <option @if($movie['language'] == "mk") selected @endif value="mk">Macedonian - македонски</option>
                                    <option @if($movie['language'] == "ms") selected @endif value="ms">Malay - Bahasa Melayu</option>
                                    <option @if($movie['language'] == "ml") selected @endif value="ml">Malayalam - മലയാളം</option>
                                    <option @if($movie['language'] == "mt") selected @endif value="mt">Maltese - Malti</option>
                                    <option @if($movie['language'] == "mr") selected @endif value="mr">Marathi - मराठी</option>
                                    <option @if($movie['language'] == "mn") selected @endif value="mn">Mongolian - монгол</option>
                                    <option @if($movie['language'] == "ne") selected @endif value="ne">Nepali - नेपाली</option>
                                    <option @if($movie['language'] == "no") selected @endif value="no">Norwegian - norsk</option>
                                    <option @if($movie['language'] == "nb") selected @endif value="nb">Norwegian Bokmål - norsk bokmål</option>
                                    <option @if($movie['language'] == "nn") selected @endif value="nn">Norwegian Nynorsk - nynorsk</option>
                                    <option @if($movie['language'] == "oc") selected @endif value="oc">Occitan</option>
                                    <option @if($movie['language'] == "or") selected @endif value="or">Oriya - ଓଡ଼ିଆ</option>
                                    <option @if($movie['language'] == "om") selected @endif value="om">Oromo - Oromoo</option>
                                    <option @if($movie['language'] == "ps") selected @endif value="ps">Pashto - پښتو</option>
                                    <option @if($movie['language'] == "fa") selected @endif value="fa">Persian - فارسی</option>
                                    <option @if($movie['language'] == "pl") selected @endif value="pl">Polish - polski</option>
                                    <option @if($movie['language'] == "pt") selected @endif value="pt">Portuguese - português</option>
                                    <option @if($movie['language'] == "pt-BR") selected @endif value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                    <option @if($movie['language'] == "pt-PT") selected @endif value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                    <option @if($movie['language'] == "pa") selected @endif value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                    <option @if($movie['language'] == "qu") selected @endif value="qu">Quechua</option>
                                    <option @if($movie['language'] == "ro") selected @endif value="ro">Romanian - română</option>
                                    <option @if($movie['language'] == "mo") selected @endif value="mo">Romanian (Moldova) - română (Moldova)</option>
                                    <option @if($movie['language'] == "rm") selected @endif value="rm">Romansh - rumantsch</option>
                                    <option @if($movie['language'] == "ru") selected @endif value="ru">Russian - русский</option>
                                    <option @if($movie['language'] == "gd") selected @endif value="gd">Scottish Gaelic</option>
                                    <option @if($movie['language'] == "sr") selected @endif value="sr">Serbian - српски</option>
                                    <option @if($movie['language'] == "sh") selected @endif value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                    <option @if($movie['language'] == "sn") selected @endif value="sn">Shona - chiShona</option>
                                    <option @if($movie['language'] == "sd") selected @endif value="sd">Sindhi</option>
                                    <option @if($movie['language'] == "si") selected @endif value="si">Sinhala - සිංහල</option>
                                    <option @if($movie['language'] == "sk") selected @endif value="sk">Slovak - slovenčina</option>
                                    <option @if($movie['language'] == "sl") selected @endif value="sl">Slovenian - slovenščina</option>
                                    <option @if($movie['language'] == "so") selected @endif value="so">Somali - Soomaali</option>
                                    <option @if($movie['language'] == "st") selected @endif value="st">Southern Sotho</option>
                                    <option @if($movie['language'] == "es") selected @endif value="es">Spanish - español</option>
                                    <option @if($movie['language'] == "es-AR") selected @endif value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                    <option @if($movie['language'] == "es-419") selected @endif value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                    <option @if($movie['language'] == "es-MX") selected @endif value="es-MX">Spanish (Mexico) - español (México)</option>
                                    <option @if($movie['language'] == "es-ES") selected @endif value="es-ES">Spanish (Spain) - español (España)</option>
                                    <option @if($movie['language'] == "es-US") selected @endif value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                    <option @if($movie['language'] == "su") selected @endif value="su">Sundanese</option>
                                    <option @if($movie['language'] == "sw") selected @endif value="sw">Swahili - Kiswahili</option>
                                    <option @if($movie['language'] == "sv") selected @endif value="sv">Swedish - svenska</option>
                                    <option @if($movie['language'] == "tg") selected @endif value="tg">Tajik - тоҷикӣ</option>
                                    <option @if($movie['language'] == "ta") selected @endif value="ta">Tamil - தமிழ்</option>
                                    <option @if($movie['language'] == "tt") selected @endif value="tt">Tatar</option>
                                    <option @if($movie['language'] == "te") selected @endif value="te">Telugu - తెలుగు</option>
                                    <option @if($movie['language'] == "th") selected @endif value="th">Thai - ไทย</option>
                                    <option @if($movie['language'] == "ti") selected @endif value="ti">Tigrinya - ትግርኛ</option>
                                    <option @if($movie['language'] == "to") selected @endif value="to">Tongan - lea fakatonga</option>
                                    <option @if($movie['language'] == "tr") selected @endif value="tr">Turkish - Türkçe</option>
                                    <option @if($movie['language'] == "tk") selected @endif value="tk">Turkmen</option>
                                    <option @if($movie['language'] == "tw") selected @endif value="tw">Twi</option>
                                    <option @if($movie['language'] == "uk") selected @endif value="uk">Ukrainian - українська</option>
                                    <option @if($movie['language'] == "ur") selected @endif value="ur">Urdu - اردو</option>
                                    <option @if($movie['language'] == "ug") selected @endif value="ug">Uyghur</option>
                                    <option @if($movie['language'] == "uz") selected @endif value="uz">Uzbek - o‘zbek</option>
                                    <option @if($movie['language'] == "vi") selected @endif value="vi">Vietnamese - Tiếng Việt</option>
                                    <option @if($movie['language'] == "wa") selected @endif value="wa">Walloon - wa</option>
                                    <option @if($movie['language'] == "cy") selected @endif value="cy">Welsh - Cymraeg</option>
                                    <option @if($movie['language'] == "fy") selected @endif value="fy">Western Frisian</option>
                                    <option @if($movie['language'] == "xh") selected @endif value="xh">Xhosa</option>
                                    <option @if($movie['language'] == "yi") selected @endif value="yi">Yiddish</option>
                                    <option @if($movie['language'] == "yo") selected @endif value="yo">Yoruba - Èdè Yorùbá</option>
                                    <option @if($movie['language'] == "zu") selected @endif value="zu">Zulu - isiZulu</option>
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
                                        <option @if(in_array($genre['id'], $movie_genre_ids)) selected @endif value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
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
                                        <option @if(in_array($crew['id'], $movie_crew_ids)) selected @endif value="{{ $crew['id'] }}">{{ $crew['name'] }} - {{ $crew['status'] == 1 ? 'Cast' : 'Director' }}</option>
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
                        <div class="col-span-6">
                            <div class="flex @error('movie_poster')flex-col @enderror">
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
                            <img width="200" src="{{ $movie['movie_poster'] }}" alt="movie_poster" class="max-w-full mt-5 mb-5" />
                        </div>

                        <div class="col-span-6">
                            <div class="relative z-0">
                                <input type="text" id="trailer" name="trailer" value="{{ $movie['trailer'] }}" aria-describedby="trailer_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('trailer')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" placeholder=" " />
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
                            <textarea rows="2" name="description" id="description" aria-describedby="trailer_error" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 focus:border-cyan-500  @error('description')border-red-600 dark:border-red-500 dark:focus:border-red-500 focus:border-red-600 @enderror  appearance-none dark:text-white focus:outline-none focus:ring-0 peer" autocomplete="off">{{ $movie['description'] }}</textarea>
                            <label for="trailer" class="absolute text-gray-300 text-sm @error('description')text-red-600 dark:text-red-500 @enderror duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description <span class="text-red-700 text-sm ml-1">*</span></label>
                        </div>
                        <p id="description_error" class="@error('description')!visible @enderror invisible mt-2 text-xs text-red-600 dark:text-red-400">
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
                    <div class="grid grid-cols-12 gap-3">
                        @if($movie['photos'])
                            @foreach($movie['photos'] as $photo)
                                <div class="col-span-3 block">
                                    <div class="flex items-center justify-center mb-4">
                                        <input id="delete_photo_ids" type="checkbox" name="delete_photo_ids[]" value="{{ $photo['id'] }}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="delete_photo_ids" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Delete?</label>
                                    </div>
                                    <img src="{{ $photo['photo_path'] }}" alt="movie photos" class="max-w-full" />
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="flex">
                    <x-button class="mt-5 mr-2">Update</x-button>
                    <x-cancel-button-component class="mt-5 mr-2" href="{{ route('movies.index') }}">Cancel</x-cancel-button-component>
                </div>
            </form>
        </div>
        <x-created-at-card-component createdAt="{{ $movie['created_at'] }}" modifiedAt="{{ $movie['updated_at'] }}" />
    </div>
@endsection
