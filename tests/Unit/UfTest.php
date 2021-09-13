<?php

namespace Vespera\Validation\Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Vespera\Validation\Tests\TestCase;
use Vespera\Validation\Uf;

class UfTest extends TestCase
{
    /**
     * @test
     * @dataProvider valid_values_provider
     */
    public function it_should_return_true_when_validate_a_valid_uf($uf)
    {
        $this->assertTrue(Uf::make($uf)->validate());
    }

    /**
     * @test
     * @dataProvider invalid_values_provider
     */
    public function it_should_return_false_when_validate_a_invalid_uf($uf)
    {
        $this->assertFalse(Uf::make($uf)->validate());
    }

    /**
     * @test
     */
    public function it_should_enable_rule_in_laravel_validator()
    {
        $extensions = Validator::make([], [])->extensions;
        $this->assertArrayHasKey('uf', $extensions);
    }

    public function valid_values_provider(): array
    {
        return [
            ['AC'], ['AL'], ['AP'], ['AM'], ['BA'],
            ['CE'], ['DF'], ['ES'], ['GO'], ['MA'],
            ['MS'], ['MT'], ['MG'], ['PA'], ['PB'],
            ['PR'], ['PE'], ['PI'], ['RJ'], ['RN'],
            ['RS'], ['RO'], ['RR'], ['SC'], ['SP'],
            ['SE'], ['TO'],
        ];
    }

    public function invalid_values_provider(): array
    {
        return [
            ['São Paulo'],
            ['XP'],
            ['PS'],
            [null],
            [true],
        ];
    }
}
