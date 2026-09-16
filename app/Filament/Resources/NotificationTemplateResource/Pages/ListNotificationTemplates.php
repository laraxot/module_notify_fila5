<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Resources\NotificationTemplateResource\Pages;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Layout\Component as LayoutComponent;
=======
>>>>>>> laraxot/dev
use Modules\Notify\Filament\Resources\NotificationTemplateResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListNotificationTemplates extends XotBaseListRecords
{
    protected static string $resource = NotificationTemplateResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, Column|LayoutComponent>
     */
    public static function notificationTemplateTableColumns(): array
    {
        return [];
    }
=======
>>>>>>> laraxot/dev
}
