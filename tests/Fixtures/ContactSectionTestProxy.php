<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

use Filament\Forms\Components\TextInput;
use Modules\Notify\Filament\Forms\Components\ContactSection;

final class ContactSectionTestProxy extends ContactSection
{
    /** @return array<int|string, TextInput> */
    public function exposedFormSchema(): array
    {
        return $this->getFormSchema();
    }
}
