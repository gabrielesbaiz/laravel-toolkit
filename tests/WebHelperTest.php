<?php

use Gabrielesbaiz\LaravelToolkit\Helpers\WebHelper;

it('returns true for valid URLs', function () {
    expect(WebHelper::isValidUrl('https://example.com'))->toBeTrue();
    expect(WebHelper::isValidUrl('http://example.com'))->toBeTrue();
    expect(WebHelper::isValidUrl('ftp://example.com'))->toBeTrue();
    expect(WebHelper::isValidUrl('https://sub.domain.com'))->toBeTrue();
    expect(WebHelper::isValidUrl('https://example.com/path?query=1'))->toBeTrue();
});

it('returns false for invalid URLs', function () {
    expect(WebHelper::isValidUrl('example'))->toBeFalse();
    expect(WebHelper::isValidUrl('://example.com'))->toBeFalse();
    expect(WebHelper::isValidUrl('htp://invalid.com'))->toBeFalse();
    expect(WebHelper::isValidUrl('www.example'))->toBeFalse();
    expect(WebHelper::isValidUrl(''))->toBeFalse();
});

it('removes mailto from the beginning of an email string', function () {
    expect(WebHelper::removeMailTo('mailto:example@example.com'))->toBe('example@example.com');
    expect(WebHelper::removeMailTo('MAILTO:info@domain.com'))->toBe('info@domain.com');
    expect(WebHelper::removeMailTo('MailTo:contact@site.com'))->toBe('contact@site.com');
});

it('does not remove mailto if it is not at the beginning', function () {
    expect(WebHelper::removeMailTo('Contact: mailto:info@domain.com'))->toBe('Contact: mailto:info@domain.com');
    expect(WebHelper::removeMailTo('hello@mail.com'))->toBe('hello@mail.com');
});

it('returns null when removeMailTo input is null', function () {
    expect(WebHelper::removeMailTo(null))->toBeNull();
});
