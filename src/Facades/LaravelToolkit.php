<?php

namespace Gabrielesbaiz\LaravelToolkit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Gabrielesbaiz\LaravelToolkit\LaravelToolkit
 */
class LaravelToolkit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Gabrielesbaiz\LaravelToolkit\LaravelToolkit::class;
    }
}
