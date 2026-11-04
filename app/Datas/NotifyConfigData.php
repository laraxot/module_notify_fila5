<?php

declare(strict_types=1);

namespace Modules\Notify\Datas;

use Modules\Notify\Filament\Pages\SettingPage;
use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/**
 * Impostazioni di Notify (`config/{tenant}/notify.php`).
 *
 * Vuota di proposito: la pagina esistente legge e salva solo le chiavi dichiarate qui. Nessuna
 * chiave viene aggiunta ai config tenant finche' non servira' un campo.
 *
 * @see SettingPage
 */
class NotifyConfigData extends Data
{
    use MakesFromTenantConfig;

    public bool $enabled = true;
}
