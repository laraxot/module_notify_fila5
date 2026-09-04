<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

use Filament\Actions\Action;
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\PreviewMailTemplate;

final class PreviewMailTemplateTestProxy extends PreviewMailTemplate
{
    /** @return array<int, Action> */
    public function exposedHeaderActions(): array
    {
        /** @var array<int, Action> $actions */
        $actions = $this->getHeaderActions();

        return $actions;
    }
}
