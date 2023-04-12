{{-- <div class="relative">
    <div class="absolute grid justify-items-center">
        <div class="top-[92px] -left-[48px] tracking-tight justify-self-center

            {{ strlen($bc_name) > 24 ? 'text-[24px]' : (strlen($bc_name) > 18 ?'text-[30px]':'text-[35px]') }}

            text-gray-800 font-semibold z-20" style="font-family: helvetica">
            {{ $bc_name }}
        </div>
    </div>
</div> --}}

<style>
    .test {
        display: grid;
        /* flex-basis: 200px; */
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 48px;

        position: relative;
        /* display: grid; */
        justify-items: center;
    }
    .test-name {
        /* justify-self: center; */
        height: 100px;
        width: 600px;
        position: absolute;
        /* left: 10%; */
        left: -2px;
        /* margin-left: -250px; */
        top: 265px;
        /* right: 50%; */
        /* margin-right: -300px; */
        /* font-size: 35px; */
        font-weight: 700;
        text-align: center;
        z-index: 20;
    }
    .fixed {
        position: fixed;
        font-family: Arial, Helvetica, sans-serif;
        justify-self: center;
    }
    .container {
    grid-template-columns: 1fr 1fr;
    }
</style>


{{-- <div class="test"> --}}
    <div class="test-name {{ strlen($bc_name) > 24 ? 'text-[24px]' : (strlen($bc_name) > 18 ?'text-[30px]':'text-[35px]') }}">
            {{ $bc_name }}

    </div>
    {{-- <div class="fixed text-center -ml-[300px] mr-[400px] {{ strlen($bc_name) > 24 ? 'text-[24px]' : (strlen($bc_name) > 18 ?'text-[30px]':'text-[35px]') }}">
        {{ $bc_name }}
    </div> --}}

{{-- </div> --}}

{{-- <div class="relative">
    <div class="absolute top-[270px] left-[100px] grid justify-items-center">
        <div
            class="tracking-tight justify-self-center {{ strlen($bc_name) > 24 ? 'text-[24px]' : (strlen($bc_name) > 18 ?'text-[30px]':'text-[35px]') }} text-gray-800 font-semibold z-20">
            {{ $bc_name }}
        </div>
    </div>
</div> --}}

{{-- <div class="fixed">
    <div class=".container z-20">
        <div class="">
        <div class="top-[225px] w-100 text-center">

        </div>

            <div class="" style="font-size: 35px; font-weight:700; color: red;">
                {{ $bc_name }}
            </div>
        </div>
    </div>
</div> --}}
