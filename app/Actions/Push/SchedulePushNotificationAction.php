<?php

declare(strict_types=1);

namespace Modules\Notify\Actions\Push;

use DateTime;
use Illuminate\Support\Facades\Cache;
use Modules\Notify\Datas\PushNotificationData;
use Spatie\QueueableAction\ActionJob;
use Spatie\QueueableAction\QueueableAction;

/**
 * Programma l'invio futuro di una notifica push.
 */
class SchedulePushNotificationAction
{
    use QueueableAction;

    /**
     * @param  list<string>  $tokens
     * @param  array<string, mixed>  $data
     */
    public function execute(array $tokens, PushNotificationData $notification, array $data, DateTime $scheduleTime): string
    {
        $jobId = uniqid('push_', true);

        Cache::put("scheduled_push:{$jobId}", [
            'tokens' => $tokens,
            'notification' => $notification->toArray(),
            'data' => $data,
            'schedule_time' => $scheduleTime->getTimestamp()], $scheduleTime);

        // ActionJob::dispatch(...) invece di onQueue()->execute(...): il docblock
        // `@return static` di QueueableAction::onQueue() e' impreciso (ritorna una
        // classe anonima, non $this), PHPStan crede che ->execute() richiami di
        // nuovo il nostro metodo (void) e boccia ->delay() su null. Dispatchable::
        // dispatch() di Laravel e' tipizzato correttamente e supporta ->delay().
        ActionJob::dispatch(app(SendScheduledPushNotificationAction::class), [$jobId])
            ->delay($scheduleTime);

        return $jobId;
    }
}
