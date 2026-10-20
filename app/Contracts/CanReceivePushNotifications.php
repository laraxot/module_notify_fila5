<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Illuminate\Support\Collection;

/**
 * phpstan-require-extends Model.
 */
interface CanReceivePushNotifications
{
    /**
     * @return Collection<int, string>
     */
    public function getMobileDeviceTokens(): Collection;

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed Come `Illuminate\Database\Eloquent\Model::getKey()`: chiave int|string, tipo dichiarato dal framework
     */
    public function getKey();
}
