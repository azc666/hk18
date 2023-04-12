<div id="bc_name" name="bc_name" class="relative">
  <div
    class="absolute top-[180.25px] left-[71.5px] w-100 font-helveticalt font-semibold tracking-[-.2px] text-[20.85px] text-gray-800 z-20">
    {{ $bc_name }} {{--text-gray-800 --}}
  </div>
</div>

<div id="bc_name_2" name="bc_name_2" class="relative">
  <div
    class="absolute top-[506.5px] left-[71.5px] w-100 font-helveticalt font-semibold tracking-[-.2px] text-[20.85px] text-gray-800 z-20">
    {{ $bc_name2 }} {{--text-gray-800 --}}
  </div>
</div>

<div id="bc_title" name="bc_title" class="relative">
  <div
    class="absolute top-[210px] left-[71.5px] w-100 font-helveticalt font-normal tracking-[-.5px] text-base text-hkcolor z-20">
    {{ $bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $bc_title }}
    {{-- {{ $bc_title }} --}}
  </div>
</div>

<div id="bc_title_2" name="bc_title_2" class="relative">
  <div
    class="absolute top-[536px] left-[71.5px] w-100 font-helveticalt font-normal tracking-[-.5px] text-base text-hkcolor z-20">
    {{ $bc_title2 == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $bc_title2 }}
    {{-- {{ $bc_title2 }} --}}
  </div>
</div>

<div id="bc_email" name="bc_email" class="absolute">
  <div
    class="absolute top-[331px] -right-[500px] w-100 font-helveticalt font-semibold tracking-[-.45px] text-base text-hkcolor z-20">
    {{ $bc_email }}
  </div>
</div>

<div id="bc_email2" name="bc_email2" class="absolute">
  <div
    class="absolute top-[658px] -right-[500px] w-100 font-helveticalt font-semibold tracking-[-.45px] text-base text-hkcolor z-20">
    {{ $bc_email2 }}
  </div>
</div>

<div id="bc_phone" name="bc_phone" class="absolute">
  <div
    class="absolute top-[312px] -right-[500px] w-100 font-helveticalt font-normal tracking-[-.25px] text-base text-hkcolor z-20">
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

<div id="bc_phone2" name="bc_phone2" class="absolute">
  <div
    class="absolute top-[638.5px] -right-[500px] w-100 font-helveticalt font-normal tracking-[-.25px] text-base text-hkcolor z-20">
    @if ($bc_phone2)
    {{ 'T ' . $bc_phone2 }}
    @endif
    @if ($bc_cell2)
    {{ ' | M ' . $bc_cell2 }}
    @endif
    @if ($bc_fax2)
    {{ ' | F ' . $bc_fax2 }}
    @endif
  </div>
</div>

<div id="bc_citystatezip" name="bc_citystatezip" class="absolute">
  <div
    class="absolute top-[293px] -right-[500px] w-100 font-helveticalt font-normal tracking-[-.25px] text-base text-hkcolor z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div id="bc_citystatezip2" name="bc_citystatezip2" class="absolute">
  <div
    class="absolute top-[619.5px] -right-[500px] w-100 font-helveticalt font-normal tracking-[-.25px] text-base text-hkcolor z-20">
    {{ $bc_city2 }}{{ $bc_city2 ? ', ' : '' }} {{ $bc_state2 }} {{ $bc_zip2 }}
  </div>
</div>

<div id="address1" name="address1" class="absolute">
  <div
    class="absolute top-[275px] -right-[500px] w-100 font-helveticalt font-normal tracking-[-.25px] text-base text-hkcolor z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div id="address1b" name="address1b" class="absolute">
  <div
    class="absolute top-[601px] -right-[500px] w-100 font-helveticalt font-normal tracking-[-.25px] text-base text-hkcolor z-20">
    {{ !$bc_address2b ? $bc_address1b : $bc_address2b }}
  </div>
</div>

<div id="address2" name="address2" class="absolute">
  <div class="absolute top-[255px] -right-[500px] font-helveticalt tracking-[-.45px] text-base text-hkcolor z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div id="address2b" name="address2b" class="absolute">
  <div class="absolute top-[582px] -right-[500px] font-helveticalt tracking-[-.45px] text-base text-hkcolor z-20">
    {{ $bc_address2b ? $bc_address1b : session('HKName') }}
  </div>
</div>

<div id="hkname" name="hkname" class="absolute">
  <div class="absolute top-[236px] -right-[500px] font-helveticalt tracking-[-.45px] text-base text-hkcolor z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>

<div id="hkname2" name="hkname2" class="absolute">
  <div class="absolute top-[562px] -right-[500px] font-helveticalt tracking-[-.45px] text-base text-hkcolor z-20">
    {{ $bc_address2b ? session('HKName') : '' }}
  </div>
</div>

