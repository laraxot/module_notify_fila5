<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Modules\Notify\Filament\Resources\ContactResource\Pages\EditContact;

final class EditContactTestProxy extends EditContact
{
    /** @return array<string, Action|ActionGroup> */
    public function exposedHeaderActions(): array
    {
        return $this->getHeaderActions();
    }
}
