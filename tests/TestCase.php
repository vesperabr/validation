<?php

namespace Vespera\Validation\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            'Vespera\Validation\Support\ServiceProvider',
        ];
    }
}
