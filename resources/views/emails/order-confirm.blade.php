<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order Confirmation</title>
</head>
<style>
  .h1color {
    /* color: red; */
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
  }

  th {
    color: #004990;
    font-size: large;
    /* text-align: center; */
  }

  td {
    color: #4b4a4a;
  }

  table,
  th,
  td {
    border: 1px solid #b6b2b2;
  }

  table {
    border-collapse: collapse;
    table-layout: auto;
    /* width: 250px; */
  }

  .header {
    color: #004990;
    font-size: 1em;
    text-align: center;
    text-transform: uppercase;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
  }

  .description {
    font-size: small;
    padding-left: 6px;
  }

  .quantity {
    font-size: small;
    /* padding-left: 6px; */
    text-align: center;
  }

  .detail-head {
    font-size: x-small;
    padding-left: 6px;
    color: #b6b2b2
  }

  .responsive {
    max-width: 100%;
    height: auto;
  }

  .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 75%;
  }

  .info-box {
    margin: 20px;
    padding: 20px;
    background: #f2f2f2;
    border-radius: 10px;
    line-height: 24px;
    height: 100%;
    font-size: 14px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif
  }
</style>

<body>
  <img class="center" src="{{ env('APP_URL') . '/assets/HKheader2.png' }}" alt="">

  <div class="header" style="font-size: 1.25em;">
    {{ Auth::user()->username }} | {{ Auth::user()->loc_name }} | Order Date: {{ $dt_o }} | Conf#: {{ $confirmation }}
  </div>
  <br>
  <p class="header" style="text-align: left">THANK YOU. Your order has been placed.</p>
  <p class="header" style="text-align: left">This confirmation has been emailed to admin:
    {{ Auth::user()->contact_a }}
    <a style="font-style: italic;" href="mailto:{{ Auth::user()->email }}">
      <span style="color: blue">({{ Auth::user()->email }})</span>
    </a>
  </p>

  @if (session('rush'))
  <div class="header" style="font-size: 1.25em; text-align: left; line-height: 1.6; padding-bottom: 16px">
    This is a <span style="font-size: 1.5em">RUSH</span> order
    @if (session('date'))
    with an expected delivery date by {{ session('date') }}
    @else
    with an expected delivery date <span style="font-size: 1.5em">ASAP</span>.
    @endif
  </div>
  @endif

  <div class="header" style="font-size: .85rem; text-align: left; margin-left: 20px">
    {{ Auth::user()->loc_name }}<br>
    Attn: {{ Auth::user()->contact_s }}<br>
    {{ Auth::user()->address1_s }}<br>
    @if (Auth::user()->address2_s)
    {{ Auth::user()->address2_s}}<br>
    {{ Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s}}<br>
    @else
    {{ Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s}}<br><br>
    @endif
  </div>
  {{-- </div> --}}

  <div class="header" style="font-size: .85rem; text-align: left; margin-left: 20px">
    {{-- <div style=""> --}}
      <br>Order & Delivery Info:
      {{--
    </div> --}}
    <ul class="list-disc list-inside" style="margin-top: -1px">
      <li>Most orders ship within 2-3 working days.</li>
      <li>Double Sided Business Cards will automatically be sent for approval before production.</li>
      <li>Allow 1-2 weeks for engraved Partner Cards.</li>
      <li>Metal name badges are ordered and shipped on a quarterly basis.</li>
    </ul>
  </div>

  <br>
  <div class="pt-4 border-b border-gray-200">
    <table class="h1color" width="100%">
      <thead>
        <tr class="colheadcolor" style="padding-bottom: 2px;">
          <th width="30%">Product Proof
          </th>
          <th width="30%">Product</th>
          <th width="25%">Detail</th>
          <th style="padding-left: 6px; padding-right: 6px;" width="10%">Quantity</th>
        </tr>
      </thead>

      <tbody>
        @foreach(Cart::content() as $row)
        <tr class="">
          <td align="center">

            <!--[if mso]>
            <a href="{{ env('APP_URL') }}/{{ $row->options->proof_path }}" target="_blank">
              <table width="50%">
                <tr>
                  <td align="center">
                    <img width="150" src="{{ env('APP_URL') }}/{{ $row->options->proof_path }}" alt="Confirmation Proof Image" style="width: 150px; mso-border-alt: none; text-decoration:none; vertical-align: baseline;" class="quantity">
                  </td>
                </tr>
              </table>
              <div style="display:none">
            </a>
            <![endif]-->

            <a href="{{ env('APP_URL') }}/{{ $row->options->proof_path }}" target="_blank">

              <img style="max-width: 85%; height: auto; margin-top: 10px;" class="responsive"
                src="{{ env('APP_URL') }}/{{ $row->options->proof_path }}" alt="Confirmation Proof Image">
            </a>

            <!--[if mso]>
                </div>
              <![endif]-->

            <a style="font-style: italic;" href="{{ env('APP_URL') }}/{{ $row->options->proof_path }}" target="_blank">
              <p style="color: blue; text-align: center; font-size: .75rem">Click here to see the PROOF</p>
            </a>
          </td>

          <td>
            <p style="text-align: center; color: #0f0944; font-weight: 400">{{ $row->name }}</p>

            @if (strpos($row->name, '+') && str_contains($row->name, 'Partner'))
            <p class="description">{!! nl2br(App\Models\Product::find(103)->description) !!}</p>
            <p class="description">{!! nl2br(App\Models\Product::find(107)->description) !!}</p>
            @elseif (strpos($row->name, '+') && (str_contains($row->name, 'Staff') ||
            str_contains($row->name, 'Associate')))
            <p class="description">{!! nl2br(App\Models\Product::find(101)->description) !!}</p>
            <p class="description">{!! nl2br(App\Models\Product::find(107)->description) !!}</p>
            @else
            <p class="description">{!! nl2br($row->options->prod_descr) !!}
            </p><br>
            @endif
          </td>

          <td>
            @if ($row->id === 110 || $row->id === 111)
            <div class="w-24 pt-2 border-b-2 detail-head">Engraved Side</div>
            @endif

            @if ($row->options->bc_name)
            <div class="detail-head">Name</div>
            <div class="description" style="padding-bottom: 6px;">{{ $row->options->bc_name }}</div>
            @endif

            @if ($row->options->bc_title)
            <div class="detail-head">Title</div>
            <div class="description" style="padding-bottom: 6px;">
              {{ $row->options->bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
              $row->options->bc_title }}
            </div>
            {{-- {{ $row->options->bc_title }}
  </div> --}}
  @endif

  @if ($row->options->bc_email)
  <div class="detail-head">Email</div>
  <div class="description" style="padding-bottom: 6px;">
    {{ $row->options->bc_email }}
  </div>
  @endif

  @if ($row->id === 110 || $row->id === 111)
  <div class="w-24 pt-2 border-b-2 detail-head">Reverse Side</div>
  @if ($row->options->bc_name2)
  <div class="detail-head">Name</div>
  <div class="description" style="padding-bottom: 6px;">{{ $row->options->bc_name2 }}</div>
  @endif

  @if ($row->options->bc_title2)
  <div class="detail-head">Title</div>
  <div class="description" style="padding-bottom: 6px;">
    {{ $row->options->bc_title2 == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
    $row->options->bc_title2 }}
  </div>
  {{-- {{ $row->options->bc_title2 }}</div> --}}
  @endif

  @if ($row->options->bc_email2)
  <div class="detail-head">Email</div>
  <div class="description" style="padding-bottom: 6px;">{{ $row->options->bc_email2 }}</div>
  @endif
  @endif

  @if ( $row->options->sp_instr )
  <div style="border:1px solid blue; border-radius: 10px; padding:1px; margin:2px;">
    <div class="detail-head" style="font-weight: bold; color: blue; font-size: small">Special Instructions:</div>
    <div class="description" style="padding-top: -4px; font-weight: bold;">{!! nl2br(e($row->options->sp_instr)) !!}
    </div>
  </div>
  @endif
  </td>
  {{-- @dd($row->options->prod_id . ' hola') --}}
  @php
  $prod_layout = $row->options->prod_layout;
  @endphp

  @if ($row->id === 112 || $prod_layout === 'NTAG')
  <td>
    {{ $row->qty > 1 ? $row->qty . ' Name Badges' : $row->qty . ' Name Badge' }}
  </td>
  @elseif ($row->id === 101 || $row->id === 102 || $row->id === 103 || $row->id === 110 || $row->id === 111 ||
  $prod_layout
  === 'ABC' || $prod_layout === 'PBC'|| $prod_layout === 'SBC' || $prod_layout === 'PDSBC'|| $prod_layout === 'ADSBC')
  <td class="quantity">
    {{-- {!! $bcfyi_qty = $row->qty . '<br> Business Cards' !!} --}}
    {{ ($row->options->bc_qty) }}
  </td>
  @elseif ($row->id === 107 || $row->id === 108 || $row->id === 109 || $prod_layout === 'PFYI' || $prod_layout ===
  'AFYI' || $prod_layout === 'SFYI')
  <td class="quantity">
    {{ ($row->qty) . ' FYI Pads'}}
  </td>
  @elseif ($row->id === 104 || $row->id === 105 || $row->id === 106 || $prod_layout === 'PBCFYI' || $prod_layout ===
  'ABCFYI' ||
  $prod_layout === 'SBCFYI')
  <td class="quantity">
    @if ($row->qty === 24)
    {!! $bcfyi_qty = '250 BCs + <br>4 FYI Pads' !!}
    @elseif ($row->qty === 28)
    {!! $bcfyi_qty = '250 BCs + <br>8 FYI Pads' !!}
    @elseif ($row->qty === 54)
    {!! $bcfyi_qty = '500 BCs + <br>4 FYI Pads' !!}
    @elseif ($row->qty === 58)
    {!! $bcfyi_qty = '500 BCs + <br>8 FYI Pads' !!}
    @endif
  </td>
  @endif
  </tr>
  @endforeach
  </tbody>
  </table>
  </div>

</body>

</html>
