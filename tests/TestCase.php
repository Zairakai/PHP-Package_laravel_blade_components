<?php

declare(strict_types=1);

namespace Zairakai\LaravelBladeComponents\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Zairakai\LaravelBladeComponents\LaravelBladeComponentsServiceProvider;

class TestCase extends Orchestra
{
    protected function getEnvironmentSetUp($app): void {}

    protected function getPackageProviders($app): array
    {
        return [
            LaravelBladeComponentsServiceProvider::class,
        ];
    }
}
