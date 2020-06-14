<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
         return preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#$@!%&*?]).{8,}/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Password! Password should include 8 to 10 characters, digits, uppercase, lowercase and special character';
    }
}
