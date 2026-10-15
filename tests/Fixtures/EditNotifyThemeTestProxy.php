<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\EditNotifyTheme;

final class EditNotifyThemeTestProxy extends EditNotifyTheme
{
    /** @return array<string, mixed> */
    public function exposedHeaderActions(): array
    {
        return $this->getHeaderActions();
    }
}
