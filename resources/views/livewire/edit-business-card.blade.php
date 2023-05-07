<div>
  @if ((session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
  session('prod_layout')
  === 'SBC' || session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC') && session('authorized'))
  @include('layouts/bcdisc-proof-layout')

  @elseif (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
  session('prod_layout')
  === 'SBC' || session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC')
  @include('layouts/bc-proof-layout')

  @elseif ((session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109 ||
  session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI') &&
  session('authorized'))
  @include('layouts/fyidisc-proof-layout')

  @elseif (session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109 ||
  session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI')
  @include('layouts/fyi-proof-layout')

  @elseif ((session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 ||
  session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI') &&
  session('authorized'))
  @include('layouts/bcfyidisc-proof-layout')

  @elseif (session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 ||
  session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI')
  @include('layouts/bcfyi-proof-layout')

  @elseif (session('prod_id') === 110 || session('prod_id') === 111 || session('prod_layout') === 'ADSBC' ||
  session('prod_layout') === 'PDSBC')
  @include('layouts/dsbc-proof-layout')

  @else
  @include('layouts/ntag-proof-layout')
  @endif

  <div class="relative grid grid-cols-12">

    <div class="relative z-10 col-span-7 col-start-1">

      {{-- <h2 class="mt-1 ml-6 text-xl font-semibold tracking-wide text-hkcolor">{{ $product->prod_name }} Proof
      </h2> --}}
      <h2 class="mt-1 ml-6 text-xl tracking-wide text-hkcolor font-helmd">{{ session('prod_name') }} Proof</h2>

      @if (session('prod_id') === 112 || session('prod_layout') === 'NTAG')
      <img src="{{ '/assets/mpdf/ntag_template.jpg' }}" class="absolute inset-x-0 max-w-xl inset-y-14 -pb-2" alt="...">
      <div class="absolute ml-6 text-hkcolor inset-y-72">
        <p class="">{!! nl2br($product->description) !!}</p>
      </div>

      @elseif ((session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
      session('prod_layout') === 'SBC' || session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC') &&
      session('authorized'))
      <img src="{{ '/assets/mpdf/bc_template.jpg' }}" class="absolute inset-x-0 max-w-xl shadow-xl inset-y-14"
        alt="...">
      <div class="text-hkcolor absolute inset-y-[425px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>

      @elseif (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
      session('prod_layout') === 'SBC' || session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC')
      <img src="{{ '/assets/mpdf/bc_template.jpg' }}" class="absolute inset-x-0 max-w-xl shadow-xl inset-y-14"
        alt="...">
      <div class="text-hkcolor absolute inset-y-[425px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>

      @elseif ((session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 ||
      session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI')
      && session('authorized'))
      <img src="{{ '/assets/mpdf/bcfyi_template.jpg' }}"
        class="absolute inset-x-0 max-w-xl shadow-2xl inset-y-14" alt="...">
      <div class="text-hkcolor absolute inset-y-[825px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>

      @elseif (session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 ||
      session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI')
      <img src="{{ '/assets/mpdf/bcfyi_template.jpg' }}" class="absolute inset-x-0 max-w-xl shadow-2xl inset-y-14"
        alt="...">
      <div class="text-hkcolor absolute inset-y-[825px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>

      @elseif ((session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109 ||
      session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI') &&
      session('authorized'))
      <img src="{{ '/assets/mpdf/fyi_template_withCurl.jpg' }}" class="absolute inset-x-0 max-w-xl shadow-xl inset-y-14"
        alt="...">
      <div class="text-hkcolor absolute inset-y-[825px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>

      @elseif (session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109 ||
      session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI')
      <img src="{{ '/assets/mpdf/fyi_template_withCurl.jpg' }}" class="absolute inset-x-0 max-w-xl shadow-xl inset-y-14"
        alt="...">
      <div class="text-hkcolor absolute inset-y-[825px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>


      @elseif (session('prod_id') === 110 || session('prod_id') === 111 || session('prod_layout') === 'ADSBC' ||
      session('prod_layout') === 'PDSBC')
      <img src="{{ '/assets/mpdf/dsbc_template.jpg' }}" class="absolute inset-x-0 max-w-xl shadow-2xl inset-y-14"
        alt="...">
      <div class="text-hkcolor absolute inset-y-[800px] ml-6">
        <p>{!! (session('prod_descr')) !!}</p>
      </div>
      @endif

    </div>

    {{-- <div class="col-span-5 col-start-8 border-2 border-red-400"> --}}
      <div
        class="{{ session('prod_id') === 110 || session('prod_id') === 111 || session('prod_layout') === 'ADSBC' || session('prod_layout') === 'PDSBC' ? 'col-start-7 col-span-6' : 'col-start-8 col-span-5' }} ">
        <h5 class="px-4 mb-4 text-sm text-hkcolor font-hellt">Edit the data for the {{ session('prod_name') }} to update
          the proof.
          Update the cart when all the data has been entered.
        </h5>

        {{-- //////////////////// Form for BC FYI Data //////////////////// --}}
        <form wire:submit.prevent="submitForm" autocomplete="off"
          class="p-2 pl-3 pr-3 space-y-4 bg-white border rounded-md border-hkcolor">
          @csrf

          @if (session('prod_id') === 110 || session('prod_id') === 111 || session('prod_layout') === 'ADSBC' ||
          session('prod_layout') === 'PDSBC')
          @php
          $row = Cart::get(session('rowId'));
          @endphp

          <div class="flex ml-6">
            <div class="mt-4 text-xs text-gray-600 uppercase"> Quantity:</div>
            <div class="mt-1.5 w-3/4 mx-auto">
              <select wire:model="bc_qty"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ session('bc_qty') ? 'text-gray-800' : 'text-gray-400'}}">
                {{-- <option>{{ session('bc_qty') ? session('bc_qty') : 'Quantity for ' . session('prod_name') }} --}}
                <option>
                  {{ $row->options->bc_qty ? $row->options->bc_qty : 'Quantity for ' . session('prod_name') }}
                </option>
                <option class="text-gray-700" value="250">250 Business Cards</option>
                <option class="text-gray-700" value="500">500 Business cards</option>
              </select>

              <div class="flex-none">
                @error(session('bc_qty'))
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="text-sm text-gray-800">
            <div class="flex justify-around -mb-1">
              <div class="ml-10">ENGRAVED SIDE</div>
              <div class="">REVERSE SIDE</div>
            </div>
          </div>

          <style>
            .wrapper {
              display: grid;
              grid-template-columns: 1.25fr 6fr 6fr;
              margin-left: 10px;
              scroll-margin-right: 10px;
            }
          </style>

          <div class="wrapper">
            <div class="mt-1 text-xs text-gray-600 uppercase"> Name:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_name" id="bc_name" name="bc_name" type="text" placeholder="Name for Engraved Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_name') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_name')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_name2" id="bc_name2" name="bc_name2" type="text" placeholder="Name for Reverse Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_name2') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_name2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 text-xs text-gray-600 uppercase"> Title:</div>
            <div class="ml-3 mr-2 -mt-1">
              <select wire:model="bc_title"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $bc_title ? 'text-gray-800' : 'text-gray-400'}}">
                <option value="">Title for Engraved Side
                  {{ $product->id === 111 ? ' (Optional)' : '' }}
                </option>
                @foreach($titles as $title)
                <option value="{{$title}}">{{ $title }}</option>
                @endforeach
              </select>
              <div class="flex-none">
                @error('bc_title')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <select wire:model="bc_title2"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $bc_title2 ? 'text-gray-800' : 'text-gray-400'}}">
                <option value="">Title for Reverse Side
                  {{ $product->id === 111 ? ' (Optional)' : '' }}
                </option>
                @foreach($titles as $title)
                <option value="{{$title}}">{{ $title }}</option>
                @endforeach
              </select>
              <div class="flex-none">
                @error('bc_title2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 text-xs text-gray-600 uppercase"> Email:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_email" id="bc_email" name="bc_email" type="text"
                placeholder="firstname.lastname@hklaw.com"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_email') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_email')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_email2" id="bc_email2" name="bc_email2" type="text"
                placeholder="firstname.lastname@hklaw.com"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_email2') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_email2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 -mr-2 text-xs text-gray-600 uppercase"> Address1:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_address1" id="bc_address1" name="bc_address1" type="text"
                placeholder="Address Line 1 for Engraved Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_address1') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_address1')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_address1b" id="bc_address1b" name="bc_address1b" type="text"
                placeholder="Address Line 1 for Reverse Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_address1b') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_address1b')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 -mr-2 text-xs text-gray-600 uppercase"> Address2:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_address2" id="bc_address2" name="bc_address2" type="text"
                placeholder="Address Line 2 for Engraved Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_address2') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_address2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_address2b" id="bc_address2b" name="bc_address2b" type="text"
                placeholder="Address Line 2 for Reverse Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_address2b') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_address2b')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 mr-2 text-xs text-gray-600 uppercase"> City:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_city" id="bc_city" name="bc_city" type="text" placeholder="City for Engraved Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_city') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_city')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_city2" id="bc_city2" name="bc_city2" type="text" placeholder="City for Reverse Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_city2') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_city2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 mr-2 text-xs text-gray-600 uppercase"> State:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_state" id="bc_state" name="bc_state" type="text"
                placeholder="State for Engraved Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_state') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_state')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_state2" id="bc_state2" name="bc_state2" type="text"
                placeholder="State for Reverse Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_state2') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_state2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 mr-2 text-xs text-gray-600 uppercase"> Zip:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_zip" id="bc_zip" name="bc_zip" type="text" placeholder="Zip for Engraved Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_zip') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_zip')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model="bc_zip2" id="bc_zip2" name="bc_zip2" type="text" placeholder="Zip for Reverse Side"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_zip2') ? "
                border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_zip2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

        <div class="wrapper">
          <div class="mt-1 text-xs text-gray-600 uppercase"> Phone:</div>
          <div class="ml-3 mr-2 -mt-1">
            <input wire:model.lazy="bc_phone" id="bc_phone" name="bc_phone" type="text"
              @if (Auth::user()->username ==
              'HK35' || Auth::user()->username == 'HK42')
              placeholder="XX.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41')
              placeholder="44.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK34')
              placeholder="57.XXX.XXX.XXXX"
              @else
              placeholder="123.555.5555"
              @endif
              {{-- placeholder="Engraved Side (123.555.5555)" --}}
              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
              placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
              $errors->has('bc_phone') ? "border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_phone')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model.lazy="bc_phone2" id="bc_phone2" name="bc_phone2" type="text"
              @if (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42')
              placeholder="XX.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41')
              placeholder="44.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK34')
              placeholder="57.XXX.XXX.XXXX"
              @else
              placeholder="123.555.5555"
              @endif
              {{-- placeholder="Reverse Side (123.555.5555)" --}}
              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
              placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
              $errors->has('bc_phone2') ? "border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_phone2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 text-xs text-gray-600 uppercase"> Mobile:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model.lazy="bc_cell" id="bc_cell" name="bc_cell" type="text"
                @if (Auth::user()->username ==
              'HK35' || Auth::user()->username == 'HK42')
              placeholder="52.XX.XXXX.XXXX"
                @elseif (Auth::user()->username == 'HK41' || Auth::user()->username == 'HK46')
              {{-- placeholder="44.XXXX.XXXXXX" --}}
              placeholder="44.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK34')
              placeholder="57.XXX.XXX.XXXX"
              @else
              placeholder="123.555.5555"
              @endif
              {{-- placeholder="Engraved Side (123.555.5555)" --}}
              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
              placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
              $errors->has('bc_cell') ? "border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_cell')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model.lazy="bc_cell2" id="bc_cell2" name="bc_cell2" type="text"
              @if (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42')
              placeholder="52.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK41' || Auth::user()->username == 'HK46')
              {{-- placeholder="44.XXXX.XXXXXX" --}}
              placeholder="44.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK34')
              placeholder="57.XXX.XXX.XXXX"
              @else
              placeholder="123.555.5555"
              @endif
              {{-- placeholder="Reverse Side (123.555.5555)" --}}
              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
              placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
              $errors->has('bc_cell2') ? "border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_cell2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="wrapper">
            <div class="mt-1 text-xs text-gray-600 uppercase"> Fax:</div>
            <div class="ml-3 mr-2 -mt-1">
              <input wire:model.lazy="bc_fax" id="bc_fax" name="bc_fax" type="text"
              @if (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK41' || Auth::user()->username == 'HK42' || Auth::user()->username == 'HK46')
              placeholder="XX.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK34')
              placeholder="57.XXX.XXX.XXXX"
              @else
              placeholder="123.555.5555"
              @endif
              {{-- placeholder="Engraved Side (123.555.5555)" --}}
              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
              placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
              $errors->has('bc_fax') ? "border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_fax')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="ml-3 mr-2 -mt-1">
              <input wire:model.lazy="bc_fax2" id="bc_fax2" name="bc_fax2" type="text"
                @if (Auth::user()->username ==
              'HK35' || Auth::user()->username == 'HK41' || Auth::user()->username == 'HK42' || Auth::user()->username == 'HK46')
              placeholder="XX.XX.XXXX.XXXX"
              @elseif (Auth::user()->username == 'HK34')
              placeholder="57.XXX.XXX.XXXX"
              @else
              placeholder="123.555.5555"
              @endif
              {{-- placeholder="Reverse Side (123.555.5555)" --}}
              class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
              placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
              $errors->has('bc_fax2') ? "border-2 border-red-500" : '' }}">
              <div class="flex-none">
                @error('bc_fax2')
                <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>

          @else

          <div>
            <div class="mt-1.5">
              @php
              $row = Cart::get(session('rowId'));
              $prod_layout = $row->options->prod_layout;
              @endphp

              <select wire:model="bc_qty" id="bc_qty" name="bc_qty" type="text"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $row->options->bc_qty ? 'text-gray-800' : 'text-gray-400'}}">
                <option>
                  {{-- {{ $row->options->bc_qty ? $row->options->bc_qty . ' mea' : 'Quantity for ' . 'me' }} --}}
                  {{ $row->options->bc_qty ? $row->options->bc_qty : 'Quantity for ' . session('prod_name') }}
                </option>

                @if (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
                session('prod_id') === 110 || session('prod_id') === 111 || session('prod_layout') === 'SBC' ||
                session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC' || session('prod_layout') ===
                'ADSBC'
                || session('prod_layout') === 'PDSBC')
                <option class="text-gray-700" value="250">250 Business Cards</option>
                <option class="text-gray-700" value="500">500 Business cards</option>
                @endif

                @if (session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109 ||
                session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' || session('prod_layout') ===
                'PFYI' || session('prod_layout') === 'SFYI' || session('prod_layout') === 'AFYI' ||
                session('prod_layout')
                === 'PFYI')
                <option class="text-gray-700" value="4">4 FYI Pads</option>
                <option class="text-gray-700" value="8">8 FYI Pads</option>
                @endif

                @if (session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 ||
                session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' || session('prod_layout') ===
                'PBCFYI')
                <option class="text-gray-700" value="24">250 BCs + 4 FYI Pads</option>
                <option class="text-gray-700" value="28">250 BCs + 8 FYI Pads</option>
                <option class="text-gray-700" value="54">500 BCs + 4 FYI Pads</option>
                <option class="text-gray-700" value="58">500 BCs + 8 FYI Pads</option>
                @endif

                @if (session('prod_id') === 112 || session('prod_layout') === 'NTAG')
                <option class="text-gray-700" value="1">1 Name Badge</option>
                <option class="text-gray-700" value="2">2 Name Badges</option>
                <option class="text-gray-700" value="3">3 Name Badges</option>
                @endif
              </select>
            </div>
            @error('bc_qty')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div>
            {{-- <label for="bc_name" class="block text-sm font-medium text-gray-700 uppercase"> Name </label> --}}
            <div class="-mt-1">
              <input wire:model="bc_name" id="bc_name" name="bc_name" type="text"
                placeholder="Name for {{ session('prod_name') }}"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_name') ? "
                border-2 border-red-500" : '' }}">

              {{-- <br>{{ session('name_o') }} --}}
            </div>
            @error('bc_name')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div>
            @if (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
            session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 || $prod_layout ===
            'SBC' || session('prod_layout') === 'SBC' || session('prod_layout') === 'ABC' || session('prod_layout') ===
            'PBC' || session('prod_layout') === 'SBCFYI' || session('prod_layout') === 'ABCFYI' ||
            session('prod_layout')
            === 'PBCFYI')
            <div class="mt-1.5">
              <select wire:model="bc_title"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ session('bc_title') ? 'text-gray-800' : 'text-gray-400'}}">
                <option>Title for {{ session('prod_name') }}
                  {{ session('prod_id') === 103 || session('prod_id') === 106 ||
                  session('prod_layout') === 'PBC' ||
                  session('prod_layout') === 'PBCFYI' ? ' (Optional)' : '' }}{{ session('prod_id') === 104 ||
                  session('prod_id') === 105 ||
                  session('prod_layout') === 'SBCFYI' ||
                  session('prod_layout') === 'ABCFYI' ? ' (Title for BC only)' : '' }}
                </option>
                @foreach($titles as $title)
                <option value="{{$title}}">{{ $title }}</option>
                @endforeach
              </select>
            </div>
            @error('bc_title')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
            @endif
          </div>

          @if (session('authorized'))
          <div>
            <div class="-mt-1">
              <input wire:model="bc_disclaimer1" id="bc_disclaimer1" name="bc_disclaimer1" type="text"
                value="{{ old('bc_disclaimer1') }}" placeholder="Disclaimer Line 1 for {{ $product->prod_name }}"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_disclaimer1') ? "
                border-2 border-red-500" : '' }}">
            </div>
            @error('bc_disclaimer1')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          {{-- @endif --}}

          <div>
            <div class="-mt-1">
              <input wire:model="bc_disclaimer2" id="bc_disclaimer2" name="bc_disclaimer2" type="text"
                value="{{ old('bc_disclaimer2') }}" placeholder="Disclaimer Line 2 for {{ $product->prod_name }}"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_disclaimer2') ? "
                border-2 border-red-500" : '' }}">
            </div>
            @error('bc_disclaimer2')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          @endif

          @if (session('prod_id') === 101 || session('prod_id') === 102 || session('prod_id') === 103 ||
          session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106 || session('prod_id')
          ===
          107 || session('prod_id') === 108 || session('prod_id') === 109 || session('prod_layout') === 'SBC' ||
          session('prod_layout') === 'ABC' || session('prod_layout') === 'PBC' || session('prod_layout') === 'SFYI' ||
          session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI' || session('prod_layout') === 'SBCFYI'
          ||
          session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI')
          <div>
            <div class="mt-1.5">
              <input wire:model="bc_email" id="bc_email" name="bc_email" type="text"
                placeholder="Email (firstname.lastname@hklaw.com)"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_email') ? "
                border-2 border-red-500" : '' }}">
            </div>
            @error('bc_email')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex justify-between">
            <div>
              <div class="mt-1 mr-1">
                <label for="bc_phone" class="block ml-2 text-xs font-medium text-gray-500 uppercase"> Phone </label>

                <input wire:model.lazy="bc_phone" id="bc_phone" name="bc_phone" type="text"
                  @if (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42')
                  placeholder="XX.XX.XXXX.XXXX"
                  @elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41')
                  placeholder="XX.XX.XXXX.XXXX"
                  @elseif (Auth::user()->username == 'HK34')
                  placeholder="57.XXX.XXX.XXXX"
                  @else
                  placeholder="123.555.5555"
                  @endif

                {{-- placeholder="123.555.5555" --}}
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm
                placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
                $errors->has('bc_phone') ? "border-2 border-red-500" : '' }}">
              </div>
              @error('bc_phone')
              <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <div class="mt-1 mr-1">
                <label for="bc_cell" class="block ml-2 text-xs font-medium text-gray-500 uppercase"> Mobile </label>
                <input wire:model.lazy="bc_cell" id="bc_cell" name="bc_cell" type="text"
                  @if (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42')
                  placeholder="52.XX.XXXX.XXXX"
                  @elseif (Auth::user()->username == 'HK41' || Auth::user()->username == 'HK46')
                {{-- placeholder="44.XXXX.XXXXXX" --}}
                  placeholder="44.XX.XXXX.XXXX"
                  @elseif (Auth::user()->username == 'HK34')
                  placeholder="57.XXX.XXX.XXXX"
                  @else
                  placeholder="123.555.5555"
                  @endif

                {{-- placeholder="123.555.5555" --}}
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm
                placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
                $errors->has('bc_mobile') ? "border-2 border-red-500" : '' }}">
              </div>
              @error('bc_cell')
              <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <div class="mt-1 mr-1">
                <label for="bc_fax" class="block ml-2 text-xs font-medium text-gray-500 uppercase"> Fax </label>
                <input wire:model.lazy="bc_fax" id="bc_fax" name="bc_fax" type="text"
                  @if (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42')
                  placeholder="XX.XX.XXXX.XXXX"
                  @elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41')
                  placeholder="XX.XX.XXXX.XXXX"
                  @elseif (Auth::user()->username == 'HK34')
                  placeholder="57.XXX.XXX.XXXX"
                  @else
                  placeholder="123.555.5555"
                  @endif

                {{-- placeholder="123.555.5555" --}}
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm
                placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{
                $errors->has('bc_fax') ? "border-2 border-red-500" : '' }}">
              </div>
              @error('bc_fax')
              <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div>
            <div class="mt-1.5">
              <input wire:model="bc_address1" id="bc_address1" name="bc_address1" type="text"
                placeholder="Address Line 1 for {{ session('prod_name') }}"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_address1') ? "
                border-2 border-red-500" : '' }}">
            </div>
            @error('bc_address1')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <div class="mt-1.5">
              <input wire:model="bc_address2" id="bc_address2" name="bc_address2" type="text"
                placeholder="Address Line 2 for {{session('prod_name') }}"
                class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_address2') ? "
                border-2 border-red-500" : '' }}">
            </div>
            @error('bc_address2')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="relative grid grid-cols-12">
            <div class="col-span-6 col-start-1">
              <div class="mt-1.5 mr-1">
                {{-- <label for="bc_city" class="block ml-2 text-xs font-medium text-gray-500 uppercase"> City </label>
                --}}
                <input wire:model.lazy="bc_city" id="bc_city" name="bc_city" type="text"
                  placeholder="City for {{ session('prod_name') }}"
                  class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_city') ? "
                  border-2 border-red-500" : '' }}">
              </div>
              @error('bc_city')
              <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div class="col-span-3 col-start-7">
              <div class="mt-1.5 mr-1">
                {{-- <label for="bc_state" class="block ml-2 text-xs font-medium text-gray-500 uppercase"> State
                </label> --}}
                <input wire:model.lazy="bc_state" id="bc_state" name="bc_state" type="text"
                  placeholder="State for {{ session('prod_name') }}"
                  class="appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm {{ $errors->has('bc_state') ? "
                  border-2 border-red-500" : '' }}">
              </div>
              @error('bc_state')
              <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div class="col-span-3 col-start-10">
              <div class="mt-1.5 mr-1">
                {{-- <label for="bc_zip" class="block ml-2 text-xs font-medium text-gray-500 uppercase"> Zip </label>
                --}}
                <input wire:model.lazy="bc_zip" id="bc_zip" name="bc_zip" type="text"
                  placeholder="Zip for {{ session('prod_name') }}" class=" appearance-none block w-full px-3 py-2 border border-hkcolor bg-white rounded-md
                shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500
                sm:text-sm {{ $errors->has('bc_zip') ? " border-2 border-red-500" : '' }}">
              </div>
              @error('bc_zip')
              <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
          </div>
          @endif

          @endif
          {{-- @endforeach --}}
          <div>
            <label for="specialInstructions" class="block ml-2 text-xs font-medium text-gray-500 uppercase">
              Special Instructions <span class="capitalize"></span>
            </label>
            <div class="mt-1.5">
              <textarea wire:model="bc_specialInstructions" id="bc_specialInstructions" name="bc_specialInstructions"
                rows="5"
                class="block w-full px-3 py-2 placeholder-gray-400 bg-white border rounded-md shadow-sm appearance-none border-hkcolor focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>
            @error('bc_specialInstructions')
            <p class="mt-1 mb-6 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex justify-between">
            <div>
              <a href="{{ url('/cart') }}"
                class="block px-16 py-2 mt-8 font-bold text-center text-gray-100 uppercase bg-gray-500 rounded-md hover:bg-gray-600"
                role="button">Cancel</a>
            </div>

            <div class="">
              <button type="submit"
                class="block px-12 py-2 mt-8 font-bold text-center text-blue-100 uppercase bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-25"
                {{ strlen($bc_name)>3?'':'disabled' }}>
                <svg wire:loading wire:target="submitForm" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                  </path>
                </svg>
                <span>Update Cart</span>
              </button>
            </div>

          </div>
        </form>

      </div>

      @if (session('prod_id') === 107 || session('prod_id') === 108 || session('prod_id') === 109 || session('prod_id')
      === 104 ||
      session('prod_id') === 105 || session('prod_id') === 106 || session('prod_layout') === 'SFYI' ||
      session('prod_layout') === 'AFYI' || session('prod_layout') === 'PFYI' || session('prod_layout') === 'SBCFYI' ||
      session('prod_layout') === 'ABCFYI' || session('prod_layout') === 'PBCFYI')
      <div class="py-36"></div>
      @endif
      {{-- @if (session('prod_id') === 112)
      <div class="py-36"></div>
      @endif --}}
      {{-- @php
      dd(session('prod_id'));
      @endphp --}}
      {{-- @if (session('prod_id') === 104 || session('prod_id') === 105 || session('prod_id') === 106)
      <div class="py-36"></div>
      @endif --}}

    </div> {{-- ////// End of right column ////// --}}

  </div> {{-- </ ///// End of grid ////// --}}
