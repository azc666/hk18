<x-app-layout>
  <x-slot name="title">{{ __('Order Confirmation') }}</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-2xl leading-tight helmd text-hkcolor">
      {{ __('Order Confirmation: ') . $confirmation }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto mb-2 -mt-16 sm:pb-0">
      <div class="flex flex-wrap m-16 border-0 rounded-xl bg-gray-50">
        <div class="p-6 mx-auto text-lg uppercase -pb-6 text-hkcolor text-bold">
          <span class="inline-block align-left">{{ Auth::user()->username }} &nbsp;&nbsp; | &nbsp;&nbsp;{{
            Auth::user()->loc_name }} &nbsp;&nbsp; | &nbsp;&nbsp;Order Date: {{ $order->created_at->format('m/d/Y') }}
            &nbsp;&nbsp; | &nbsp;&nbsp;Confirmation: {{ $confirmation }}</span>
        </div>

        <div class="">
          {{-- <div class=""> --}}

            {{-- </div> --}}

          <livewire:place-order :confirmation="$confirmation" :cart="$cart" :orderArray="$orderArray"
            :orderArrayCount="$orderArrayCount" :savedCart="$savedCart" :Order="$order" :dt_o="$dt_o" :rush="$rush" />


        </div>


      </div>
    </div>
  </div>

</x-app-layout>
