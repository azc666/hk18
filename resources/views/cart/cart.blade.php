<x-app-layout>
  <x-slot name="title">{{ __('Your Cart') }}</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-2xl leading-tight font-helmd text-hkcolor">
      {{ __('Your Cart Details') }}
    </h2>
  </x-slot>
  {{-- @dd(empty(session('cartItem'))) --}}

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      {{-- @if (empty(session('cartItem'))) --}}
      @if (Cart::content()->count() === 0)

      {{-- @if (session('clearCart') === true) --}}
      <div class="w-2/3 mt-[100px] mb-4 mx-auto">
        <x-flash type="warning">
          There aren't any items in your Cart !
          {{ Session::put('clearCart', true) }}
          {{ Session::put('saveCart', false) }}
          {{ Session::put('restoreCart', false) }}
          {{-- {{ Session::put('clearCart', false) }} --}}
        </x-flash>

      </div>
      {{-- @endif --}}
      {{-- <div class="flex flex-wrap m-16 border-0 rounded-xl bg-slate-50">
        <div class="p-6 mx-auto text-xl uppercase text-hkcolor text-bold">
          <span class="inline-block align-middle">There aren't any items in your Cart !</span>
        </div>
      </div> --}}
      @else
      <livewire:cart-view />
      @endif
    </div>
  </div>

</x-app-layout>
