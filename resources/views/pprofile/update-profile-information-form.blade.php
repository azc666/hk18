<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <span class="text-xl text-white font-helmd">{{ __('Profile Information') }}</span>
    </x-slot>

    <x-slot name="description">
        <div class="text-white font-hellt">{{ __('Update your location\'s profile information.') }}
        </div>
        <div class="mb-3 text-white font-hellt">{{ __('Don\'t forget to save your changes.') }}
        </div>
        <div class="text-white font-hellt">
            {{ __('Location: ') }} <span class="text-white font-helmd">{{ $this->user->loc_name }}</span>
        </div>
        <div class="text-white font-hellt">
            {{ __('Username: ') }} <span class="text-white font-helmd">{{ $this->user->username }}</span>
        </div>

    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="object-cover w-20 h-20 rounded-full">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-secondary-button>
            @endif

            <x-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="contact_a" value="{{ __('Admin Name') }}" />
            <x-input id="contact_a" type="text" class="block w-full mt-1" wire:model.defer="state.contact_a"
                autocomplete="contact_a" />
            <x-input-error for="contact_a" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Admin Email') }}" />
            <x-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
            $this->user->hasVerifiedEmail())
            <p class="mt-2 text-sm">
                {{ __('Your email address is unverified.') }}

                <button type="button"
                    class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    wire:click.prevent="sendEmailVerification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
            <p v-show="verificationLinkSent" class="mt-2 text-sm font-medium text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>
            @endif
            @endif
        </div>

        <!-- Admin Phone -->
        <div class="flex col-span-12 -mt-1 sm:flex-none sm:col-span-4">
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="phone_a" value="{{ __('Admin Phone') }}" />
                <x-input id="phone_a" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.phone_a" />
                <x-input-error for="phone_a" class="mt-2" />
            </div>
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="fax_a" value="{{ __('Admin Fax') }}" />
                <x-input id="fax_a" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.fax_a" />
                <x-input-error for="fax_a" class="mt-2" />
            </div>
            <div class="col-span-4 -mt-1 sm:col-span-3">
                <x-label for="cell_a" value="{{ __('Admin Mobile') }}" />
                <x-input id="cell_a" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.cell_a" />
                <x-input-error for="cell_a" class="mt-2" />
            </div>
        </div>

        <!-- Address -->
        <div class="col-span-6 -mt-2 sm:col-span-4">
            <x-label for="loc_address1" value="{{ __('Location Address 1') }}" />
            <x-input id="loc_address1" type="text" class="block w-full mt-1" wire:model.defer="state.loc_address1" />
            <x-input-error for="loc_address1" class="mt-2" />
        </div>
        <div class="col-span-6 -mt-2 sm:col-span-4">
            <x-label for="loc_address2" value="{{ __('Location Address 2') }}" />
            <x-input id="loc_address2" type="text" class="block w-full mt-1" wire:model.defer="state.loc_address2" />
            <x-input-error for="loc_address2" class="mt-2" />
        </div>
        <div class="flex col-span-12 -mt-1 sm:flex-none sm:col-span-4">
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="loc_city" value="{{ __('Location City') }}" />
                <x-input id="loc_city" type="text" class="block w-full mt-1 text-sm"
                    wire:model.defer="state.loc_city" />
                <x-input-error for="loc_city" class="mt-2" />
            </div>
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="loc_state" value="{{ __('Location State') }}" />
                <x-input id="loc_state" type="text" class="block w-full mt-1 text-sm"
                    wire:model.defer="state.loc_state" />
                <x-input-error for="loc_state" class="mt-2" />
            </div>
            <div class="col-span-4 -mt-1 sm:col-span-3">
                <x-label for="loc_zip" value="{{ __('Location Zip') }}" />
                <x-input id="loc_zip" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.loc_zip" />
                <x-input-error for="loc_zip" class="mt-2" />
            </div>
        </div>

        <div class="flex-none col-span-12 p-0 border border-gray-800 sm:col-span-4"></div>

        <!-- Business Contact -->
        <div class="col-span-6 -mt-1 sm:col-span-4">
            <x-label for="contact_b" value="{{ __('Business Contact') }}" />
            <x-input id="contact_b" type="text" class="block w-full mt-1" wire:model.defer="state.contact_a"
                autocomplete="contact_b" />
            <x-input-error for="contact_b" class="mt-2" />
        </div>

        <!-- Business Email -->
        <div class="col-span-6 -mt-1 sm:col-span-4">
            <x-label for="email_b" value="{{ __('Business Email') }}" />
            <x-input id="email_b" type="email" class="block w-full mt-1" wire:model.defer="state.email_b" />
            <x-input-error for="email_b" class="mt-2" />
        </div>

        <!-- Business Phone -->
        <div class="flex col-span-12 -mt-1 sm:flex-none sm:col-span-4">
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="phone_b" value="{{ __('Business Phone') }}" />
                <x-input id="phone_b" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.phone_b" />
                <x-input-error for="phone_b" class="mt-2" />
            </div>
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="fax_b" value="{{ __('Business Fax') }}" />
                <x-input id="fax_b" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.fax_b" />
                <x-input-error for="fax_b" class="mt-2" />
            </div>
            <div class="col-span-4 -mt-1 sm:col-span-3">
                <x-label for="cell_b" value="{{ __('Business Mobile') }}" />
                <x-input id="cell_b" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.cell_b" />
                <x-input-error for="cell_b" class="mt-2" />
            </div>
        </div>

        <div class="flex-none col-span-12 p-0 border border-gray-800 sm:col-span-4"></div>

        <!-- Shipping Name -->
        <div class="col-span-6 -mt-1 sm:col-span-4">
            <x-label for="contact_s" value="{{ __('Shipping Contact') }}" />
            <x-input id="contact_s" type="text" class="block w-full mt-1" wire:model.defer="state.contact_s"
                autocomplete="contact_s" />
            <x-input-error for="contact_s" class="mt-2" />
        </div>

        <!-- Shipping Email -->
        <div class="col-span-6 -mt-1 sm:col-span-4">
            <x-label for="email_s" value="{{ __('Shipping Contact Email') }}" />
            <x-input id="email_s" type="email" class="block w-full mt-1" wire:model.defer="state.email_s" />
            <x-input-error for="email_s" class="mt-2" />
        </div>

        <!-- Shipping Phone -->
        <div class="flex col-span-12 -mt-1 sm:flex-none sm:col-span-4">
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="phone_s" value="{{ __('Shipping Phone') }}" />
                <x-input id="phone_s" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.phone_s" />
                <x-input-error for="phone_s" class="mt-2" />
            </div>
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="fax_s" value="{{ __('Shipping Fax') }}" />
                <x-input id="fax_s" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.fax_s" />
                <x-input-error for="fax_s" class="mt-2" />
            </div>
            <div class="col-span-4 -mt-1 sm:col-span-3">
                <x-label for="cell_s" value="{{ __('Shipping Mobile') }}" />
                <x-input id="cell_s" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.cell_s" />
                <x-input-error for="cell_s" class="mt-2" />
            </div>
        </div>

        <!-- Shipping Address -->
        <div class="col-span-6 -mt-2 sm:col-span-4">
            <x-label for="address1_s" value="{{ __('Shipping Address 1') }}" />
            <x-input id="address1_s" type="text" class="block w-full mt-1" wire:model.defer="state.address1_s" />
            <x-input-error for="address1_s" class="mt-2" />
        </div>
        <div class="col-span-6 -mt-2 sm:col-span-4">
            <x-label for="address2_s" value="{{ __('Shipping Address 2') }}" />
            <x-input id="address2_s" type="text" class="block w-full mt-1" wire:model.defer="state.address2_s" />
            <x-input-error for="address2_s" class="mt-2" />
        </div>
        <div class="flex col-span-12 -mt-1 sm:flex-none sm:col-span-4">
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="city_s" value="{{ __('Shipping City') }}" />
                <x-input id="city_s" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.city_s" />
                <x-input-error for="city_s" class="mt-2" />
            </div>
            <div class="col-span-4 mr-2 -mt-1 sm:col-span-3">
                <x-label for="state_s" value="{{ __('Shipping State') }}" />
                <x-input id="state_s" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.state_s" />
                <x-input-error for="state_s" class="mt-2" />
            </div>
            <div class="col-span-4 -mt-1 sm:col-span-3">
                <x-label for="zip_s" value="{{ __('Shipping Zip') }}" />
                <x-input id="zip_s" type="text" class="block w-full mt-1 text-sm" wire:model.defer="state.zip_s" />
                <x-input-error for="zip_s" class="mt-2" />
            </div>
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
