<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\EditNotifyTheme;

final class EditNotifyThemeTestProxy extends EditNotifyTheme
{
    /** @return array<string, Action|ActionGroup> */
    public function exposedHeaderActions(): array
    {
        return $this->getHeaderActions();
    }
}
