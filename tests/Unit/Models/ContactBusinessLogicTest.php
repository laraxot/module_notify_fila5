<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;

<<<<<<< HEAD
use Modules\Notify\Models\Contact;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

describe('Contact Business Logic', function () {
    test('contact extends base model', function () {});
=======
uses(TestCase::class);

use Modules\Notify\Models\BaseModel;
use Modules\Notify\Models\Contact;
use Modules\Notify\Tests\TestCase;

describe('Contact Business Logic', function () {
    test('contact extends base model', function () {
        expect(Contact::class)->toBeSubclassOf(BaseModel::class);
    });
>>>>>>> 929ed821d (.)

    test('contact can store polymorphic model relationships', function () {
        $contact = new Contact;
        $contact->model_type = 'App\\Models\\User';
        $contact->model_id = '1';

<<<<<<< HEAD
        Assert::assertSame('App\\Models\\User', $contact->model_type);
        Assert::assertSame('1', $contact->model_id);
=======
        expect($contact->model_type)->toBe('App\\Models\\User');
        expect($contact->model_id)->toBe('1');
>>>>>>> 929ed821d (.)
    });

    test('contact can store contact information with type', function () {
        $contact = new Contact;
        $contact->contact_type = 'email';
        $contact->value = 'test@example.com';

<<<<<<< HEAD
        Assert::assertSame('email', $contact->contact_type);
        Assert::assertSame('test@example.com', $contact->value);
=======
        expect($contact->contact_type)->toBe('email');
        expect($contact->value)->toBe('test@example.com');
>>>>>>> 929ed821d (.)
    });

    test('contact can track sms communication', function () {
        $contact = new Contact;
        $contact->sms_count = 5;
        $contact->sms_status_code = '200';
        $contact->sms_status_txt = 'Success';

<<<<<<< HEAD
        Assert::assertSame(5, $contact->sms_count);
        Assert::assertSame('200', $contact->sms_status_code);
        Assert::assertSame('Success', $contact->sms_status_txt);
=======
        expect($contact->sms_count)->toBe(5);
        expect($contact->sms_status_code)->toBe('200');
        expect($contact->sms_status_txt)->toBe('Success');
>>>>>>> 929ed821d (.)
    });

    test('contact can track email communication', function () {
        $contact = new Contact;
        $contact->mail_count = 3;
        $contact->mail_sent_at = '2023-01-01 10:00:00';

<<<<<<< HEAD
        Assert::assertSame(3, $contact->mail_count);
        Assert::assertSame('2023-01-01 10:00:00', $contact->mail_sent_at);
=======
        expect($contact->mail_count)->toBe(3);
        expect($contact->mail_sent_at)->toBe('2023-01-01 10:00:00');
>>>>>>> 929ed821d (.)
    });

    test('contact can store personal information', function () {
        $contact = new Contact;
        $contact->first_name = 'Mario';
        $contact->last_name = 'Rossi';

<<<<<<< HEAD
        Assert::assertSame('Mario', $contact->first_name);
        Assert::assertSame('Rossi', $contact->last_name);
=======
        expect($contact->first_name)->toBe('Mario');
        expect($contact->last_name)->toBe('Rossi');
>>>>>>> 929ed821d (.)
    });

    test('contact has verification tracking', function () {
        $contact = new Contact;
        $contact->token = 'abc123';
        $contact->verified_at = '2023-01-01 12:00:00';

<<<<<<< HEAD
        Assert::assertSame('abc123', $contact->token);
        Assert::assertSame('2023-01-01 12:00:00', $contact->verified_at);
=======
        expect($contact->token)->toBe('abc123');
        expect($contact->verified_at)->toBe('2023-01-01 12:00:00');
>>>>>>> 929ed821d (.)
    });

    test('contact has flexible attribute storage', function () {
        $contact = new Contact;
        $contact->attribute_1 = 'value1';
        $contact->attribute_2 = 'value2';

<<<<<<< HEAD
        Assert::assertSame('value1', $contact->attribute_1);
        Assert::assertSame('value2', $contact->attribute_2);
=======
        expect($contact->attribute_1)->toBe('value1');
        expect($contact->attribute_2)->toBe('value2');
>>>>>>> 929ed821d (.)
    });

    test('contact can track duplicate count', function () {
        $contact = new Contact;
        $contact->duplicate_count = 2;

<<<<<<< HEAD
        Assert::assertSame(2, $contact->duplicate_count);
=======
        expect($contact->duplicate_count)->toBe(2);
>>>>>>> 929ed821d (.)
    });

    test('contact has order column for sorting', function () {
        $contact = new Contact;
        $contact->order_column = 1;

<<<<<<< HEAD
        Assert::assertSame(1, $contact->order_column);
=======
        expect($contact->order_column)->toBe(1);
>>>>>>> 929ed821d (.)
    });
});
