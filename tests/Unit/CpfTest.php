<?php

namespace Vespera\Validation\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Vespera\Validation\Cpf;
use Vespera\Validation\Tests\TestCase;

class CpfTest extends TestCase
{
    /**
     * @test
     * @dataProvider valid_values_provider
     */
    public function it_should_return_true_when_validate_a_valid_cpf($cpf)
    {
        $this->assertTrue(Cpf::make($cpf)->validate());
    }

    /**
     * @test
     * @dataProvider invalid_values_provider
     */
    public function it_should_return_false_when_validate_a_invalid_cpf($cpf)
    {
        $this->assertFalse(Cpf::make($cpf)->validate());
    }

    /**
     * @test
     */
    public function it_should_enable_rule_in_laravel_validator()
    {
        $extensions = Validator::make([], [])->extensions;
        $this->assertArrayHasKey('cpf', $extensions);
    }

    public function valid_values_provider(): array
    {
        return [
            ['957.512.380-87'],
            ['95751238087'],
            [95751238087],
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
            ['12312312300'],
            [12312312300],
        ];
    }
}
