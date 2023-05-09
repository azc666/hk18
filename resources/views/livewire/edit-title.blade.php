<x-modal-we form-action="update">
    <x-slot name="title">
        <div class="flex justify-between pt-2">
            <p class="uppercase text-hkcolor font-helmd">Edit Title</p>
            <p class="uppercase text-hkcolor font-helmd">ID: {{ $title->id }}</p>
        </div>

    </x-slot>

    <x-slot name="content">
        <div class="-mb-4">
            <label class="uppercase -pb-4 text-md font-helmd text-hkcolor">Type of Title</label>
            {{-- {{ $title }} --}}
        </div>

        <div class="">
            <label class="inline-flex items-center -mt-20">
                <input type="radio" class="form-radio text-hkcolor" value="Staff" wire:model.defer="title.type" name="type"
                    id="staff">
                <span class="mt-1 ml-2 text-hkcolor font-hellt">&nbsp;Staff</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio text-hkcolor" value="Associate" wire:model.defer="title.type" name="type"
                    id="associate">
                <span class="mt-2 ml-2 text-hkcolor font-hellt">&nbsp;Associate</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio text-hkcolor" value="Partner" wire:model.defer="title.type" name="type"
                    id="partner">
                <span class="mt-2 ml-2 text-hkcolor font-hellt">&nbsp;Partner</span>
            </label><br>
            @error('type')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-4 mb-2">
            <label class="uppercase text-hkcolor font-helmd"> Title Description
            </label>
                <input wire:model.defer="title.title" id="title" class="block w-full mt-1 mb-8 color-hkcolor" type="text" name="title"
                    {{-- placeholder="{{ $title->title }}"/> --}}
                @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex justify-around p-6 -mb-8 -ml-6 -mr-6 bg-gray-100 justify-items-center">
            <button wire:click="$emit('closeModal')"
                class="px-6 py-2 pt-3 uppercase bg-gray-300 rounded-md text-hkcolor font-helmd text-md">Cancel
            </button>
            {{-- <button wire:click="$emit('closeModal')" --}}
            <button wire:click="delete"
            type="button"
                class="px-6 py-2 pt-3 uppercase bg-red-500 rounded-md text-hkcolor font-helmd text-md">Delete
                {{-- {{ $emit('closeModal') }} --}}
            </button>
            <button wire:click="$emit('closeModal')"
            type="submit" class="px-6 py-2 pt-3 uppercase bg-blue-300 rounded-md text-hkcolor font-helmd text-md">Update</button>
        </div>

    </x-slot>
</x-modal-we>
