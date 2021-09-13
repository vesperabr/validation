<?php

namespace Vespera\Validation\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Vespera\Validation\Cnpj;
use Vespera\Validation\Tests\TestCase;

class CnpjTest extends TestCase
{
    /**
     * @test
     * @dataProvider valid_values_provider
     */
    public function it_should_return_true_when_validate_a_valid_cnpj($cnpj)
    {
        $this->assertTrue(Cnpj::make($cnpj)->validate());
    }

    /**
     * @test
     * @dataProvider invalid_values_provider
     */
    public function it_should_return_false_when_validate_a_invalid_cnpj($cnpj)
    {
        $this->assertFalse(Cnpj::make($cnpj)->validate());
    }

     /**
     * @test
     */
    public function it_should_enable_rule_in_laravel_validator()
    {
        $extensions = Validator::make([], [])->extensions;
        $this->assertArrayHasKey('cnpj', $extensions);
    }

    public function valid_values_provider(): array
    {
        return [
            ['43.781.956/0001-80'],
            ['43781956000180'],
            [43781956000180],
        ];
    }

    public function invalid_values_provider(): array
    {
        return [
            ['abcd'],
            [true],
            [null],
            ['123.123.123-00'],
            ['99.987.321/0001-67'],
            ['11.111.111/0000-00'],
            ['11111111111111'],
            [11111111000000],
        ];
    }
}
