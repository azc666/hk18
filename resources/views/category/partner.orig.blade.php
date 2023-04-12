<x-app-layout>
  <x-slot name="title">Partner Products</x-slot>
  <x-slot name="header">
    {{-- <div class="flex justify-around -mb-2"> --}}
      <h2 class="pt-3 text-lg sm:text-2xl leading-tight font-helmd text-[#000090]">
        {{ __('Select a Partner Item') }}

      </h2>
      {{-- <img src="/assets/HKheader.png" alt="HK" class="object-cover w-[30%] sm:w-[40%]"> --}}
      {{--
    </div> --}}
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      <div class="pb-8 m-16 border-0 rounded-xl ">
        <div class="flex flex-wrap p-8">

          <div class="max-w-lg mx-auto mt-8">
            <div class="flex flex-col overflow-hidden bg-white border-2 rounded-lg shadow-lg w-96">
              <div class="mx-auto -mt-6 -mb-6 ">
                @if (auth()->user()->username === 'HK34')
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/bogota_pbc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/mexico_pbc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/london_pbc_display.jpg" alt="">
                @else
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/pbc_display.jpg" alt="">
                @endif
              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="block -mt-6">
                    <p class="">{!! nl2br($product[2]->description) !!}</p>
                    <p class="mt-8">
                      <a href="{!! url("/product/103") !!}"
                        class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                        Select Partner Business Card </a>
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
                <img class="object-cover w-9/12 ml-5" src="/assets/partner/bogota_pfyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-9/12 ml-5" src="/assets/partner/mexico_pfyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-9/12 ml-5" src="/assets/partner/london_pfyi_display.jpg" alt="">
                @else
                <img class="object-cover w-9/12 ml-5" src="/assets/partner/pfyi_display.jpg" alt="">
                @endif
              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="block -mt-6">
                    <p class="">{!! nl2br($product[6]->description) !!}</p>
                    <p class="mt-8">
                      <a href="{!! url("/product/109") !!}"
                        class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                        Select Partner FYI Pads </a>
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
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/partner/bogota_pbcfyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/partner/mexico_pbcfyi_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/partner/london_pbcfyi_display.jpg" alt="">
                @else
                <img class="object-cover w-9/12 ml-5 -mb-6" src="/assets/partner/pbcfyi_display.jpg" alt="">
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
                        <li>Engraved Logo <br> and text</li>
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
                    <a href="{!! url("/product/106") !!}"
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
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/bogota_pbc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/mexico_pbc_display.jpg" alt="">
                @elseif (auth()->user()->username === 'HK46')
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/london_pbc_display.jpg" alt="">
                @else
                <img class="object-cover w-10/12 ml-5" src="/assets/partner/pbc_display.jpg" alt="">
                @endif
              </div>
              <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                <div class="flex-1">
                  <div class="block -mt-6">
                    <p class="">{!! nl2br($product[10]->description) !!}</p>
                    <p class="mt-8">
                      <a href="{!! url("/product/111") !!}"
                        class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-slate-100 hover:text-slate-50 hover:scale-105 hover:font-bold hover:uppercase">
                        Select Double-Sided Partner BC </a>
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
