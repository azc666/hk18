<x-app-layout>
  <x-slot name="title">{{ __('Create Your ' . $headerMessage) }}</x-slot>
  <x-slot name="header">
    <h2 class="pt-3 text-lg sm:text-2xl leading-tight helmd text-[#000090]">
      {{-- {{ __('Create Your ' . $headerMessage) }} --}}
      {{ __('Create Your ' . $headerMessage) }}
    </h2>
  </x-slot>

  <div class="py-8">
    <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
      <div class="flex p-8 m-16 bg-white border-0 rounded-xl">

        @if ($category->products->count())
        @foreach($category->products->sortBy('prod_name')->chunk(3) as $productChunk)
        @foreach($productChunk as $product)

        <a href="{{ url(substr_replace($product->imagePath, 'pdf', -3)) }}" title="Open PDF of Template in new window"
          target="_blank"><img src="{{ $product->imagePath }}" class="dropshadow" alt="...">
          <h5><i>&nbsp;&nbsp;{!! strip_tags($product->prod_name) !!} Template&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></h5>
        </a>

        {{-- <div class="col-sm-6 col-md-6"> --}}
          <div class="pl-12">
            <p class="pb-4 description text-muted">{!! nl2br($product->description) !!}</p>
            {{-- <h3 class="text-xl text-bluegray-500"> {!! $product->prod_name !!} </h3> --}}
            @if ($product->id === 112)
            <p><i><strong>Please Note:</strong></i><br>Metal name badges are ordered and shipped on a quarterly basis
              from
              our vendor. Please contact Sonia Tsunis <a href="mailto://sonia.tsunis@hklaw.com"
                class="text-blue-800 hover:text-blue-500">(sonia.tsunis@hklaw.com)</a> with any questions.</p>
            @endif

            <br>

            <div>
              <a href="{{ url("/product/$product->id") }}" class="block px-4 py-2 font-semibold text-center
                text-blue-100 bg-blue-500 rounded-md hover:bg-blue-600">Enter Your Product Data</a>
            </div>

          </div>
          {{--
        </div> --}}

        @endforeach
        @endforeach
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
