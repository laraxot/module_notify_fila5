<?php

declare(strict_types=1);

namespace Modules\Notify\Providers\Filament;

use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
>>>>>>> laraxot/dev
=======
use LaraZeus\SpatieTranslatable\SpatieTranslatablePlugin;
>>>>>>> laraxot/dev
use Modules\Xot\Datas\XotData;
use Modules\Xot\Providers\Filament\XotBasePanelProvider;
use Override;

class AdminPanelProvider extends XotBasePanelProvider
{
    protected string $module = 'Notify';
<<<<<<< HEAD
<<<<<<< HEAD

    #[Override]
=======
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
    public function panel(Panel $panel): Panel
    {
        $panel = parent::panel($panel);

<<<<<<< HEAD
<<<<<<< HEAD
        // Temporaneamente commentato per compatibilità Filament 5.x
        // $panel->plugins([
        //     SpatieTranslatablePlugin::make(),
        // ]);
=======
=======
>>>>>>> laraxot/dev
        // Richiesto da MailTemplateResource (estende LangBaseResource → pagine
        // LangBaseListRecords/LangBaseEditRecord). Il pacchetto ufficiale
        // lara-zeus/spatie-translatable 2.0.1 supporta Filament 5 — il vecchio
        // commento "compatibilità Filament 4.x" non è più valido. Stesso pattern
        // di Modules\Lang\Providers\Filament\LangBasePanelProvider.
        $panel->plugins([
            SpatieTranslatablePlugin::make()->defaultLocales(['en', 'it']),
        ]);
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev

        if (! XotData::make()->disable_database_notifications) {
            DatabaseNotifications::trigger('notify::livewire.database-notifications-trigger');
            // DatabaseNotifications::databaseNotificationsPollingInterval('30s');
            DatabaseNotifications::pollingInterval('60s');
            FilamentView::registerRenderHook('panels::user-menu.before', static fn (): string => Blade::render(
                '@livewire(\'database-notifications\')',
            ));
        }

        return $panel;
    }
}
