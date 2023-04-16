<x-app-layout>
  <x-slot name="title">Order Portal Support</x-slot>
  <x-slot name="header">
    <h2 class="font-bold text-2xl text-hkcolor leading-tight">
      {{ __('Contact HK Order Portal Support') }}
    </h2>
  </x-slot>
  <div class="py-8">
    <div class="-mt-16 -mb-8 pb-0 sm:pb-0 mx-auto">
      <div class="flex flex-wrap m-16 pb-8">

        <div class="rounded-xl relative bg-gray-50 p-8 -mb-12">
          <div class="absolute inset-0">
            <div class="absolute inset-y-0 left-0 w-1/2"></div>
          </div>
          <div class="rounded-l-xl relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
            <div class="py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
              <div class="max-w-lg mx-auto -mt-16">

            @if(session()->has('message'))
              <div class="bg-green-300 p-3 mb-6 -mt-24 rounded-md text-green-800 text-center tracking-tight font-medium">
                {!! session()->get('message') !!}
              </div>
            @endif

                <h2 class="text-2xl font-extrabold tracking-tight text-gray-700 sm:text-3xl">
                  Get in touch
                </h2>
                <p class="mt-3 text-lg leading-6 text-gray-500">
                  Need some help navigating the Portal? Have a question about the products? Want to request a feature to include on the Portal?
                  <br><br>
                  You may contact support by sending a message using this form. We will get back to you ASAP. For more urgent requests, you can contact support by phone, fax, or email.
                  <br><br>
                  The form has been populated with the current location's admin info. Feel free to edit as needed. All fields are required to submit the message.
                </p>
                <dl class="mt-8 text-base text-gray-500">
                  {{-- <div>
                    <dt class="sr-only">Postal address</dt>
                    <dd>
                      <p>742 Evergreen Terrace</p>
                      <p>Springfield, OR 12345</p>
                    </dd>
                  </div> --}}
                  <div class="mt-6">
                    <dt class="sr-only">Phone number</dt>
                    <dd class="flex">
                      <!-- Heroicon name: outline/phone -->
                      <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                      <span class="ml-3">
                        +1 (813) 254-9444
                      </span>
                    </dd>
                  </div>

                  <div class="mt-6">
                    <dt class="sr-only">Phone number</dt>
                    <dd class="flex">
                      <!-- Heroicon name: outline/fax -->
                      <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                      </svg>
                      <span class="ml-3">
                        +1 (813) 254-9445
                      </span>
                    </dd>
                  </div>

                  <div class="mt-6">
                    <dt class="sr-only">Email</dt>
                    <dd class="flex">
                      <!-- Heroicon name: outline/mail -->
                      <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                      <span class="ml-3">
                        <a href="mailto:support@g-d.com">support@g-d.com</a>
                      </span>
                    </dd>
                  </div>
                </dl>

              </div>
            </div>

            <div class="bg-bluegray-300 py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12 rounded-lg">
              <div class="max-w-lg mx-auto lg:max-w-none">
                <div class="-mt-16">

                  <livewire:contact />

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
