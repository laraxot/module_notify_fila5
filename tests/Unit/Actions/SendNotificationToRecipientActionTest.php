<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Actions;

<<<<<<< HEAD
use InvalidArgumentException;
=======
>>>>>>> 929ed821d (.)
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Notification as IlluminateNotification;
use Illuminate\Support\Facades\Notification;
use Modules\Notify\Actions\SendNotificationToRecipientAction;
use Modules\Notify\Tests\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(\Modules\Notify\Tests\TestCase::class);
=======

uses(TestCase::class);
>>>>>>> 929ed821d (.)

function makeDummyNotificationForRecipient(): IlluminateNotification
{
    return new class extends IlluminateNotification
    {
<<<<<<< HEAD
        /** @return list<string> */
=======
>>>>>>> 929ed821d (.)
        public function via(object $notifiable): array
        {
            return ['mail'];
        }
    };
}

test('send notification to recipient returns true and routes mail', function () {
    Notification::fake();
    $notification = makeDummyNotificationForRecipient();

    $result = app(SendNotificationToRecipientAction::class)->execute(
        'user@example.test',
        $notification,
    );

<<<<<<< HEAD
    Assert::assertTrue($result);
=======
    expect($result)->toBeTrue();

>>>>>>> 929ed821d (.)
    Notification::assertSentOnDemand(
        $notification::class,
        static function (IlluminateNotification $notification, array $channels, AnonymousNotifiable $notifiable): bool {
            return ($notifiable->routes['mail'] ?? null) === 'user@example.test';
        }
    );
});

test('send notification to recipient throws for invalid email', function () {
<<<<<<< HEAD
    \assertNotifyThrows(
        fn () => app(SendNotificationToRecipientAction::class)->execute(
            'invalid-email',
            makeDummyNotificationForRecipient(),
        ),
        \InvalidArgumentException::class,
    );
});
=======
    app(SendNotificationToRecipientAction::class)->execute(
        'invalid-email',
        makeDummyNotificationForRecipient(),
    );
})->throws(\InvalidArgumentException::class);
>>>>>>> 929ed821d (.)
