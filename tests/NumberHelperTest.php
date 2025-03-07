<?php

use Gabrielesbaiz\LaravelToolkit\Helpers\NumberHelper;

it('converts a string with commas and dots to a decimal point', function () {
    expect(NumberHelper::toDecimalPoint('1.234,56'))->toBe(1234.56);
    expect(NumberHelper::toDecimalPoint('10,50'))->toBe(10.50);
    expect(NumberHelper::toDecimalPoint('1000'))->toBe(1000.0);
    expect(NumberHelper::toDecimalPoint('0,99'))->toBe(0.99);
});

it('returns 0.0 when toDecimalPoint input is null', function () {
    expect(NumberHelper::toDecimalPoint(null))->toBe(0.0);
});

it('formats numbers with thousands separator', function () {
    expect(NumberHelper::toThousands('1000'))->toBe('1.000');
    expect(NumberHelper::toThousands('2500000'))->toBe('2.500.000');
    expect(NumberHelper::toThousands('123456789'))->toBe('123.456.789');
});

it('returns 0 when toThousands input is null', function () {
    expect(NumberHelper::toThousands(null))->toBe('0');
});

it('returns — when toThousandsString input is null', function () {
    expect(NumberHelper::toThousandsString(null))->toBe('—');
});

it('formats numbers with thousands separator and two decimal places', function () {
    expect(NumberHelper::toThousandsDecimal('1000'))->toBe('1.000,00');
    expect(NumberHelper::toThousandsDecimal('2500000.5'))->toBe('2.500.000,50');
    expect(NumberHelper::toThousandsDecimal('123456789.99'))->toBe('123.456.789,99');
});

it('returns 0,00 when toThousandsDecimal input is null', function () {
    expect(NumberHelper::toThousandsDecimal(null))->toBe('0,00');
});

it('rounds numbers to currency decimal places', function () {
    expect(NumberHelper::toCurrency('1000'))->toBe(1000.00);
    expect(NumberHelper::toCurrency('1234.567'))->toBe(1234.57);
    expect(NumberHelper::toCurrency('99.994'))->toBe(99.99);
    expect(NumberHelper::toCurrency('50.555'))->toBe(50.56);
});

it('returns 0.0 when toCurrency input is null', function () {
    expect(NumberHelper::toCurrency(null))->toBe(0.0);
});

it('floors numbers to two decimal places', function () {
    expect(NumberHelper::toFloor(10.999))->toBe(10.99);
    expect(NumberHelper::toFloor(5.678))->toBe(5.67);
    expect(NumberHelper::toFloor(0.009))->toBe(0.00);
});

it('returns 0.0 when toFloor input is null', function () {
    expect(NumberHelper::toFloor(null))->toBe(0.0);
});

it('floors a number to a given precision and returns an integer', function () {
    expect(NumberHelper::toInt(10.999, 2))->toBe(10);
    expect(NumberHelper::toInt(5.678, 1))->toBe(5);
    expect(NumberHelper::toInt(123.456, 0))->toBe(123);
});

it('returns 0 when toInt input is null', function () {
    expect(NumberHelper::toInt(null, 2))->toBe(0);
});

it('rounds numbers to two decimal places', function () {
    expect(NumberHelper::rounded(10.999))->toBe(11.00);
    expect(NumberHelper::rounded(5.678))->toBe(5.68);
    expect(NumberHelper::rounded(123.454))->toBe(123.45);
    expect(NumberHelper::rounded(123.456))->toBe(123.46);
});

it('returns 0.0 when rounded input is null', function () {
    expect(NumberHelper::rounded(null))->toBe(0.0);
});

it('rounds numbers to four decimal places', function () {
    expect(NumberHelper::rounded4(10.99999))->toBe(11.0000);
    expect(NumberHelper::rounded4(5.67891))->toBe(5.6789);
    expect(NumberHelper::rounded4(123.45678))->toBe(123.4568);
    expect(NumberHelper::rounded4(0.00004))->toBe(0.0000);
});

it('returns 0.0 when rounded4 input is null', function () {
    expect(NumberHelper::rounded4(null))->toBe(0.0);
});

it('returns the same string if value is non-zero', function () {
    expect(NumberHelper::toIntString('123'))->toBe('123');
    expect(NumberHelper::toIntString('-50'))->toBe('-50');
    expect(NumberHelper::toIntString('1000'))->toBe('1000');
});

it('returns "—" when value is null or "0"', function () {
    expect(NumberHelper::toIntString(null))->toBe('—');
    expect(NumberHelper::toIntString('0'))->toBe('—');
});

it('formats numbers as a currency string', function () {
    expect(NumberHelper::toCurrencyString('1000'))->toBe('1.000,00 €');
    expect(NumberHelper::toCurrencyString('2500000.5'))->toBe('2.500.000,50 €');
    expect(NumberHelper::toCurrencyString('123456789.99'))->toBe('123.456.789,99 €');
});

it('returns "—" when toCurrencyString value is null or "0"', function () {
    expect(NumberHelper::toCurrencyString(null))->toBe('—');
    expect(NumberHelper::toCurrencyString('0'))->toBe('—');
});

it('adds a plus sign for positive numbers', function () {
    expect(NumberHelper::formatWithSign('1000'))->toBe('+1000');
    expect(NumberHelper::formatWithSign('250.50'))->toBe('+250.50');
    expect(NumberHelper::formatWithSign('0'))->toBe('0');
});

it('keeps negative numbers unchanged', function () {
    expect(NumberHelper::formatWithSign('-500'))->toBe('-500');
    expect(NumberHelper::formatWithSign('-99.99'))->toBe('-99.99');
});

it('returns "0" when formatWithSign input is zero', function () {
    expect(NumberHelper::formatWithSign('0'))->toBe('0');
});

it('formats numbers as a currency string with sign', function () {
    expect(NumberHelper::toCurrencyStringWithSign('1000'))->toBe('+1.000,00 €');
    expect(NumberHelper::toCurrencyStringWithSign('-2500000.5'))->toBe('-2.500.000,50 €');
    expect(NumberHelper::toCurrencyStringWithSign('123456789.99'))->toBe('+123.456.789,99 €');
});

it('returns "—" when toCurrencyStringWithSign value is null or "0"', function () {
    expect(NumberHelper::toCurrencyStringWithSign(null))->toBe('—');
    expect(NumberHelper::toCurrencyStringWithSign('0'))->toBe('—');
});

it('formats numbers as a currency string with HTML euro symbol', function () {
    expect(NumberHelper::toCurrencyStringHtml('1000'))->toBe('1.000,00 &euro;');
    expect(NumberHelper::toCurrencyStringHtml('2500000.5'))->toBe('2.500.000,50 &euro;');
    expect(NumberHelper::toCurrencyStringHtml('123456789.99'))->toBe('123.456.789,99 &euro;');
});

it('returns "—" when toCurrencyStringHtml value is null or "0"', function () {
    expect(NumberHelper::toCurrencyStringHtml(null))->toBe('—');
    expect(NumberHelper::toCurrencyStringHtml('0'))->toBe('—');
});

it('formats numbers as an integer currency string', function () {
    expect(NumberHelper::toCurrencyIntString('1000'))->toBe('1.000 €');
    expect(NumberHelper::toCurrencyIntString('2500000'))->toBe('2.500.000 €');
    expect(NumberHelper::toCurrencyIntString('123456789'))->toBe('123.456.789 €');
});

it('returns "—" when toCurrencyIntString value is null or "0"', function () {
    expect(NumberHelper::toCurrencyIntString(null))->toBe('—');
    expect(NumberHelper::toCurrencyIntString('0'))->toBe('—');
});

it('formats numbers as an integer currency string with HTML euro symbol', function () {
    expect(NumberHelper::toCurrencyIntStringHtml('1000'))->toBe('1.000 &euro;');
    expect(NumberHelper::toCurrencyIntStringHtml('2500000'))->toBe('2.500.000 &euro;');
    expect(NumberHelper::toCurrencyIntStringHtml('123456789'))->toBe('123.456.789 &euro;');
});

it('returns "—" when toCurrencyIntStringHtml value is null or "0"', function () {
    expect(NumberHelper::toCurrencyIntStringHtml(null))->toBe('—');
    expect(NumberHelper::toCurrencyIntStringHtml('0'))->toBe('—');
});

it('formats numbers as a percentage string with optional decimals', function () {
    expect(NumberHelper::toPercentageString('50'))->toBe('50 %');
    expect(NumberHelper::toPercentageString('99.99'))->toBe('99,99 %');
    expect(NumberHelper::toPercentageString('75.1234', 2))->toBe('75,12 %');
    expect(NumberHelper::toPercentageString('0.4567', 3))->toBe('0,457 %');
});

it('returns "—" when toPercentageString value is null or "0"', function () {
    expect(NumberHelper::toPercentageString(null))->toBe('—');
    expect(NumberHelper::toPercentageString('0'))->toBe('—');
});

it('replaces decimal points with commas', function () {
    expect(NumberHelper::toDecimalComma('123.45'))->toBe('123,45');
    expect(NumberHelper::toDecimalComma('0.99'))->toBe('0,99');
    expect(NumberHelper::toDecimalComma('1000.5'))->toBe('1000,5');
});

it('returns "0" when toDecimalComma value is null', function () {
    expect(NumberHelper::toDecimalComma(null))->toBe('0');
});

it('returns "—" when toDecimalCommaString value is null', function () {
    expect(NumberHelper::toDecimalCommaString(null))->toBe('—');
});

it('formats numbers as an integer percentage string', function () {
    expect(NumberHelper::toPercentageIntString('1000'))->toBe('1.000 %');
    expect(NumberHelper::toPercentageIntString('2500000'))->toBe('2.500.000 %');
    expect(NumberHelper::toPercentageIntString('123456789'))->toBe('123.456.789 %');
});

it('returns "—" when toPercentageIntString value is null or "0"', function () {
    expect(NumberHelper::toPercentageIntString(null))->toBe('—');
    expect(NumberHelper::toPercentageIntString('0'))->toBe('—');
});

it('formats numbers as a rounded percentage string with decimals', function () {
    expect(NumberHelper::toPercentageRoundString('1000'))->toBe('1.000,00 %');
    expect(NumberHelper::toPercentageRoundString('2500000.5'))->toBe('2.500.000,50 %');
    expect(NumberHelper::toPercentageRoundString('123456789.99'))->toBe('123.456.789,99 %');
});

it('returns "—" when toPercentageRoundString value is null or "0"', function () {
    expect(NumberHelper::toPercentageRoundString(null))->toBe('—');
    expect(NumberHelper::toPercentageRoundString('0'))->toBe('—');
});

it('rounds up a number to the nearest multiple', function () {
    expect(NumberHelper::roundUpToMultiple(17, 5))->toBe(20.0);
    expect(NumberHelper::roundUpToMultiple(23, 10))->toBe(30.0);
    expect(NumberHelper::roundUpToMultiple(99, 20))->toBe(100.0);
    expect(NumberHelper::roundUpToMultiple(2, 5))->toBe(5.0);
});

it('returns 0.0 when roundUpToMultiple multiple is null or 0', function () {
    expect(NumberHelper::roundUpToMultiple(17, null))->toBe(0.0);
    expect(NumberHelper::roundUpToMultiple(23, 0))->toBe(0.0);
});

it('rounds down a number to the nearest multiple', function () {
    expect(NumberHelper::roundDownToMultiple(17, 5))->toBe(15.0);
    expect(NumberHelper::roundDownToMultiple(23, 10))->toBe(20.0);
    expect(NumberHelper::roundDownToMultiple(99, 20))->toBe(80.0);
    expect(NumberHelper::roundDownToMultiple(2, 5))->toBe(0.0);
});

it('returns 0.0 when roundDownToMultiple multiple is null or 0', function () {
    expect(NumberHelper::roundDownToMultiple(17, null))->toBe(0.0);
    expect(NumberHelper::roundDownToMultiple(23, 0))->toBe(0.0);
});

it('returns true when the number is within the range', function () {
    expect(NumberHelper::numberIsBetween(10, 5, 15))->toBeTrue();
    expect(NumberHelper::numberIsBetween(15, 5, 15))->toBeTrue();
});

it('returns false when the number is below the minimum value', function () {
    expect(NumberHelper::numberIsBetween(4, 5, 15))->toBeFalse();
    expect(NumberHelper::numberIsBetween(-1, 0, 10))->toBeFalse();
});

it('returns false when the number exceeds the maximum value', function () {
    expect(NumberHelper::numberIsBetween(16, 5, 15))->toBeFalse();
    expect(NumberHelper::numberIsBetween(20, 10, 19))->toBeFalse();
});

it('returns true when the sum of values is positive', function () {
    expect(NumberHelper::hasPositiveSum([10, -5, 3]))->toBeTrue();
    expect(NumberHelper::hasPositiveSum([5, 5, 5]))->toBeTrue();
    expect(NumberHelper::hasPositiveSum([0.1, 0.2, 0.3]))->toBeTrue();
});

it('returns false when the sum of values is zero or negative', function () {
    expect(NumberHelper::hasPositiveSum([10, -10, 0]))->toBeFalse();
    expect(NumberHelper::hasPositiveSum([-5, -5, -5]))->toBeFalse();
    expect(NumberHelper::hasPositiveSum([]))->toBeFalse();
});
