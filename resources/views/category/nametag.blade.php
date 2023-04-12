<x-app-layout>
  <x-slot name="title">Nametag</x-slot>
  <x-slot name="header">
    <h2 class="font-bold text-2xl text-hkcolor leading-tight">
      {{ __('Select a Nametag') }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="-mt-16 -mb-8 pb-0 sm:pb-0 mx-auto">
      <div class="flex flex-wrap border-0 rounded-xl m-16 pb-8 bg-bluegray-50">

        <div class="mt-8 max-w-lg mx-auto ">
          <div class="bg-white border-2 flex flex-col rounded-lg shadow-lg overflow-hidden">
            <div class="pt-2 flex-shrink-0 mx-auto ">
              <img class="h-48 w-7/8 object-cover"
                src="/assets/nametag/ntag_display.jpg"
                alt="">
            </div>
            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
              <div class="flex-1">

                <div class="block -mt-6">

                  <p class="">{!! nl2br($product[11]->description) !!}</p>

                  <p class="mt-8">
                    <a href="{!! url("/categories/15") !!}" class="bg-blue-500 px-4 py-2 rounded-md block text-center font-semibold text-bluegray-100 hover:text-indigo-800 hover:font-black"> Select
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
