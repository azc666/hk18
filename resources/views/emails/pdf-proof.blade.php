<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pdf Proof</title>

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
    margin: 5px;
    padding: 20px;
    padding-bottom: 10px;
    background: #f2f2f2;
    border-radius: 10px;
    line-height: 24px;
    height: 100%;
    font-size: 14px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif
  }
</style>

<body>

  <img class="center" src="{{ env('APP_URL') . '/assets/HKheader2.png' }} " alt="">

    <div class="header" style="font-size: 1.25em;">
      {{ Auth::user()->username }} | {{ Auth::user()->loc_name }} | Proof for the {{ $prodName }}
    </div>
    <p class="header text-lg">This proof has been emailed to admin:
      {{ Auth::user()->contact_a }}
      <a style="font-style: italic;" href="mailto:{{ Auth::user()->email }}">
        <span style="color: blue">({{ Auth::user()->email }})</span>
      </a>
    </p>

  <div class="">

  <!--[if mso]>
    <a href="{{ env('APP_URL') }}/{{ $imgToEmail }}" target="_blank">
    <table width="100%">
      <tr>
        <td align="center">
          <img width="500" src="{{ env('APP_URL') }}/{{ $imgToEmail }}" alt="Confirmation Proof Image"
            style="width: 100%; mso-border-alt: none; text-decoration:none; vertical-align: baseline;"
        </td>
      </tr>
    </table>
    <div style="display:none">
    </a>
    <![endif]-->
{{-- @dd($imgToEmail) --}}
    <img style="max-width: 85%; height: auto; margin-left: 20px; margin-top: 10px;" class="responsive"
      src="{{ env('APP_URL') }}/{{ $imgToEmail }}">

  </div>

  <!--[if mso]>
    </div>
  <![endif]-->

</body>
</html>
