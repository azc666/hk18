<div
  class="absolute top-[336px] left-[141px] w-100 font-helveticalt font-bold tracking-[.5px] text-[18.5px] text-gray-800 z-20">
  {{ $bc_name }}
</div>

{{-- <div class="absolute"> --}}
  <div
    class="absolute top-[743.5px] left-[140.5px] w-104 font-helveticalt font-bold tracking-[.25px] text-[20px] text-gray-800 z-20">
    {{ $bc_name }}
  </div>
{{-- </div> --}}

<div
  class="absolute top-[362px] left-[141.5px] w-100 font-helveticalt font-normal tracking-[.2px] text-[13.5px] text-hkcolor z-20">
  {{ $bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $bc_title }}
  {{-- {{ $bc_title }} --}}
</div>

<div class="absolute">
  <div
    class="absolute top-[287px] -right-[425.5px] w-100 font-helveticalt font-semibold tracking-[-.5px] text-sm text-hkcolor z-20">
    {{ $bc_email }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[724.25px] -right-[521.5px] w-100 font-helveticalt font-semibold tracking-[.1px] text-sm text-hkcolor z-20">
    {{ $bc_email }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[270px] -right-[425.5px] w-104 font-helveticalt tracking-[-.5px] text-[14.5px] text-hkcolor z-20">
    @if ($bc_phone)
    {{ 'T ' . $bc_phone }}
    @endif
    @if ($bc_cell)
    {{ ' | M ' . $bc_cell }}
    @endif
    @if ($bc_fax)
    {{ ' | F ' . $bc_fax }}
    @endif
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[705.25px] -right-[521.5px] w-104 font-helveticalt tracking-[.1px] text-[14.5px] text-hkcolor z-20">
    @if ($bc_phone)
    {{ 'T ' . $bc_phone }}
    @endif
    @if ($bc_cell)
    {{ ' | M ' . $bc_cell }}
    @endif
    @if ($bc_fax)
    {{ ' | F ' . $bc_fax }}
    @endif
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[254.5px] -right-[425.5px] w-100 font-helveticalt tracking-[-.25px] text-sm text-hkcolor z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[688.25px] -right-[521.5px] w-100 font-helveticalt tracking-[.35px] text-sm text-hkcolor z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[236px] -right-[426px] w-100 font-helveticalt tracking-[-.7px] text-[15px] text-hkcolor z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[668.5px] -right-[521.5px] w-100 font-helveticalt tracking-[-.15px] text-[15px] text-hkcolor z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[220px] -right-[426px] w-100 font-helveticalt tracking-[-.85px] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[651px] -right-[521.5px] w-100 font-helveticalt tracking-[-.35px] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[203px] -right-[426px] w-100 font-helveticalt tracking-[-.9px] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[633.5px] -right-[521px] w-100 font-helveticalt tracking-[-.35px] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>
