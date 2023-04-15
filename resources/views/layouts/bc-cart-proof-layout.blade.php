<style>
	@font-face {
		font-family: 'Herculanum';
		src: url('/fonts/Herculanum.ttf') format('ttf');
		font-weight: normal;
		font-style: normal;

	}

	@font-face {
		font-family: "HelveticaNeueLTStd-LT";
		src: url("https://azc666.com/fonts/HelveticaNeueLTStd-Lt.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Lt.woff2") format('woff2');
	}

	@font-face {
		font-family: "HelveticaNeueLTStd-MD";
		src: url("public/fonts/HelveticaNeueLTStd-Md.woff") format('woff'), url("public/fonts/HelveticaNeueLTStd-Md.woff2") format('woff2');
	}

	.name-bc {
		/* color: red; */
		color: #0b0b0b;
		position: absolute;
		font-size: 70px;
		/* font-weight: 700; */
		/* font-family: HelveticaNeueLtStd-Md, sans-serif; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		/* font-weight: 600; */
		/* font-style: normal; */
		letter-spacing: -2.5px;
		top: 260px;
		left: 112.5px;
	}

	.title-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		/* font-family: "HelveticaNeueLtStd Md"; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		/* font-weight: normal;
		font-style: normal; */
		letter-spacing: .075px;
		font-size: 47.5px;
		/* font-weight: lighter; */
		top: 370px;
		left: 112px;
	}

	.email-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		font-size: 47.5px;
		/* font-weight: 700; */
		/* font-family: Helvetica, sans-serif; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		/* font-weight: 700; */
		/* font-style: normal; */
		letter-spacing: -.45px;
		top: 740px;
		right: 108.5px;
	}

	.phone-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48.5px;
		/* font-weight: lighter; */
		letter-spacing: -0.15px;
		top: 690px;
		right: 109px;
	}

	.citystatezip-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48.5px;
		/* font-weight: lighter; */
		letter-spacing: -0.3px;
		top: 628px;
		right: 109px;
	}

	.address2-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48px;
		/* font-weight: lighter; */
		letter-spacing: -.2px;
		top: 570px;
		right: 109px;
	}

	.address1-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		/* font-family: Helvetica; */
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48px;
		/* font-weight: lighter; */
		letter-spacing: -0.5px;
		top: 510px;
		right: 109px;
	}

	.HKName-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 49.5px;
		/* font-weight: lighter; */
		letter-spacing: -1px;
		top: 450px;
		right: 109px;
	}
</style>
{{-- @dd(session('bc_name')) --}}
<div>

	{{-- <div id="bc_name" name="bc_name" class="absolute"> --}}
		<div class="name-bc">
			{{-- <div> --}}
				{{ session('bc_name') }}
			</div>
			{{--
		</div> --}}

		{{-- <div id="bc_title" name="bc_title" class="absolute"> --}}
			<div class="title-bc">
				{{ session('bc_title') == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
				session('bc_title') }}
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

		{{-- <div class="absolute">
			<div
				class="absolute top-[248px] -right-[526.5px] -mr-2 w-100 font-hellt tracking-[-0.037em] text-right text-[1.24rem] text-red-500 z-20">
				{{ session('bc_address1') }}
			</div>
		</div> --}}

		<div class="HKName-bc">
			{{ session('bc_address2') ? session('HKName') : '' }}
		</div>

	</div>
