<x-app-layout>
  <x-slot name="title">Categories</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-lg leading-tight sm:text-2xl font-helmd text-hkcolor">
      {{ __('Select a Partner Item') }}
    </h2>
  </x-slot>

  <div class="bg-[#004990] opacity-90">
    <div class="max-w-2xl px-4 py-16 mx-auto mt-8 sm:px-6 sm:py-16 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Partner Items</h2>

      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <a href="/product/103" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            @if (auth()->user()->username === 'HK34')
            <img src="/assets/partner/bogota_pbc_display.jpg"
              class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
            <img src="/assets/partner/mexico_pbc_display.jpg"
              class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK46')
            <img src="/assets/partner/london_pbc_display.jpg"
              class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
            @else
            <img src="/assets/partner/pbc_display.jpg"
              class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
            @endif
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Partner</span> <br>
            Business Cards</h3>
        </a>

        <a href="/product/109" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            @if (auth()->user()->username === 'HK34')
            <img src="/assets/partner/bogota_pfyi_display.jpg" class="mt-6 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK35')
            <img src="/assets/partner/mexico_pfyi_display.jpg" class="mt-6 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK46')
            <img src="/assets/partner/london_pfyi_display.jpg" class="mt-6 group-hover:opacity-75">
            @else
            <img src="/assets/partner/pfyi_display.jpg" class="mt-6 group-hover:opacity-75">
            @endif
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Partner</span> <br>
            FYI Pads</h3>
        </a>

        <a href="/product/106" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            @if (auth()->user()->username === 'HK34')
              <img src="/assets/partner/bogota_pbcfyi_display.jpg"
                class="mt-6 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK35')
              <img src="/assets/partner/mexico_pbcfyi_display.jpg"
                class="mt-6 group-hover:opacity-75">
            @elseif (auth()->user()->username === 'HK46')
              <img src="/assets/partner/london_pbcfyi_display.jpg"
                class="mt-6 group-hover:opacity-75">
            @else
              <img src="/assets/partner/pbcfyi_display.jpg"
                class="mt-6 ml-4 scale-110 group-hover:opacity-75">
            @endif
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Partner</span> <br>
            Combo BC & FYI</h3>
        </a>

        <a href="/product/111" class="group">
          <div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
            <img src="/assets/partner/pbc_display.jpg" class="mt-6 -ml-2 scale-105 group-hover:opacity-75">
          </div>
          <h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
              class="text-3xl font-helmd">Partner</span> <br>
            Double-Sided BCs</h3>
        </a>

        <!-- More products... -->
      </div>
    </div>
  </div>

</x-app-layout>
