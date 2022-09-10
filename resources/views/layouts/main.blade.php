<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwindcss Course</title>

    <!-- Fonts -->
{{--    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">

    {{--<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="m-0 font-sans antialiased font-normal text-size-base leading-default bg-gray-50 text-slate-500 dark:bg-gray-900">

    @include('layouts.sidebar')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">

            @include('layouts.navbar')

            <div class="w-full px-6 py-6 mx-auto">
                @yield('content')
            </div>
    </main>

    @livewireScripts

    {{-- <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>--}}

    @vite('resources/js/app.js')

    @vite('resources/js/dashboard/plugins/chartjs.min.js')

    @vite('resources/js/dashboard/plugins/perfect-scrollbar.min.js')

    @vite('resources/js/dashboard/soft-ui-dashboard-tailwind.js')

    <script>

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        // Whenever the user explicitly chooses light mode
        localStorage.theme = 'light'

        // Whenever the user explicitly chooses dark mode
        localStorage.theme = 'dark'

        // Whenever the user explicitly chooses to respect the OS preference
        localStorage.removeItem('theme')


        // dark mode
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>

    @yield('script')

</body>

</html>
