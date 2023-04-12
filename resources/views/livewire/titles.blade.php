<div class="py-4">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div class="max-w-lg w-full lg:max-w-xs">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" id="search"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                        placeholder="Search" type="search">
                </div>
            </div>
            <div class="relative flex items-start">

                {{-- <div class="p-2 mr-4 h-10 w-24 bg-white border border-gray-300 rounded-md text-sm text-bluegray-500">
                    <input wire:model="active" id="active" type="checkbox"
                        class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">

                    <span class="ml-3 text-sm leading-5">
                        <label for="active" class="font-medium text-gray-700">Active</label>
                    </span>
                </div> --}}

                <div>
                    <select wire:model="pages" id="pages"
                        class="border border-gray-300 rounded-md text-sm text-bluegray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out">
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="50">50 per page</option>
                    </select>
                </div>


            </div>
        </div>
    </div>

    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('type')"
                                    class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">Title
                                    Type</button>

                                <x-sort-icon field="type" :sortField="$sortField" :sortAsc="$sortAsc" />

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('title')"
                                    class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">Title
                                    Description</button>

                                <x-sort-icon field="title" :sortField="$sortField" :sortAsc="$sortAsc" />

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('updated_at')"
                                    class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">
                                    Last Updated</button>

                                <x-sort-icon field="updated_at" :sortField="$sortField" :sortAsc="$sortAsc" />

                            </div>
                        </th>
                        {{-- <th scope="col"
                            class="px-6 py-3 text-xs font-semibold text-hkcolor uppercase tracking-wider text-center">
                            Status
                        </th> --}}

                        <th scope="col"
                            class="px-6 py-3 text-xs font-semibold text-hkcolor uppercase tracking-wider text-center">
                            id
                        </th>

                        <th scope="col"
                            class="relative px-6 py-2 text-xs font-bold text-hkcolor uppercase tracking-wider text-right">
                            <button wire:click="createShowModal" type="button"
                                class="inline-flex items-center p-1 border border-transparent rounded-full shadow-sm text-white bg-hkcolor hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: solid/plus -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </th>
                    </tr>
                </thead>

@if(!$titles->count())
<div class="mb-4 mt-2 text-red-500 uppercase">
The search has no results
</div>

@endif

                @foreach ($titles as $title)

                @if($loop->iteration % 2 == 0)
                <tbody class="bg-white divide-y divide-gray-200 hover:bg-gray-100">
                    @else
                <tbody class="bg-gray-50 divide-y divide-gray-200 hover:bg-gray-100">
                    @endif



                    <tr>
                        <td class="w-3/12 px-6 py-2 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if ($title->type === 'Partner')
                                    <img class="h-10 w-10 rounded-full" src="assets/generic-avatar.png" alt="">
                                    @elseif ($title->type === 'Associate')
                                    <img class="h-10 w-10 rounded-full" src="assets/associate-avatar-orange.png" alt="">
                                    @elseif ($title->type === 'Staff')
                                    <img class="h-10 w-10 rounded-full" src="assets/staff-avatar.png" alt="">
                                    @else
                                    <img class="h-10 w-10 rounded-full" src="https://www.gravatar.com/avatar/?d=mp&f=y"
                                        alt="">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                        {{ $title->type }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-5/12 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $title->title }}
                        </td>
                        <td class="w-2/12 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($title->updated_at)
                            {{ date("F d, Y",strtotime($title->updated_at)) }}
                            @else
                            {{ date("F d, Y",strtotime($title->created_at)) }}
                            @endif

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-xs text-center">
                            {{ $title->id }}
                            {{-- @if ($title->active === 1)
                            <span class="bg-green-100 px-4 py-1 rounded-full text-green-800 text-xs font-bold">Active</span>
                            @else
                            <span class="bg-red-100 px-4 py-1 rounded-full text-red-800 text-xs font-bold">Not Active</span>
                            @endif --}}
                        </td>
                        <td class="px-2 py-1 whitespace-nowrap text-right">
                            <button wire:click="updateShowModal({{ $title->id }})" class="inline-flex items-center px-4 py-1 bg-hkcolor border border-transparent rounded-full font-bold text-xs text-white
                            uppercase tracking-widest hover:bg-indigo-400 active:bg-gray-900 focus:outline-none focus:border-gray-900
                            focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                <span class=""> {{ __('Edit') }}</span>
                            </button>
                            {{-- <a href="#" class="text-hkcolor uppercase text-sm font-semibold hover:text-indigo-500">Edit</a> --}}
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8">

            {{ $titles->links() }}
        </div>
    </div>

    {{-- Modal Create, Update Modal --}}
    <x-jet-dialog-modal wire:model="modalFormVisible">
        @if (!$modelId)
        <x-slot name="title">
            <span class="text-hkcolor font-semibold">{{ __('Add a New Title') }}</span>
        </x-slot>
        @else
        <x-slot name="title">
            <span class="text-hkcolor font-semibold">{{ __('Update Title') }} (ID = {{ $modelId }})</span>
        </x-slot>
        @endif

        <x-slot name="content">
            {{-- <div class="mt-4">
                <x-jet-label for="type" value="{{ __('Type of Title') }}" class="text-hkcolor" />
            <x-jet-input wire:model.debounce.800ms="type" id="type" class="block mt-1 w-full" type="text" name="type" />
            @error('type') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
</div> --}}
<span class="text-hkcolor text-sm">Type of Tile</span>
<div class="mt-2">
    <label class="inline-flex items-center">
        <input type="radio" class="form-radio text-hkcolor" value="Staff" wire:model="type" name="type" id="staff">
        <span class="ml-2 text-hkcolor">Staff</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input type="radio" class="form-radio text-hkcolor" value="Partner" wire:model="type" name="type" id="partner">
        <span class="ml-2 text-hkcolor">Partner</span>
    </label>
    <label class="inline-flex items-center ml-6">
        <input type="radio" class="form-radio text-hkcolor" value="Associate" wire:model="type" name="type"
            id="associate">
        <span class="ml-2 text-hkcolor">Associate</span>
    </label><br>
    @error('type') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
</div>
<div class="mt-4">
    <x-jet-label for="title" value="{{ __('Title Description') }}" class="text-hkcolor" />
    <x-jet-input wire:model.debounce.800ms="title" id="title" class="block mt-1 w-full" type="text" name="title" />
    @error('title') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
</div>
{{-- <div class="mt-4 relative">
                <x-jet-checkbox wire:model="checkbox" name="checkbox" type="checkbox" value="{{ $title->active }}"
class="mr-2 form-checkbox text-hkcolor" />
<x-jet-label for="checkbox" class="absolute top-1 inline-block text-hkcolor"
    value="{{ __('Status (Active if Checked)') }}">
</x-jet-label>

@error('active') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
</div> --}}
</x-slot>

<x-slot name="footer">
    <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
        {{ __('Nevermind') }}
    </x-jet-secondary-button>

    @if ($modelId)
    <x-jet-button class="ml-2 hover:bg-blue-400" wire:click="update" wire:loading.attr="disabled">
        <span class="text-bluegray-200 font-semibold">{{ __('Edit Title') }}</span>
    </x-jet-button>
    <x-jet-danger-button class="ml-2 hover:bg-bluegray-400" wire:click="deleteShowModal({{ $title->id }})"
        wire:loading.attr="disabled">
        <span class="text-bluegray-200 font-semibold">{{ __('Delete Title') }}</span>
    </x-jet-danger-button>

    @else
    <x-jet-button class="ml-2 hover:bg-blue-400" wire:click="create" wire:loading.attr="disabled">
        <span class="text-bluegray-200 font-semibold">{{ __('Add a Title') }}</span>
    </x-jet-button>
    @endif
</x-slot>
</x-jet-dialog-modal>

<!-- Delete title Confirmation Modal -->
<x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
    <x-slot name="title">
        {{ __('Delete the Title') }} "{{ $this->title }}"
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this title?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
            {{ __('Delete this title') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

</div>
