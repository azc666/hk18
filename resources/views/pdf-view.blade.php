<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="relative top-4">
        @if ((session('prod_id') === 101 ||
        session('prod_id') === 102 ||
        session('prod_id') === 103 ||
        session('prod_layout') === 'SBC' ||
        session('prod_layout') === 'ABC' ||
        session('prod_layout') === 'PBC') && session('authorized'))
        <img src="assets/mpdf/bc_template.jpg" style="width:100%;" class="">
        @include('layouts/bcdisc-cart-proof-layout')
        {{-- @endif --}}

        @elseif (session('prod_id') === 101 ||
        session('prod_id') === 102 ||
        session('prod_id') === 103 ||
        session('prod_layout') === 'SBC' ||
        session('prod_layout') === 'ABC' ||
        session('prod_layout') === 'PBC')
        <img src="assets/mpdf/bc_template.jpg" style="width:100%;" class="">
        @include('layouts/bc-cart-proof-layout')
        @endif

        @if ((
        session('prod_id') === 104 ||
        session('prod_id') === 105 ||
        session('prod_id') === 106 ||
        session('prod_layout') === 'SBCFYI' ||
        session('prod_layout') === 'ABCFYI' ||
        session('prod_layout') === 'PBCFYI') && session('authorized'))
        {{-- $authorized = session('authorized'); --}}
        {{-- Session::put('authorized', session('authorized')); --}}
        <img src="assets/mpdf/bcfyi_template_withoutCurl.jpg" class="absolute mt-2 ml-2" style="width:100%" />
        {{-- @include('layouts/bcfyidisc-cart-proof-layout') --}}
        @include('/layouts/bcfyidisc-cart-proof-layout')
        {{-- @endif --}}

        @elseif ($product->id === 104 ||
        $product->id === 105 ||
        $product->id === 106 ||
        session('prod_id') === 104 ||
        session('prod_id') === 105 ||
        session('prod_id') === 106 ||
        session('prod_layout') === 'SBCFYI' ||
        session('prod_layout') === 'ABCFYI' ||
        session('prod_layout') === 'PBCFYI')
<img src="assets/mpdf/bcfyi_template.jpg" class="absolute mt-2 ml-2" style="width:100%" />
        @include('layouts/bcfyi-cart-proof-layout')
        @endif

    @if ((
        session('prod_id') === 107 ||
        session('prod_id') === 108 ||
        session('prod_id') === 109 ||
        session('prod_layout') === 'SFYI' ||
        session('prod_layout') === 'AFYI' ||
        session('prod_layout') === 'PFYI') && session('authorized'))
    <img src="assets/mpdf/fyi_template.jpg" class="mt-2 ml-2" style="width:100%" />
    @include('layouts/fyidisc-cart-proof-layout')
        {{-- @endif --}}

        @elseif ($product->id === 107 ||
        $product->id === 108 ||
        $product->id === 109 ||
        session('prod_id') === 107 ||
        session('prod_id') === 108 ||
        session('prod_id') === 109 ||
        session('prod_layout') === 'SFYI' ||
        session('prod_layout') === 'AFYI' ||
        session('prod_layout') === 'PFYI')
        <img src="assets/mpdf/fyi_template.jpg" class="mt-2 ml-2" style="width:100%" />
        @include('layouts/fyi-cart-proof-layout')
        @endif

        @if ($product->id === 110 ||
        $product->id === 111 ||
        session('prod_id') === 110 ||
        session('prod_id') === 111 ||
        session('prod_layout') === 'ADSBC' ||
        session('prod_layout') === 'PDSBC')
        <img src="assets/mpdf/dsbc_template.jpg" class="mt-2 ml-2" style="width:100%" />
        @include('layouts/dsbc-cart-proof-layout')
        @endif

        @if ($product->id === 112 || session('prod_id') === 112 || session('prod_layout') === 'NTAG')
        <img src="assets/mpdf/ntag_template.jpg" class="ml-2" style="width:100%" />
        @include('layouts/ntag-cart-proof-layout')
        @endif

    </div>
</body>

</html>
