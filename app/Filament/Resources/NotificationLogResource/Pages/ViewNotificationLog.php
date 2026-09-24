<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationLogResource\Pages;

use Modules\Notify\Filament\Resources\NotificationLogResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Notify\Filament\Resources\NotificationLogResource\Schemas\NotificationLogInfolist;

class ViewNotificationLog extends XotBaseViewRecord
{
    protected static string $resource = NotificationLogResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(NotificationLogInfolist::class)->getInfolistSchema();
    }
}
