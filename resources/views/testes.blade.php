<x-app-layout>
  <style>
    @font-face {
      font-family: "Helvetica Neue LT Std 45 Light";
      src: url("https://hk16.test/fonts/HelveticaNeueLTStd-Lt.otf");
    }

    .hellt {
      font-family: "Helvetica Neue LT Std 45 Light";
      /* color: red; */
    }

    .MyriadSB {
      font-family: "myriad-pro",
        sans-serif;
      font-weight: 600;
      font-style: normal;
    }

    .MyriadSBI {
      font-family: "myriad-pro",
        sans-serif;
      font-weight: 600;
      font-style: italic;
      /* color: red; */
    }

    .MyriadB {
      font-family: "myriad-pro",
        sans-serif;
      font-weight: 700;
      font-style: normal;
    }

    .ball {
      font-family: ballinger-condensed, sans-serif;
      font-weight: 500;
      font-style: normal;
    }

    .test {
      color: red;
      /* position: absolute;
      font-size: 55px;
      top: 800px; */
    }
  </style>


  <div class="p-12">
    <div class="pb-4 ball test">
      Georgia Graphics
    </div>
    <div class="pb-4 text-2xl text-white font-start">
      font start ... testing....testing
    </div>
    <div class="pb-4 text-2xl text-white font-herc">
      font herc ... testing....testing
    </div>

    {{-- <div class="text-2xl text-white testfont">
      style helmd ... testing....testing
    </div> --}}
    <div class="pb-4 text-2xl text-white font-helmd">
      font helmd ... testing....testing
    </div>

    <div class="pb-4 text-2xl text-white font-hellt">
      font hellt ... testing....testing
    </div>
    <div class="pb-4 text-2xl text-white MyriadSBI">
      font myriadSBI ...testing....testing
    </div>
    <div class="pb-4 text-2xl text-white MyriadSB">
      font myriadSB ...testing....testing
    </div>
    <div class="pb-4 text-2xl text-white MyriadB">
      font myriadB ...testing....testing
    </div>
  </div>

</x-app-layout>
