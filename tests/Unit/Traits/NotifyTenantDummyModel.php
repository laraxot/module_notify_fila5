<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Unit\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Notify\Models\NotificationLog;
use Modules\Notify\Traits\HasTenantNotifications;

/**
 * Test double per `HasTenantNotifications`.
 *
 * Punta alla tabella reale `notification_logs` perche' il trait ne deriva la relazione
 * morph: un nome di tabella inventato farebbe passare il test senza provare nulla.
 */
final class NotifyTenantDummyModel extends Model
{
    use HasTenantNotifications;

    protected $table = 'notification_logs';

    public ?string $tenant_id = null;

    /**
     * @return MorphMany<NotificationLog, $this>
     */
    protected function tenantNotificationLogs(): MorphMany
    {
        return $this->morphMany(NotificationLog::class, 'notifiable');
    }
}
