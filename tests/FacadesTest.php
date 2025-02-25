<?php

use Carbon\Carbon;
use Gabrielesbaiz\LaravelToolkit\Facades\WebKit;
use Gabrielesbaiz\LaravelToolkit\Facades\TimeKit;
use Gabrielesbaiz\LaravelToolkit\Facades\PhoneKit;
use Gabrielesbaiz\LaravelToolkit\Facades\NumberKit;
use Gabrielesbaiz\LaravelToolkit\Facades\StringKit;

it('checks string helper', function () {
    expect(StringKit::startsWithLetter('hello'))->toBeTrue();
});

it('checks number helper', function () {
    expect(NumberKit::numberIsBetween(10, 5, 15))->toBeTrue();
});

it('checks time helper', function () {
    Carbon::setTestNow(Carbon::create(2025, 1, 1));
    expect(TimeKit::nowYear())->toBe(2025);
    Carbon::setTestNow();
});

it('checks web helper', function () {
    expect(WebKit::isValidUrl('https://example.com'))->toBeTrue();
});

it('checks phone helper', function () {
    expect(PhoneKit::normalizePhoneNumber('+39 123 456 7890'))->toBe('1234567890');
});
