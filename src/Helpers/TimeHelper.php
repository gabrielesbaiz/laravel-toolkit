<?php

namespace Gabrielesbaiz\LaravelToolkit\Helpers;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Str;

class TimeHelper
{
    /**
     * Return now in d/m/Y H:i:s format.
     *
     * @return string
     */
    public static function nowFormat(): string
    {
        return Carbon::now()->format('d/m/Y H:i:s');
    }

    /**
     * Return now in Y format.
     *
     * @return int
     */
    public static function nowYear(): int
    {
        return now()->year;
    }

    /**
     * Return today date in d/m/Y format.
     *
     * @return string
     */
    public static function todayFormat(): string
    {
        return Carbon::now()->format('d/m/Y');
    }

    /**
     * Return date in d/m/Y H:i:s format.
     *
     * @param  Carbon|null $date
     * @return string|null
     */
    public static function dateCompleteWithDay(?Carbon $date): ?string
    {
        return $date !== null
            ? Str::ucfirst($date->translatedFormat('l d/m/Y H:i:s'))
            : null;
    }

    /**
     * Return date in d/m/Y H:i:s format.
     *
     * @param  Carbon|null $date
     * @return string|null
     */
    public static function dateComplete(?Carbon $date): ?string
    {
        return $date !== null
            ? $date->format('d/m/Y H:i:s')
            : null;
    }

    /**
     * Return date in d/m/Y format.
     *
     * @param  Carbon|null $date
     * @return string|null
     */
    public static function dateBase(?Carbon $date): ?string
    {
        return $date !== null
            ? $date->format('d/m/Y')
            : null;
    }

    /**
     * Retrieve a google date from a given Carbon date.
     *
     * @param  Carbon $date
     * @return int
     */
    public static function googleDate(Carbon $date): int
    {
        return (int) Carbon::createFromFormat('d/m/Y', '30/12/1899')
            ->startOfDay()
            ->diffInDays($date);
    }

    /**
     * Count days difference between
     * two given dates.
     *
     * @param  Carbon $startDate
     * @param  Carbon $endDate
     * @return int
     */
    public static function countDaysBetween(Carbon $startDate, Carbon $endDate): int
    {
        return $startDate->diffInDays($endDate, false);
    }

    /**
     * Count months difference between
     * now and a date.
     *
     * @param  Carbon $endDate
     * @param  Carbon $endDate
     * @return int
     */
    public static function countDiffMonths(Carbon $endDate): int
    {
        return now()->diffInMonths($endDate, false);
    }

    /**
     * Convert d/m/Y date to Y-m-d H:i:s format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertDmyToTimestamp(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d/m/Y', $value)->startOfDay()->format('Y-m-d H:i:s')
            : null;
    }

    /**
     * Convert Y-m-d H:i:s date to d/m/Y format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertTimestampToDmy(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y')
            : null;
    }

    /**
     * Convert Y-m-d H:i:s date to d/m/Y H:i format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertTimestampToDmyHi(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i')
            : null;
    }

    /**
     * Convert Iso8601 date to d/m/Y H:i format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertIso8601ToDmyHi(?string $value): ?string
    {
        return $value !== null
            ? Carbon::parse($value)->format('d/m/Y H:i')
            : null;
    }

    /**
     * Convert d/m/Y date to Y-m-d format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertDmyToDate(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d')
            : null;
    }

    /**
     * Convert d-m-Y date to Y-m-d format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertDmyMinusToDate(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d')
            : null;
    }

    /**
     * Convert Y-m-d date to d/m/Y format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertDateToDmy(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y')
            : null;
    }

    /**
     * Convert d/m/Y H:i:s date to Y-m-d format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertDmyhisToDate(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('Y-m-d')
            : null;
    }

    /**
     * Convert Y-m-d date to d/m/Y H:i:s format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function convertDateToDmyhis(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d', $value)->startOfDay()->format('d/m/Y H:i:s')
            : null;
    }

    /**
     * Convert d/m/Y H:i date to db Y-m-d H:i:s format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function dateDbHiFormat(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i:s')
            : null;
    }

    /**
     * Convert Y-m-d H:i:s date to db d/m/Y format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function dateLightFormat(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d/m/Y H:i:s', $value)->format('d/m/Y')
            : null;
    }

    /**
     * Convert Y-m-d H:i date to db d/m/Y format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function dateBaseFormat(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('d/m/Y')
            : null;
    }

    /**
     * Convert db Y-m-d H:i:s date to d/m/Y format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function datedmYFormat(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y')
            : null;
    }

    /**
     * Convert db Y-m-d H:i:s date to d/m/Y H:i format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function datedmYHiFormat(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i')
            : null;
    }

    /**
     * Convert db Y-m-d H:i:s date to d/m/Y H:i:s format.
     *
     * @param  string|null $value
     * @return string|null
     */
    public static function datedmYHisFormat(?string $value): ?string
    {
        return $value !== null
            ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s')
            : null;
    }

    /**
     * Return diffForHumans time.
     *
     * @param  Carbon|null $value
     * @return string|null
     */
    public static function diffHumans(?Carbon $value): ?string
    {
        return $value !== null
            ? $value->diffForHumans()
            : null;
    }

    /**
     * Return diffHumansComplete time.
     *
     * @param  Carbon|null $value
     * @return string|null
     */
    public static function diffHumansComplete(?Carbon $value): ?string
    {
        return $value !== null
            ? $value->diffForHumans(['parts' => 3])
            : null;
    }

    /**
     * Return diffHumansShort time.
     *
     * @param  Carbon|null $value
     * @return string|null
     */
    public static function diffHumansShort(?Carbon $value): ?string
    {
        return $value !== null
            ? $value->longAbsoluteDiffForHumans()
            : null;
    }

    /**
     * Return diffHumansLong time.
     *
     * @param  Carbon|null $value
     * @return string|null
     */
    public static function diffHumansLong(?Carbon $value): ?string
    {
        return $value !== null
            ? $value->longAbsoluteDiffForHumans(4)
            : null;
    }

    /**
     * Count days difference between
     * now and a d/m/Y format date.
     *
     * @param  string $date
     * @return int
     */
    public static function countDiffDays(string $date): int
    {
        return now()->diffInDays(Carbon::createFromFormat('d/m/Y', $date)->startOfDay(), false);
    }

    /**
     * Converta an Excel time to Carbon.
     *
     * @param  int    $excelDate
     * @return Carbon
     */
    public static function excelToCarbon(int $excelDate): Carbon
    {
        $excelStartingDate = Carbon::create(1899, 12, 30, 0, 0, 0);

        $days = intval($excelDate);

        $fraction = $excelDate - $days;

        $secondsInADay = 24 * 60 * 60;

        $seconds = $fraction * $secondsInADay;

        $hours = floor($seconds / 3600);

        $seconds -= $hours * 3600;

        $minutes = floor($seconds / 60);

        $seconds -= $minutes * 60;

        return $excelStartingDate->copy()
            ->addDays($days)
            ->addHours($hours)
            ->addMinutes($minutes)
            ->addSeconds($seconds);
    }

    /**
     * Return time diff between two dates.
     *
     * @param  Carbon   $dateTo
     * @param  Carbon   $dateFrom
     * @param  int|null $parts
     * @return string
     */
    public static function timeDiff(Carbon $dateTo, Carbon $dateFrom, ?int $parts = 4): string
    {
        return $dateTo->diffForHumans($dateFrom, CarbonInterface::DIFF_ABSOLUTE, false, $parts);
    }

    /**
     * Retrieve months.
     *
     * @return array
     */
    public static function months(): array
    {
        return collect([
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ])->map(fn ($month) => __($month))->toArray();
    }

    /**
     * Retrieve months abbreviations.
     *
     * @return array
     */
    public static function monthsAbbreviations(): array
    {
        return collect([
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dec',
        ])->map(fn ($abbr) => __($abbr))->toArray();
    }

    /**
     * Retrieve month name.
     *
     * @param  int         $monthNumber
     * @return string|null
     */
    public static function monthName(int $monthNumber): ?string
    {
        return $monthNumber >= 1 && $monthNumber <= 12
            ? self::months()[$monthNumber]
            : null;
    }

    /**
     * Retrieve month name lowercase.
     *
     * @param  int         $monthNumber
     * @return string|null
     */
    public static function monthNameLowercase(int $monthNumber): ?string
    {
        return $monthNumber >= 1 && $monthNumber <= 12
            ? Str::lower(self::monthName($monthNumber))
            : null;
    }

    /**
     * Retrieve past month name.
     *
     * @return string
     */
    public static function pastMonthNameLowercase(): string
    {
        return self::monthNameLowercase(now()->subMonthsNoOverflow(2)->month);
    }

    /**
     * Retrieve previous month name.
     *
     * @return string
     */
    public static function previousMonthNameLowercase(): string
    {
        return self::monthNameLowercase(now()->subMonthsNoOverflow(1)->month);
    }

    /**
     * Retrieve this month name.
     *
     * @return string
     */
    public static function thisMonthNameLowercase(): string
    {
        return self::monthNameLowercase(now()->month);
    }

    /**
     * Retrieve next month name.
     *
     * @return string
     */
    public static function nextMonthNameLowercase(): string
    {
        return self::monthNameLowercase(now()->addMonthsNoOverflow(1)->month);
    }

    /**
     * Retrieve future month name.
     *
     * @return string
     */
    public static function futureMonthNameLowercase(): string
    {
        return self::monthNameLowercase(now()->addMonthsNoOverflow(2)->month);
    }
}
