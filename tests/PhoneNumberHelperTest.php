<?php

use Gabrielesbaiz\LaravelToolkit\Helpers\PhoneNumberHelper;

it('removes +39 from the beginning of a phone number', function () {
    expect(PhoneNumberHelper::removePhoneCode('+391234567890'))->toBe('1234567890');
    expect(PhoneNumberHelper::removePhoneCode('+39123 456 7890'))->toBe('123 456 7890');
    expect(PhoneNumberHelper::removePhoneCode('+390987654321'))->toBe('0987654321');
});

it('does not remove +39 if it is not at the beginning', function () {
    expect(PhoneNumberHelper::removePhoneCode('Phone: +391234567890'))->toBe('Phone: +391234567890');
    expect(PhoneNumberHelper::removePhoneCode('123+39456'))->toBe('123+39456');
});

it('returns null when removePhoneCode input is null', function () {
    expect(PhoneNumberHelper::removePhoneCode(null))->toBeNull();
});

it('removes international phone code and spaces from the number', function () {
    expect(PhoneNumberHelper::normalizePhoneNumber('+39123 456 7890'))->toBe('1234567890');
    expect(PhoneNumberHelper::normalizePhoneNumber('+39 555-123-4567'))->toBe('5551234567');
    expect(PhoneNumberHelper::normalizePhoneNumber('+39 7700 900123'))->toBe('7700900123');
    expect(PhoneNumberHelper::normalizePhoneNumber('+39176 12345678'))->toBe('17612345678');
});

it('does not modify already normalized numbers', function () {
    expect(PhoneNumberHelper::normalizePhoneNumber('1234567890'))->toBe('1234567890');
    expect(PhoneNumberHelper::normalizePhoneNumber('987654321'))->toBe('987654321');
});

it('returns null when normalizePhoneNumber input is null', function () {
    expect(PhoneNumberHelper::normalizePhoneNumber(null))->toBeNull();
});

it('hides all but the last three digits of a phone number', function () {
    expect(PhoneNumberHelper::phoneNumberHide('1234567890'))->toBe('*******890');
    expect(PhoneNumberHelper::phoneNumberHide('987654321'))->toBe('******321');
    expect(PhoneNumberHelper::phoneNumberHide('4567890'))->toBe('****890');
});

it('returns the same number if it has three or fewer digits', function () {
    expect(PhoneNumberHelper::phoneNumberHide('123'))->toBe('123');
    expect(PhoneNumberHelper::phoneNumberHide('12'))->toBe('12');
    expect(PhoneNumberHelper::phoneNumberHide('5'))->toBe('5');
});

it('returns null when phoneNumberHide input is null', function () {
    expect(PhoneNumberHelper::phoneNumberHide(null))->toBeNull();
});
