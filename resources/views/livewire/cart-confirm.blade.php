<div class="w-11/12 mx-auto mt-6 mb-6 border border-gray-200 rounded-md">
    <div class="p-4 m-4 mx-auto ml-2 mr-2 bg-gray-100 border-2 border-gray-200 rounded-md shadow-md">

        @php
            if (session('confirmation')) {
                $order = App\Models\Order::where('confirmation', session('confirmation'))->first();
                $updated = $order->updated_at;
                $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $updated)->format('Y-m-d');
            } else {
                $date = NOW();
            }
        @endphp

{{-- @dd($date) --}}
        @if (session('notConfirmed') && Request::all('confirm' === null) && $date < "2023-06-14" ) <div class="pb-4 text-left">
            <x-flash type="error">
                <div>
                    <span class="uppercase">Restored item(s) must be updated.</span> Please confirm you have edited and updated
                    the restored item(s) before submitting !
                </div>
                <div>
                    AND Please review and confirm the order before submitting !
                </div>
            </x-flash>
            </div>
            {{ Session::put(session('notConfirmed'), '') }}
            {{-- {{ Session::put(session('notConfirmedRestore'), '') }} --}}
            @endif

        @if (session('notConfirmed') && Request::all('confirm' === null) && $date > "2023-06-14")
        <div class="pb-4 text-left">
            <x-flash type="error">
                Please review and confirm the order before submitting ! <br>
            </x-flash>
        </div>
        {{ Session::put(session('notConfirmed'), '') }}
        @endif

        <div class="pb-4 text-gray-800">
            @if (session('rush'))
                <p class="pb-1"><span class="font-semibold border-b border-gray-400">This is a <span class="text-2xl"> &nbsp;**RUSH**&nbsp;</span> order and will be shipped <span class="text-xl">ASAP </span>
                @if (!session('date'))
                    to:
                @else
                    with an expected delivery date by {{ session('date') }}  to:
                @endif
                </p>
                {{ Session::put('rush', '') }}
                {{ Session::put('rushOrder', 1) }}
            @else
                <p class="pb-1"><span class="font-semibold border-b border-gray-400">This order will be shipped to:</span>
                </p>
                {{ Session::put('rushOrder', 0) }}
            @endif

            <ul>
                <li>{{ Auth::user()->loc_name }}
                    <a class="text-sm italic" href="{{ route('profile.show') }}">
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
            <p class="pb-1"><span class="font-semibold border-b border-gray-400">Order & Delivery Info</span>
            </p>
            <ul class="list-disc list-inside">
                <li>An Email confirmation will be sent to the admin: {{ Auth::user()->contact_a }}
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

        <div class="relative flex justify-between pb-12">
            <div class="">
                @php
                    if (session('confirmation')) {
                        $order = App\Models\Order::where('confirmation', session('confirmation'))->first();
                        $updated = $order->updated_at;
                        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $updated)->format('Y-m-d');
                    }
                @endphp
                {{-- @dd($date) --}}
                <form action="{{ route('placeOrder') }}" method="POST">
                    @csrf
                    @if (session('restored') === true && $date < "2023-06-14")
                        <div>
                            <input id="confirmRestore" name="confirmRestore" class="mt-6 ml-4" type="checkbox">
                            <label for="confirmRestore" class="absolute top-6 -mt-0.5 font-bold ">
                                <span
                                    class="pl-4 text-base text-gray-800"><span class="uppercase">Restored item(s) must be updated.</span> I confirm that my restored item(s) have been edited and updated.
                                </span>
                            </label>
                        </div>

                        <div>
                            <input id="confirm" name="confirm" class="mt-5 ml-4" type="checkbox">
                            <label for="confirm" class="absolute font-bold top-14">
                                <span class="pl-4 text-base text-gray-800">I have reviewed the Proof(s) of my cart item(s) and confirm that it is correct. Other than Name Badges, or if I have specifically instructed to the contrary, I understand that production will commence upon submission, and will be shipped without delay.
                                </span>
                            </label>
                        </div>
                    @else
                        <div>
                            <input id="confirm" name="confirm" class="mt-6 ml-4" type="checkbox">
                            <label for="confirm" class="absolute top-6 -mt-0.5 font-bold ">
                                <span class="pl-4 text-base text-gray-800">I have reviewed the Proof(s) of my cart item(s) and confirm that it
                                    is correct. Other than Name Badges, or if I have specifically instructed to the contrary, I understand that
                                    production will commence upon submission, and will be shipped without delay.
                                </span>
                            </label>
                        </div>
                    @endif
            </div>
        </div>
    </div>

    <div class="flex justify-around">
        <div class="mt-3 mb-4">
            <a href="/cart"
                class="px-20 py-2 mr-2 text-sm font-bold text-white uppercase bg-red-700 rounded-md shadow-lg hover:bg-red-400 hover:border-red-600 hover:border-2">
                Return to the Cart
            </a>
        </div>

        <div class="mt-2 mb-4">
            <button type="submit"
                class="px-24 py-2 mr-2 text-sm font-bold text-white uppercase bg-green-500 rounded-md shadow-lg hover:bg-green-400 hover:border-green-600 hover:border-2">
                Place the Order
            </button>
        </div>
        </form>
    </div>
</div>
