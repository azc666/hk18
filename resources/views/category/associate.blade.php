<x-app-layout>
  <x-slot name="title">Associate Products</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-lg leading-tight sm:text-2xl font-helmd text-hkcolor">
      {{ __('Select an Associate Stationery Product') }}
    </h2>
  </x-slot>

  <div class="bg-[#004990] opacity-90">
    <div class="max-w-2xl px-4 py-16 mx-auto mt-8 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Associate Items</h2>

      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <a href="/product/102" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            @if (auth()->user()->username === 'HK34')
            <img src="/assets/associate/bogota_abc_display.jpg"
              class="object-center w-full h-full ml-1 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
            <img src="assets/associate/mexico_abcfyi_display.jpg"
              class="object-center w-full h-full ml-4 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK46')
            <img src="assets/associate/london_abcfyi_display.jpg"
              class="object-center w-full h-full ml-4 group-hover:opacity-75">
            @else
            <img src="/assets/associate/abc_display.jpg" class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
            @endif
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Associate</span> <br>
            Business Cards</h3>
        </a>

        <a href="/product/108" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            @if (auth()->user()->username === 'HK34')
            <img src="/assets/associate/bogota_afyi_display.jpg" class="mt-6 group-hover:opacity-75">
            @else
            <img src="/assets/associate/afyi_display.jpg" class="mt-6 group-hover:opacity-75">
            @endif
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Associate</span> <br>
            FYI Pads</h3>
        </a>

        <a href="/product/105" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            <img src="/assets/associate/abcfyi_display.jpg" class="mt-6 ml-4 scale-110 group-hover:opacity-75">
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Associate</span> <br>
            Combo BC & FYI</h3>
        </a>

        <a href="/product/110" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            <img src="/assets/associate/abc_display.jpg" class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Associate</span> <br>
            Double-Sided BCs</h3>
        </a>

        <!-- More products... -->
      </div>
    </div>
  </div>

</x-app-layout>
