<div class="w-11/12 mx-auto mt-6 mb-6 border border-gray-200 rounded-md">
    <div class="ml-2 mr-2 mx-auto p-4 m-4 bg-gray-100 rounded-md border-2 border-gray-200 shadow-md">

        @if (session('notConfirmed'))
        <div class="text-center pb-4">
            <x-flash type="error">
                Please review and confirm the order before submitting !
            </x-flash>
        </div>
        {{ Session::put(session('notConfirmed'), '') }}
        @endif

        <div class="pb-4 text-gray-800">
            @if (session('rush'))
                <p class="pb-1"><span class="border-b border-gray-400 font-semibold">This is a <span class="text-2xl"> &nbsp;**RUSH**&nbsp;</span> order and will be shipped <span class="text-xl">ASAP </span>
                @if (!session('date'))
                    to:
                @else
                    with an expected delivery date by {{ session('date') }}  to:
                @endif
                </p>
                {{ Session::put('rush', '') }}
                {{ Session::put('rushOrder', 1) }}
            @else
                <p class="pb-1"><span class="border-b border-gray-400 font-semibold">This order will be shipped to:</span>
                </p>
                {{ Session::put('rushOrder', 0) }}
            @endif

            <ul>
                <li>{{ Auth::user()->loc_name }}
                    <a class="italic text-sm" href="{{ route('profile.show') }}">
                        <span class="text-blue-700 hover:text-blue-500"> (Change Shipping Info)</span>
                    </a>
                </li>
                <li>Attn: {{ Auth::user()->contact_s }}</li>
                <li>{{ Auth::user()->address1_s }}</li>
                <li>{{ Auth::user()->address2_s ? Auth::user()->address2_s : Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s}}
                </li>
                <li>{{ Auth::user()->address2_s ? Auth::user()->city_s . ', ' . Auth::user()->state_s . ' ' . Auth::user()->zip_s : ''}}
                </li>
            </ul>
        </div>

        <div class="text-gray-800">
            <p class="pb-1"><span class="border-b border-gray-400 font-semibold">Order & Delivery Info</span>
            </p>
            <ul class="list-disc list-inside">
                <li>An Email confirmation will be sent to the admin: {{ Auth::user()->contact_a }}
                    <a class="italic text-sm" href="mailto:{{ Auth::user()->email }}">
                        <span class="text-blue-700 hover:text-blue-500">({{ Auth::user()->email }})</span>
                    </a>
                </li>
                <li>Most orders ship within 2-3 working days.</li>
                <li>Double Sided Business Cards will automatically be sent for approval before production.</li>
                <li>Allow 1-2 weeks for engraved Partner Cards.</li>
                <li>Metal name badges are ordered and shipped on a quarterly basis.</li>
            </ul>
        </div>

        <div class="flex justify-between relative pb-12">
            <div class="">
                <form action="{{ route('placeOrder') }}" method="POST">
                    @csrf
                    <input id="confirm" name="confirm" class="mt-6 ml-4" type="checkbox">
                    <label for="confirm" class="absolute top-6 -mt-0.5 font-bold ">
                        <span
                            class="text-base text-gray-800 pl-4">I have reviewed the Proof(s) of my cart item(s) and confirm that it is correct. Other than Name Badges, or if I have specifically instructed to the contrary, I understand that production will commence upon  submission, and will be shipped without delay.
                        </span>
                    </label>
            </div>

        </div>


    </div>

    <div class="flex justify-around">
        <div class="mb-4 mt-3">
            <a href="/cart"
                class="mr-2 px-20 py-2 rounded-md bg-red-700 hover:bg-red-400 hover:border-red-600 hover:border-2 shadow-lg text-white text-sm font-bold uppercase">
                Return to the Cart
            </a>
        </div>

        <div class=" mb-4 mt-2">
            <button type="submit"
                class="mr-2 px-24 py-2 rounded-md bg-green-500 hover:bg-green-400 hover:border-green-600 hover:border-2 shadow-lg text-white text-sm font-bold uppercase">
                Place the Order
            </button>
        </div>
        </form>
    </div>
</div>
