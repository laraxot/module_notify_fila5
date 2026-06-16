<?php

declare(strict_types=1);

namespace Modules\Notify\Traits;

use Illuminate\Cache\RateLimiter;

trait HasNotificationRateLimiting
{
    /**
     * Verifica se l'invio della notifica è consentito dal rate limiting.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     */
    protected function shouldSendNotification(string $key): bool
    {
        if (! config('notify.rate_limiting.enabled')) {
            return true;
        }

<<<<<<< HEAD
        $maxAttempts = (int) config('notify.rate_limiting.max_attempts', 5);
        $decayMinutes = (int) config('notify.rate_limiting.decay_minutes', 1);
=======
        $maxAttempts = config('notify.rate_limiting.max_attempts', 5);
        $decayMinutes = config('notify.rate_limiting.decay_minutes', 1);
>>>>>>> 929ed821d (.)

        /** @var RateLimiter */
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
        /** @var RateLimiter */
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
<<<<<<< HEAD
        $maxAttempts = (int) config('notify.rate_limiting.max_attempts', 5);
=======
        $maxAttempts = config('notify.rate_limiting.max_attempts', 5);
>>>>>>> 929ed821d (.)

        /** @var RateLimiter */
        $limiter = app(RateLimiter::class);

<<<<<<< HEAD
        return $maxAttempts - (int) $limiter->attempts($key);
=======
        return $maxAttempts - $limiter->attempts($key);
>>>>>>> 929ed821d (.)
    }

    /**
     * Resetta il rate limiting per una chiave specifica.
     *
     * @param  string  $key  Chiave univoca per il rate limiting
     */
    protected function resetNotificationRateLimit(string $key): void
    {
        /** @var RateLimiter */
        $limiter = app(RateLimiter::class);
        $limiter->clear($key);
    }

    /**
     * Genera una chiave univoca per il rate limiting.
     *
     * @param  string  $type  Tipo di notifica
     * @param  mixed  $identifier  Identificatore univoco (es. ID utente)
     */
    protected function getNotificationRateLimitKey(string $type, mixed $identifier): string
    {
<<<<<<< HEAD
        return 'notify:'.$type.':'.(string) $identifier;
=======
        return "notify:{$type}:{$identifier}";
>>>>>>> 929ed821d (.)
    }
}
