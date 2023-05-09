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
		/* color: red; */
		color: #0b0b0b;
		position: absolute;
		font-size: 70px;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		letter-spacing: -2.5px;
		/* top: 260px; */
		top: 400px;
		/* left: 112.5px; */
		left: 240px;
	}

	.title-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		letter-spacing: .075px;
		font-size: 47.5px;
		top: 370px;
		left: 112px;
	}

	.email-bc {
		/* color: red; */
		color: #00478F;
		position: absolute;
		font-size: 47.5px;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-MD"', sans-serif;
		letter-spacing: -.45px;
		top: 740px;
		right: 108.5px;
	}

	.phone-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48.5px;
		letter-spacing: -0.15px;
		top: 690px;
		right: 109px;
	}

	.citystatezip-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48.5px;
		letter-spacing: -0.3px;
		top: 628px;
		right: 109px;
	}

	.address2-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48px;
		letter-spacing: -.2px;
		top: 570px;
		right: 109px;
	}

	.address1-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 48px;
		letter-spacing: -0.5px;
		top: 510px;
		right: 109px;
	}

	.HKName-bc {
		color: red;
		/* color: #00478F; */
		position: absolute;
		font-family: 'CustomFont', '"HelveticaNeueLTStd-LT"', sans-serif;
		font-size: 49.5px;
		letter-spacing: -1px;
		top: 450px;
		right: 109px;
	}
</style>

	<div>

		<div class="name-bc">
				{{ session('bc_name') }}
		</div>

		<div class="title-bc">
				{{ session('bc_title') == 'Staff Attorney (Title will be updated to "Attorney")' ? 'Attorney' :
				session('bc_title') }}
		</div>

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

	</div>
