<div id="bc_name" name="bc_name" class="relative">
    <div
        class="absolute top-[165px] left-[49.5px] -ml-2 tracking-[-.05em] text-left text-[1.7rem] text-red-500 font-helmd z-20">
        {{ $bc_name }}
    </div>
</div>

<div id="bc_title" name="bc_title" class="absolute">
    <div
        class="relative top-[198px] left-[48.25px] -ml-1.5 bc-hellt tracking-[-.035em] text-left text-[1.15rem] text-red-500 z-20">
        {{ $bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $bc_title }}
        {{-- Attorney --}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[226.5px] -right-[526.5px] -mr-2 w-100 font-hellt tracking-[0.01em] text-right text-[1.1rem] text-red-500 z-20">
        {{ $bc_address2 ? session('HKName') : ""}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[247.5px] -right-[526.5px] -mr-2 w-100 font-hellt tracking-[-0.010em] text-right text-[1.15rem] text-red-500 z-20">
        {{ $bc_address2 ? $bc_address1 : session('HKName')}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[270px] -right-[526.5px] -mr-2 w-100 font-hellt tracking-[-0.010em] text-right text-[1.15rem] text-red-500 z-20">
        {{ $bc_address2 ? $bc_address2 : $bc_address1}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[291px] -right-[525px] -mr-2 w-100 font-hellt tracking-[-0.0105em] text-right text-[1.15rem] text-red-500 z-20">
        {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[312.5px] -right-[525px] -mr-2 w-100 font-hellt tracking-[-0.015em] text-right text-[1.15rem] text-red-500 z-20">
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
        class="absolute top-[339.5px] -right-[527.75px] -mr-[4.9px] w-100 font-helmd tracking-[0.013em] text-right text-[17.95px] text-red-500 z-20">
        {{ $bc_email }}
    </div>
</div>
