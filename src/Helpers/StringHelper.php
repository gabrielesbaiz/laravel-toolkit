<?php

namespace Gabrielesbaiz\LaravelToolkit\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    /**
     * Check if a string starts with number.
     *
     * @param  string $string
     * @return bool
     */
    public static function startsWithNumber(string $string): bool
    {
        return $string !== '' && ctype_digit($string[0]);
    }

    /**
     * Check if a string starts with letter.
     *
     * @param  string $string
     * @return bool
     */
    public static function startsWithLetter(string $string): bool
    {
        return $string !== '' && ctype_alpha($string[0]);
    }

    /**
     * Return null if empty.
     *
     * @param  string      $value
     * @return string|null
     */
    public static function nullIfEmpty(string $value): ?string
    {
        return $value === '' ? null : $value;
    }

    /**
     * Return upper case.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function upperCase(?string $string): ?string
    {
        return $string !== null
            ? Str::upper($string)
            : null;
    }

    /**
     * Remove all spaces from a string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function zapSpaces(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/[^a-zA-Z0-9]/', '', $string)
            : null;
    }

    /**
     * Clear multiple spaces from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function clearSpaces(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/\s+/', ' ', $string)
            : null;
    }

    /**
     * Trim spaces from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function trimSpaces(?string $string): ?string
    {
        return $string !== null
            ? trim($string)
            : null;
    }

    /**
     * Convert to snake multiple spaces from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function snakeSpaces(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/\s+/', '_', $string)
            : null;
    }

    /**
     * Clear new lines from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function clearNewLines(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/\r/', '', $string)
            : null;
    }

    /**
     * Clear tabs from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function clearTabs(?string $string): ?string
    {
        return $string !== null
            ? str_replace("\t", '', $string)
            : null;
    }

    /**
     * Clears all non-numeric characters from a string, leaving only numbers.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function clearNonNumeric(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/\D/', '', $string)
            : null;
    }

    /**
     * Normalize name case.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function normalizeNames(?string $string): ?string
    {
        return $string !== null
            ? Str::replace('\' ', '\'', Str::title(Str::replace('\'', '\' ', Str::lower($string))))
            : null;
    }

    /**
     * Check if a string is female.
     *
     * @param  string|null $string
     * @return bool
     */
    public static function isFemale(?string $string): bool
    {
        return $string !== null
            ? Str::endsWith($string, 'a')
            : false;
    }

    /**
     * Convert to female.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function convertToFemale(?string $string): ?string
    {
        return $string !== null && Str::endsWith($string, 'o')
            ? Str::replaceLast('o', 'a', $string)
            : $string;
    }
}
