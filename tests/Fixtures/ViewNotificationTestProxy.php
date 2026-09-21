<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ViewNotification;

final class ViewNotificationTestProxy extends ViewNotification
{
<<<<<<< HEAD
    /** @return array<int, Component> */
    public function exposedInfolistSchema(): array
    {
        /** @var array<int, Component> $schema */
=======
    /** @return array<int, mixed> */
    public function exposedInfolistSchema(): array
    {
        /** @var array<int, mixed> $schema */
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
        $schema = $this->getInfolistSchema();

        return $schema;
    }
}
