<?php

namespace App\Rules;

use App\Models\Sponsorization;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidSponsorization implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $sponsorization = Sponsorization::where('id', $value)->first();
        if($sponsorization) {
            return;
        } else {
            $fail('La sponsorizzazione non è valida');
        }
    }
}
