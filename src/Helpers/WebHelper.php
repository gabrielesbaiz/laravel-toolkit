<?php

namespace Gabrielesbaiz\LaravelToolkit\Helpers;

class WebHelper
{
    /**
     * Check if a string is a valid URL.
     *
     * @param  string $string
     * @return bool
     */
    public static function isValidUrl(string $string): bool
    {
        return preg_match('/^(https?|ftp):\/\/[^\s\/$.?#].[^\s]*$/i', $string) === 1;
    }

    /**
     * Remove mailto from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function removeMailTo(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/^mailto:/i', '', $string)
            : null;
    }
}
