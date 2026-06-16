<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Datas\SMS;

use Modules\Notify\Datas\SMS\TwilioData;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
>>>>>>> 929ed821d (.)

describe('TwilioData', function () {
    it('has default auth type', function () {
        $data = new TwilioData;

<<<<<<< HEAD
        Assert::assertSame('basic', $data->auth_type);
=======
        expect($data->auth_type)->toBe('basic');
>>>>>>> 929ed821d (.)
    });

    it('has default timeout', function () {
        $data = new TwilioData;

<<<<<<< HEAD
        Assert::assertSame(30, $data->timeout);
=======
        expect($data->timeout)->toBe(30);
>>>>>>> 929ed821d (.)
    });

    it('can set account sid', function () {
        $data = new TwilioData;
        $data->account_sid = 'AC1234567890';

<<<<<<< HEAD
        Assert::assertSame('AC1234567890', $data->account_sid);
=======
        expect($data->account_sid)->toBe('AC1234567890');
>>>>>>> 929ed821d (.)
    });

    it('can set auth token', function () {
        $data = new TwilioData;
        $data->auth_token = 'auth_token_123';

<<<<<<< HEAD
        Assert::assertSame('auth_token_123', $data->auth_token);
=======
        expect($data->auth_token)->toBe('auth_token_123');
>>>>>>> 929ed821d (.)
    });

    it('can set base url', function () {
        $data = new TwilioData;
        $data->base_url = 'https://custom.twilio.com';

<<<<<<< HEAD
        Assert::assertSame('https://custom.twilio.com', $data->base_url);
=======
        expect($data->base_url)->toBe('https://custom.twilio.com');
>>>>>>> 929ed821d (.)
    });

    it('can get base url with default', function () {
        $data = new TwilioData;

        $baseUrl = $data->getBaseUrl();

<<<<<<< HEAD
        Assert::assertSame('https://api.twilio.com', $baseUrl);
=======
        expect($baseUrl)->toBe('https://api.twilio.com');
>>>>>>> 929ed821d (.)
    });

    it('can get custom base url', function () {
        $data = new TwilioData;
        $data->base_url = 'https://custom.twilio.com';

        $baseUrl = $data->getBaseUrl();

<<<<<<< HEAD
        Assert::assertSame('https://custom.twilio.com', $baseUrl);
=======
        expect($baseUrl)->toBe('https://custom.twilio.com');
>>>>>>> 929ed821d (.)
    });

    it('can get timeout', function () {
        $data = new TwilioData;
        $data->timeout = 60;

        $timeout = $data->getTimeout();

<<<<<<< HEAD
        Assert::assertSame(60, $timeout);
=======
        expect($timeout)->toBe(60);
>>>>>>> 929ed821d (.)
    });

    it('can generate auth headers', function () {
        $data = new TwilioData;
        $data->account_sid = 'AC1234567890';
        $data->auth_token = 'auth_token_123';

        $headers = $data->getAuthHeaders();
<<<<<<< HEAD
        Assert::assertArrayHasKey('Authorization', $headers);
        Assert::assertArrayHasKey('Content-Type', $headers);
        Assert::assertStringStartsWith('Basic ', (string) $headers['Authorization']);
    });

    it('has from method (inherited from Spatie Data)', function () {
            });

    it('has make static method', function () {
            });
=======

        expect($headers)->toBeArray();
        expect($headers)->toHaveKey('Authorization');
        expect($headers)->toHaveKey('Content-Type');
        expect($headers['Authorization'])->toStartWith('Basic ');
    });

    it('has from method (inherited from Spatie Data)', function () {
        expect(method_exists(TwilioData::class, 'from'))->toBeTrue();
    });

    it('has make static method', function () {
        expect(method_exists(TwilioData::class, 'make'))->toBeTrue();
    });
>>>>>>> 929ed821d (.)
});
