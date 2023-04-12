<style>
    .name-dsbc {
        /* color: red; */
        color: #0b0b0b;
        position: absolute;
        font-size: 90px;
        font-weight: 700;
        font-family: Helvetica, sans-serif;
        letter-spacing: .5px;
        top: 564px;
        left: 321px;
    }
    .name2-dsbc {
        /* color: red; */
        color: #0b0b0b;
        position: absolute;
        font-size: 90px;
        font-weight: 700;
        font-family: Helvetica, sans-serif;
        letter-spacing: .5px;
        /* top: 900px; */
        bottom: 1225px;
        left: 321px;
    }
    .title-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        letter-spacing: -.5px;
        font-size: 68px;
        font-weight: lighter;
        top: 695px;
        left: 321px;
    }
    .title2-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        letter-spacing: -.5px;
        font-size: 68px;
        font-weight: lighter;
        /* top: 695px; */
        bottom: 1120px;
        left: 321px;
    }
    .email-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-size: 70px;
        font-weight: 700;
        font-family: Helvetica, sans-serif;
        letter-spacing: -1.5px;
        top: 1239px;
        right: 340px;
    }
    .email2-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-size: 70px;
        font-weight: 700;
        font-family: Helvetica, sans-serif;
        letter-spacing: -1.5px;
        /* top: 1239px; */
        bottom: 572px;
        right: 340px;
    }
    .phone-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1px;
        top: 1152px;
        right: 340px;
    }
    .phone2-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1px;
        /* top: 1152px; */
        bottom: 493;
        right: 340px;
    }
    .citystatezip-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1px;
        top: 1066px;
        right: 340px;
    }
    .citystatezip2-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1px;
        bottom: 742px;
        right: 340px;
    }
    .address2a-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1px;
        top: 981px;
        right: 340px;
    }
    .address2b-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1px;
        bottom: 828px;
        right: 340px;
    }
    .address1a-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1.75px;
        top: 898px;
        right: 340px;
    }
    .address1b-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1.6px;
        bottom: 910.5px;
        right: 340px;
    }
    .hkname-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1.75px;
        top: 811px;
        right: 340px;
    }
    .hkname2-dsbc {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 71px;
        font-weight: lighter;
        letter-spacing: -1.6px;
        bottom: 995px;
        right: 340px;
    }
</style>

{{-- ///////////////////////////////////////////// --}}

<div class="z-20 name-dsbc">
    {{ session('bc_name') }}
</div>

<div class="z-20 name2-dsbc">
    {{ session('bc_name2') }}
</div>

<div class="z-20 title-dsbc">
    {{ session('bc_title') == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : session('bc_title') }}
</div>

<div class="z-20 title2-dsbc">
    {{ session('bc_title2') == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' : session('bc_title2') }}
</div>

<div class="z-20 email-dsbc">
    {{ session('bc_email') }}
</div>

<div class="z-20 email2-dsbc">
    {{ session('bc_email2') }}
</div>

<div class="z-20 phone-dsbc">
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

<div class="z-20 phone2-dsbc">
    @if (session('bc_phone'))
    {{ 'T ' . session('bc_phone2') }}
    @endif
    @if (session('bc_cell'))
    {{ ' | M ' . session('bc_cell2') }}
    @endif
    @if (session('bc_fax'))
    {{ ' | F ' . session('bc_fax2') }}
    @endif
</div>

<div class="z-20 citystatezip-dsbc">
    {{ session('bc_city')  }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
</div>

<div class="z-20 citystatezip2-dsbc">
    {{ session('bc_city2') }}{{ session('bc_city2') ? ', ' : '' }} {{ session('bc_state2') }} {{ session('bc_zip2') }}
</div>

<div class="address2a-dsbc">
    {{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
</div>

<div class="address2b-dsbc">
    {{ !session('bc_address2b') ? session('bc_address1b') : session('bc_address2b') }}
</div>

<div class="address1a-dsbc">
    {{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
</div>

<div class="address1b-dsbc">
    {{ session('bc_address2b') ? session('bc_address1b') : session('HKName') }}
</div>

<div class="hkname-dsbc">
    {{ session('bc_address2') ? session('HKName') : '' }}
</div>

<div class="hkname2-dsbc">
    {{ session('bc_address2b') ? session('HKName') : '' }}
</div>

