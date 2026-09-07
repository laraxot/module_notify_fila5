<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

<<<<<<< HEAD
use Filament\Actions\Action;
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
use Modules\Notify\Filament\Resources\MailTemplateResource\Pages\PreviewMailTemplate;

final class PreviewMailTemplateTestProxy extends PreviewMailTemplate
{
<<<<<<< HEAD
    /** @return array<int, Action> */
    public function exposedHeaderActions(): array
    {
        /** @var array<int, Action> $actions */
=======
    /** @return array<int, mixed> */
    public function exposedHeaderActions(): array
    {
        /** @var array<int, mixed> $actions */
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        $actions = $this->getHeaderActions();

        return $actions;
    }
}
