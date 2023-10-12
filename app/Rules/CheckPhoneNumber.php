<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckPhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!preg_match('/^(?:\+380|0)\d{9}$/', $value) && !empty($value))
        {
            $fail("Phone number not acceptable in this format!");
        }
    }
}
