<?php

declare(strict_types=1);

namespace Modules\Notify\Notifications\Channels;

use Modules\Notify\Actions\SMS\SendSmsFactorSMSAction;
use Modules\Notify\Contracts\CanThemeNotificationContract;
use Modules\Notify\Notifications\ThemeNotification;

class NetfunChannel
{
    /**
     * Send the given notification.
     */
    public function send(CanThemeNotificationContract $notifiable, ThemeNotification $themeNotification): void
    {
        $smsData = $themeNotification->toSms($notifiable);

        $action = app(SendSmsFactorSMSAction::class);

<<<<<<< HEAD
        /** @var array<string, mixed> $data */
=======
<<<<<<< HEAD
        /** @var array{status_code: int, status_txt: string} $data */
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
        $data = $action->execute($smsData);

        $notifiable->increase('sms', $data);
    }
}
