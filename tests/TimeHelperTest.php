<?php

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Str;
use Gabrielesbaiz\LaravelToolkit\Helpers\TimeHelper;

it('formats date as d/m/Y H:i:s with weekday', function () {
    $date = Carbon::create(2025, 3, 10, 14, 30, 45); // Monday
    expect(TimeHelper::dateCompleteWithDay($date))->toBe(Str::ucfirst($date->translatedFormat('l d/m/Y H:i:s')));

    $date = Carbon::create(2024, 12, 25, 8, 15, 0); // Wednesday (Christmas)
    expect(TimeHelper::dateCompleteWithDay($date))->toBe(Str::ucfirst($date->translatedFormat('l d/m/Y H:i:s')));
});

it('returns null when dateCompleteWithDay input is null', function () {
    expect(TimeHelper::dateCompleteWithDay(null))->toBeNull();
});

it('formats date as d/m/Y H:i:s', function () {
    $date = Carbon::create(2025, 3, 10, 14, 30, 45);
    expect(TimeHelper::dateComplete($date))->toBe($date->format('d/m/Y H:i:s'));

    $date = Carbon::create(2024, 12, 25, 8, 15, 0);
    expect(TimeHelper::dateComplete($date))->toBe($date->format('d/m/Y H:i:s'));
});

it('returns null when dateComplete input is null', function () {
    expect(TimeHelper::dateComplete(null))->toBeNull();
});

it('formats date as d/m/Y', function () {
    $date = Carbon::create(2025, 3, 10);
    expect(TimeHelper::dateBase($date))->toBe($date->format('d/m/Y'));

    $date = Carbon::create(2024, 12, 25);
    expect(TimeHelper::dateBase($date))->toBe($date->format('d/m/Y'));
});

it('returns null when dateBase input is null', function () {
    expect(TimeHelper::dateBase(null))->toBeNull();
});

it('returns today\'s date in d/m/Y format', function () {
    Carbon::setTestNow(Carbon::create(2025, 3, 10));
    expect(TimeHelper::todayFormat())->toBe('10/03/2025');

    Carbon::setTestNow(Carbon::create(2024, 12, 25));
    expect(TimeHelper::todayFormat())->toBe('25/12/2024');

    Carbon::setTestNow();
});

it('returns current date and time in d/m/Y H:i:s format', function () {
    Carbon::setTestNow(Carbon::create(2025, 3, 10, 14, 30, 45));
    expect(TimeHelper::nowFormat())->toBe('10/03/2025 14:30:45');

    Carbon::setTestNow(Carbon::create(2024, 12, 25, 8, 15, 0));
    expect(TimeHelper::nowFormat())->toBe('25/12/2024 08:15:00');

    Carbon::setTestNow(); // Reset to real time
});

it('returns the current year as an integer', function () {
    Carbon::setTestNow(Carbon::create(2025, 3, 10));
    expect(TimeHelper::nowYear())->toBe(2025);

    Carbon::setTestNow(Carbon::create(1999, 12, 25));
    expect(TimeHelper::nowYear())->toBe(1999);

    Carbon::setTestNow(); // Reset to real time
});

it('returns an array of localized month names', function () {
    $months = TimeHelper::months();

    expect($months)->toHaveCount(12);
    expect($months[1])->toBe(__('January'));
    expect($months[12])->toBe(__('December'));
});

it('returns an array of localized month abbreviations', function () {
    $abbrMonths = TimeHelper::monthsAbbreviations();

    expect($abbrMonths)->toHaveCount(12);
    expect($abbrMonths[1])->toBe(__('Jan'));
    expect($abbrMonths[5])->toBe(__('May'));
    expect($abbrMonths[7])->toBe(__('Jul'));
    expect($abbrMonths[9])->toBe(__('Sep'));
    expect($abbrMonths[12])->toBe(__('Dec'));
});

it('returns the correct month name for a given month number', function () {
    expect(TimeHelper::monthName(1))->toBe(__('January'));
    expect(TimeHelper::monthName(5))->toBe(__('May'));
    expect(TimeHelper::monthName(12))->toBe(__('December'));
});

it('returns null for invalid month numbers', function () {
    expect(TimeHelper::monthName(0))->toBeNull();
    expect(TimeHelper::monthName(13))->toBeNull();
});

it('returns the lowercase month name for a given month number', function () {
    expect(TimeHelper::monthNameLowercase(1))->toBe(Str::lower(__('January')));
    expect(TimeHelper::monthNameLowercase(5))->toBe(Str::lower(__('May')));
    expect(TimeHelper::monthNameLowercase(12))->toBe(Str::lower(__('December')));
});

it('returns null for invalid monthNameLowercase month numbers', function () {
    expect(TimeHelper::monthNameLowercase(0))->toBeNull();
    expect(TimeHelper::monthNameLowercase(13))->toBeNull();
});

it('returns the lowercase month name from two months ago', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 15)); // June 2025
    expect(TimeHelper::pastMonthNameLowercase())->toBe(Str::lower(__('April')));

    Carbon::setTestNow(Carbon::create(2025, 1, 10)); // January 2025
    expect(TimeHelper::pastMonthNameLowercase())->toBe(Str::lower(__('November'))); // Wraps around year

    Carbon::setTestNow(); // Reset to real time
});

it('returns the lowercase month name from one month ago', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 15)); // June 2025
    expect(TimeHelper::previousMonthNameLowercase())->toBe(Str::lower(__('May')));

    Carbon::setTestNow(Carbon::create(2025, 1, 10)); // January 2025
    expect(TimeHelper::previousMonthNameLowercase())->toBe(Str::lower(__('December'))); // Wraps around year

    Carbon::setTestNow(); // Reset to real time
});

it('returns the lowercase month name for the current month', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 15)); // June 2025
    expect(TimeHelper::thisMonthNameLowercase())->toBe(Str::lower(__('June')));

    Carbon::setTestNow(Carbon::create(2025, 12, 25)); // December 2025
    expect(TimeHelper::thisMonthNameLowercase())->toBe(Str::lower(__('December')));

    Carbon::setTestNow(); // Reset to real time
});

it('returns the lowercase month name for the next month', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 15)); // June 2025
    expect(TimeHelper::nextMonthNameLowercase())->toBe(Str::lower(__('July')));

    Carbon::setTestNow(Carbon::create(2025, 12, 25)); // December 2025
    expect(TimeHelper::nextMonthNameLowercase())->toBe(Str::lower(__('January'))); // Wraps to next year

    Carbon::setTestNow(); // Reset to real time
});

it('returns the lowercase month name for two months ahead', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 15)); // June 2025
    expect(TimeHelper::futureMonthNameLowercase())->toBe(Str::lower(__('August')));

    Carbon::setTestNow(Carbon::create(2025, 11, 25)); // November 2025
    expect(TimeHelper::futureMonthNameLowercase())->toBe(Str::lower(__('January'))); // Wraps to next year

    Carbon::setTestNow(); // Reset to real time
});

it('calculates Google date correctly from a given Carbon date', function () {
    $epoch = Carbon::createFromFormat('d/m/Y', '30/12/1899')->startOfDay();

    expect(TimeHelper::googleDate($epoch))->toBe(0); // Base date
    expect(TimeHelper::googleDate($epoch->copy()->addDays(1)))->toBe(1); // +1 day
    expect(TimeHelper::googleDate($epoch->copy()->addDays(365)))->toBe(365); // +1 year
    expect(TimeHelper::googleDate($epoch->copy()->addYears(10)))->toBe(3652); // Approx +10 years
});

it('converts Excel serial date to a Carbon instance', function () {
    expect(TimeHelper::excelToCarbon(1))->toEqual(Carbon::create(1899, 12, 31, 0, 0, 0)); // Day 1 in Excel
    expect(TimeHelper::excelToCarbon(2))->toEqual(Carbon::create(1900, 1, 1, 0, 0, 0)); // Day 2 in Excel
    expect(TimeHelper::excelToCarbon(43586))->toEqual(Carbon::create(2019, 5, 1, 0, 0, 0)); // Example date

    // Test time conversion
    expect(TimeHelper::excelToCarbon(43586.5))->toEqual(Carbon::create(2019, 5, 1, 0, 0, 0)); // Noon
    expect(TimeHelper::excelToCarbon(43586.75))->toEqual(Carbon::create(2019, 5, 1, 0, 0, 0)); // 6 PM
});

it('returns a human-readable time difference', function () {
    $dateFrom = Carbon::create(2025, 3, 10, 10, 0, 0);
    $dateTo = Carbon::create(2025, 3, 12, 14, 30, 0);

    expect(TimeHelper::timeDiff($dateTo, $dateFrom))->toBe($dateTo->diffForHumans($dateFrom, CarbonInterface::DIFF_ABSOLUTE, false, 4));

    $dateFrom = Carbon::create(2020, 1, 1);
    $dateTo = Carbon::create(2025, 1, 1);
    expect(TimeHelper::timeDiff($dateTo, $dateFrom, 2))->toBe($dateTo->diffForHumans($dateFrom, CarbonInterface::DIFF_ABSOLUTE, false, 2));
});

it('returns a human-readable difference for a given date', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 10, 12, 0, 0)); // Set test date

    $date = Carbon::create(2025, 6, 8, 14, 30, 0);
    expect(TimeHelper::diffHumans($date))->toBe($date->diffForHumans());

    $futureDate = Carbon::create(2025, 6, 15, 10, 0, 0);
    expect(TimeHelper::diffHumans($futureDate))->toBe($futureDate->diffForHumans());

    Carbon::setTestNow(); // Reset to real time
});

it('returns null when diffHumans input is null', function () {
    expect(TimeHelper::diffHumans(null))->toBeNull();
});

it('returns a human-readable complete difference for a given date', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 10, 12, 0, 0)); // Set test date

    $date = Carbon::create(2025, 6, 8, 14, 30, 0);
    expect(TimeHelper::diffHumansComplete($date))->toBe($date->diffForHumans(['parts' => 3]));

    $futureDate = Carbon::create(2025, 6, 15, 10, 0, 0);
    expect(TimeHelper::diffHumansComplete($futureDate))->toBe($futureDate->diffForHumans(['parts' => 3]));

    Carbon::setTestNow(); // Reset to real time
});

it('returns null when diffHumansComplete input is null', function () {
    expect(TimeHelper::diffHumansComplete(null))->toBeNull();
});

it('returns a short absolute human-readable difference for a given date', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 10, 12, 0, 0)); // Set test date

    $date = Carbon::create(2025, 6, 8, 14, 30, 0);
    expect(TimeHelper::diffHumansShort($date))->toBe($date->longAbsoluteDiffForHumans());

    $futureDate = Carbon::create(2025, 6, 15, 10, 0, 0);
    expect(TimeHelper::diffHumansShort($futureDate))->toBe($futureDate->longAbsoluteDiffForHumans());

    Carbon::setTestNow(); // Reset to real time
});

it('returns null when diffHumansShort input is null', function () {
    expect(TimeHelper::diffHumansShort(null))->toBeNull();
});

it('calculates the number of days between now and a given d/m/Y date', function () {
    Carbon::setTestNow(Carbon::create(2025, 6, 10)); // Set test date

    expect(TimeHelper::countDiffDays('12/06/2025'))->toBe(2); // Future date
    expect(TimeHelper::countDiffDays('08/06/2025'))->toBe(-2); // Past date
    expect(TimeHelper::countDiffDays('10/06/2025'))->toBe(0); // Same day

    Carbon::setTestNow(); // Reset to real time
});

it('converts date formats correctly', function () {
    expect(TimeHelper::convertDmyToTimestamp('10/03/2025'))->toBe('2025-03-10 00:00:00');
    expect(TimeHelper::convertTimestampToDmy('2025-03-10 14:30:00'))->toBe('10/03/2025');
    expect(TimeHelper::convertTimestampToDmyHi('2025-03-10 14:30:00'))->toBe('10/03/2025 14:30');
    expect(TimeHelper::convertIso8601ToDmyHi('2025-03-10T14:30:00Z'))->toBe('10/03/2025 14:30');
    expect(TimeHelper::convertDmyToDate('10/03/2025'))->toBe('2025-03-10');
    expect(TimeHelper::convertDmyMinusToDate('10-03-2025'))->toBe('2025-03-10');
    expect(TimeHelper::convertDateToDmy('2025-03-10'))->toBe('10/03/2025');
    expect(TimeHelper::convertDmyhisToDate('10/03/2025 14:30:00'))->toBe('2025-03-10');
    expect(TimeHelper::convertDateToDmyhis('2025-03-10'))->toBe('10/03/2025 00:00:00');
    expect(TimeHelper::dateDbHiFormat('10/03/2025 14:30'))->toBe('2025-03-10 14:30:00');
    expect(TimeHelper::dateLightFormat('10/03/2025 14:30:00'))->toBe('10/03/2025');
    expect(TimeHelper::dateBaseFormat('10/03/2025 14:30'))->toBe('10/03/2025');
    expect(TimeHelper::datedmYFormat('2025-03-10 14:30:00'))->toBe('10/03/2025');
    expect(TimeHelper::datedmYHiFormat('2025-03-10 14:30:00'))->toBe('10/03/2025 14:30');
    expect(TimeHelper::datedmYHisFormat('2025-03-10 14:30:00'))->toBe('10/03/2025 14:30:00');
});

it('returns null for null input values in date conversions', function () {
    expect(TimeHelper::convertDmyToTimestamp(null))->toBeNull();
    expect(TimeHelper::convertTimestampToDmy(null))->toBeNull();
    expect(TimeHelper::convertTimestampToDmyHi(null))->toBeNull();
    expect(TimeHelper::convertIso8601ToDmyHi(null))->toBeNull();
    expect(TimeHelper::convertDmyToDate(null))->toBeNull();
    expect(TimeHelper::convertDmyMinusToDate(null))->toBeNull();
    expect(TimeHelper::convertDateToDmy(null))->toBeNull();
    expect(TimeHelper::convertDmyhisToDate(null))->toBeNull();
    expect(TimeHelper::convertDateToDmyhis(null))->toBeNull();
});
