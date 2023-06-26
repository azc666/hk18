<div class="w-11/12 mx-auto mb-4 -mt-2 border border-gray-200 rounded-md">
    <div class="p-4 m-4 mx-auto mb-6 ml-2 mr-2 bg-gray-100 border-2 border-gray-200 rounded-md shadow-md">
    <p class="pl-16 text-xl text-hkcolor text-bold">Thank You. Your order has been placed.</p>
    <p class="pb-4 pl-16 text-lg text-gray-800 text-bold">This confirmation has been emailed to admin: {{ Auth::user()->contact_a }}
        <a class="text-sm italic" href="mailto:{{ Auth::user()->email }}">
        <span class="text-blue-700 hover:text-blue-500">({{ Auth::user()->email }})</span>
        </a>
    </p>
    <div class="pb-4 pl-16 text-gray-800">
        @if (session('rush'))
            <p class="pb-1"><span class="font-semibold border-b border-gray-400">This is a <span class="text-2xl"> &nbsp;**RUSH**&nbsp;</span> order and will be shipped
            <span class="text-xl">ASAP </span>
            @if (!session('date'))
            to:
            @else
            with an expected delivery date by {{ session('date') }} to:
            @endif
            </p>
            {{ Session::put('rush', '') }}
            {{ Session::put('rushOrder', 1) }}
            @else
                <p class="pb-1"><span class="font-semibold border-b border-gray-400">This order will be shipped to:</span>
                </p>
            @endif
            </p>
            <ul>
                <li>{{ Auth::user()->loc_name }}</li>
                <li>Attn: {{ Auth::user()->contact_s }}</li>
                <li>{{ Auth::user()->address1_s }}</li>
                <li>{{ Auth::user()->address2_s ? Auth::user()->address2_s : Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s}}
                </li>
                <li>{{ Auth::user()->address2_s ? Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s : ''}}
                </li>
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
    </div>
    {!! ($savedCart) !!}
</div>
