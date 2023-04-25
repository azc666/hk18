<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <link rel="shortcut icon" href="{{ asset('/asset/hk2.png') }}"> --}}
    {{--
    <link rel="shortcut icon" href="{{ asset('assets/HK2.ico') }}"> --}}
    {{--
    <link rel="icon" type="image/png" href="{{ asset('assets/HK2.png') }}"> --}}
    <!-- Favicon -->
    {{--
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('hk2.ico') }}"> --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://use.typekit.net/tza8nhy.css">

    <title>{{ $title ?? 'HK Order Portal' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css" rel="stylesheet">

    @livewireStyles

</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-hkcolor">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
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
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    <x-footer />

    @livewire('livewire-ui-modal')
    @livewireScripts
</body>

</html>
