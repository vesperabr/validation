<?php

namespace Vespera\Validation\Rules;

use Illuminate\Validation\Rule;
use Vespera\Validation\Cnpj as ValidationCnpj;

class Cnpj extends Rule
{
    public function passes($attribute, $value)
    {
        return ValidationCnpj::make($value)->validate();
    }

    public function message()
    {
        return 'O campo :attribute não é um CNPJ válido.';
    }
}
