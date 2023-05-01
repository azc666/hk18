<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.typekit.net/tza8nhy.css">


    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- Styles -->

    {{-- @livewireStyles --}}
    {{-- @stack('styles') --}}

</head>

<body class="font-sans antialiased">
    {{--
    <x-banner /> --}}

    <div class="">
        {{-- @livewire('navigation-menu') --}}

        <!-- Page Heading -->
        {{-- @if (isset($header))
        <header class="shadow">
            <div class="flex justify-between px-4 py-2 mx-auto bg-[#55b2fe] max-w sm:px-6 lg:px-24">
                <div>
                    {{ $header }}
                </div>

                <div class="mt-2">
                    <img src="/assets/HKheader2.png" alt="" class="flex-1 h-8">
                </div>

            </div>
        </header>
        @endif --}}

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>



</body>

</html>
