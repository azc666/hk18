<style>
	@font-face {
		font-family: "HelveticaNeueLTStd-LT";
		src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
	}

	@font-face {
		font-family: "HelveticaNeueLTStd-MD";
		src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Md.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
	}

	.name-bc {
		color: red;
		/* color: #0b0b0b; */
		position: absolute;
		font-size: 115px;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		letter-spacing: -1.3px;
		top: 422px;
		left: 186.9px;
		/* top was 425 */
		/* top was 423 */
		/* letter spacing was -2.2 */
		/* letter spacing was -2.1 */
		/* letter spacing was -2.0 */
		/* letter spacing was -1.8 */
		/* letter spacing was -1.6 */
	}

	.title-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		letter-spacing: .3px;
		font-size: 82.5px;
		top: 595px;
		left: 186.9px;
		/* letter spacing was .6 */
	}

	.email-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-size: 80.7px;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		letter-spacing: 0.49px;
		top: 1218px;
		right: 194px;
		/* top was 1222 */
		/* right was 196 */
	}

	.phone-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 64.5px;
		/* font-weight: lighter; */
		letter-spacing: .55px;
		/* top: 682.5px; */
		/* bottom: 372px; */
		top: 680px;
		right: 244.5px;
	}

	.citystatezip-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 64.5px;
		/* font-weight: lighter; */
		letter-spacing: .45px;
		/* top: 628px; */
		/* bottom: 450px; */
		top: 650px;
		right: 244.5px;
	}

	.address2-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 64.5px;
		/* font-weight: lighter; */
		letter-spacing: .45px;
		/* top: 570px; */
		/* bottom: 532px; */
		top: 550px;
		right: 244.5px;
	}

	.address1-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 64.5px;
		/* font-weight: lighter; */
		letter-spacing: -0.4px;
		/* top: 510px; */
		/* bottom: 610px; */
		top: 600px;
		right: 244.5px;
	}

	.HKName-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 82px;
		letter-spacing: -.2px;
		/* top: 450px; */
		/* Bottom: 690px; */
		top: 724px;
		right: 194px;
	}
</style>

{{-- <div class="relative"> --}}
	<div class="name-bc">
		{{ session('bc_name') }}
	</div>

	{{--
</div> --}}

{{-- <div id="bc_title" name="bc_title" class="absolute"> --}}
	<div class="title-bc">
		{{ session('bc_title') }}
	</div>
	{{--
</div> --}}


<div class="email-bc">
	{{ session('bc_email') }}
</div>

<div class="phone-bc">
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

<div class="citystatezip-bc">
	{{ session('bc_city') }}{{ session('bc_city') ? ', ' : '' }} {{ session('bc_state') }} {{ session('bc_zip') }}
</div>

<div class="address2-bc">
	{{ !session('bc_address2') ? session('bc_address1') : session('bc_address2') }}
</div>

<div class="address1-bc">
	{{ session('bc_address2') ? session('bc_address1') : session('HKName') }}
</div>

<div class="HKName-bc">
	{{ session('bc_address2') ? session('HKName') : '' }}
</div>
