<div id="bc_name" name="bc_name" class="relative">
    <div
        class="absolute top-[165px] left-[49.5px] -ml-2 tracking-[-.05em] text-left text-[1.7rem] text-gray-800 font-helmd z-20">
        {{ $bc_name }}
    </div>
</div>

<div id="bc_title" name="bc_title" class="absolute">
    <div
        class="relative top-[198px] left-[48.25px] -ml-1.5 bc-hellt tracking-[-.035em] text-left text-[1.15rem] text-hkcolor z-20">
        {{ $bc_title == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : $bc_title }}
        {{-- Attorney --}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[251.5px] -right-[526.5px] -mr-2 w-100 font-hellt tracking-[0.028em] text-right text-[1.1rem] text-hkcolor z-20">
        {{ !$bc_address2 ? session('HKName') : ""}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[230px] -right-[526.0px] -mr-2 w-100 font-hellt tracking-[0.023em] text-right text-[1.1rem] text-hkcolor z-20">
        {{ $bc_address2 ? session('HKName') : ""}}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[251.5px] -right-[525px] -mr-2 w-100 font-hellt tracking-[-0.00em] text-right text-[1.15rem] text-hkcolor z-20">
        {{ $bc_address2 ? $bc_address1 : '' }}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[272.9px] -right-[525.3px] -mr-2 w-100 font-hellt tracking-[-0.00em] text-right text-[1.15rem] text-hkcolor z-20">
        {{ $bc_address2 ? $bc_address2 : $bc_address1}}
    </div>
</div>

<div class="absolute">
    <div class="absolute {{ $bc_address2 ? " top-[295px]" : "top-[295px]" }} -right-[527px] -mr-[4.9px] w-100 font-hellt
        tracking-[-0.001em] text-right text-[1.15rem] text-hkcolor z-20">
        {{ $bc_city }}{{ $bc_city ? ', ' : '' }} {{ $bc_state }} {{ $bc_zip }}
    </div>
</div>

<div class="absolute">
    <div
        class="absolute top-[317px] -right-[524.5px] -mr-2 w-100 font-hellt tracking-[-0.003em] text-right text-[1.15rem] text-hkcolor z-20">
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
        class="absolute top-[339.5px] -right-[527.75px] -mr-[4.9px] w-100 font-helmd tracking-[0.013em] text-right text-[17.95px] text-hkcolor z-20">
        {{ $bc_email }}
    </div>
</div>

{{-- <div class="absolute">
    <div
        class="absolute top-[332px] -right-[526px] -mr-2 w-100 font-helveticalt font-normal tracking-tight text-xs text-right text-hkcolor z-20">
        {{ $bc_disclaimer }}
    </div>
</div> --}}
