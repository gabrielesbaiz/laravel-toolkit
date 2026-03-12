---
name: laravel-toolkit
description: Use StringKit, NumberKit, TimeKit, WebKit, and PhoneKit facade helpers from the gabrielesbaiz/laravel-toolkit package.
---

# Laravel Toolkit

A collection of utility facades for common Laravel operations across string, number, date/time, web, and phone number handling.

## Installation

```bash
composer require gabrielesbaiz/laravel-toolkit
```

## Usage

All helpers are available as static facades. Use the facade aliases or the main `LaravelToolkit` entry point.

```php
use Gabrielesbaiz\LaravelToolkit\Facades\StringKit;
use Gabrielesbaiz\LaravelToolkit\Facades\NumberKit;
use Gabrielesbaiz\LaravelToolkit\Facades\TimeKit;
use Gabrielesbaiz\LaravelToolkit\Facades\WebKit;
use Gabrielesbaiz\LaravelToolkit\Facades\PhoneKit;

// Or via main facade:
use Gabrielesbaiz\LaravelToolkit\Facades\LaravelToolkit;
LaravelToolkit::string()->method();
LaravelToolkit::number()->method();
LaravelToolkit::time()->method();
LaravelToolkit::web()->method();
LaravelToolkit::phoneNumber()->method();
```

---

## StringKit

All nullable methods return `null` when `null` is passed.

```php
// Check if a string starts with a digit (uses ctype_digit on first char)
StringKit::startsWithNumber(string $string): bool

// Check if a string starts with a letter (uses ctype_alpha on first char)
StringKit::startsWithLetter(string $string): bool

// Return null if the string is null or empty string
StringKit::nullIfEmpty(?string $value): ?string

// Convert to uppercase using Str::upper
StringKit::upperCase(?string $string): ?string

// Remove all non-alphanumeric characters (strips spaces, punctuation, etc.)
// Example: "Hello World!" → "HelloWorld"
StringKit::zapSpaces(?string $string): ?string

// Collapse multiple consecutive whitespace characters into a single space
// Example: "Hello   World" → "Hello World"
StringKit::clearSpaces(?string $string): ?string

// Trim leading and trailing whitespace
StringKit::trimSpaces(?string $string): ?string

// Replace all whitespace sequences with underscores
// Example: "Hello World" → "Hello_World"
StringKit::snakeSpaces(?string $string): ?string

// Remove carriage return characters (\r)
StringKit::clearNewLines(?string $string): ?string

// Remove tab characters (\t)
StringKit::clearTabs(?string $string): ?string

// Remove all non-numeric characters, leaving only digits
// Example: "+39 333-123456" → "39333123456"
StringKit::clearNonNumeric(?string $string): ?string

// Normalize name casing: lowercase → title case with correct apostrophe handling
// Example: "MARIO D'ANGELO" → "Mario D'Angelo"
StringKit::normalizeNames(?string $string): ?string

// Return true if the string ends with the letter 'a'
StringKit::isFemale(?string $string): bool

// If the string ends with 'o', replace the last 'o' with 'a'; otherwise return unchanged
// Example: "Mario" → "Maria"
StringKit::convertToFemale(?string $string): ?string
```

---

## NumberKit

Null input returns `0`, `0.0`, `'0'`, or `'—'` depending on the method (see per-method notes).

```php
// Convert a European-formatted number string (comma as decimal, dot as thousands)
// to a PHP float. Example: "1.234,56" → 1234.56
// Returns 0.0 for null.
NumberKit::toDecimalPoint(?string $value): float

// Replace decimal points with commas (dot → comma).
// Example: "1234.56" → "1234,56"
// Returns '0' for null.
NumberKit::toDecimalComma(?string $value): string

// Same as toDecimalComma but returns '—' if null or '0'.
NumberKit::toDecimalCommaString(?string $value): string

// Format as integer with dot as thousands separator.
// Example: "1234567" → "1.234.567"
// Returns '0' for null.
NumberKit::toThousands(?string $value): string

// Same as toThousands but returns '—' if null or '0'.
NumberKit::toThousandsString(?string $value): string

// Format with dot as thousands separator and comma as decimal, 2 decimal places.
// Example: "1234.5" → "1.234,50"
// Returns '0,00' for null.
NumberKit::toThousandsDecimal(?string $value): string

// Round to 2 decimal places using PHP_ROUND_HALF_UP. Returns 0.0 for null.
NumberKit::toCurrency(?string $value): float

// Floor to 2 decimal places (truncates, does not round). Returns 0.0 for null.
NumberKit::toFloor(mixed $value): float

// Floor to a given decimal precision using floor(value * 10^precision) / 10^precision.
// Returns 0 for null.
NumberKit::toInt(mixed $value, int $precision): int

// Convert a float price to integer cents by multiplying by 100 and flooring.
// Example: 9.99 → 999, 1.50 → 150
// Returns 0 for null.
NumberKit::toPriceInt(mixed $value): int

// Format float with 2 decimal places and comma as decimal separator (no thousands).
// Example: 1234.5 → "1234,50"
NumberKit::toCommaString(float $value): string

// Round to 2 decimal places using PHP_ROUND_HALF_UP. Returns 0.0 for null.
NumberKit::rounded(mixed $value): float

// Round to 3 decimal places using PHP_ROUND_HALF_UP. Returns 0.0 for null.
NumberKit::rounded3(mixed $value): float

// Round to 4 decimal places using PHP_ROUND_HALF_UP. Returns 0.0 for null.
NumberKit::rounded4(mixed $value): float

// Return value as-is, but returns '—' if null or '0'.
NumberKit::toIntString(?string $value): ?string

// Format as euro currency string with thousands and 2 decimals. Returns '—' if null or '0'.
// Example: "1234.5" → "1.234,50 €"
NumberKit::toCurrencyString(?string $value): ?string

// Prepend '+' sign if positive, leave negative sign as-is. Always operates on a string.
// Example: "1.234,50" → "+1.234,50"
NumberKit::formatWithSign(string $value): string

// Currency string with +/- sign prefix. Returns '—' if null or '0'.
// Example: "1234.5" → "+1.234,50 €"
NumberKit::toCurrencyStringWithSign(?string $value): ?string

// Currency string with HTML &euro; entity instead of €. Returns '—' if null or '0'.
// Example: "1234.5" → "1.234,50 &euro;"
NumberKit::toCurrencyStringHtml(?string $value): ?string

// Integer currency string (no decimals) with € symbol. Returns '—' if null or '0'.
// Example: "1234" → "1.234 €"
NumberKit::toCurrencyIntString(?string $value): ?string

// Integer currency string with HTML &euro; entity. Returns '—' if null or '0'.
// Example: "1234" → "1.234 &euro;"
NumberKit::toCurrencyIntStringHtml(?string $value): ?string

// Format as percentage string with optional decimal rounding. Returns '—' if null or '0'.
// Example: ("12.5", 1) → "12,5 %"
NumberKit::toPercentageString(?string $value, ?int $decimals = null): ?string

// Format as integer percentage string with thousands separator. Returns '—' if null or '0'.
// Example: "1234" → "1.234 %"
NumberKit::toPercentageIntString(?string $value): ?string

// Format as percentage with 2 decimal places and thousands separator. Returns '—' if null or '0'.
// Example: "12.5" → "12,50 %"
NumberKit::toPercentageRoundString(?string $value): ?string

// Round up to the nearest multiple of $multiple. Returns 0.0 if $multiple is null or 0.
// Example: (7.0, 5) → 10.0
NumberKit::roundUpToMultiple(float $number, ?int $multiple): float

// Round down to the nearest multiple of $multiple. Returns 0.0 if $multiple is null or 0.
// Example: (7.0, 5) → 5.0
NumberKit::roundDownToMultiple(float $number, ?int $multiple): float

// Return true if $number > $minValue AND $number <= $maxValue.
NumberKit::numberIsBetween(float $number, float $minValue, float $maxValue): bool

// Return true if the sum of all values in the array is greater than 0.
NumberKit::hasPositiveSum(array $values): bool
```

---

## TimeKit

All methods accepting `?Carbon` return `null` when `null` is passed.
All conversion methods accepting `?string` return `null` when `null` is passed.

```php
// Current datetime formatted as d/m/Y H:i:s
TimeKit::nowFormat(): string

// Current year as integer
TimeKit::nowYear(): int

// Today's date formatted as d/m/Y
TimeKit::todayFormat(): string

// Format a Carbon instance as d/m/Y H:i:s with translated weekday name prefixed.
// Example: "Giovedì 12/03/2026 10:00:00"
TimeKit::dateCompleteWithDay(?Carbon $date): ?string

// Format a Carbon instance as d/m/Y H:i:s
TimeKit::dateComplete(?Carbon $date): ?string

// Format a Carbon instance as d/m/Y
TimeKit::dateBase(?Carbon $date): ?string

// Convert a Carbon date to a Google Sheets serial number (days since 30/12/1899)
TimeKit::googleDate(Carbon $date): int

// Count signed difference in days between two Carbon dates ($startDate to $endDate).
// Negative if endDate is before startDate.
TimeKit::countDaysBetween(Carbon $startDate, Carbon $endDate): int

// Count signed difference in months between now and $endDate.
TimeKit::countDiffMonths(Carbon $endDate): int

// Count signed difference in days between now and a d/m/Y formatted date string.
TimeKit::countDiffDays(string $date): int

// Convert d/m/Y string to Y-m-d H:i:s (start of day)
// Example: "12/03/2026" → "2026-03-12 00:00:00"
TimeKit::convertDmyToTimestamp(?string $value): ?string

// Convert Y-m-d H:i:s string to d/m/Y
// Example: "2026-03-12 00:00:00" → "12/03/2026"
TimeKit::convertTimestampToDmy(?string $value): ?string

// Convert Y-m-d H:i:s string to d/m/Y H:i
// Example: "2026-03-12 10:30:00" → "12/03/2026 10:30"
TimeKit::convertTimestampToDmyHi(?string $value): ?string

// Convert ISO 8601 string (any parseable format) to d/m/Y H:i
TimeKit::convertIso8601ToDmyHi(?string $value): ?string

// Convert d/m/Y string to Y-m-d
// Example: "12/03/2026" → "2026-03-12"
TimeKit::convertDmyToDate(?string $value): ?string

// Convert d-m-Y string (dash-separated) to Y-m-d
// Example: "12-03-2026" → "2026-03-12"
TimeKit::convertDmyMinusToDate(?string $value): ?string

// Convert Y-m-d string to d/m/Y
// Example: "2026-03-12" → "12/03/2026"
TimeKit::convertDateToDmy(?string $value): ?string

// Convert d/m/Y H:i:s string to Y-m-d
// Example: "12/03/2026 10:00:00" → "2026-03-12"
TimeKit::convertDmyhisToDate(?string $value): ?string

// Convert Y-m-d string to d/m/Y H:i:s at start of day
// Example: "2026-03-12" → "12/03/2026 00:00:00"
TimeKit::convertDateToDmyhis(?string $value): ?string

// Convert d/m/Y H:i string to Y-m-d H:i:s (for storing in DB)
// Example: "12/03/2026 10:30" → "2026-03-12 10:30:00"
TimeKit::dateDbHiFormat(?string $value): ?string

// Convert d/m/Y H:i:s string to d/m/Y (strip time portion)
// Example: "12/03/2026 10:00:00" → "12/03/2026"
TimeKit::dateLightFormat(?string $value): ?string

// Convert d/m/Y H:i string to d/m/Y (strip time portion)
TimeKit::dateBaseFormat(?string $value): ?string

// Convert Y-m-d H:i:s string to d/m/Y
TimeKit::datedmYFormat(?string $value): ?string

// Convert Y-m-d H:i:s string to d/m/Y H:i
TimeKit::datedmYHiFormat(?string $value): ?string

// Convert Y-m-d H:i:s string to d/m/Y H:i:s
TimeKit::datedmYHisFormat(?string $value): ?string

// Human-readable relative time (1 part). Example: "2 days ago"
TimeKit::diffHumans(?Carbon $value): ?string

// Human-readable relative time (3 parts). Example: "2 days 3 hours 5 minutes ago"
TimeKit::diffHumansComplete(?Carbon $value): ?string

// Absolute human-readable duration (1 part, no "ago"). Example: "2 days"
TimeKit::diffHumansShort(?Carbon $value): ?string

// Absolute human-readable duration (4 parts). Example: "2 days 3 hours 5 minutes 10 seconds"
TimeKit::diffHumansLong(?Carbon $value): ?string

// Convert an Excel date serial number to a Carbon instance
// (based on Excel epoch: 30/12/1899)
TimeKit::excelToCarbon(int $excelDate): Carbon

// Absolute human-readable difference between two Carbon dates, up to $parts segments.
// Default $parts = 4. Example: "1 hour 30 minutes"
TimeKit::timeDiff(Carbon $dateTo, Carbon $dateFrom, ?int $parts = 4): string

// Array of 12 month names keyed 1–12, passed through Laravel's __() for translation.
// Example: [1 => 'January', 2 => 'February', ...]
TimeKit::months(): array

// Array of 12 month abbreviations keyed 1–12, passed through __() for translation.
// Example: [1 => 'Jan', 2 => 'Feb', ...]
TimeKit::monthsAbbreviations(): array

// Get translated month name by number (1–12). Returns null if out of range.
TimeKit::monthName(int $monthNumber): ?string

// Get lowercase translated month name by number (1–12). Returns null if out of range.
TimeKit::monthNameLowercase(int $monthNumber): ?string

// Lowercase name of the month 2 months ago
TimeKit::pastMonthNameLowercase(): string

// Lowercase name of the previous month
TimeKit::previousMonthNameLowercase(): string

// Lowercase name of the current month
TimeKit::thisMonthNameLowercase(): string

// Lowercase name of the next month
TimeKit::nextMonthNameLowercase(): string

// Lowercase name of the month 2 months ahead
TimeKit::futureMonthNameLowercase(): string
```

---

## WebKit

```php
// Return true if the string is a valid http, https, or ftp URL.
WebKit::isValidUrl(string $string): bool

// Strip a leading 'mailto:' prefix (case-insensitive) from an email string.
// Example: "mailto:hello@example.com" → "hello@example.com"
// Returns null for null input.
WebKit::removeMailTo(?string $string): ?string
```

---

## PhoneKit

```php
// Remove the Italian country code prefix (+39) from a phone number string.
// Example: "+39 333123456" → " 333123456"
// Returns null for null input.
PhoneKit::removePhoneCode(?string $string): ?string

// Remove +39 prefix and strip all non-alphanumeric characters.
// Example: "+39 333-123456" → "333123456"
// Returns null for null input.
PhoneKit::normalizePhoneNumber(?string $string): ?string

// Mask all characters except the last 3 with '*'.
// Example: "+39 333123456" → "**********456"
// Returns null for null input.
PhoneKit::phoneNumberHide(?string $number): ?string
```
