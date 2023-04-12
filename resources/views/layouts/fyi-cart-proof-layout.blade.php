<style>
    .name-fyi {
        /* color: red; */
        color: #0b0b0b;
        position: absolute;
        font-size: 87.5px;
        font-weight: 700;
        font-family: Helvetica, sans-serif;
        letter-spacing: 1.5px;
        /* top: 900px; */
        bottom: 980px;
        left: 240px;
    }

    .title-fyi {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        letter-spacing: -.5px;
        font-size: 47.5px;
        font-weight: lighter;
        top: 370px;
        left: 112px;
    }

    .email-fyi {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-size: 61.5px;
        font-weight: 700;
        font-family: Helvetica;
        letter-spacing: 1.15px;
        /* top: 745px; */
        bottom: 291px;
        right: 244.5px;
    }

    .phone-fyi {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 64.5px;
        font-weight: lighter;
        letter-spacing: .55px;
        /* top: 682.5px; */
        bottom: 372px;
        right: 244.5px;
    }

    .citystatezip-fyi {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 64.5px;
        font-weight: lighter;
        letter-spacing: .45px;
        /* top: 628px; */
        bottom: 450px;
        right: 244.5px;
    }

    .address2-fyi {
        /* color: red; */
        color: #00478F;
        position: absolute;
        font-family: Helvetica;
        font-size: 64.5px;
        font-weight: lighter;
        letter-spacing: .45px;
        /* top: 570px; */
        bottom: 532px;
        right: 244.5px;
    }

    .address1-fyi {
    /* color: red; */
    color: #00478F;
    position: absolute;
    font-family: Helvetica;
    font-size: 64.5px;
    font-weight: lighter;
    letter-spacing: -0.4px;
    /* top: 510px; */
    bottom: 610px;
    right: 244.5px;
    }

    .HKName-fyi {
    /* color: red; */
    color: #00478F;
    position: absolute;
    font-family: Helvetica;
    font-size: 64.5px;
    font-weight: lighter;
    letter-spacing: -0.6px;
    /* top: 450px; */
    Bottom: 690px;
    right: 244.5px;
    }
</style>

<div id="bc_name" name="bc_name" class="absolute">
    <div class="name-fyi">
        {{ session('bc_name') }}
    </div>
</div>

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
    {{ session('bc_city')  }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
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

