<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');

  @font-face {
    font-family: "HelveticaNeueLTStd-LT";
    src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'),
      url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
  }

  @font-face {
    font-family: "HelveticaNeueLTStd-MD";
    src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Md.woff") format('woff'), url("https://azc666.com//fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
  }

  /* .bc-name-bcfyidisc { */
  .bcdisc-name {
    /* color: green; */
    color: violet;
    /* color: #0b0b0b; */
    position: absolute;
    font-size: 95px;
    font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
    letter-spacing: -1.2px;
    top: 520px;
    /* top: 566.5px; */
    /* bottom: 980px; */
    left: 309.5px;
  }
  </style>

  <div class="bcdisc-name">
        {{ session('bc_name') }}
      </div>
