<x-app-layout>
  {{-- <x-slot name="title">{{ __('Create Your ' . $headerMessage) }}</x-slot> --}}
  <x-slot name="title"> {{ __('Edit Your ' . $headerMessage) }}</x-slot>
  <x-slot name="header">
    <h2 class="pt-2 text-2xl leading-tight font-helmd text-hkcolor">
      {{ __('Edit Your ' . $headerMessage) }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      <div class="p-6 pb-12 m-16 border-0 bg-slate-100 opacity-90 rounded-xl">

        {{-- @if ($product->id === 112)
        <livewire:ntag-form :product="$product">
          @elseif ($product->id === 101 || $product->id === 102 || $product->id === 103 || $product->id === 104 ||
          $product->id === 105 || $product->id === 106 || $product->id === 107 || $product->id === 108 || $product->id
          === 109) --}}
          {{--
          <livewire:business-card :product="$product" :title="$titles" /> --}}
          <livewire:edit-business-card :product="$product" :title="$titles" />
          {{-- @endif --}}

      </div>
    </div>
  </div>

</x-app-layout>

{{-- <script>
  function printImg(url) {
  var win = window.open('');
  win.document.write('<img style="width:600px;" src="' + url + '" onload="window.print();window.close()" />');
  win.focus();
}
</script> --}}
