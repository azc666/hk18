<div class="flex flex-wrap m-16 border-0 rounded-xl bg-slate-50">

  @if (session('saveCart') === true)
  <div class="w-2/3 mx-auto mt-4 mb-4">
    <x-flash type="success">
      You have successfully saved your cart.
      {{ Session::put('saveCart', false) }}
      {{ Session::put('restoreCart', false) }}
    </x-flash>
  </div>
  @endif

  @if(session('restoreCart') === true)
  <div class="w-2/3 mx-auto mt-4 mb-4">
    <x-flash type="success">
      You have successfully restored your cart.
    </x-flash>
    {{ Session::put('restoreCart', false) }}
    {{ Session::put('saveCart', false) }}
  </div>
  @endif

  @if (session('restoreOrder') === true)
  <div class="w-2/3 mx-auto mt-4 mb-4">
    <x-flash type="success">
      You have successfully restored your cart.
      {{ Session::put('saveCart', false) }}
      {{ Session::put('restoreCart', false) }}
      {{ Session::put('restoreOrder', false) }}
    </x-flash>
  </div>
  @endif

  @if (session('proofMsg') === true)
  <div class="w-2/3 mx-auto mt-4 mb-4">
    <x-flash type="success">
      {{ session('msg') }}
    </x-flash>
    {{ Session::put('proofMsg', false) }}
  </div>
  @endif

  <table style="margin-top: 24px;">
    <thead>
      <tr class="text-base text-left text-gray-600 uppercase border-b-2 border-gray-300">
        <th style="padding-bottom: 10px; width: 25%"></th>
        <th class="pl-20">Product</th>
        <th>Detail</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    <tbody>

      @foreach(Cart::content() as $row)

      <tr class="z-20 border-b-2 border-gray-300">
        <td>
          <div class="pt-[12px]">
            <a href="{{ $row->options->proof_path }}" target="_blank">
              <div>
                <img style="max-width: 85%; margin-left: 20px; object-fit: cover; border-radius: 0.375rem" class=""
                  src="{{ $row->options->proof_path }}">
            </a>
          </div>

</div>

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

  <p>{!! $this->restored ? ($row->options->prod_descr) : ($row->options->prod_descr )!!}</p>
  @endif
</td>

<td>
  @if ($row->id === 110 || $row->id === 111 || $row->options->prod_layout === 'ADSBC' ||
  $row->options->prod_layout === 'PDSBC')
  <div class="w-24 pt-2 mt-1 text-xs text-gray-400 uppercase border-b-2">Engraved Side</div>
  @endif

  @if ($row->options->bc_name)
  <div class="mt-1 text-xs text-gray-400 uppercase">Name</div>
  {{ $row->options->bc_name }}<br>
  @endif
  @if ($row->options->bc_title)
  <div class="pt-2 text-xs text-gray-400 uppercase">Title</div>
  {{ $row->options->bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
  $row->options->bc_title }}
  {{-- {{ $row->options->bc_title }}<br> --}}
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
  {{ $row->options->bc_title2 == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
  $row->options->bc_title2 }}
  {{-- {{ $row->options->bc_title2 }}<br> --}}
  @endif
  @if ($row->options->bc_email2)
  <div class="pt-2 text-xs text-gray-400 uppercase">Email</div>
  {{ $row->options->bc_email2 }}<br>
  @endif
  @endif


  @if ( $row->options->sp_instr )
  <div style="width: 325px;" class="pb-1 mt-2 mb-1 text-xs text-gray-400 uppercase border border-gray-200">
    Special Instructions: <br>
    <p class="p-1 text-sm text-gray-800 normal-case">{!! nl2br($row->options->sp_instr) !!}
    </p>
  </div>
  @endif
</td>

@php
$prod_layout = $row->options->prod_layout;
@endphp

@if ($row->id === 101 || $row->id === 102 || $row->id === 103 || $row->prod_id === 101 ||
$row->id === 110 || $row->id === 111 || $prod_layout === 'SBC' || $prod_layout === 'ABC' || $prod_layout ===
'PBC'
|| $prod_layout === 'ADSBC' || $prod_layout === 'PDSBC')
<td>
  {{ ($row->options->bc_qty) }}
</td>
@endif

@if ($row->id === 107 || $row->id === 108 || $row->id === 109 || $prod_layout === 'SFYI' || $prod_layout ===
'AFYI' || $prod_layout === 'PFYI')
<td>
  {{ ($row->qty) . ' FYI Pads'}}
</td>

@elseif ($row->id === 104 || $row->id === 105 || $row->id === 106 || $prod_layout === 'SBCFYI' || $prod_layout
===
'ABCFYI' || $prod_layout === 'PBCFYI')
<td>
  @if ($row->qty === 24)
  {{ '250 BCs + 4 FYI Pads' }}
  @elseif ($row->qty === 28)
  {{ '250 BCs + 8 FYI Pads' }}
  @elseif ($row->qty === 54)
  {{ '500 BCs + 4 FYI Pads' }}
  @elseif ($row->qty === 58)
  {{ '500 BCs + 8 FYI Pads' }}
  @endif
</td>
{{-- @dd($row->id . ' hola') --}}
@elseif ($row->id === 112 || $prod_layout === 'NTAG')
<td>
  {{ ($row->qty) }} {{ $row->qty > 1 ? ' Name Badgesr' : ' Name Badge' }}
</td>
@endif

<td class="">
  <div class="flex-col items-center w-24">

    <div class="z-20 content-center pb-2">
      <a href="{{ route('emailrow', ['rowId' => $row->rowId]) }}">
        <button class="px-2 py-1 bg-green-500 rounded-md hover:bg-green-400 hover:border-green-600 hover:border-2">
          <span class="text-xs font-bold text-white uppercase">Email
            PDF</span>
        </button>
      </a>
    </div>

    <div class="content-center pb-2">
      <a href="{{ route('editrow', ['rowId' => $row->rowId]) }}">
        <button class="px-6 py-1 bg-blue-700 rounded-md hover:bg-blue-400 hover:border-blue-600 hover:border-2">
          <span class="text-xs font-bold text-white uppercase">Edit</span>
        </button>
      </a>
    </div>

    <div class="content-center">
      <a href="{{ route('destroyrow', ['rowId' => $row->rowId]) }}">
        <button class="px-3 py-1 bg-red-700 rounded-md hover:bg-red-400 hover:border-red-600 hover:border-2">
          <span class="text-xs font-bold text-white uppercase">remove</span>
        </button>
      </a>
    </div>

  </div>

</td>
</tr>

@endforeach

</tbody>

</table>

@if(Request::method() == 'POST')
<livewire:cart-confirm />
@else

<livewire:rush />
@endif
