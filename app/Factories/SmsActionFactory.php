<?php

declare(strict_types=1);

namespace Modules\Notify\Factories;

use Exception;
use Illuminate\Support\Facades\Config;
<<<<<<< HEAD
use Illuminate\Support\Facades\Log;
use Modules\Notify\Contracts\SMS\SmsActionContract;
=======
use Modules\Notify\Actions\SMS\SendAgiletelecomSMSAction;
use Modules\Notify\Actions\SMS\SendGammuSMSAction;
use Modules\Notify\Actions\SMS\SendNetfunSMSAction;
use Modules\Notify\Actions\SMS\SendNexmoSMSAction;
use Modules\Notify\Actions\SMS\SendPlivoSMSAction;
use Modules\Notify\Actions\SMS\SendSmsFactorSMSAction;
use Modules\Notify\Actions\SMS\SendTwilioSMSAction;
use Modules\Notify\Models\Contracts\SmsActionContract;
>>>>>>> laraxot/dev

/**
 * Factory per la creazione di azioni SMS.
 *
<<<<<<< HEAD
 * Questa factory centralizza la logica di selezione del driver SMS
 * e la creazione dell'azione corrispondente, seguendo il pattern di risoluzione dinamica
 * delle classi basato su convenzioni di naming.
=======
 * Mappa esplicita driver → `Send{Provider}SMSAction`. Il driver arriva da
 * `SmsChannel` (override per-notifica via `getProvider()`) o, in mancanza, da
 * `config('sms.default')` (env `SMS_DRIVER`).
 *
 * Niente risoluzione per convenzione di naming: `ucfirst('smsfactor')` dava
 * `SendSmsfactorSMSAction` (classe inesistente, la vera è
 * `SendSmsFactorSMSAction`), quindi la factory era di fatto rotta proprio sul
 * driver di default — vedi
 * `Modules/Notify/docs/wiki/concepts/sms-channel-driver-selection.md`.
>>>>>>> laraxot/dev
 */
class SmsActionFactory
{
    /**
<<<<<<< HEAD
     * Lista dei provider SMS supportati ufficialmente.
     *
     * Questa lista serve come documentazione e validazione
     * per garantire che i provider utilizzati siano quelli supportati.
     *
     * @var array<string>
     */
    /** @var list<string> */
    protected array $supportedDrivers = [
        'smsfactor'];

    /** @var array<string, string> */
    protected array $driverAliases = [
        'smsfac' => 'smsfactor'];

    /**
     * Crea un'azione SMS basata sul driver specificato o su quello predefinito.
     * Utilizza una risoluzione dinamica delle classi basata sulla convenzione di naming
     * per istanziare l'action corretta.
     *
     * @param  string|null  $driver  Driver SMS da utilizzare (se null, viene utilizzato quello predefinito)
     * @return SmsActionContract Azione SMS corrispondente al driver
     *
     * @throws Exception Se il driver specificato non è supportato o la classe non esiste
     */
    public function create(?string $driver = null): SmsActionContract
    {
        $driver ??= Config::get('sms.default', 'smsfactor');

        // Normalizza il nome del driver e assicura formato camelCase
        $normalizedDriver = $this->normalizeDriverName(is_string($driver) ? $driver : '');

        // Avvisa per driver non standard
        if (! in_array($normalizedDriver, $this->supportedDrivers, strict: true)) {
            Log::warning('Attempting to use non-standard SMS driver: '.(is_string($driver) ? $driver : ''));
        }

        // Costruisci il nome della classe seguendo la convenzione
        $className = 'Modules\\Notify\\Actions\\SMS\\Send'.ucfirst($normalizedDriver).'SMSAction';

        // Verifica se la classe esiste
        if (! class_exists($className)) {
            Log::error('SMS driver class not found', [
                'driver' => $driver,
                'normalized' => $normalizedDriver,
                'className' => $className]);

            throw new Exception(
                'Unsupported SMS driver: '.(is_string($driver) ? $driver : '').". Class {$className} not found.",
=======
     * @var array<string, class-string<SmsActionContract>>
     */
    protected array $driverActions = [
        'smsfactor' => SendSmsFactorSMSAction::class,
        'netfun' => SendNetfunSMSAction::class,
        'twilio' => SendTwilioSMSAction::class,
        'nexmo' => SendNexmoSMSAction::class,
        'plivo' => SendPlivoSMSAction::class,
        'gammu' => SendGammuSMSAction::class,
        'agiletelecom' => SendAgiletelecomSMSAction::class];

    /** @var array<string, string> */
    protected array $driverAliases = [
        'smsfac' => 'smsfactor',
        'vonage' => 'nexmo'];

    /**
     * Crea l'azione SMS per il driver dato (o quello di `config('sms.default')`).
     *
     * @param  string|null  $driver  se null, `config('sms.default')`
     *
     * @throws Exception se il driver non ha una action mappata
     */
    public function create(?string $driver = null): SmsActionContract
    {
        $configDefault = Config::get('sms.default', 'smsfactor');
        $driver ??= \is_string($configDefault) ? $configDefault : 'smsfactor';

        $key = $this->normalizeDriverName($driver);
        $className = $this->driverActions[$key] ?? null;

        if ($className === null) {
            throw new Exception(
                "Unsupported SMS driver [{$key}]. Aggiungerlo a ".self::class.'::$driverActions.',
>>>>>>> laraxot/dev
            );
        }

        $instance = app($className);

<<<<<<< HEAD
        // Verifica che l'istanza implementi l'interfaccia corretta
        if (! ($instance instanceof SmsActionContract)) {
=======
        if (! $instance instanceof SmsActionContract) {
>>>>>>> laraxot/dev
            throw new Exception("Class {$className} does not implement SmsActionContract.");
        }

        return $instance;
    }

    /**
<<<<<<< HEAD
     * Normalizza il nome del driver eliminando trattini e underscore
     * e gestendo eventuali casi speciali/alias.
     *
     * @param  string  $driver  Nome del driver da normalizzare
     * @return string Nome normalizzato
     */
    private function normalizeDriverName(string $driver): string
    {
        // Rimuovi trattini e underscore
        $normalized = str_replace(['-', '_', ' '], '', strtolower($driver));

        // Gestisci casi speciali e alias tramite la mappa di alias
=======
     * Normalizza il nome del driver (minuscolo, senza trattini/underscore/spazi)
     * e risolve eventuali alias.
     */
    private function normalizeDriverName(string $driver): string
    {
        $normalized = str_replace(['-', '_', ' '], '', strtolower($driver));

>>>>>>> laraxot/dev
        return $this->driverAliases[$normalized] ?? $normalized;
    }
}
