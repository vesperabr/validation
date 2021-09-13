<?php

namespace Vespera\Validation\Rules;

use Illuminate\Validation\Rule;
use Vespera\Validation\Cpf as ValidationCpf;

class Cpf extends Rule
{
    public function passes($attribute, $value)
    {
        return ValidationCpf::make($value)->validate();
    }

    public function message()
    {
        return 'O campo :attribute não é um CPF válido.';
    }
}
