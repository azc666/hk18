<div class="mx-auto">
  <table class="mx-auto mt-4 mb-4 " width="100%">
    <thead>
      <tr class="text-base text-left text-gray-600 uppercase">
        <th style="padding-bottom: 10px;" width="25%"></th>
        <th class="pl-20">Product</th>
        <th>Detail</th>
        <th>Quantity</th>
      </tr>
    </thead>

    <tbody>
      @foreach(Cart::content() as $row)
      <tr class="pt-2 pb-4 border-t-2 border-b-2 border-t-gray-400 border-b-gray-400">
        <td>
          <a href="{{ $row->options->proof_path }}" target="_blank"> <img
              style="max-width: 85%; height: auto; margin-left: 20px; margin-top: 10px;"
              class="object-cover rounded-md shadow-xl" src="{{ $row->options->proof_path }}"></a>
          <div class="mb-4"></div>
        </td>

        <td>
          <p class="mb-1 text-lg font-bold uppercase text-hkcolor">{{ $row->name }}</p>

          @if (strpos($row->name, '+') && str_contains($row->name, 'Partner'))
          <p class="mb-2">{!! nl2br(App\Models\Product::find(103)->description) !!}</p>
          <p>{!! nl2br(App\Models\Product::find(107)->description) !!}</p>
          @elseif (strpos($row->name, '+') && (str_contains($row->name, 'Staff') ||
          str_contains($row->name, 'Associate')))
          <p class="mb-2">{!! nl2br(App\Models\Product::find(101)->description) !!}</p>
          <p>{!! nl2br(App\Models\Product::find(107)->description) !!}</p>
          @else
          {{-- <p>{!! $row->options->has('bc_descr') ? nl2br($row->options->bc_descr) : '' !!}</p> --}}
          <p>{!! ($row->options->prod_descr) !!}</p>
          @endif
        </td>

        <td>
          @if ($row->id === 110 || $row->id === 111 || $row->options->prod_layout === 'ADSBC' ||
          $row->options->prod_layout === 'PDSBC')
          <div class="w-24 pt-2 mt-1 text-xs text-gray-400 uppercase border-b-2">Front Side</div>
          @endif

          @if ($row->options->bc_name)
          <div class="mt-1 text-xs text-gray-400 uppercase">Name</div>
          {{ $row->options->bc_name }}<br>
          @endif

          @if ($row->options->bc_title)
          <div class="pt-2 text-xs text-gray-400 uppercase">Title</div>
          @if ($row->options->bc_title == 'Staff Attorney (Title will be updated to "Attorney")')
          {{ $row->options->bc_title = 'Attorney' }}
          @else
          {{ $row->options->bc_title }}<br>
          @endif
          @endif

          @if ($row->options->bc_email)
          <div class="pt-2 text-xs text-gray-400 uppercase">Email</div>
          {{ $row->options->bc_email }}<br>
          @endif

          @if ($row->id === 110 || $row->id === 111 || $row->options->prod_layout === 'ADSBC' ||
          $row->options->prod_layout === 'PDSBC')
          <div class="w-24 pt-2 mt-1 text-xs text-gray-400 uppercase border-b-2">Reverse Side</div>
          @if ($row->options->bc_name2)
          <div class="mt-1 text-xs text-gray-400 uppercase">Name</div>
          {{ $row->options->bc_name2 }}<br>
          @endif

          @if ($row->options->bc_title2)
          <div class="pt-2 text-xs text-gray-400 uppercase">Title</div>
          @if ($row->options->bc_title2 == 'Staff Attorney (Title will be updated to "Attorney")')
          {{ $row->options->bc_title2 = 'Attorney' }}
          @else
          {{ $row->options->bc_title2 }}<br>
          @endif
          @endif

          @if ($row->options->bc_email2)
          <div class="pt-2 text-xs text-gray-400 uppercase">Email</div>
          {{ $row->options->bc_email2 }}<br>
          @endif
          @endif

          @if ( $row->options->sp_instr )
          <div style="width: 325px;" class="pb-1 mt-2 mb-1 text-xs text-gray-400 uppercase border border-gray-200">
            Special Instructions: <br>
            <p class="p-1 text-sm text-gray-800 normal-case">{!! nl2br(e($row->options->sp_instr))
              !!}
            </p>
          </div>
          @endif
        </td>

        @php
        $prod_layout = $row->options->prod_layout;
        @endphp

        @if ($row->id === 112 || $prod_layout === 'NTAG')
        <td>
          {{ $row->qty > 1 ? $row->qty . ' Name Badges' : $row->qty . ' Name Badge' }}
        </td>
        @elseif ($row->id === 101 || $row->id === 102 || $row->id === 103 || $row->id === 110 || $row->id === 111 ||
        $prod_layout === 'ABC' || $prod_layout === 'PBC'|| $prod_layout === 'SBC'|| $prod_layout === 'ADSBC' ||
        $prod_layout === 'PDSBC')
        <td>
          {{ $row->options->bc_qty }}
        </td>
        @elseif ($row->id === 107 || $row->id === 108 || $row->id === 109 || $prod_layout === 'PFYI'|| $prod_layout ===
        'AFYI'|| $prod_layout === 'SFYI')
        <td>
          {{ ($row->qty) . ' FYI Pads'}}
        </td>
        @elseif ($row->id === 104 || $row->id === 105 || $row->id === 106 || $prod_layout === 'PBCFYI'|| $prod_layout
        === 'ABCFYI'|| $prod_layout === 'SBCFYI')
        <td>
          @if ($row->qty === 24)
          {{ $bcfyi_qty = '250 BCs + 4 FYI Pads' }}
          @elseif ($row->qty === 28)
          {{ $bcfyi_qty = '250 BCs + 8 FYI Pads' }}
          @elseif ($row->qty === 54)
          {{ $bcfyi_qty = '500 BCs + 4 FYI Pads' }}
          @elseif ($row->qty === 58)
          {{ $bcfyi_qty = '500 BCs + 8 FYI Pads' }}
          @endif
        </td>
        @endif
      </tr>

      @endforeach
    </tbody>
  </table>

</div>
