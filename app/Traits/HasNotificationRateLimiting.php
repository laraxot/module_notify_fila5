<?php

declare(strict_types=1);

namespace Modules\Notify\Traits;

use Illuminate\Cache\RateLimiter;
use Modules\Notify\Datas\NotifyConfigData;
use Webmozart\Assert\Assert;

/**
 * Fornisce funzionalità per la gestione del rate limiting delle notifiche.
 */
trait HasNotificationRateLimiting
{
    /**
     * Verifica se l'invio della notifica è consentito dal rate limiting.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     */
    protected function shouldSendNotification(string $key): bool
    {
        $settings = NotifyConfigData::make();
        if (! $settings->rate_limiting_enabled) {
            return true;
        }

        $maxAttempts = $settings->rate_limiting_max_attempts;
        $decayMinutes = $settings->rate_limiting_decay_minutes;

        $limiter = app(RateLimiter::class);

        if ($limiter->tooManyAttempts($key, $maxAttempts)) {
            return false;
        }

        $limiter->hit($key, $decayMinutes * 60);

        return true;
    }

    /**
     * Ottiene il tempo rimanente prima che il rate limiting si resetti.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     * @return int Secondi rimanenti
     */
    protected function getNotificationRateLimitRetryAfter(string $key): int
    {
        $limiter = app(RateLimiter::class);

        return $limiter->availableIn($key);
    }

    /**
     * Ottiene il numero di tentativi rimanenti per il rate limiting.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     * @return int Tentativi rimanenti
     */
    protected function getNotificationRateLimitRemainingAttempts(string $key): int
    {
        $maxAttempts = NotifyConfigData::make()->rate_limiting_max_attempts;

        $limiter = app(RateLimiter::class);

        // RateLimiter::attempts() legge dalla cache e non dichiara un tipo di ritorno:
        // il valore va ristretto qui, non castato dentro l'espressione aritmetica.
        $attempts = $limiter->attempts($key);
        Assert::integerish($attempts);

        return $maxAttempts - (int) $attempts;
    }

    /**
     * Resetta il rate limiting per una chiave specifica.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     */
    protected function resetNotificationRateLimit(string $key): void
    {
        $limiter = app(RateLimiter::class);
        $limiter->clear($key);
    }

    /**
     * Genera una chiave univoca per il rate limiting.
     *
     * @param  string  $type  Tipo di notifica
     * @param  int|string  $identifier  Identificatore univoco (es. ID utente)
     */
    protected function getNotificationRateLimitKey(string $type, int|string $identifier): string
    {
        return 'notify:'.$type.':'.(string) $identifier;
    }
}
