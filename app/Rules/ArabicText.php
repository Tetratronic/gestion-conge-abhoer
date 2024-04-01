<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ArabicText implements Rule
{
    public function passes($attribute, $value)
    {
        // Regular expression to match most common Arabic characters
        return preg_match('/^[\p{Arabic}\s]+$/u', $value);
    }

    public function message()
    {
        return 'Ce champs doit etre en arabe.';
    }
}
