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
          {{-- <input wire:model="search" id="search" --}}
          <input wire:model="search" id="search"
            class="block w-full py-2 pl-10 pr-3 leading-5 placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm"
            placeholder="Search" type="search">
        </div>
      </div>
      <div class="relative flex items-start">

        <div>
          {{-- <select wire:model="pages" id="pages" --}}
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
                <button wire:click="sortBy('created_at')"
                  class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">Date
                  of Order</button>
                <x-sort-icon field="created_at" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>
            <th scope="col" class="px-6 py-3 text-left">
              <div class="flex items-center">
                <button wire:click="sortBy('confirmation')"
                  class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">Location</button>
                <x-sort-icon field="confirmation" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>

            <th scope="col" class="px-6 py-3 text-left">
              <div class="flex items-center">
                <button wire:click="sortBy('name')"
                  class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">
                  Location Name</button>
                <x-sort-icon field="location_name" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>

            <th scope="col" class="py-3 text-left -px-2">
              <div class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">
                <div class="flex items-center">
                  Detail
                </div>
              </div>
            </th>

            <th scope="col" class="px-6 py-3 text-left">
              <div class="flex items-center text-left">
                <button wire:click="sortBy('confirmation')"
                  class="text-xs font-semibold tracking-wider uppercase text-hkcolor focus:outline-none">
                  Confirmation</button>
                <x-sort-icon field="confirmation" :sortField="$sortField" :sortAsc="$sortAsc" />
              </div>
            </th>
          </tr>
        </thead>

        @if(!$orders->count())
        <div class="mt-2 mb-4 text-red-500 uppercase">
          The search has no results
        </div>
        @endif

        @foreach ($orders as $order)

        @if($loop->iteration % 2 == 0)
        <tbody class="bg-white divide-y divide-gray-200 hover:bg-gray-100">
          @else
        <tbody class="divide-y divide-gray-200 bg-gray-50 hover:bg-gray-100">
          @endif
          <tr>
            <td class="w-2/12 px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
              @if ($order->updated_at)
              {{ date("Y-m-d",strtotime($order->updated_at)) }}
              @else
              {{ date("Y-m-d",strtotime($order->created_at)) }}
              @endif
            </td>
            <td class="w-2/12 px-6 py-2 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">
                    {{-- {{ strtok($order->confirmation, '-') }} --}}
                    {{ $order->user->loc_num }}
                  </div>
                </div>
              </div>
            </td>

            <td class="w-2/12 px-6 py-2 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="ml-4">
                  <div class="text-sm font-medium leading-5 text-gray-900">
                    {{ $order->name }}

                  </div>
                </div>
              </div>
            </td>

            <td class="w-5/12 px-6 py-2 whitespace-no-wrap">
              <div class="flex items-center">
                <div class="-ml-5">
                  <div class="overflow-hidden text-sm font-medium leading-5 text-gray-900 overflow-ellipsis">

                    @php
                    $orderArray = $order->order_array;
                    $orderArray = unserialize($orderArray);

                    $prod_layout = Arr::get($orderArray, '0.prod_layout');
                    $name_o = Arr::get($orderArray, '0.name_o');
                    $email_o = Arr::get($orderArray, '0.email_o');

                    $prod_layout_1 = Arr::get($orderArray, '1.prod_layout');
                    $name_o1 = Arr::get($orderArray, '1.name_o');
                    $email_o1 = Arr::get($orderArray, '1.email_o');

                    $prod_layout_2 = Arr::get($orderArray, '2.prod_layout');
                    $name_o2 = Arr::get($orderArray, '2.name_o');
                    $email_o2 = Arr::get($orderArray, '2.email_o');

                    $prod_layout_3 = Arr::get($orderArray, '3.prod_layout');
                    $name_o3 = Arr::get($orderArray, '3.name_o');
                    $email_o3 = Arr::get($orderArray, '3.email_o');

                    $prod_layout_4 = Arr::get($orderArray, '4.prod_layout');
                    $name_o4 = Arr::get($orderArray, '4.name_o');
                    $email_o4 = Arr::get($orderArray, '4.email_o');
                    @endphp

                    {{ $prod_layout }}: {{ $name_o }} {{ $email_o ? ' (' . $email_o . ')' : ''}}
                    @isset($name_o1)
                    | {{ $prod_layout_1 }}: {{ $name_o1 }} {{ $email_o1 ? ' (' . $email_o1 . ')' : ''}}
                    @endisset
                    @isset($name_o2)
                    | {{ $prod_layout_2 }}: {{ $name_o2 }} {{ $email_o2 ? ' (' . $email_o2 . ')' : ''}}
                    @endisset
                    @isset($name_o3)
                    | {{ $prod_layout_3 }}: {{ $name_o3 }} {{ $email_o3 ? ' (' . $email_o3 . ')' : ''}}
                    @endisset
                    @isset($name_o4)
                    | {{ $prod_layout_4 }}: {{ $name_o4 }} {{ $email_o4 ? ' (' . $email_o4 . ')' : ''}}
                    @endisset

                  </div>
                </div>
              </div>
            </td>

            <td class="w-3/12 px-2 py-1 text-center whitespace-nowrap">

              <form wire:submit.prevent="submit({{ $order->id }})">
                @csrf
                <button type="submit"
                  class="inline-flex items-center px-4 py-1 text-xs font-bold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-full bg-hkcolor hover:bg-indigo-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                  {{ __($order->confirmation) }} </button>
              </form>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-8">
      {{ $orders->links() }}
    </div>
  </div>
