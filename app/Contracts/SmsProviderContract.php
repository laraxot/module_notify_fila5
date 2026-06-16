<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Modules\Notify\Datas\SmsData;

/**
 * Interfaccia comune per tutte le azioni di invio SMS.
 * Ogni provider SMS deve implementare questa interfaccia.
 */
interface SmsProviderContract
{
    /**
     * Invia un SMS utilizzando il provider specifico.
     *
     * @param  SmsData  $smsData  I dati del messaggio SMS
<<<<<<< HEAD
     * @return array<string, mixed> Risultato dell'operazione
=======
     * @return array Risultato dell'operazione
>>>>>>> 929ed821d (.)
     */
    public function execute(SmsData $smsData): array;
}
