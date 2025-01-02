<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckHandler implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // if(! preg_match('/ˆ@[a-zA-Z0-9_-+$]/', $value))
        // {
        //     $fail('Precisa começar com @ e você só pode usar _ - letras e números. Ah, sem');
        // }

        if (! str_starts_with($value, '@')){
            $fail('Precisa começar com @');
        }

        if(str_contains($value, ' ')){
            $fail('Não pode conter espaços');
        }

        //
    }
}
