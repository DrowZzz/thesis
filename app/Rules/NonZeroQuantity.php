<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NonZeroQuantity implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the quantity is greater than 0
        return $value > 0;
    }

    public function message()
    {
        return 'The :attribute must be greater than 0.';
    }
}
