{{-- <div> --}}
  {{-- @dd($this->cartCollection->count()) --}}
  @if (Cart::content()->count() !== 0)
{{-- @if (Cart::content()->count() !== 0) --}}
  <div class="w-11/12 mx-auto mt-6 mb-6 border border-gray-200 rounded-md">
    <div class="ml-2 mr-2 mx-auto p-4 m-4 bg-gray-100 rounded-md border-2 border-gray-200 shadow-md">
      <div class="flex justify-between relative">
        <div class="pt-1">
        {{-- <form method="post" action="postDate" autocomplete="off"> --}}
        {{-- <form method="post" action="postDate" autocomplete="off"> --}}
            @csrf
          <input wire:model="rush" id="rush" name="rush" class="mt-6 ml-4" type="checkbox" value="true">
          <label for="rush" class="absolute top-6 -mt-0.5 font-bold "><span class="text-gray-800 pl-4"><span class="text-xl">RUSH </span>THIS ORDER</span></label>
        </div>

        <div class="{{ $this->rush === false ? "hidden" : ''}}">
          <label class="block font-medium text-sm text-gray-700" for="date">
            Requested due date:
          </label>
          <input wire:model.lazy="date" type="text" id="date" name="date"
            class="mt-.5 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
            placeholder="MM/DD/YYYY" autocomplete="off"/>
        </div>

      </div>

      <div class="pt-6 pb-6 text-center">
        If <strong>"RUSH"</strong> is selected, all items in this cart will be produced and shipped on an ASAP expedited basis irrespective of date requested. <br>
        <strong>"RUSH"</strong> Partner Business Cards in this cart will have Digital cards produced and shipped while the engraved version is being produced.
      </div>
    </div>
  </div>

  <div class="text-align-right mx-auto mb-4 -mt-2">


    {{-- <button wire:click="submitRush" type="submit"
      class="mr-2 px-16 py-2 rounded-md bg-blue-700 hover:bg-blue-400 hover:border-blue-600 hover:border-2 shadow-lg text-white text-sm font-bold uppercase">
      Proceed to Checkout
    </button> --}}
    <form method="post" action="postDate" autocomplete="off">
    @csrf
    <input type="submit"
      class="mr-2 px-16 py-2 rounded-md bg-blue-700 hover:bg-blue-400 hover:border-blue-600 hover:border-2 shadow-lg text-white text-sm font-bold uppercase"
      value="Proceed to Checkout">
    </form>
{{-- {{ Session::put('date', $this->date) }} --}}
  </div>
    {{-- </form> --}}
  {{-- {{ request('date') }} --}}

{{-- </div> --}}

@endif
{{-- </div> --}}

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script>
  new Pikaday({
        field: document.getElementById('date'),
        format: 'MM/DD/YYYY'
    })
</script>
@endsection
