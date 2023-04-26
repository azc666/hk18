<style>
    @font-face {
        font-family: "HelveticaNeueLTStd-LT";
        src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
    }

    @font-face {
        font-family: "HelveticaNeueLTStd-MD";
        src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Md.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
    }

    .name-fyi {
        color: red;
        /* color: #0b0b0b; */
        position: absolute;
        font-size: 106px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: -3.4px;
        /* top: 2252.5px; */
        bottom: 937px;
        left: 169.5px;
    }

    .email-fyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-size: 67px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: 2.75px;
        /* top: 745px; */
        bottom: 196.5px;
        right: 162.5px;
    }

    .phone-fyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68.5px;
        letter-spacing: 1.85px;
        /* top: 682.5px; */
        bottom: 275px;
        right: 162.5px;
    }

    .citystatezip-fyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 67.95px;
        letter-spacing: 1.63px;
        /* top: 628px; */
        bottom: 356.5px;
        right: 162.5px;
    }

    .address2-fyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 67.95px;
        letter-spacing: 1.9px;
        /* top: 570px; */
        bottom: 438.5px;
        right: 162.5px;
    }

    .address1-fyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 69px;
        letter-spacing: 1.55px;
        /* top: 510px; */
        bottom: 518px;
        right: 162.5px;
    }

    .HKName-fyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68.5px;
        letter-spacing: 1.85px;
        /* top: 450px; */
        Bottom: 595px;
        right: 162.5px;
    }
</style>

{{-- <div id="bc_name" name="bc_name" class="absolute"> --}}
    <div class="name-fyi">
        {{ session('bc_name') }}
    </div>
    {{--
</div> --}}

{{-- <div id="bc_title" name="bc_title" class="absolute">
    <div class="title">
        {{ session('bc_title') }}
    </div>
</div> --}}


<div class="email-fyi">
    {{ session('bc_email') }}
</div>

<div class="phone-fyi">
    @if (session('bc_phone'))
    {{ 'T ' . session('bc_phone') }}
    @endif
    @if (session('bc_cell'))
    {{ ' | M ' . session('bc_cell') }}
    @endif
    @if (session('bc_fax'))
    {{ ' | F ' . session('bc_fax') }}
    @endif
</div>

<div class="citystatezip-fyi">
    {{ session('bc_city') }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
</div>

<div class="address2-fyi">
    {{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
</div>

<div class="address1-fyi">
    {{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
</div>

<div class="HKName-fyi">
    {{ session('bc_address2') ? session('HKName') : '' }}
</div>
