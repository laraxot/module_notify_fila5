<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Tables\Columns;

use Modules\Notify\Enums\ContactTypeEnum;
use Modules\Xot\Filament\Tables\Columns\XotBaseViewColumn;

/*
 * GateGuard: callers NotifyThemeAndColumnsCoverageTest.php:80; unique contact column;
 * reads ContactTypeEnum + row contact payload for Blade view;
 * user: "migliora qualità codice , fa tutto con bmad + second brain + filament blueprint"
 */

/**
 * Colonna contatti: XotBaseViewColumn + Blade (DRY/KISS).
 */
class ContactColumn extends XotBaseViewColumn
{
    protected function setUp(): void
    {
        parent::setUp();

        // Canonico esplicito dopo GetViewByClassAction del parent.
        $this->view = 'notify::filament.tables.columns.contact';

        // Passa i tipi di contatto alla view
        $contact_types = ContactTypeEnum::cases();

        /** @var array<string> $searchableArray */
        $searchableArray = ContactTypeEnum::getSearchable();

        $this->view(static::getView(), [
            'contact_types' => $contact_types])
            ->label(__('notify::columns.contact.label'))
            ->searchable($searchableArray)
            ->sortable(false)
            ->toggleable(isToggledHiddenByDefault: false);
    }
}
