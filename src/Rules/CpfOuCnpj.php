<?php

namespace Vespera\Validation\Rules;

use Illuminate\Validation\Rule;
use Vespera\Validation\CpfOuCnpj as ValidationCpfOuCnpj;

class CpfOuCnpj extends Rule
{
    public function passes($attribute, $value)
    {
        return ValidationCpfOuCnpj::make($value)->validate();
    }

    public function message()
    {
        return 'O campo :attribute não é um CPF ou CNPJ válido.';
    }
}
