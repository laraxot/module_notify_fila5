<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationLogResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationLogResource;
use Modules\Notify\Filament\Resources\NotificationLogResource\Schemas\NotificationLogInfolist;
=======
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationLogResource;
use Modules\Notify\Filament\Resources\NotificationLogResource\Schemas\NotificationLogInfolist;
=======
use Modules\Notify\Filament\Resources\NotificationLogResource;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewNotificationLog extends XotBaseViewRecord
{
    protected static string $resource = NotificationLogResource::class;
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev

    /**
     * @return array<string, Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(NotificationLogInfolist::class)->getInfolistSchema();
    }
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
}
