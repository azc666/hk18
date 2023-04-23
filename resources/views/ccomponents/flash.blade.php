@props([
  'type' => 'success',
  'colors' => [
    'success' => 'bg-green-200 border-2 border-green-600 block w-full p-4 rounded-lg text-base font-medium text-green-900',
    'error' => 'bg-red-200 border-2 border-red-600 block w-full p-4 rounded-lg text-base font-semibold text-red-900',
    'warning' => 'bg-orange-200 border-2 border-orange-400 block w-full p-4 rounded-lg text-base font-medium text-orange-900',
  ],
  'circle' => [
    'success' => 'text-green-600',
    'error' => 'text-red-600',
    'warning' => 'text-orange-600',
  ],
  'dismiss' => [
    'success' => 'bg-green-50 rounded-md p-1.5 text-green-600 hover:bg-green-100 focus:ring-offset-green-50 focus:ring-green-600',
    'error' => 'bg-red-50 rounded-md p-1.5 text-red-600 hover:bg-red-100 focus:ring-offset-red-50 focus:ring-red-600',
    'warning' => 'bg-orange-50 rounded-md p-1.5 text-orange-600 hover:bg-orange-100 focus:ring-offset-orange-50 focus:ring-orange-600',
  ],

])

<div class="sm:col-span-2">
  {{-- @if (session()->has('message')) --}}
  <div class="{{ $colors[$type] }}">
    <div class="flex justify-between">
      <div class="flex-shrink-0 pr-4">
        <!-- Heroicon name: solid/check-circle -->
        @if ($type === 'success')
          <svg class="h-6 w-6 {{ $circle[$type] }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
            aria-hidden="true">
            <path fill-rule="evenodd"
            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
            clip-rule="evenodd" />
          </svg>
        @elseif ($type === 'error')
          <svg class="w-6 h-6" {{ $circle[$type] }} fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        @elseif ($type === 'warning')
          <svg class="w-6 h-6" {{ $circle[$type] }} fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
            </path>
          </svg>
        @endif

      </div>

      <div>
        {{ $slot }}
      </div>

      <div class="ml-auto pl-3">
        <div class="-mx-1.5 -my-1.5">
          @if (session('clearCart') === true || session('contactMessage') === true)
            {{-- {{ Session::put('clearCart', false) }} --}}
            <button type="button" onclick="window.location.href='{{ '/categories' }}';"
            {{ Session::put('clearCart', false) }}
          @else
            <button type="button" onclick="window.location.href='{{ '/cart' }}';"
          @endif
            class="inline-flex focus:outline-none focus:ring-2 focus:ring-offset-2 {{
            $dismiss[$type] }}">
            <span class="sr-only">Dismiss</span>
            <!-- Heroicon name: solid/x -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
              aria-hidden="true">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- @endif --}}
</div>
