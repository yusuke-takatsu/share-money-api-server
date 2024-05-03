<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AllowImageExtensions implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $allowedExtensions = ['jpeg', 'jpg', 'png'];

        $extension = $value->getClientOriginalExtension();

        if (! in_array(strtolower($extension), $allowedExtensions)) {
            $fail(__('validation.custom.file.extension'));
        }
    }
}
