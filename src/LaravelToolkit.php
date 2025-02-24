<?php

namespace Gabrielesbaiz\LaravelToolkit;

use Gabrielesbaiz\LaravelToolkit\Helpers\WebHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\TimeHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\NumberHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\StringHelper;
use Gabrielesbaiz\LaravelToolkit\Helpers\PhoneNumberHelper;

class LaravelToolkit
{
    public static function string(): StringHelper
    {
        return new StringHelper;
    }

    public static function phoneNumber(): PhoneNumberHelper
    {
        return new PhoneNumberHelper;
    }

    public static function web(): WebHelper
    {
        return new WebHelper;
    }

    public static function number(): NumberHelper
    {
        return new NumberHelper;
    }

    public static function time(): TimeHelper
    {
        return new TimeHelper;
    }
}
