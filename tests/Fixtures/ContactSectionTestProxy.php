<?php

declare(strict_types=1);

namespace Tests\Modules\Notify\Fixtures;

use Modules\Notify\Filament\Forms\Components\ContactSection;

final class ContactSectionTestProxy extends ContactSection
{
    /** @return array<int|string, mixed> */
    public function exposedFormSchema(): array
    {
        return $this->getFormSchema();
    }
}
