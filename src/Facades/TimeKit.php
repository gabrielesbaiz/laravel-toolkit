<?php

namespace Gabrielesbaiz\LaravelToolkit\Facades;

use Illuminate\Support\Facades\Facade;

class TimeKit extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-toolkit-time';
    }
}
