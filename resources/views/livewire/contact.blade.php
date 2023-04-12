<form wire:submit.prevent="submitForm" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
    @csrf
@if (session('contactMessage') === true)
    <x-flash type="success">
        You have successfully submited your message!
    </x-flash>
    {{--  --}}
@endif
{{-- {{ Session::put('contactMessage', false) }} --}}
    <div class="sm:col-span-2">
        <label for="loc_name" class="block text-sm font-semibold uppercase text-hkcolor">Location Name</label>
        <div class="mt-1">
            <input wire:model='loc_name' type="text" name="loc_name" id="loc_name" autocomplete="none"
                placeholder="Your Location"
                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md text-gray-700">
            @error('loc_name') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="sm:col-span-2">
        <label for="name" class="block text-sm font-semibold uppercase text-hkcolor">Your Name</label>
        <div class="mt-1">
            <input wire:model='name' type="text" name="name" id="company" autocomplete="name" placeholder="Your Name"
                class="py-3 px-4 block w-full shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            @error('name') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="sm:col-span-2">
        <label for="email" class="block text-sm font-semibold uppercase text-hkcolor">Your Email</label>
        <div class="mt-1">
            <input wire:model='email' id="email" name="email" type="email" autocomplete="email" placeholder="Your Email"
                class="py-3 px-4 block w-full shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            @error('email') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
        </div>
    </div>

    <span class="-mb-4 block text-sm font-semibold uppercase text-hkcolor">Type of Message</span>
    <div
        class="sm:col-span-2 py-3 px-4 block w-full shadow-sm text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md bg-white">
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio text-hkcolor" value="Portal Support" wire:model="type" name="type"
                id="portal_support">
            <span class="ml-2 text-hkcolor font-medium">Portal Support</span>
        </label>
        <label class="inline-flex items-center ml-6">
            <input type="radio" class="form-radio text-hkcolor" value="Product Info" wire:model="type" name="type"
                id="product_info">
            <span class="ml-2 text-hkcolor font-medium">Product Info</span>
        </label>
        <label class="inline-flex items-center ml-6">
            <input type="radio" class="form-radio text-hkcolor" value="Other" wire:model="type" name="type" id="other">
            <span class="ml-2 text-hkcolor font-medium">Other</span>
        </label><br>

    </div>
    @error('type') <span class="-mt-5 text-sm text-red-500">{{ $message }}</span>@enderror
    <div class="sm:col-span-2 -mt-1 mb-6">
        <label for="msg" class="block text-sm font-semibold uppercase text-hkcolor">Your Message</label>
        <div class="mt-1">
            <textarea wire:model='msg' id="msg" name="msg" rows="4"
                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                placeholder="Put your message here..."></textarea>
            @error('msg') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="sm:col-span-2 -mb-10 flex justify-between">
        <div class="w-1/2 pr-4">
            <div
                class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-semibold bg-gray-400 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="/categories"><span class="text-bluegray-800">Cancel Your Message</span></a>
            </div>
        </div>
        <div class="w-1/2 pl-4">
            <a href="/categories">
                <button type="submit"
                    class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-semibold text-white bg-hkcolor hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit Your Message
                </button>
            </a>
        </div>
    </div>

</form>
