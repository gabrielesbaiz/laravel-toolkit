<?php

namespace Gabrielesbaiz\LaravelToolkit\Facades;

use Illuminate\Support\Facades\Facade;

class StringKit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-toolkit-string';
    }
}
