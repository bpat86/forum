<?php

namespace App\Rules;

use Exception;
use App\Inspections\Spam;

use Illuminate\Contracts\Validation\Rule;

class SpamFree implements Rule
{

    /**
     * Determine if the given attribute passes our spam validation.
     *
     * @param  string $attribute
     * @param  string $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            return ! resolve(Spam::class)->detect($value);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute contains spam.';
    }
}
