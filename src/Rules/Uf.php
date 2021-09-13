<?php

namespace Vespera\Validation\Rules;

use Illuminate\Validation\Rule;
use Vespera\Validation\Uf as ValidationUf;

class Uf extends Rule
{
    public function passes($attribute, $value)
    {
        return ValidationUf::make($value)->validate();
    }

    public function message()
    {
        return 'O campo :attribute não é um UF válido.';
    }
}
