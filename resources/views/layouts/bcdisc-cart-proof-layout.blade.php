<style>
	@import url("https://use.typekit.net/tza8nhy.css");
	@import url('https://fonts.googleapis.com/css2?family=Sigmar&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap');



	@font-face {
		font-family: "Start";
		src: url('/public/fonts/Start.woff') format('woff'), url('/public/fonts/Start.woff2') format('woff2');
	}

	@font-face {
		font-family: "HelveticaNeueLTStd-LT";
		src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
	}

	@font-face {
		font-family: "HelveticaNeueLTStd-MD";
		src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Md.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
	}

	@font-face {
		font-family: "HelveticaNeueLTStd";
		src: url('/public/fonts/HelveticaNeueLTStd-Cn.woff') format('woff'), url('/public/fonts/HelveticaNeueLTStd-Cn.woff2') format('woff2');
	}

	.ball {
		font-family: ballinger-condensed, sans-serif;
		font-weight: 500;
		font-style: normal;
	}

	.bc-name {
		color: red;
		/* color: #0b0b0b; */
		position: absolute;
		font-size: 115px;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		letter-spacing: -1.3px;
		top: 420px;
		left: 186.9px;
	}

	.bc-title {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		/* font-family: 'CustomFont', "Start", 'cursive'; */
		/* font-family: 'Roboto', sans-serif; */
		/* font-family: 'Barlow Condensed', sans-serif; */
		letter-spacing: .3px;
		font-size: 82.5px;
		top: 593px;
		left: 186.9px;
		/* letter spacing was .6 */
	}

	.bc-email {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-size: 80.7px;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		letter-spacing: 0.49px;
		top: 1118.5px;
		right: 194px;
	}

	.bc-phone {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 83px;
		letter-spacing: -0.5px;
		top: 1020px;
		right: 194px;
	}

	.bc-citystatezip {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 82px;
		letter-spacing: -0.4px;
		top: 920px;
		right: 194px;
	}

	.bc-address2 {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 82px;
		letter-spacing: -0.4px;
		top: 825px;
		right: 194px;
	}

	.bc-address1 {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 82px;
		letter-spacing: -0.4px;
		top: 726px;
		right: 194px;
	}

	.bc-HKName {
		color: red;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 82px;
		letter-spacing: 0px;
		top: 627px;
		right: 194px;
	}

	.bc-disclaimer1 {
		color: green;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-size: 63px;
		font-family: 'Roboto Condensed', sans-serif;
		letter-spacing: -2.3px;
		top: 1242px;
		right: 194px;
	}

	.bc-disclaimer2 {
		color: green;
		/* color: #00478F; */
		/* color: #142667; */
		position: absolute;
		font-size: 63px;
		font-family: 'Roboto Condensed', sans-serif;
		letter-spacing: -2.3px;
		top: 1320px;
		right: 194px;
	}

	.testes {
		color: green;
		position: absolute;
		font-size: 55px;
		font-family: 'Barlow Condensed', sans-serif;
		top: 800px;
	}
</style>

{{-- <div class="relative"> --}}
	<div class="bc-name">
		{{-- <div class="testes"> --}}
			{{ session('bc_name') }}
		</div>

		{{--
	</div> --}}

	{{-- <div id="bc_title" name="bc_title" class="absolute"> --}}
		<div class="bc-title">
			{{ session('bc_title') }}
		</div>
		{{--
	</div> --}}


	<div class="bc-email">
		{{ session('bc_email') }}
	</div>

	<div class="bc-phone">
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

	<div class="bc-citystatezip">
		{{ session('bc_city') }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
	</div>

	<div class="bc-address2">
		{{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
	</div>

	<div class="bc-address1">
		{{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
	</div>

	<div class="bc-HKName">
		{{ session('bc_address2') ? session('HKName') : '' }}
	</div>

	<div class="bc-disclaimer1">
		{{ session('bc_disclaimer1') }}
	</div>

	<div class="bc-disclaimer2">
		{{ session('bc_disclaimer2') }}
	</div>
