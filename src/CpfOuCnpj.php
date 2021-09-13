<?php

namespace Vespera\Validation;

class CpfOuCnpj extends Validator
{
    public function validate(): bool
    {
        return (
            Cpf::make($this->value)->validate() ||
            Cnpj::make($this->value)->validate()
        );
    }
}
