<x-app-layout>
  <x-slot name="title">Associate Products</x-slot>
  <x-slot name="header">
    <h2 class="pt-3 text-2xl leading-tight helmd text-hkcolor">
      {{ __('Select an Associate Stationery Product') }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      <div class="pb-8 m-16 border-0 rounded-xl bg-slate-50">
        <div class="flex flex-wrap p-8">

          <div class="max-w-lg mx-auto mt-8">
            <div class="flex flex-col overflow-hidden bg-white border-2 rounded-lg shadow-lg w-96">
              <div class="mx-auto -mt-6 -mb-6 ">
                @if (auth()->user()->username === 'HK34')
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/bogota_abc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/london_abc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/mexico_abc_display.jpg" alt="">
                @else
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/abc_display.jpg" alt="">
                @endif

              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="block -mt-6">
                    <p class="">{!! nl2br($product[0]->description) !!}</p>
                    <p class="mt-8">
                      <a href="{!! url("/product/102") !!}"
                        class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                        Select Associate Business Card </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="max-w-lg mx-auto mt-8">
            <div class="flex flex-col overflow-hidden bg-white border-2 rounded-lg shadow-lg w-96">
              <div class="mx-auto mt-2 mb-3 ml-12 ">
                @if (auth()->user()->username === 'HK34')
                <img class="object-cover w-9/12 ml-5" src="/assets/associate/bogota_afyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-9/12 ml-5" src="/assets/associate/mexico_afyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-9/12 ml-5" src="/assets/associate/london_afyi_display.jpg" alt="">
                @else
                <img class="object-cover w-9/12 ml-5" src="/assets/associate/afyi_display.jpg" alt="">
                @endif
              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="block -mt-6">
                    <p class="">{!! nl2br($product[6]->description) !!}</p>
                    <p class="mt-8">
                      <a href="{!! url("/product/108") !!}"
                        class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                        Select Associate FYI Pads </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="max-w-lg mx-auto mt-8">
            <div class="flex flex-col overflow-hidden bg-white border-2 rounded-lg shadow-lg w-96">
              <div class="mx-auto mt-2 mb-3 ml-12 ">
                @if (auth()->user()->username === 'HK34')
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/associate/bogota_abcfyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/associate/mexico_abcfyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/associate/london_abcfyi_display.jpg" alt="">
                @else
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/associate/abcfyi_display.jpg" alt="">
                @endif
              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="flex -mt-2">
                    <div class="w-1/2 text-sm">
                      <span class="font-bold -pl-4">Business Card </span>
                      <ul class="pl-4" style="list-style-type: disc; list-style-position: outside;">
                        <li>Heavy, Uncoated &nbsp; Cover Stock</li>
                        <li>3.5" x 2"</li>
                        <li>Printed Logo</li>
                        <li>Color, 1-sided</li>
                      </ul>
                    </div>

                    <div class="w-1/2 text-sm">
                      <span class="font-bold">FYI Pads </span>
                      <ul class="pl-4" style="list-style-type: disc; list-style-position: outside;">
                        <li>Text Weight Stock</li>
                        <li>4.25" x 5.5" Pads</li>
                        <li>Full Color, 100 sheets per pad</li>
                        <li>Heavy Chipboard Backer</li>
                      </ul>
                    </div>
                  </div>
                  <p class="mt-4">
                    <a href="{!! url("/product/105") !!}"
                      class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                      Select Combo BC/FYI Pads </a>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="max-w-lg mx-auto mt-8">
            <div class="flex flex-col overflow-hidden bg-white border-2 rounded-lg shadow-lg w-96">
              <div class="mx-auto -mt-6 -mb-6 ">
                @if (auth()->user()->username === 'HK34')
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/bogota_abc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/mexico_abc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/london_abc_display.jpg" alt="">
                @else
                <img class="object-cover w-10/12 ml-5" src="/assets/associate/abc_display.jpg" alt="">
                @endif
              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="block -mt-6">
                    <p class="">{!! nl2br($product[9]->description) !!}</p>
                    <p class="mt-8">
                      <a href="{!! url("/product/110") !!}"
                        class="block px-2 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                        Select Double-Sided Associate BC </a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

</x-app-layout>
