<div id="bc_name" name="bc_name" class="relative">
  <div
    class="absolute top-[563px] left-16 -ml-2.5 w-100 font-helveticalt font-bold tracking-normal text-left md:text-xl text-gray-800 z-20">
    {{ $bc_name }}
  </div>
</div>

{{-- <div id="bc_title" name="bc_title" class="absolute">
  <div
    class="absolute top-48 left-12 -ml-2 w-100 font-roboto font-normal tracking-normal text-left md:text-lg text-hkcolor z-20">
    {{ $bc_title }}
</div>
</div> --}}

<div id="bc_email" name="bc_email" class="absolute">
  <div
    class="absolute top-[724px] -right-[521px] w-100 font-helveticalt font-semibold tracking-[.01em] text-sm text-hkcolor z-20">
    {{ $bc_email }}
  </div>
</div>

<div class="absolute">
    <div class="absolute top-[704.5px] -right-[521px] w-100 font-helveticalt font-normal tracking-[-.01em] text-[15px] text-hkcolor z-20">
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
    class="absolute top-[688px] -right-[521px] w-100 font-helveticalt font-normal tracking-[-.01em] text-[15px] text-hkcolor z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[670px] -right-[521px] w-100 font-helveticalt font-normal tracking-[-.01em] text-[15px] text-hkcolor z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[651.5px] -right-[521px] w-100 font-helveticalt font-normal tracking-[-.03em] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[634px] -right-[521px] w-100 font-helveticalt font-normal tracking-[-.03em] text-[15px] text-hkcolor z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>

