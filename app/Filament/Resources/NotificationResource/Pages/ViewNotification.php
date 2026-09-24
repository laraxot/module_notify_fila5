<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Notify\Filament\Resources\NotificationResource\Schemas\NotificationInfolist;

class ViewNotification extends XotBaseViewRecord
{
    protected static string $resource = NotificationResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(NotificationInfolist::class)->getInfolistSchema();
    }
}
