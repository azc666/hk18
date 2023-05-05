<div id="bc_name" name="bc_name" class="relative">
  <div
    class="absolute top-[567.5px] left-12 -ml-2.5 w-100 font-helmd text-[23px] tracking-normal text-left text-gray-800 z-20">
    {{ $bc_name }}
  </div>
</div>

{{-- <div id="bc_title" name="bc_title" class="absolute">
  <div
    class="absolute z-20 -ml-2 font-normal tracking-normal text-left top-48 left-12 w-100 font-roboto md:text-lg text-hkcolor">
    {{ $bc_title }}
  </div>
</div> --}}

<div id="bc_email" name="bc_email" class="absolute">
  <div
    class="absolute top-[744.1px] -right-[539.7px] w-100 font-helmd tracking-[.042em] text-[15.0px] text-hkcolor z-20">
    {{ $bc_email }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[725.5px] -right-[539.7px] w-100 font-hellt tracking-[.036em] text-[15px] text-hkcolor z-20">
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
  <div class="absolute top-[708px] -right-[539.7px] w-100 font-hellt tracking-[.036em] text-[15px] text-hkcolor z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[690px] -right-[539.7px] w-100 font-hellt tracking-[.036em] text-[15px] text-hkcolor z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[671.5px] -right-[539.7px] w-100 font-hellt tracking-[.036em] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[653px] -right-[539.7px] w-100 font-hellt tracking-[.036em] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[759px] -right-[539.3px] w-100 font-helcn tracking-[-.003em] text-[11.75px] text-hkcolor z-20">
    {{ $bc_disclaimer1 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[770px] mt-[2.75px] -right-[539.3px] w-100 font-helcn tracking-[-.003em] text-[11.75px] text-hkcolor z-20">
    {{ $bc_disclaimer2 }}
  </div>
</div>
