<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;
<<<<<<< HEAD
use Mockery;
use function Safe\class_uses;
=======

>>>>>>> 929ed821d (.)
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Notify\Models\MailTemplate;
<<<<<<< HEAD
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\Sluggable\HasSlug;
use Spatie\Translatable\HasTranslations;

uses(\Modules\Notify\Tests\TestCase::class);

describe('MailTemplate Business Logic', function () {
    test('mail template extends spatie mail template', function () {
        Assert::assertTrue((new \ReflectionClass(MailTemplate::class))->isSubclassOf(\Spatie\MailTemplates\Models\MailTemplate::class));
=======
use Spatie\Sluggable\HasSlug;
use Spatie\Translatable\HasTranslations;

describe('MailTemplate Business Logic', function () {
    test('mail template extends spatie mail template', function () {
        expect(MailTemplate::class)->toBeSubclassOf(\Spatie\MailTemplates\Models\MailTemplate::class);
>>>>>>> 929ed821d (.)
    });

    test('mail template has slug trait for url-friendly names', function () {
        $traits = class_uses(MailTemplate::class);

<<<<<<< HEAD
        Assert::assertArrayHasKey(HasSlug::class, $traits);
=======
        expect($traits)->toHaveKey(HasSlug::class);
>>>>>>> 929ed821d (.)
    });

    test('mail template has translations trait', function () {
        $traits = class_uses(MailTemplate::class);

<<<<<<< HEAD
        Assert::assertArrayHasKey(HasTranslations::class, $traits);
=======
        expect($traits)->toHaveKey(HasTranslations::class);
>>>>>>> 929ed821d (.)
    });

    test('mail template has soft deletes trait', function () {
        $traits = class_uses(MailTemplate::class);

<<<<<<< HEAD
        Assert::assertArrayHasKey(SoftDeletes::class, $traits);
=======
        expect($traits)->toHaveKey(SoftDeletes::class);
>>>>>>> 929ed821d (.)
    });

    test('mail template can store template content', function () {
        $mailTemplate = new MailTemplate;
        $mailTemplate->name = 'Welcome Email';
        $mailTemplate->subject = 'Welcome to our platform';
        $mailTemplate->html_template = '<h1>Welcome!</h1>';

<<<<<<< HEAD
        Assert::assertSame('Welcome Email', $mailTemplate->name);
        Assert::assertSame('Welcome to our platform', $mailTemplate->subject);
        Assert::assertSame('<h1>Welcome!</h1>', $mailTemplate->html_template);
=======
        expect($mailTemplate->name)->toBe('Welcome Email');
        expect($mailTemplate->subject)->toBe('Welcome to our platform');
        expect($mailTemplate->html_template)->toBe('<h1>Welcome!</h1>');
>>>>>>> 929ed821d (.)
    });

    test('mail template can link to mailable class', function () {
        $mailTemplate = new MailTemplate;
        $mailTemplate->mailable = 'App\\Mail\\WelcomeMail';

<<<<<<< HEAD
        Assert::assertSame('App\\Mail\\WelcomeMail', $mailTemplate->mailable);
=======
        expect($mailTemplate->mailable)->toBe('App\\Mail\\WelcomeMail');
>>>>>>> 929ed821d (.)
    });

    test('mail template has version tracking', function () {
        $mailTemplate = new MailTemplate;
        $mailTemplate->version = 2;

<<<<<<< HEAD
        Assert::assertSame(2, $mailTemplate->version);
=======
        expect($mailTemplate->version)->toBe(2);
>>>>>>> 929ed821d (.)
    });

    test('mail template can store optional text template', function () {
        $mailTemplate = new MailTemplate;
        $mailTemplate->text_template = 'Welcome! This is plain text.';

<<<<<<< HEAD
        Assert::assertSame('Welcome! This is plain text.', $mailTemplate->text_template);
    });

    test('mail template can be queried by mailable', function () {
        $mailable = new class extends \Illuminate\Mail\Mailable
        {
            public function build(): static
            {
                return $this;
            }

            public function getSlug(): string
            {
                return 'welcome-mail';
            }
        };
        $query = MailTemplate::forMailable($mailable);

        Assert::assertInstanceOf(Builder::class, $query);
=======
        expect($mailTemplate->text_template)->toBe('Welcome! This is plain text.');
    });

    test('mail template can be queried by mailable', function () {
        $mailable = Mockery::mock(Mailable::class);
        $query = MailTemplate::forMailable($mailable);

        expect($query)->toBeInstanceOf(Builder::class);
>>>>>>> 929ed821d (.)
    });

    test('mail template has creator and updater tracking', function () {
        $mailTemplate = new MailTemplate;
        $mailTemplate->created_by = 'user-1';
        $mailTemplate->updated_by = 'user-2';

<<<<<<< HEAD
        Assert::assertSame('user-1', $mailTemplate->created_by);
        Assert::assertSame('user-2', $mailTemplate->updated_by);
=======
        expect($mailTemplate->created_by)->toBe('user-1');
        expect($mailTemplate->updated_by)->toBe('user-2');
>>>>>>> 929ed821d (.)
    });
});
