<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Modules\Notify\Filament\Resources\ContactResource\Pages\EditContact;

final class EditContactTestProxy extends EditContact
{
    /** @return array<string, mixed> */
    public function exposedHeaderActions(): array
    {
        return $this->getHeaderActions();
    }
}
