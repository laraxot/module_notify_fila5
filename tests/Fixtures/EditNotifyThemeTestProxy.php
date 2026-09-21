<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

<<<<<<< HEAD
=======
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
use Modules\Notify\Filament\Resources\NotifyThemeResource\Pages\EditNotifyTheme;

final class EditNotifyThemeTestProxy extends EditNotifyTheme
{
<<<<<<< HEAD
    /** @return array<string, mixed> */
=======
<<<<<<< HEAD
    /** @return array<string, Action|ActionGroup> */
=======
    /** @return array<string, mixed> */
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
    public function exposedHeaderActions(): array
    {
        return $this->getHeaderActions();
    }
}
