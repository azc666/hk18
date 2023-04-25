<x-modal-we form-action="update">
    <x-slot name="title">
        <span class="uppercase text-hkcolor font-helmd">Edit Title {{ session('modelId') }}</span>
    </x-slot>

    <x-slot name="content">
        <div class="-mb-4">
            <label class="uppercase text-md font-helmd text-hkcolor">Type of Title</label>
            {{ $title }}
        </div>

        <div class="">
            <label class="inline-flex items-center -mt-20">
                <input type="radio" class="form-radio text-hkcolor" value="Staff" wire:model="type" name="type"
                    id="staff">
                <span class="mt-1 ml-2 text-hkcolor font-hellt">&nbsp;Staff</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio text-hkcolor" value="Partner" wire:model="type" name="type"
                    id="partner">
                <span class="mt-2 ml-2 text-hkcolor font-hellt">&nbsp;Associate</span>
            </label>
            <label class="inline-flex items-center ml-6">
                <input type="radio" class="form-radio text-hkcolor" value="Associate" wire:model="type" name="type"
                    id="associate">
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
        <div class="flex justify-end mr-6 space-x-4">
            <button wire:click="$emit('closeModal')"
                class="px-4 py-2 pt-3 bg-gray-300 rounded-md text-hkcolor font-helmd text-md">Cancel</button>
            <button type="submit" class="px-4 py-2 pt-3 bg-blue-300 rounded-md text-hkcolor font-helmd text-md">Update
                Title</button>
        </div>

    </x-slot>
</x-modal-we>
