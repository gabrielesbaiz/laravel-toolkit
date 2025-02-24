<?php

namespace Gabrielesbaiz\LaravelToolkit\Helpers;

class PhoneNumberHelper
{
    /**
     * Remove phone code from string.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function removePhoneCode(?string $string): ?string
    {
        return $string !== null
            ? preg_replace('/^\+39/', '', $string)
            : null;
    }

    /**
     * Normalize phone number.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function normalizePhoneNumber(?string $string): ?string
    {
        return $string !== null
            ? StringHelper::zapSpaces(self::removePhoneCode($string))
            : null;
    }

    /**
     * Phone number hide.
     *
     * @param  string|null $string
     * @return string|null
     */
    public static function phoneNumberHide(?string $number): ?string
    {
        return $number !== null
            ? str_pad(substr($number, -3), strlen($number), '*', STR_PAD_LEFT)
            : null;
    }
}
