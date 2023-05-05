<style>
    @font-face {
        font-family: "HelveticaNeueLTStd-LT";
        src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'),
            url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
    }

    @font-face {
        font-family: "HelveticaNeueLTStd-MD";
        src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Md.woff") format('woff'), url("https://azc666.com//fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
    }

    .name-bc-bcfyi {
        color: red;
        /* color: #0b0b0b; */
        position: absolute;
        font-size: 95px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: -1.2px;
        top: 566.5px;
        /* bottom: 980px; */
        left: 309.5px;
    }

    .name-fyi-bcfyi {
        color: red;
        /* color: #0b0b0b; */
        position: absolute;
        font-size: 105.5px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: -2px;
        /* top: 900px; */
        bottom: 935.5px;
        left: 169.5px;
    }

    .title-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        letter-spacing: -.1px;
        font-size: 68px;
        top: 700px;
        left: 309.5px;
    }

    .email-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-size: 70px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: -1.5px;
        top: 1210px;
        right: 463.5px;
    }

    .email-fyi-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-size: 68px;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
        letter-spacing: 2.2px;
        /* top: 745px; */
        bottom: 195px;
        right: 162px;
    }

    .phone-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: -0.18px;
        top: 1132.35px;
        right: 460.3px;
    }

    .phone-fyi-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: 2.06px;
        /* top: 682.5px; */
        bottom: 275.5px;
        right: 162px;
    }

    .citystatezip-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: -0.475px;
        top: 1050px;
        right: 460.3px;
    }

    .citystatezip-fyi-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: 1.65px;
        /* top: 628px; */
        bottom: 356px;
        right: 162px;
    }

    .address2-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: -.25px;
        top: 968.5px;
        right: 460.3px;
    }

    .address2-fyi-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: 1.95px;
        /* top: 570px; */
        bottom: 438px;
        right: 162px;
    }

    .address1-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: -0.25px;
        top: 889.5px;
        right: 460.3px;
    }

    .address1-fyi-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: 1.95px;
        /* top: 510px; */
        bottom: 520px;
        right: 162px;
    }

    .HKName-bc-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: -.25px;
        top: 810px;
        right: 460.3px;
    }

    .HKName-fyi-bcfyi {
        color: red;
        /* color: #00478F; */
        position: absolute;
        font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
        font-size: 68px;
        letter-spacing: 2.05px;
        /* top: 450px; */
        Bottom: 600px;
        right: 162px;
    }
</style>


<div class="z-20 name-bc-bcfyi">
    {{ session('bc_name') }}
</div>

<div class="z-20 name-fyi-bcfyi">
    {{ session('bc_name') }}
</div>

<div class="z-20 title-bc-bcfyi">
    {{ session('bc_title') == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : session('bc_title')
    }}
</div>

<div class="z-20 email-bc-bcfyi">
    {{ session('bc_email') }}
</div>

<div class="z-20 email-fyi-bcfyi">
    {{ session('bc_email') }}
</div>

<div class="z-20 phone-bc-bcfyi">
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

<div class="z-20 phone-fyi-bcfyi">
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

<div class="z-20 citystatezip-bc-bcfyi">
    {{ session('bc_city') }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
</div>

<div class="z-20 citystatezip-fyi-bcfyi">
    {{ session('bc_city') }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
</div>

<div class="address2-bc-bcfyi">
    {{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
</div>

<div class="address2-fyi-bcfyi">
    {{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
</div>

<div class="address1-bc-bcfyi">
    {{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
</div>

<div class="address1-fyi-bcfyi">
    {{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
</div>

<div class="HKName-bc-bcfyi">
    {{ session('bc_address2') ? session('HKName') : '' }}
</div>

<div class="HKName-fyi-bcfyi">
    {{ session('bc_address2') ? session('HKName') : '' }}
</div>
