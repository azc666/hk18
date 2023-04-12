<x-app-layout>
    <x-slot name="title">{{ __('Order Confirmation') }}</x-slot>
    <x-slot name="header">
        <h2 class="pt-2 text-2xl leading-tight helmd text-hkcolor">
            {{ __('Order Confirmation: ') . $confirmation }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="w-11/12 mx-auto mb-4 -mt-2 border border-gray-200 rounded-md">
            <div class="p-4 m-4 mx-auto mb-6 ml-2 mr-2 bg-gray-100 border-2 border-gray-200 rounded-md shadow-md">
                <div class="pb-0 mx-auto -mt-16 -mb-8 sm:pb-0">
                    <div class="flex flex-wrap m-16 border-0 rounded-xl bg-slate-100">
                        <div
                            class="p-6 mx-auto text-lg uppercase border-b border-gray-400 -pb-6 text-hkcolor text-bold">
                            <span class="inline-block align-left">{{ $username }} &nbsp;&nbsp; |
                                &nbsp;&nbsp;{{ $name }} &nbsp;&nbsp; | &nbsp;&nbsp;Order Date:
                                {{ date("Y-m-d",strtotime($created_at)) }} &nbsp;&nbsp; | &nbsp;&nbsp;Confirmation:
                                {{ $confirmation }}</span>
                        </div>
                    </div>
                </div>




                @if ($created_at > date('2021-05-01'))

                <p class="pl-16 text-xl text-hkcolor text-bold">Thank You. Your order has been placed.</p>
                <p class="pb-4 pl-16 text-lg text-gray-800 text-bold">This confirmation has been emailed to admin:
                    {{ Auth::user()->contact_a }}
                    <a class="text-sm italic" href="mailto:{{ Auth::user()->email }}">
                        <span class="text-blue-700 hover:text-blue-500">({{ Auth::user()->email }})</span>
                    </a>
                </p>
                <div class="pb-4 pl-16 text-gray-800">
                    <p class="pb-1"><span class="border-b border-gray-400 helmd">This order will be shipped
                            to:</span>
                    </p>
                    <ul>
                        <li>{{ $name }}</li>
                        <li>Attn: {{ $contact_s }}</li>
                        {{-- <li>{{ Auth::user()->address1_s }}</li>
                        <li>{{ Auth::user()->address2_s ? Auth::user()->address2_s : Auth::user()->city_s . ', ' .
                            Auth::user()->state_s . ' ' . Auth::user()->zip_s}}
                        </li>
                        <li>{{ Auth::user()->address2_s ? Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' .
                            Auth::user()->zip_s : ''}}
                        </li> --}}
                        <li>{!! $address_s !!}
                    </ul>
                </div>

                <div class="pl-16 text-gray-800">
                    <p class="pb-1"><span class="font-semibold border-b border-gray-400">Order & Delivery Info</span>
                    </p>
                    <ul class="list-disc list-inside">
                        <li>An Email confirmation was sent to the admin: {{ Auth::user()->contact_a }}
                            <a class="text-sm italic" href="mailto:{{ Auth::user()->email }}">
                                <span class="text-blue-700 hover:text-blue-500">({{ Auth::user()->email }})</span>
                            </a>
                        </li>
                        <li>Most orders ship within 2-3 working days.</li>
                        <li>Double Sided Business Cards will automatically be sent for approval before production.</li>
                        <li>Allow 1-2 weeks for engraved Partner Cards.</li>
                        <li>Metal name badges are ordered and shipped on a quarterly basis.</li>
                    </ul>
                </div>

                @endif

                <div class="mx-auto">
                    {!! ($theCart) !!}
                </div>

                <div class="pt-4 pb-2 text-center">
                    <button
                        class="w-1/2 px-12 py-3 font-semibold uppercase bg-blue-700 rounded-lg text-blue-50 hover:bg-blue-400 hover:border-blue-600 hover:border-2">
                        <a href="{{ route('restoreOrder', ['name' => $name, 'orderId' => $orderId]) }}"><span
                                class="text-base font-bold text-white uppercase">Restore Order to Cart</span>
                        </a>
                    </button>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>
