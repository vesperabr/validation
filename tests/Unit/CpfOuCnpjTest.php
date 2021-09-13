<?php

namespace Vespera\Validation\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Vespera\Validation\CpfOuCnpj;
use Vespera\Validation\Tests\TestCase;

class CpfOuCnpjTest extends TestCase
{
    /**
     * @test
     * @dataProvider valid_values_provider
     */
    public function it_should_return_true_when_validate_a_valid_cpf_or_cnpj($cpfCnpj)
    {
        $this->assertTrue(CpfOuCnpj::make($cpfCnpj)->validate());
    }

    /**
     * @test
     * @dataProvider invalid_values_provider
     */
    public function it_should_return_false_when_validate_a_invalid_cpf_or_cnpj($cpfCnpj)
    {
        $this->assertFalse(CpfOuCnpj::make($cpfCnpj)->validate());
    }

    /**
     * @test
     */
    public function it_should_enable_rule_in_laravel_validator()
    {
        $extensions = Validator::make([], [])->extensions;
        $this->assertArrayHasKey('cpf_ou_cnpj', $extensions);
    }

    public function valid_values_provider(): array
    {
        return [
            ['957.512.380-87'],
            ['43.781.956/0001-80'],
        ];
    }

    public function invalid_values_provider(): array
    {
        return [
            ['abcd'],
            [true],
            [null],
            ['11.111.111/0000-00'],
            ['123.123.123-00'],
            ['99.987.321/0001-67'],
        ];
    }
}
