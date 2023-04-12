<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Production Details</title>
</head>
<style>
  .h1color {
    /* color: red; */
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
  }

  th {
    color: #004990;
    background-color: #f2f2f2;
    font-size: large;
    height: 30px;
    padding-left: 4px;
    /* text-align: center; */
  }

  td {
    color: #4b4a4a;
    height: 30px;
    padding-left: 4px;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
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
    background: lightgray;
    border-radius: 15px;
    line-height: 24px;
    height: 100%;
    font-size: 14px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif
  }
</style>

<body>
  <img class="center" src="{{ env('APP_URL') . '/assets/HKheader2.png' }}" alt="">
  <h1 class="header" style="font-size: 1.5em; text-align: left;">Production Order Details</h1>
  <div class="header" style="font-size: 1.25em; text-align: left; line-height: 1.6; padding-bottom: 16px">
    {{ Auth::user()->username }} &nbsp;&nbsp; {{ Auth::user()->loc_name }} <br>
    Conf: {{ $confirmation }} &nbsp;&nbsp; Order Date: {{ $dt_o }}
  </div>
  @if (session('rush'))
  <div class="header" style="font-size: 1.25em; text-align: left; line-height: 1.6; padding-bottom: 16px">
    This is a <span style="font-size: 1.5em">RUSH</span> order!
    @if (session('date'))
    with an expected delivery date by {{ session('date') }}
    @else
    with an expected delivery date <span style="font-size: 1.5em">ASAP</span>.
    @endif
  </div>
  @endif

  @for ($i = 0; $i <= $order_array_count; $i++) <table class="h1color" width="100%">
    <thead>
      <tr class="colheadcolor">
        <th width="30%" style="text-align: left;">Data Heading</th>
        <th width="70%" style="text-align: left;">Data Supplied</th>
      </tr>
    </thead>

    <tbody>
      <tr class="">
        <td>Franchise</td>
        <td>{{ Auth::user()->loc_name }} - {{ Auth::user()->username }}</td>
      </tr>
      <tr class="">
        <td>Order_Type_o</td>
        <td>{{ $order_array[$i]['order_type_o'] }}</td>
      </tr>
      <tr class="">
        <td>Quantity_o</td>
        <td>{{ $order_array[$i]['bc_qty'] }}</td>
      </tr>
      @if ($order_array[$i]['prod_layout'] === 'ADSBC' || $order_array[$i]['prod_layout'] === 'PDSBC')
      <tr class="">
        <td style="font-weight: bold;">***** FRONT SIDE *****</td>
        <td></td>
      </tr>
      @endif
      <tr class="">
        <td>Name_o</td>
        <td>{{ $order_array[$i]['name_o'] }}</td>
      </tr>
      <tr class="">
        <td>Title_o</td>
        <td>{{ $order_array[$i]['title_o'] == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $order_array[$i]['title_o'] }}</td>
        {{-- <td>{{ $order_array[$i]['title_o'] }}</td> --}}
      </tr>
      <tr class="">
        <td>Email_o</td>
        <td>{{ $order_array[$i]['email_o'] }}</td>
      </tr>
      <tr class="">
        <td>Phone_o</td>
        <td>{{ $order_array[$i]['phone_o'] }}</td>
      </tr>
      <tr class="">
        <td>Fax_o</td>
        <td>{{ $order_array[$i]['fax_o'] }}</td>
      </tr>
      <tr class="">
        <td>Cell_o</td>
        <td>{{ $order_array[$i]['cell_o'] }}</td>
      </tr>
      <tr class="">
        <td>Address1_o</td>
        <td>{{ $order_array[$i]['address1_o'] }}</td>
      </tr>
      <tr class="">
        <td>Address2_o</td>
        <td>{{ $order_array[$i]['address2_o'] }}</td>
      </tr>
      <tr class="">
        <td>City_o</td>
        <td>{{ $order_array[$i]['city_o'] }}</td>
      </tr>
      <tr class="">
        <td>State_o</td>
        <td>{{ $order_array[$i]['state_o'] }}</td>
      </tr>
      <tr class="">
        <td>Zip_o</td>
        <td>{{ $order_array[$i]['zip_o'] }}</td>
      </tr>
      @if ($order_array[$i]['prod_layout'] === 'ADSBC' || $order_array[$i]['prod_layout'] === 'PDSBC')
      <tr class="">
        <td style="font-weight: bold;">***** REVERSE SIDE *****</td>
        <td></td>
      </tr>
      <tr class="">
        <td>Name_o</td>
        <td>{{ $order_array[$i]['name2'] }}</td>
      </tr>
      <tr class="">
        <td>Title_o</td>
        <td>{{ $order_array[$i]['title2'] == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
          $order_array[$i]['title2'] }}</td>
        {{-- <td>{{ $order_array[$i]['title2'] }}</td> --}}
      </tr>
      <tr class="">
        <td>Email_o</td>
        <td>{{ $order_array[$i]['email2'] }}</td>
      </tr>
      <tr class="">
        <td>Phone_o</td>
        <td>{{ $order_array[$i]['phone2'] }}</td>
      </tr>
      <tr class="">
        <td>Fax_o</td>
        <td>{{ $order_array[$i]['fax2'] }}</td>
      </tr>
      <tr class="">
        <td>Cell_o</td>
        <td>{{ $order_array[$i]['cell2'] }}</td>
      </tr>
      <tr class="">
        <td>Address1_o</td>
        <td>{{ $order_array[$i]['address1b'] }}</td>
      </tr>
      <tr class="">
        <td>Address2_o</td>
        <td>{{ $order_array[$i]['address2b'] }}</td>
      </tr>
      <tr class="">
        <td>City_o</td>
        <td>{{ $order_array[$i]['city2'] }}</td>
      </tr>
      <tr class="">
        <td>State_o</td>
        <td>{{ $order_array[$i]['state2'] }}</td>
      </tr>
      <tr class="">
        <td>Zip_o</td>
        <td>{{ $order_array[$i]['zip2'] }}</td>
      </tr>
      @endif
      <tr class="">
        <td>SP_Instructions_o</td>
        <td>{{ $order_array[$i]['sp_instr_o'] }}</td>
      </tr>
      @if ($order_array[$i]['prod_layout'] === 'ADSBC' || $order_array[$i]['prod_layout'] === 'PDSBC')
      <tr class="">
        <td style="font-weight: bold;">***** CONTACT INFO *****</td>
        <td></td>
      </tr>
      @endif
      <tr class="">
        <td>Admin Contact</td>
        <td>{{ Auth::user()->contact_a }}</td>
      </tr>
      <tr class="">
        <td>Shipping Contact</td>
        <td>{{ Auth::user()->contact_s }}</td>
      </tr>
      <tr class="">
        <td>Shipping Address</td>
        <td>{{ $address_s }}</td>
      </tr>
      <tr class="">
        <td>Proof Image</td>
        <td>
          <a href="{{ env('APP_URL') }}/{{ $order_array[$i]['proof_path'] }}">{{ $order_array[$i]['proof_path'] }}
          </a>
        </td>
      </tr>
    </tbody>
    </table>
    <br>
    @endfor

</body>
</html>
