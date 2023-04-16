<div class="py-4">
    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <div class="w-full max-w-lg lg:max-w-xs">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" id="search"
                        class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm"
                        placeholder="Search" type="search">
                </div>
            </div>
            <div class="relative flex items-start">

                {{-- <div
                    class="w-24 h-10 p-2 mr-4 text-sm bg-white border border-gray-300 rounded-md text-bluegray-500">
                    <input wire:model="active" id="active" type="checkbox"
                        class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-checkbox">

                    <span class="ml-3 text-sm leading-5">
                        <label for="active" class="font-medium text-gray-700">Active</label>
                    </span>
                </div> --}}

                <div>
                    <select wire:model="pages" id="pages"
                        class="text-sm transition duration-150 ease-in-out border border-gray-300 rounded-md text-bluegray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm">
                        <option value="10">10 per page</option>
                        <option value="25">25 per page</option>
                        <option value="50">50 per page</option>
                    </select>
                </div>


            </div>
        </div>
    </div>

    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-400 shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('type')"
                                    class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">Title
                                    Type</button>

                                <x-sort-icon field="type" :sortField="$sortField" :sortAsc="$sortAsc" />

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('title')"
                                    class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">Title
                                    Description</button>

                                <x-sort-icon field="title" :sortField="$sortField" :sortAsc="$sortAsc" />

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left">
                            <div class="flex items-center">
                                <button wire:click="sortBy('updated_at')"
                                    class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">
                                    Last Updated</button>

                                <x-sort-icon field="updated_at" :sortField="$sortField" :sortAsc="$sortAsc" />

                            </div>
                        </th>
                        {{-- <th scope="col"
                            class="px-6 py-3 text-xs font-semibold tracking-wider text-center uppercase text-hkcolor">
                            Status
                        </th> --}}

                        <th scope="col"
                            class="px-6 py-3 text-xs font-semibold tracking-wider text-center uppercase text-hkcolor">
                            id
                        </th>

                        <th scope="col"
                            class="relative px-6 py-2 text-xs font-bold tracking-wider text-right uppercase text-hkcolor">
                            <button wire:click="createShowModal" type="button"
                                class="inline-flex items-center p-1 text-white border border-transparent rounded-full shadow-sm bg-hkcolor hover:bg-indigo-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: solid/plus -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
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
                <div class="mt-2 mb-4 text-red-500 uppercase">
                    The search has no results
                </div>

                @endif

                @foreach ($titles as $title)

                @if($loop->iteration % 2 == 0)
                <tbody class="bg-white divide-y divide-gray-200 hover:bg-gray-100">
                    @else
                <tbody class="divide-y divide-gray-200 bg-gray-50 hover:bg-gray-100">
                    @endif



                    <tr>
                        <td class="w-3/12 px-6 py-2 whitespace-no-wrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    @if ($title->type === 'Partner')
                                    <img class="w-10 h-10 rounded-full" src="assets/generic-avatar.png" alt="">
                                    @elseif ($title->type === 'Associate')
                                    <img class="w-10 h-10 rounded-full" src="assets/associate-avatar-orange.png" alt="">
                                    @elseif ($title->type === 'Staff')
                                    <img class="w-10 h-10 rounded-full" src="assets/staff-avatar.png" alt="">
                                    @else
                                    <img class="w-10 h-10 rounded-full" src="https://www.gravatar.com/avatar/?d=mp&f=y"
                                        alt="">
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                        {{ $title->type }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-5/12 px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            {{ $title->title }}
                        </td>
                        <td class="w-2/12 px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                            @if ($title->updated_at)
                            {{ date("F d, Y",strtotime($title->updated_at)) }}
                            @else
                            {{ date("F d, Y",strtotime($title->created_at)) }}
                            @endif

                        </td>
                        <td class="px-6 py-4 text-xs text-center whitespace-nowrap">
                            {{ $title->id }}
                            {{-- @if ($title->active === 1)
                            <span
                                class="px-4 py-1 text-xs font-bold text-green-800 bg-green-100 rounded-full">Active</span>
                            @else
                            <span class="px-4 py-1 text-xs font-bold text-red-800 bg-red-100 rounded-full">Not
                                Active</span>
                            @endif --}}
                        </td>
                        <td class="px-2 py-1 text-right whitespace-nowrap">
                            <button wire:click="updateShowModal({{ $title->id }})"
                                class="inline-flex items-center px-4 py-1 text-xs font-bold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-full bg-hkcolor hover:bg-indigo-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                <span class=""> {{ __('Edit') }}</span>
                            </button>
                            {{-- <a href="#"
                                class="text-sm font-semibold uppercase text-hkcolor hover:text-indigo-500">Edit</a> --}}
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
    <jet-dialog-modal wire:model="modalFormVisible">
        {{-- @dd($modelId) --}}
        @if (!$modelId)
        <x-slot name="title">
            <span class="font-semibold text-hkcolor">{{ __('Add a New Title') }}</span>
        </x-slot>
        @else
        <x-slot name="title">
            <span class="font-semibold text-hkcolor">{{ __('Update Title') }} (ID = {{ $modelId }})</span>
        </x-slot>
        @endif

        <x-slot name="content">
            {{-- <div class="mt-4">
                <jet-label for="type" value="{{ __('Type of Title') }}" class="text-hkcolor" />
                <jet-input wire:model.debounce.800ms="type" id="type" class="block w-full mt-1" type="text"
                    name="type" />
                @error('type') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div> --}}
            <span class="text-sm text-hkcolor">Type of Tile</span>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" class="form-radio text-hkcolor" value="Staff" wire:model="type" name="type"
                        id="staff">
                    <span class="ml-2 text-hkcolor">Staff</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" class="form-radio text-hkcolor" value="Partner" wire:model="type" name="type"
                        id="partner">
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
                <jet-label for="title" value="{{ __('Title Description') }}" class="text-hkcolor" />
                <jet-input wire:model.debounce.800ms="title" id="title" class="block w-full mt-1" type="text"
                    name="title" />
                @error('title') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="relative mt-4">
                <jet-checkbox wire:model="checkbox" name="checkbox" type="checkbox" value="{{ $title->active }}"
                    class="mr-2 form-checkbox text-hkcolor" />
                <jet-label for="checkbox" class="absolute inline-block top-1 text-hkcolor"
                    value="{{ __('Status (Active if Checked)') }}">
                </jet-label>

                @error('active') <span class="text-sm text-red-500">{{ $message }}</span>@enderror
            </div> --}}
        </x-slot>

        <x-slot name="footer">
            <jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </jet-secondary-button>

            @if ($modelId)
            <jet-button class="ml-2 hover:bg-blue-400" wire:click="update" wire:loading.attr="disabled">
                <span class="font-semibold text-bluegray-200">{{ __('Edit Title') }}</span>
            </jet-button>
            <jet-danger-button class="ml-2 hover:bg-bluegray-400" wire:click="deleteShowModal({{ $title->id }})"
                wire:loading.attr="disabled">
                <span class="font-semibold text-bluegray-200">{{ __('Delete Title') }}</span>
            </jet-danger-button>

            @else
            <jet-button class="ml-2 hover:bg-blue-400" wire:click="create" wire:loading.attr="disabled">
                <span class="font-semibold text-bluegray-200">{{ __('Add a Title') }}</span>
            </jet-button>
            @endif
        </x-slot>
    </jet-dialog-modal>

    <!-- Delete title Confirmation Modal -->
    <jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete the Title') }} "{{ $this->title }}"
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this title?') }}
        </x-slot>

        <x-slot name="footer">
            <jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </jet-secondary-button>

            <jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete this title') }}
            </jet-danger-button>
        </x-slot>
    </jet-dialog-modal>

</div>
