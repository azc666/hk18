<x-app-layout>
  <x-slot name="title">Nametag</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-2xl leading-tight font-helmd text-hkcolor">
      {{ __('Select a Nametag') }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      <div class="flex flex-wrap pb-8 m-16 border-0 rounded-xl bg-bluegray-50">

        <div class="max-w-lg mx-auto mt-8 ">
          <div class="flex flex-col overflow-hidden bg-white border-2 rounded-lg shadow-lg">
            <div class="flex-shrink-0 pt-2 mx-auto ">
              <img class="object-cover h-48 w-7/8" src="/assets/nametag/ntag_display.jpg" alt="">
            </div>
            <div class="flex flex-col justify-between flex-1 p-6 bg-white">
              <div class="flex-1">

                <div class="block -mt-6">

                  <p class="">{!! nl2br($product[11]->description) !!}</p>

                  <p class="mt-8">
                    <a href="{!! url("/product/112") !!}"
                      class="block px-4 py-2 font-semibold text-center bg-blue-500 rounded-md text-bluegray-100 hover:text-indigo-800 hover:font-black">
                      Select
                      Name Tags </a>
                  </p>
                </div>
              </div>

            </div>
          </div>

        </div>



      </div>



    </div>

</x-app-layout>
