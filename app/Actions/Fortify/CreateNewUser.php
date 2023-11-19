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
        $rules = $this->passwordRules();
        $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'region' => ['required', 'string'],
            'birthday' => 'required|date|before_or_equal:' . now()->subYears(16)->format('Y-m-d'),
            'contact' => ['required', 'numeric', 'digits:10'],
            'password' => $rules,
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],[
            'birthday.before_or_equal' => 'You must be at least 16 years old.',
        ]);

        $validator->after(function ($validator) use ($input) {
            if (isset($input['password'])) {
                $password = $input['password'];
                if (!preg_match('/[A-Z]/', $password)) {
                    $validator->errors()->add('password', 'The password must contain at least one uppercase letter.');
                }
                if (!preg_match('/[a-z]/', $password)) {
                    $validator->errors()->add('password', 'The password must contain at least one lowercase letter.');
                }
                if (!preg_match('/[0-9]/', $password)) {
                    $validator->errors()->add('password', 'The password must contain at least one number.');
                }
                if (!preg_match('/[\W]/', $password)) {
                    $validator->errors()->add('password', 'The password must contain at least one special character.');
                }
            }
        });
        
        $validator->validate();
        
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
