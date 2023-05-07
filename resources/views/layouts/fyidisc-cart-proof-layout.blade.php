<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');

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
        bottom: 918px;
        left: 169.5px;
    }

    .fyi-email {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-size: 67px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: 2.75px;
        bottom: 185px;
        right: 153.5px;
    }

    .fyi-phone {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68.5px;
        letter-spacing: 1.85px;
        bottom: 263px;
        right: 153.5px;
    }

    .fyi-citystatezip {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 67.95px;
        letter-spacing: 1.63px;
        bottom: 344.0px;
        right: 153.5px;
    }

    .fyi-address2 {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 67.95px;
        letter-spacing: 1.9px;
        bottom: 425px;
        right: 153.5px;
    }

    .fyi-address1 {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 69px;
        letter-spacing: 1.55px;
        /* top: 510px; */
        bottom: 505px;
        right: 153.5px;
    }

    .fyi-HKName {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68.5px;
        letter-spacing: 1.85px;
        Bottom: 586px;
        right: 153.5px;
    }

    .fyi-disclaimer1 {
        /* color: green; */
        color: #00478F;
        /* color: #142667; */
        position: absolute;
        font-size: 53px;
        font-family: 'Roboto Condensed', sans-serif;
        letter-spacing: -1.55px;
        bottom: 132.5px;
        right: 157.75px;
    }

    .fyi-disclaimer2 {
        /* color: green; */
        color: #00478F;
        /* color: #142667; */
        position: absolute;
        font-size: 53px;
        font-family: 'Roboto Condensed', sans-serif;
        letter-spacing: -1.85px;
        bottom: 70px;
        right: 153.5px;
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


<div class="fyi-email">
    {{ session('bc_email') }}
</div>

<div class="fyi-phone">
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

<div class="fyi-citystatezip">
    {{ session('bc_city') }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
</div>

<div class="fyi-address2">
    {{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
</div>

<div class="fyi-address1">
    {{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
</div>

<div class="fyi-HKName">
    {{ session('bc_address2') ? session('HKName') : '' }}
</div>

<div class="fyi-disclaimer1">
    {{ session('bc_disclaimer1') }}
</div>

<div class="fyi-disclaimer2">
    {{ session('bc_disclaimer2') }}
</div>
