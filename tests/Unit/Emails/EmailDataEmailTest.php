<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Emails;

use Illuminate\Mail\Mailables\Address;
use Modules\Notify\Datas\EmailData;
use Modules\Notify\Emails\EmailDataEmail;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);
>>>>>>> 929ed821d (.)

test('email data email envelope uses explicit sender and subject', function (): void {
    $emailData = new EmailData(
        recipient: 'recipient@example.test',
        subject: 'Subject Line',
        body_html: '<p>Hello</p>',
        from: 'Notify Sender',
        from_email: 'sender@example.test',
    );

    $mailable = new EmailDataEmail($emailData);
    $envelope = $mailable->envelope();

<<<<<<< HEAD
    Assert::assertInstanceOf(Address::class, $envelope->from);
    Assert::assertSame('sender@example.test', $envelope->from->address);
    Assert::assertSame('Notify Sender', $envelope->from->name);
    Assert::assertSame('Subject Line', $envelope->subject);
=======
    expect($envelope->subject)->toBe('Subject Line')
        ->and($envelope->from)->toBeInstanceOf(Address::class)
        ->and($envelope->from->address)->toBe('sender@example.test')
        ->and($envelope->from->name)->toBe('Notify Sender');
>>>>>>> 929ed821d (.)
});

test('email data email content uses notify views and exposes email data', function (): void {
    $emailData = new EmailData(
        recipient: 'recipient@example.test',
        subject: 'Subject Line',
        body_html: '<p>Hello</p>',
    );

    $mailable = new EmailDataEmail($emailData);
    $content = $mailable->content();

<<<<<<< HEAD
    Assert::assertSame('notify::emails.html', $content->html);
    Assert::assertSame('notify::emails.text', $content->text);
    Assert::assertSame($emailData, $content->with['email_data']);
=======
    expect($content->html)->toBe('notify::emails.html')
        ->and($content->text)->toBe('notify::emails.text')
        ->and($content->with['email_data'])->toBe($emailData);
>>>>>>> 929ed821d (.)
});

test('email data email has no attachments by default', function (): void {
    $emailData = new EmailData(
        recipient: 'recipient@example.test',
        subject: 'Subject Line',
        body_html: '<p>Hello</p>',
    );

    $mailable = new EmailDataEmail($emailData);
<<<<<<< HEAD
    $attachments = $mailable->attachments();
    Assert::assertCount(0, $attachments);
=======

    expect($mailable->attachments())->toBeArray()
        ->and($mailable->attachments())->toHaveCount(0);
>>>>>>> 929ed821d (.)
});
