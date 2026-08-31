<?php

declare(strict_types=1);

namespace Modules\Notify\Tests\Fixtures;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======
>>>>>>> a988596b (first)
use Modules\Notify\Filament\Resources\NotificationResource\Pages\ViewNotification;

final class ViewNotificationTestProxy extends ViewNotification
{
<<<<<<< HEAD
<<<<<<< HEAD
    /** @return array<int, Component> */
    public function exposedInfolistSchema(): array
    {
        /** @var array<int, Component> $schema */
=======
=======
>>>>>>> a988596b (first)
    /** @return array<int, mixed> */
    public function exposedInfolistSchema(): array
    {
        /** @var array<int, mixed> $schema */
<<<<<<< HEAD
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======
>>>>>>> a988596b (first)
        $schema = $this->getInfolistSchema();

        return $schema;
    }
}
