<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Models;
<<<<<<< HEAD
use Modules\Notify\Models\Notification;
use Modules\Notify\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);

describe('Notification Business Logic', function () {
    test('notification extends xot base model', function () {
        $notification = new Notification;

        Assert::assertInstanceOf(Notification::class, $notification);
    });

    test('notification can store polymorphic notifiable relationships', function () {
        $notification = new Notification([
=======

use Modules\Notify\Models\Notification;
use Modules\Notify\Tests\TestCase;
use Modules\Xot\Models\BaseModel;

uses(TestCase::class);

describe('Notification Business Logic', function () {
    test('notification extends xot base model', function () {
        expect(Notification::class)->toBeSubclassOf(BaseModel::class);
    });

    test('notification can store polymorphic notifiable relationships', function () {
        $notification = Notification::make([
>>>>>>> 929ed821d (.)
            'notifiable_type' => 'App\\Models\\User',
            'notifiable_id' => 1,
        ]);

<<<<<<< HEAD
        Assert::assertSame('App\\Models\\User', $notification->notifiable_type);
        Assert::assertSame(1, $notification->notifiable_id);
    });

    test('notification has notification type', function () {
        $notification = new Notification([
            'type' => 'App\\Notifications\\OrderConfirmation',
        ]);

        Assert::assertSame('App\\Notifications\\OrderConfirmation', $notification->type);
    });

    test('notification can store data payload', function () {
        $notification = new Notification([
            'data' => ['title' => 'Test', 'message' => 'Hello World'],
        ]);

        $data = \assertNotifyArray($notification->data);
        Assert::assertSame('Test', $data['title']);
    });

    test('notification can track read status', function () {
        $notification = new Notification([
            'read_at' => '2023-01-01 12:00:00',
        ]);

        Assert::assertSame('2023-01-01 12:00:00', (string) $notification->read_at);
    });

    test('notification can track tenant and user', function () {
        $notification = new Notification([
=======
        expect($notification->notifiable_type)->toBe('App\\Models\\User');
        expect($notification->notifiable_id)->toBe(1);
    });

    test('notification has notification type', function () {
        $notification = Notification::make([
            'type' => 'App\\Notifications\\OrderConfirmation',
        ]);

        expect($notification->type)->toBe('App\\Notifications\\OrderConfirmation');
    });

    test('notification can store data payload', function () {
        $notification = Notification::make([
            'data' => ['title' => 'Test', 'message' => 'Hello World'],
        ]);

        expect($notification->data)->toBeArray();
        expect($notification->data['title'])->toBe('Test');
    });

    test('notification can track read status', function () {
        $notification = Notification::make([
            'read_at' => '2023-01-01 12:00:00',
        ]);

        expect($notification->read_at)->toBe('2023-01-01 12:00:00');
    });

    test('notification can track tenant and user', function () {
        $notification = Notification::make([
>>>>>>> 929ed821d (.)
            'tenant_id' => 1,
            'user_id' => 5,
        ]);

<<<<<<< HEAD
        Assert::assertSame(1, $notification->tenant_id);
        Assert::assertSame(5, $notification->user_id);
    });

    test('notification can store polymorphic subject relationships', function () {
        $notification = new Notification([
=======
        expect($notification->tenant_id)->toBe(1);
        expect($notification->user_id)->toBe(5);
    });

    test('notification can store polymorphic subject relationships', function () {
        $notification = Notification::make([
>>>>>>> 929ed821d (.)
            'subject_type' => 'App\\Models\\Order',
            'subject_id' => 123,
        ]);

<<<<<<< HEAD
        Assert::assertSame('App\\Models\\Order', $notification->subject_type);
        Assert::assertSame(123, $notification->subject_id);
    });

    test('notification can track multiple channels', function () {
        $notification = new Notification([
            'channels' => ['mail', 'sms', 'database'],
        ]);

        $channels = \assertNotifyArray($notification->channels);
        Assert::assertContains('mail', $channels);
        Assert::assertContains('sms', $channels);
    });

    test('notification can track status and sent time', function () {
        $notification = new Notification([
=======
        expect($notification->subject_type)->toBe('App\\Models\\Order');
        expect($notification->subject_id)->toBe(123);
    });

    test('notification can track multiple channels', function () {
        $notification = Notification::make([
            'channels' => ['mail', 'sms', 'database'],
        ]);

        expect($notification->channels)->toBeArray();
        expect($notification->channels)->toContain('mail');
        expect($notification->channels)->toContain('sms');
    });

    test('notification can track status and sent time', function () {
        $notification = Notification::make([
>>>>>>> 929ed821d (.)
            'status' => 'sent',
            'sent_at' => '2023-01-01 14:00:00',
        ]);

<<<<<<< HEAD
        Assert::assertSame('sent', $notification->status);
        Assert::assertSame('2023-01-01 14:00:00', (string) $notification->sent_at);
    });

    test('notification has factory for testing', function () {
        $reflection = new \ReflectionClass(Notification::class);

        Assert::assertTrue($reflection->hasMethod('factory'));
=======
        expect($notification->status)->toBe('sent');
        expect($notification->sent_at)->toBe('2023-01-01 14:00:00');
    });

    test('notification has factory for testing', function () {
        expect(method_exists(Notification::class, 'factory'))->toBeTrue();
>>>>>>> 929ed821d (.)
    });
});
