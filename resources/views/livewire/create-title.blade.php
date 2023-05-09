<x-modal-we form-action="create">
    <x-slot name="title">
        <span class="uppercase text-hkcolor font-helmd">Add a New Title</span>
    </x-slot>

    <x-slot name="content">
        <div class="-mb-4">
            <label class="uppercase text-md font-helmd text-hkcolor">Type of Title</label>
        </div>

        <div class="">
            <label class="inline-flex items-center -mt-20">
                <input type="radio" class="form-radio text-hkcolor" value="Staff" wire:model="type" name="type"
                    id="staff">
                <span class="mt-1 ml-2 text-hkcolor font-hellt">&nbsp;Staff</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio text-hkcolor" value="Associate" wire:model="type" name="type"
                    id="associate">
                <span class="mt-2 ml-2 text-hkcolor font-hellt">&nbsp;Associate</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio text-hkcolor" value="Partner" wire:model="type" name="type"
                    id="partner">
                <span class="mt-2 ml-2 text-hkcolor font-hellt">&nbsp;Partner</span>
            </label><br>
            @error('type')
            <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mt-4 mb-2">
            <label class="uppercase text-hkcolor font-helmd"> Title Description
                <input wire:model.debounce.800ms="title" id="title" class="block w-full mt-1 color-hkcolor" type="text"
                    name="title" />
                @error('title')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="flex justify-around p-6 -ml-6 -mr-6 bg-gray-100 justify-items-center">
            <button wire:click="$emit('closeModal')"
                class="py-2 pt-3 uppercase bg-gray-300 rounded-md px-14 text-hkcolor font-helmd text-md">Cancel</button>
            <button type="submit" class="px-8 py-2 pt-3 uppercase bg-blue-300 rounded-md text-hkcolor font-helmd text-md">Create
                Title</button>
        </div>

    </x-slot>
</x-modal-we>
