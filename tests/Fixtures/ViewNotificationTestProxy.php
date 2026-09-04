<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

use Filament\Schemas\Components\Component;
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ViewNotification;

final class ViewNotificationTestProxy extends ViewNotification
{
    /** @return array<int, Component> */
    public function exposedInfolistSchema(): array
    {
        /** @var array<int, Component> $schema */
        $schema = $this->getInfolistSchema();

        return $schema;
    }
}
