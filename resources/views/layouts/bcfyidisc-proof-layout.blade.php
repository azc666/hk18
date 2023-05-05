<div class="absolute top-[366.75px] left-[157px] w-100 font-helmd tracking-[.5px] text-[20.5px] text-red-500 z-20">
  {{ $bc_name }}
</div>

<div class="absolute top-[745px] left-[126px] w-104 font-helmd tracking-[.6px] text-[22px] text-red-500 z-20">
  {{ $bc_name }}
</div>

<div class="absolute top-[395px] left-[157px] w-100 font-hellt tracking-[.2px] text-[15px] text-red-500 z-20">
  {{ $bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $bc_title }}
  {{-- {{ $bc_title }} --}}
</div>

<div class="absolute">
  <div class="absolute top-[315px] -right-[474px] w-100 font-helmd tracking-[.05px] text-[15px] text-red-500 z-20">
    {{ $bc_email }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[744px] -right-[540px] w-100 font-helmd tracking-[.65px] text-[15px] text-red-500 z-20">
    {{ $bc_email }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[297px] -right-[474px] w-104 font-hellt -tracking-[.2px] text-[15.5px] text-green-500 z-20">
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
  <div class="absolute top-[725.5px] -right-[540px] w-104 font-hellt tracking-[.57px] text-[15px] text-red-500 z-20">
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
  <div class="absolute top-[278px] -right-[474px] w-100 font-hellt tracking-[-.15px] text-[15.5px] text-green-500 z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[708px] -right-[540px] w-100 font-hellt tracking-[.55px] text-[15px] text-red-500 z-20">
    {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[261px] -right-[474px] w-100 font-hellt tracking-[-.02px] text-[15px] text-green-500 z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[690px] -right-[540px] w-100 font-hellt tracking-[.55px] text-[15px] text-red-500 z-20">
    {{ !$bc_address2 ? $bc_address1 : $bc_address2 }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[242px] -right-[474px] w-100 font-hellt tracking-[.05px] text-[15px] text-red-500 z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[672px] -right-[540px] w-100 font-hellt tracking-[.5px] text-[15px] text-red-500 z-20">
    {{ $bc_address2 ? $bc_address1 : session('HKName') }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[224.5px] -right-[474px] w-100 font-hellt tracking-[.075px] text-[15px] text-violet-500 z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[653px] -right-[540px] w-100 font-hellt tracking-[.55px] text-[15px] text-red-500 z-20">
    {{ $bc_address2 ? session('HKName') : '' }}
  </div>
</div>

<div class="absolute">
  <div class="absolute top-[332px] -right-[474px] w-100 font-helcn tracking-[-.015em] text-[11.75px] text-red-500 z-20">
    {{ $bc_disclaimer1 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[759px] -right-[539.3px] w-100 font-helcn tracking-[-.003em] text-[11.75px] text-red-500 z-20">
    {{ $bc_disclaimer1 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[343.5px] mt-[2.75px] -right-[474px] w-100 font-helcn tracking-[-.015em] text-[11.75px] text-red-500 z-20">
    {{ $bc_disclaimer2 }}
  </div>
</div>

<div class="absolute">
  <div
    class="absolute top-[770px] mt-[2.75px] -right-[539.3px] w-100 font-helcn tracking-[-.003em] text-[11.75px] text-red-500 z-20">
    {{ $bc_disclaimer2 }}
  </div>
</div>
