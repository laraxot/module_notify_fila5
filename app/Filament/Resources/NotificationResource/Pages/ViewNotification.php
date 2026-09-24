<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationResource\Pages;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationResource\Schemas\NotificationInfolist;
=======
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationResource;
use Modules\Notify\Filament\Resources\NotificationResource\Schemas\NotificationInfolist;
=======
use Modules\Notify\Filament\Resources\NotificationResource;
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewNotification extends XotBaseViewRecord
{
    protected static string $resource = NotificationResource::class;
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
        return app(NotificationInfolist::class)->getInfolistSchema();
    }
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
}
