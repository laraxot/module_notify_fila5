<?php

declare(strict_types=1);

namespace Modules\Notify\Traits;

<<<<<<< HEAD
use Filament\Facades\Filament;
=======
>>>>>>> 929ed821d (.)
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Notify\Models\NotificationLog;
<<<<<<< HEAD
=======
use Modules\Tenant\Services\TenantManager;
>>>>>>> 929ed821d (.)

trait HasTenantNotifications
{
    /**
     * Ottiene tutte le notifiche per il tenant corrente.
<<<<<<< HEAD
     *
     * @return MorphMany<NotificationLog, $this>
     */
    public function notifications(): MorphMany
    {
        return $this->tenantNotificationLogs();
=======
     */
    public function notifications(): MorphMany
    {
        return $this->morphMany(NotificationLog::class, 'notifiable')->where('tenant_id', $this->getTenantId());
>>>>>>> 929ed821d (.)
    }

    /**
     * Ottiene le notifiche non lette per il tenant corrente.
<<<<<<< HEAD
     *
     * @return MorphMany<NotificationLog, $this>
     */
    public function unreadNotifications(): MorphMany
    {
        return $this->tenantNotificationLogs()->whereNull('read_at');
=======
     */
    public function unreadNotifications(): MorphMany
    {
        return $this->notifications()->whereNull('read_at');
>>>>>>> 929ed821d (.)
    }

    /**
     * Ottiene le notifiche lette per il tenant corrente.
<<<<<<< HEAD
     *
     * @return MorphMany<NotificationLog, $this>
     */
    public function readNotifications(): MorphMany
    {
        return $this->tenantNotificationLogs()->whereNotNull('read_at');
=======
     */
    public function readNotifications(): MorphMany
    {
        return $this->notifications()->whereNotNull('read_at');
>>>>>>> 929ed821d (.)
    }

    /**
     * Scope per filtrare le notifiche per tenant.
<<<<<<< HEAD
     *
     * @param  Builder<static>  $query
     * @return Builder<static>
=======
>>>>>>> 929ed821d (.)
     */
    public function scopeForTenant(Builder $query, ?string $tenantId = null): Builder
    {
        $tenantId ??= $this->getTenantId();

        return $query->where('tenant_id', $tenantId);
    }

    /**
     * Verifica se il modello appartiene al tenant specificato.
     */
    public function belongsToTenant(string $tenantId): bool
    {
        return $this->tenant_id === $tenantId;
    }

    /**
     * Verifica se il modello appartiene al tenant corrente.
     */
    public function belongsToCurrentTenant(): bool
    {
<<<<<<< HEAD
        $currentTenantId = $this->getTenantId();

        return $currentTenantId !== null && $this->belongsToTenant($currentTenantId);
=======
        return $this->belongsToTenant($this->getTenantId());
>>>>>>> 929ed821d (.)
    }

    /**
     * Boot del trait.
     */
    public static function bootHasTenantNotifications(): void
    {
        static::creating(function (Model $model): void {
<<<<<<< HEAD
            if (! $model instanceof static) {
                return;
            }

=======
>>>>>>> 929ed821d (.)
            if (! isset($model->tenant_id)) {
                $model->tenant_id = $model->getTenantId();
            }
        });

        static::addGlobalScope('tenant', function (Builder $builder): void {
<<<<<<< HEAD
            $model = $builder->getModel();

            if (! $model instanceof static) {
                return;
            }

            $tenantId = $model->getTenantId();

            if ($tenantId !== null) {
                $builder->where($model->getTable().'.tenant_id', $tenantId);
            }
=======
            /** @var Model $model */
            $model = $builder->getModel();
            $builder->where($model->getTable().'.tenant_id', $model->getTenantId());
>>>>>>> 929ed821d (.)
        });
    }

    /**
<<<<<<< HEAD
     * Relazione morph verso NotificationLog filtrata per tenant corrente.
     *
     * @return MorphMany<NotificationLog, $this>
     */
    protected function tenantNotificationLogs(): MorphMany
    {
        return $this->morphMany(NotificationLog::class, 'notifiable')->where('tenant_id', $this->getTenantId());
    }

    /**
=======
>>>>>>> 929ed821d (.)
     * Ottiene l'ID del tenant corrente.
     */
    protected function getTenantId(): ?string
    {
<<<<<<< HEAD
        try {
            $tenant = Filament::getTenant();
        } catch (\Throwable) {
            return null;
        }

        if ($tenant === null) {
            return null;
        }

        $key = $tenant->getKey();

        return $key === null ? null : (string) $key;
=======
        /** @var TenantManager */
        $tenantManager = app(TenantManager::class);

        return $tenantManager->getTenantId();
>>>>>>> 929ed821d (.)
    }
}
