<?php

use Gabrielesbaiz\LaravelToolkit\Helpers\StringHelper;

it('returns true if the string starts with a number', function () {
    expect(StringHelper::startsWithNumber('1test'))->toBeTrue();
    expect(StringHelper::startsWithNumber('9example'))->toBeTrue();
    expect(StringHelper::startsWithNumber('0start'))->toBeTrue();
});

it('returns false if the string does not start with a number', function () {
    expect(StringHelper::startsWithNumber('test1'))->toBeFalse();
    expect(StringHelper::startsWithNumber('example9'))->toBeFalse();
    expect(StringHelper::startsWithNumber(' start'))->toBeFalse();
    expect(StringHelper::startsWithNumber(''))->toBeFalse();
});

it('returns true if the string starts with a letter', function () {
    expect(StringHelper::startsWithLetter('test1'))->toBeTrue();
    expect(StringHelper::startsWithLetter('Example9'))->toBeTrue();
    expect(StringHelper::startsWithLetter(' start'))->toBeFalse();
    expect(StringHelper::startsWithLetter(''))->toBeFalse();
    expect(StringHelper::startsWithLetter('123'))->toBeFalse();
});

it('returns false if the string does not start with a letter', function () {
    expect(StringHelper::startsWithLetter('1test'))->toBeFalse();
    expect(StringHelper::startsWithLetter('9example'))->toBeFalse();
    expect(StringHelper::startsWithLetter('0start'))->toBeFalse();
    expect(StringHelper::startsWithLetter(''))->toBeFalse();
});

it('returns null when the nullIfEmpty string is empty', function () {
    expect(StringHelper::nullIfEmpty(''))->toBeNull();
});

it('returns the original value when the string is not empty', function () {
    expect(StringHelper::nullIfEmpty('test'))->toBe('test');
    expect(StringHelper::nullIfEmpty(' '))->toBe(' ');
    expect(StringHelper::nullIfEmpty('123'))->toBe('123');
});

it('returns uppercase string when input is provided', function () {
    expect(StringHelper::upperCase('hello'))->toBe('HELLO');
    expect(StringHelper::upperCase('Laravel'))->toBe('LARAVEL');
    expect(StringHelper::upperCase('123'))->toBe('123');
});

it('returns null when input is null', function () {
    expect(StringHelper::upperCase(null))->toBeNull();
});

it('removes all spaces from a string', function () {
    expect(StringHelper::zapSpaces('Hello World!'))->toBe('HelloWorld');
    expect(StringHelper::zapSpaces('Laravel 10!'))->toBe('Laravel10');
    expect(StringHelper::zapSpaces('123-456_789'))->toBe('123456789');
});

it('returns null when zapSpaces input is null', function () {
    expect(StringHelper::zapSpaces(null))->toBeNull();
});

it('replaces multiple spaces with a single space', function () {
    expect(StringHelper::clearSpaces('Hello   World'))->toBe('Hello World');
    expect(StringHelper::clearSpaces(' Laravel   10  '))->toBe(' Laravel 10 ');
    expect(StringHelper::clearSpaces("Line1\nLine2\tLine3"))->toBe('Line1 Line2 Line3');
});

it('returns null when clearSpaces input is null', function () {
    expect(StringHelper::clearSpaces(null))->toBeNull();
});

it('trims spaces from the beginning and end of a string', function () {
    expect(StringHelper::trimSpaces('  Hello World  '))->toBe('Hello World');
    expect(StringHelper::trimSpaces("\n\t Laravel 10 \t\n"))->toBe('Laravel 10');
    expect(StringHelper::trimSpaces('NoSpaces'))->toBe('NoSpaces');
});

it('returns null when trimSpaces input is null', function () {
    expect(StringHelper::trimSpaces(null))->toBeNull();
});

it('replaces multiple spaces with an underscore', function () {
    expect(StringHelper::snakeSpaces('Hello   World'))->toBe('Hello_World');
    expect(StringHelper::snakeSpaces(' Laravel   10  '))->toBe('_Laravel_10_');
    expect(StringHelper::snakeSpaces("Line1\nLine2\tLine3"))->toBe('Line1_Line2_Line3');
});

it('returns null when snakeSpaces input is null', function () {
    expect(StringHelper::snakeSpaces(null))->toBeNull();
});

it('removes carriage return characters from a string', function () {
    expect(StringHelper::clearNewLines("Hello\rWorld"))->toBe('HelloWorld');
    expect(StringHelper::clearNewLines('NoNewLines'))->toBe('NoNewLines');
});

it('returns null when clearNewLines input is null', function () {
    expect(StringHelper::clearNewLines(null))->toBeNull();
});

it('removes tab characters from a string', function () {
    expect(StringHelper::clearTabs("Hello\tWorld"))->toBe('HelloWorld');
    expect(StringHelper::clearTabs("Line1\tLine2\t\tLine3"))->toBe('Line1Line2Line3');
    expect(StringHelper::clearTabs('NoTabs'))->toBe('NoTabs');
});

it('returns null when clearTabs input is null', function () {
    expect(StringHelper::clearTabs(null))->toBeNull();
});

it('removes all non-numeric characters from a string', function () {
    expect(StringHelper::clearNonNumeric('abc123'))->toBe('123');
    expect(StringHelper::clearNonNumeric('12.34'))->toBe('1234');
    expect(StringHelper::clearNonNumeric('Phone: +1 (555) 123-4567'))->toBe('15551234567');
    expect(StringHelper::clearNonNumeric('NoNumbers'))->toBe('');
});

it('returns null when clearNonNumeric input is null', function () {
    expect(StringHelper::clearNonNumeric(null))->toBeNull();
});

it('returns true if the string ends with "a"', function () {
    expect(StringHelper::isFemale('Anna'))->toBeTrue();
    expect(StringHelper::isFemale('Maria'))->toBeTrue();
    expect(StringHelper::isFemale('Lara'))->toBeTrue();
});

it('returns false if the string does not end with "a"', function () {
    expect(StringHelper::isFemale('Marco'))->toBeFalse();
    expect(StringHelper::isFemale('John'))->toBeFalse();
    expect(StringHelper::isFemale(''))->toBeFalse();
});

it('returns false when isFemale input is null', function () {
    expect(StringHelper::isFemale(null))->toBeFalse();
});

it('replaces the last "o" with "a" when the string ends with "o"', function () {
    expect(StringHelper::convertToFemale('Ugo'))->toBe('Uga');
    expect(StringHelper::convertToFemale('Carlo'))->toBe('Carla');
    expect(StringHelper::convertToFemale('Bruno'))->toBe('Bruna');
});

it('returns the same string if it does not end with "o"', function () {
    expect(StringHelper::convertToFemale('Anna'))->toBe('Anna');
    expect(StringHelper::convertToFemale('Maria'))->toBe('Maria');
    expect(StringHelper::convertToFemale('Lara'))->toBe('Lara');
});

it('returns null when convertToFemale input is null', function () {
    expect(StringHelper::convertToFemale(null))->toBeNull();
});

it('normalizes name casing while preserving apostrophes', function () {
    expect(StringHelper::normalizeNames('john DOE'))->toBe('John Doe');
    expect(StringHelper::normalizeNames('o\'connor'))->toBe('O\'Connor');
    expect(StringHelper::normalizeNames('MCdonald'))->toBe('Mcdonald');
    expect(StringHelper::normalizeNames('jean-luc PICARD'))->toBe('Jean-Luc Picard');
});

it('returns null when normalizeNames input is null', function () {
    expect(StringHelper::normalizeNames(null))->toBeNull();
});
