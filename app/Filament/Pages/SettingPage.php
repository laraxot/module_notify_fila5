<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Pages;

use Filament\Forms\Components\Toggle;
use Filament\Widgets\WidgetConfiguration;
use Modules\Xot\Filament\Pages\BaseSettingPage;
use Modules\Xot\Filament\Widgets\EnvWidget;

/**
 * Impostazioni operative Notify: configurazione tenant tramite BaseSettingPage
 * e valori infrastrutturali/segreti del file `.env` tramite EnvWidget.
 * I due percorsi restano distinti: i segreti non vengono copiati nella config tenant.
 */
class SettingPage extends BaseSettingPage
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected string $view = 'notify::filament.pages.setting';

    /**
     * Notify non espone configurazioni di dominio editabili per tenant.
     * EnvWidget conserva la gestione delle sole chiavi environment selezionate.
     *
     * @return array<string, Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled')->default(true),
            'log_notifications' => Toggle::make('log_notifications')->default(true),
        ];
    }

    /**
     * @return list<WidgetConfiguration>
     */
    public function getHeaderWidgets(): array
    {
        $only = [
            'debugbar_enabled',
            // 'google_maps_api_key',
            'telegram_bot_token',
            'sms_driver',
            'netfun_token',
            'mail_mailer',
            'mail_host',
            'mail_port',
            'mail_encryption',
            'mail_username',
            'mail_password',
            'mail_from_address',
            'mail_from_name',
        ];

        return [
            EnvWidget::make(['only' => $only]),
        ];
    }
}
