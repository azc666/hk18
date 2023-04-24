<x-app-layout>
  <x-slot name="title">{{ __('Create Your ' . $headerMessage) }}</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-lg leading-tight sm:text-2xl font-helmd text-hkcolor">
      {{ __('Create Your ' . $headerMessage) }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      <div class="p-6 pb-12 m-16 border-0 bg-slate-100 opacity-90 rounded-xl">


        <livewire:business-card :product="$product" :title="$titles" />


      </div>
    </div>
  </div>

</x-app-layout>
