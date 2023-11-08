<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use libphonenumber\PhoneNumberUtil;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'region' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();

        // Parse the phone number
        $number = $input['contact'];
        $region = $input['region'];
        
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        
        try {
            $parseNumber = $phoneUtil->parse($number, $region);
        
            if ($phoneUtil->isValidNumber($parseNumber)) {
                echo "Valid";
                $formattedNumber = $phoneUtil->format($parseNumber, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                echo $formattedNumber;
            } else {
                echo "Invalid phone number";
            }
        } catch (\libphonenumber\NumberParseException $e) {
            echo "Error parsing phone number: " . $e->getMessage();
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'address' => $input['address'],
            'contact' => $phoneUtil->format($parseNumber, \libphonenumber\PhoneNumberFormat::E164),
            'password' => Hash::make($input['password']),
        ]);
    }
}
