<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Illuminate\Notifications\Notification;

/**
 * Notifica con toNetfun per NetfunChannel.
 */
final class NotifyNetfunNotificationStub extends Notification
{
    public function toNetfun(object $notifiable): string
    {
        return 'Test SMS body';
    }
}
