@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-xl font-semibold leading-5 text-hkcolor
focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-hkcolor
hover:text-white hover:scale-110 hover:border-indigo-700 focus:outline-none focus:text-hkcolor focus:border-gray-300
transition
duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
