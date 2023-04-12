{{-- {{ $order->find(1738) }} --}}
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
          {{-- <input wire:model="search" id="search" --}}
          <input wire:model="search" id="search"
            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
            placeholder="Search" type="search">
        </div>
      </div>
      <div class="relative flex items-start">

        <div>
          {{-- <select wire:model="pages" id="pages" --}}
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
                <button wire:click="sortBy('created_at')" class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">Date
                  of Order</button>
                    <x-sort-icon field="created_at" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>
            <th scope="col" class="px-6 py-3 text-left">
              <div class="flex items-center">
                <button wire:click="sortBy('confirmation')"
                  class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">Location</button>
                <x-sort-icon field="confirmation" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>
            <th scope="col" class="px-6 py-3 text-left">
              <div class="flex items-center">
                <button wire:click="sortBy('name')"
                  class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">
                  Location Name</button>
                <x-sort-icon field="location_name" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>
            <th scope="col" class="px-6 py-3 text-left">
              <div class="text-left flex items-center">
                <button wire:click="sortBy('confirmation')"
                  class="text-xs font-semibold text-hkcolor uppercase tracking-wider focus:outline-none">
                  Confirmation</button>
                <x-sort-icon field="confirmation" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>
          </tr>
        </thead>

        @if(!$orders->count())
        <div class="mb-4 mt-2 text-red-500 uppercase">
          The search has no results
        </div>

        @endif
        @foreach ($orders as $order)
        {{-- {{ $order->updated_at }} - {{ $order->user->loc_num }} - {{ $order->name }} -
        {{ $order->confirmation }}<br> --}}
        @if($loop->iteration % 2 == 0)
        <tbody class="bg-white divide-y divide-gray-200 hover:bg-gray-100">
          @else
        <tbody class="bg-gray-50 divide-y divide-gray-200 hover:bg-gray-100">
          @endif
          <tr>
            <td class="w-2/12 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              @if ($order->updated_at)
              {{ date("Y-m-d",strtotime($order->updated_at)) }}
              @else
              {{ date("Y-m-d",strtotime($order->created_at)) }}
              @endif

            </td>
            <td class="w-3/12 px-6 py-2 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="ml-4">
                  <div class="text-sm leading-5 font-medium text-gray-900">
                    {{-- {{ strtok($order->confirmation, '-') }} --}}
                    {{ $order->user->loc_num }}
                  </div>
                </div>
              </div>
            </td>
            <td class="w-5/12 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
              {{ $order->name }}
            </td>
            {{-- <td class="w-5/12 px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @foreach ($order->orderArray as $item)
                                {{ $item->prod_ }}
            @endforeach
            {{ $order->name }}
            </td> --}}

            {{-- <td class="px-6 py-4 whitespace-nowrap text-xs text-center">
                            {{ $order->user->loc_name }}
            </td> --}}
            <td class="px-2 py-1 whitespace-nowrap text-center">
              {{-- <button wire:click="updateShowModal({{ $order->confirmation }})" class="inline-flex
              items-center px-4 py-1 bg-hkcolor border border-transparent rounded-full font-bold text-xs
              text-white
              uppercase tracking-widest hover:bg-indigo-400 active:bg-gray-900 focus:outline-none
              focus:border-gray-900
              focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"> --}}
              <button
                class="inline-flex items-center px-4 py-1 bg-hkcolor border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                <span class=""> {{ __($order->confirmation) }}</span>
              </button>
              {{-- <a href="#" class="text-hkcolor uppercase text-sm font-semibold hover:text-indigo-500">Edit</a> --}}
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-8">
      {{-- {{ $this->pages }} --}}
      {{ $orders->links() }}
    </div>
  </div>
  {{-- @endforeach --}}

  {{-- <livewire:orders :orders="$orders"/> --}}
  {{-- </x-app-layout> --}}
