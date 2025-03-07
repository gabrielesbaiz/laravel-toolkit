<?php

namespace Gabrielesbaiz\LaravelToolkit\Helpers;

class NumberHelper
{
    /**
     * To decimal comma.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toDecimalPoint(?string $value): float
    {
        return $value !== null
            ? (float) str_replace(',', '.', str_replace('.', '', $value))
            : 0.0;
    }

    /**
     * To decimal comma.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toDecimalComma(?string $value): string
    {
        return $value !== null
            ? str_replace('.', ',', $value)
            : '0';
    }

    /**
     * To decimal comma string.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toDecimalCommaString(?string $value): string
    {
        return $value === null || $value == '0'
            ? '—'
            : str_replace('.', ',', $value);
    }

    /**
     * To thousands.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toThousands(?string $value): string
    {
        return $value !== null
            ? number_format((float) $value, 0, ',', '.')
            : '0';
    }

    /**
     * To thousands string.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toThousandsString(?string $value): string
    {
        return $value === null || $value == '0'
            ? '—'
            : number_format((float) $value, 0, ',', '.');
    }

    /**
     * To thousands decimal.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toThousandsDecimal(?string $value): string
    {
        return $value !== null
            ? number_format((float) $value, 2, ',', '.')
            : '0,00';
    }

    /**
     * To currency.
     *
     * @param  string|null $value
     * @return float
     */
    public static function toCurrency(?string $value): float
    {
        return $value !== null
            ? round((float) $value, 2, PHP_ROUND_HALF_UP)
            : 0.0;
    }

    /**
     * To floor.
     *
     * @param  mixed $value
     * @return float
     */
    public static function toFloor(mixed $value): float
    {
        return $value !== null
            ? floor(((float) $value) * 100) / 100
            : 0.0;
    }

    /**
     * To int.
     *
     * @param  mixed $value
     * @param  int   $precision
     * @return int
     */
    public static function toInt(mixed $value, int $precision): int
    {
        return $value !== null
            ? (int) (floor(((float) $value) * pow(10, $precision)) / pow(10, $precision))
            : 0;
    }

    /**
     * Rounded 2 decimals.
     *
     * @param  mixed $value
     * @return float
     */
    public static function rounded(mixed $value): float
    {
        return $value !== null
            ? round((float) $value, 2, PHP_ROUND_HALF_UP)
            : 0.0;
    }

    /**
     * Rounded 4 decimals.
     *
     * @param  mixed $value
     * @return float
     */
    public static function rounded4(mixed $value): float
    {
        return $value !== null
            ? round((float) $value, 4, PHP_ROUND_HALF_UP)
            : 0.0;
    }

    /**
     * To int string.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toIntString(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : $value;
    }

    /**
     * To currency string.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toCurrencyString(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::toThousandsDecimal($value) . ' €';
    }

    /**
     * Format with sign.
     *
     * @param  string $value
     * @return string
     */
    public static function formatWithSign(string $value): string
    {
        return $value > 0
            ? '+' . $value
            : $value;
    }

    /**
     * To currency string with sign.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toCurrencyStringWithSign(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::formatWithSign(self::toThousandsDecimal($value)) . ' €';
    }

    /**
     * To currency string html.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toCurrencyStringHtml(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::toThousandsDecimal($value) . ' &euro;';
    }

    /**
     * To currency int string.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toCurrencyIntString(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::toThousands($value) . ' €';
    }

    /**
     * To currency int string html.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toCurrencyIntStringHtml(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::toThousands($value) . ' &euro;';
    }

    /**
     * To percentage string.
     *
     * @param  string|null $value
     * @param  int|null    $decimals
     * @return string|null
     */
    public static function toPercentageString(?string $value, ?int $decimals = null): ?string
    {
        if ($decimals !== null) {
            $value = number_format($value, $decimals);
        }

        return $value === null || $value == '0'
               ? '—'
               : self::toDecimalComma($value) . ' %';
    }

    /**
     * To percentage int string.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toPercentageIntString(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::toThousands($value) . ' %';
    }

    /**
     * To percentage round string.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function toPercentageRoundString(?string $value): ?string
    {
        return $value === null || $value == '0'
            ? '—'
            : self::toThousandsDecimal($value) . ' %';
    }

    /**
     * Round up to multiple.
     *
     * @param  float    $number
     * @param  int|null $multiple
     * @return float
     */
    public static function roundUpToMultiple(float $number, ?int $multiple): float
    {
        return $multiple === null || $multiple == 0
            ? 0.0
            : ceil($number / $multiple) * $multiple;
    }

    /**
     * Round down to multiple.
     *
     * @param  float    $number
     * @param  int|null $multiple
     * @return float
     */
    public static function roundDownToMultiple(float $number, ?int $multiple): float
    {
        return $multiple === null || $multiple == 0
            ? 0.0
            : floor($number / $multiple) * $multiple;
    }

    /**
     * Check if a given number is between a minimum and a maximum value.
     *
     * @param  float $number
     * @param  float $minValue
     * @param  float $maxValue
     * @return bool
     */
    public static function numberIsBetween(float $number, float $minValue, float $maxValue): bool
    {
        return $number > $minValue && $number <= $maxValue;
    }

    /**
     * Check if it has positive sum.
     *
     * @param  array $values
     * @return bool
     */
    public static function hasPositiveSum(array $values): bool
    {
        return collect($values)->sum() > 0;
    }
}
