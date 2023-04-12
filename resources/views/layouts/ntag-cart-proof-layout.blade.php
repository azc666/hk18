<style>
    .name-nt {
        color: #0b0b0b;
        position: absolute;
        font-family: Helvetica;
        text-align: center;
        font-weight: 700;
        letter-spacing: -0.1px;
        top: 80px;
        left: -8px;
        width: 100%;
    }

    .name-lg {
        font-size: 60px;
    }

    .name-md {
        font-size: 52px;
    }

    .name-sm {
        font-size: 42px;
    }
</style>

<div id="bc_name" name="bc_name" class="">
    <div @if (strlen(session('bc_name')) > 24) class="name-nt name-sm z-20">
        @elseif (strlen(session('bc_name')) > 18)
            class="name-nt name-md z-20">
        @else
            class="name-nt name-lg z-20"> @endif
        {{ session('bc_name') }} </div>
    </div>
