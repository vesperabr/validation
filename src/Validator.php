<?php

namespace Vespera\Validation;

use Vespera\Validation\Contracts\ValidatorInterface;

abstract class Validator implements ValidatorInterface
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public static function make($value)
    {
        return new static($value);
    }
}
