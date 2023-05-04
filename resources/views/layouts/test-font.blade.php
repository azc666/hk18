<style>
  @import url("https://use.typekit.net/tza8nhy.css");

  @font-face {
    font-family: "Start";
    /* src: url('hk17.test/fonts/Start') format('otf'); */
    src: url("{{ base_path('public/fonts/myfont.woff2') }}") format('woff2'),
    url("{{ base_path('public/fonts/myfont.woff') }}") format('woff');

  }

  @font-face {
    font-family: "HelveticaNeueLTStd-MD";
    src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Md.woff") format('woff'),
      url("public/fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
  }

  @font-face {
    font-family: "HelveticaNeueLTStd-LT";
    src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'),
      url("public/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
  }

  .start {
    color: green;
    position: absolute;
    font-size: 55px;
    font-family: 'CustomFont', "Start", 'cursive';
    font-style: normal;
    top: 800px;
  }

  .ball {
    font-family: ballinger-condensed, sans-serif;
    font-weight: 400;
    font-style: normal;
    font-size: 55px;
  }

  .test {
    color: green;
    position: absolute;
    font-size: 55px;
    top: 800px;
    font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', monospace;
  }

  .test2 {
    color: green;
    position: absolute;
    font-size: 55px;
    top: 1000px;
    font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', monospace;
  }
</style>

<div class="ball">
  Georgia Graphics
  {{-- {{ $disclaimer1 }} --}}
</div>

<div class="start">
  Georgia Graphics
  {{-- {{ $disclaimer1 }} --}}
</div>
