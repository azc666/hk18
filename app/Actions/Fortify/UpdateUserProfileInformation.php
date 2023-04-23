<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'contact_a' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone_a' => ['nullable', 'string', 'max:25'],
            'fax_a' => ['nullable', 'string', 'max:25'],
            'cell_a' => ['nullable', 'string', 'max:25'],
            'loc_address1' => ['nullable', 'string', 'max:255'],
            'loc_address2' => ['nullable', 'string', 'max:255'],
            'contact_b' => ['nullable', 'string', 'max:255'],
            'email_b' => ['nullable', 'email', 'max:255'],
            'phone_b' => ['nullable', 'string', 'max:25'],
            'fax_' => ['nullable', 'string', 'max:25'],
            'cell_' => ['nullable', 'string', 'max:25'],
            'contact_s' => ['nullable', 'string', 'max:255'],
            'email_s' => ['nullable', 'email', 'max:255'],
            'phone_s' => ['nullable', 'string', 'max:25'],
            'fax_s' => ['nullable', 'string', 'max:25'],
            'cell_s' => ['nullable', 'string', 'max:25'],
            'address1_s' => ['nullable', 'string', 'max:255'],
            'address2_s' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'contact_a' => $input['contact_a'],
                'email' => $input['email'],
                'phone_a' => $input['phone_a'],
                'fax_a' => $input['fax_a'],
                'cell_a' => $input['cell_a'],
                'loc_address1' => $input['loc_address1'],
                'loc_address2' => $input['loc_address2'],
                'loc_city' => $input['loc_city'],
                'loc_state' => $input['loc_state'],
                'loc_zip' => $input['loc_zip'],
                'contact_b' => $input['contact_b'],
                'email_b' => $input['email_b'],
                'phone_b' => $input['phone_b'],
                'fax_b' => $input['fax_b'],
                'cell_b' => $input['cell_b'],
                'contact_s' => $input['contact_s'],
                'email_s' => $input['email_s'],
                'phone_s' => $input['phone_s'],
                'fax_s' => $input['fax_s'],
                'cell_s' => $input['cell_s'],
                'address1_s' => $input['address1_s'],
                'address2_s' => $input['address2_s'],
                'city_s' => $input['city_s'],
                'state_s' => $input['state_s'],
                'zip_s' => $input['zip_s'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'contact_a' => $input['contact_a'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'phone_a' => $input['phone_a'],
            'fax_a' => $input['fax_a'],
            'cell_a' => $input['cell_a'],
            'loc_address1' => $input['loc_address1'],
            'loc_address2' => $input['loc_address2'],
            'loc_city' => $input['loc_city'],
            'loc_state' => $input['loc_state'],
            'loc_zip' => $input['loc_zip'],
            'contact_b' => $input['contact_b'],
            'email_b' => $input['email_b'],
            'phone_b' => $input['phone_n'],
            'fax_b' => $input['fax_b'],
            'cell_b' => $input['cell_b'],
            'contact_s' => $input['contact_s'],
            'email_s' => $input['email_s'],
            'phone_s' => $input['phone_s'],
            'fax_s' => $input['fax_s'],
            'cell_s' => $input['cell_s'],
            'address1_s' => $input['address1_s'],
            'address2_s' => $input['address2_s'],
            'city_s' => $input['city_s'],
            'state_s' => $input['state_s'],
            'zip_s' => $input['zip_s'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
