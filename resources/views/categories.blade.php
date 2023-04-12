<x-app-layout>
	<x-slot name="title">Categories</x-slot>
	<x-slot name="header">
		{{-- <div class="flex justify-around -mb-2"> --}}
			<h2 class="pt-3 text-lg leading-tight sm:text-2xl helmd text-hkcolor">
				{{ __('Select a Category') }}

			</h2>
			{{-- <img src="assets/HKheader.png" alt="HK" class="object-cover w-[30%] sm:w-[40%]"> --}}
			{{--
		</div> --}}

	</x-slot>
	{{-- <x-slot name="header">
		<img src="assets/HKheader2.png" alt="" class="h-8">
	</x-slot> --}}

	<div class="py-8">
		<div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
			@if (session('clearCart') === true)
			<div class="w-2/3 mx-auto mt-16 mb-4">
				<x-flash type="success" redirect="categories">
					You have successfully cleared your cart.
				</x-flash>
				{{ Session::put('clearCart', false) }}
			</div>
			@endif
		</div>

		<div class="bg-[#004990] opacity-90">
			<div class="max-w-2xl px-4 py-16 mx-auto mt-8 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
				<h2 class="sr-only">Products</h2>

				<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
					<a href="/category/partner" class="group">
						<div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
							@if (auth()->user()->username === 'HK34')
							<img src="assets/partner/bogota_pbcfyi_display.jpg"
								class="object-center w-full h-full ml-4 group-hover:opacity-75">
							@elseif (auth()->user()->username === 'HK35' || auth()->user()->username === 'HK42')
							<img src="assets/partner/mexico_pbcfyi_display.jpg"
								class="object-center w-full h-full ml-4 group-hover:opacity-75">
							@elseif (auth()->user()->username === 'HK46')
							<img src="assets/partner/london_pbcfyi_display.jpg"
								class="object-center w-full h-full ml-4 group-hover:opacity-75">
							@else
							<img src="assets/partner/pbcfyi_display.jpg" class="mt-6 ml-4 scale-105 group-hover:opacity-75">
							@endif
						</div>
						<h3 class="mt-6 text-2xl text-center text-gray-100 font-helmd hover:opacity-75"><span
								class="text-3xl font-helmd">Partner</span> <br>
							Stationery Items</h3>
					</a>

					<a href="#" class="group">
						<div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
							<img src="assets/associate/abcfyi_display.jpg" class="mt-6 ml-4 scale-105 group-hover:opacity-75">
						</div>
						<h3 class="mt-6 text-2xl text-center text-gray-100 helmd hover:opacity-75"><span
								class="text-3xl helmd">Associate</span> <br>
							Stationery Items</h3>

					</a>

					<a href="#" class="group">
						<div class="w-full overflow-hidden rounded-lg h-80 bg-gray-50">
							<img src="assets/staff/sbcfyi_display.jpg" class="mt-6 ml-4 scale-105 group-hover:opacity-75">
						</div>
						<h3 class="mt-6 text-2xl text-center text-gray-100 helmd hover:opacity-75"><span
								class="text-3xl helmd">Staff</span> <br>
							Stationery Items</h3>
					</a>

					<a href="#" class="group">
						<div
							class="w-full overflow-hidden bg-white rounded-lg aspect-h-1 aspect-w-1 sm:aspect-h-7 sm:aspect-w-7 xl:aspect-h-8">
							<img src="assets/nametag/ntag_display.jpg"
								class=" object-contain object-center w-[300px] h-auto scale-105 group-hover:opacity-75">
						</div>
						<h3 class="mt-6 text-2xl text-center text-gray-100 helmd hover:opacity-75"><span
								class="text-3xl font-helmd">Name
								Badges</span></h3>
					</a>

					<!-- More products... -->
				</div>
			</div>
		</div>

</x-app-layout>
