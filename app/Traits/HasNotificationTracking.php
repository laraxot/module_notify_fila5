<?php

declare(strict_types=1);

namespace Modules\Notify\Traits;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

use function Safe\preg_replace_callback;

/** @phpstan-ignore trait.unused */
trait HasNotificationTracking
{
    /**
     * Aggiunge il pixel di tracking a un contenuto HTML.
     *
     * @param  string  $html  Il contenuto HTML
     * @param  string  $trackingId  ID per il tracking
     */
    protected function addTrackingPixel(string $html, string $trackingId): string
    {
        if (! config('notify.tracking.enabled') || ! config('notify.tracking.pixel.enabled')) {
            return $html;
        }

        $route = route(Config::string('notify.tracking.pixel.route'), ['id' => $trackingId]);
        $pixel = '<img src="'.$route.'" alt="" width="1" height="1" style="display:none">';

        return $html.$pixel;
    }

    /**
     * Aggiunge il tracking ai link in un contenuto HTML.
     *
     * @param  string  $html  Il contenuto HTML
     * @param  string  $trackingId  ID per il tracking
     */
    protected function addLinkTracking(string $html, string $trackingId): string
    {
        if (! config('notify.tracking.enabled') || ! config('notify.tracking.links.enabled')) {
            return $html;
        }

        $result = preg_replace_callback(
            '/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/i',
            // Il `@param` su una closure passata come argomento non viene applicato
            // da PHPStan: i gruppi restano `mixed`. Si normalizza con la Cast Action
            // di progetto, che è la conversione canonica e non un cast di comodo.
            function (array $matches) use ($trackingId): string {
                $original = SafeStringCastAction::cast($matches[0] ?? '');
                $url = SafeStringCastAction::cast($matches[2] ?? '');

                // Ignora link di unsubscribe, anchor e link relativi
                if (
                    Str::contains($url, ['unsubscribe', 'mailto:', 'tel:', '#']) ||
                        ! Str::startsWith($url, ['http://', 'https://'])
                ) {
                    return $original;
                }

                $trackingUrl = route(Config::string('notify.tracking.links.route'), [
                    'id' => $trackingId,
                    'url' => $url,
                ]);

                return str_replace($url, $trackingUrl, $original);
            },
            $html,
        );

        return $result ?? $html;
    }

    /**
     * Aggiunge il tracking completo (pixel + link) a un contenuto HTML.
     *
     * @param  string  $html  Il contenuto HTML
     * @param  string  $trackingId  ID per il tracking
     */
    protected function addTracking(string $html, string $trackingId): string
    {
        $html = $this->addLinkTracking($html, $trackingId);

        return $this->addTrackingPixel($html, $trackingId);
    }

    /**
     * Genera un ID univoco per il tracking.
     */
    protected function generateTrackingId(): string
    {
        return (string) Str::uuid();
    }

    /**
     * Verifica se il tracking è abilitato.
     */
    protected function isTrackingEnabled(): bool
    {
        return (bool) config('notify.tracking.enabled', false);
    }

    /**
     * Verifica se il tracking dei pixel è abilitato.
     */
    protected function isPixelTrackingEnabled(): bool
    {
        return $this->isTrackingEnabled() && (bool) config('notify.tracking.pixel.enabled', false);
    }

    /**
     * Verifica se il tracking dei link è abilitato.
     */
    protected function isLinkTrackingEnabled(): bool
    {
        return $this->isTrackingEnabled() && (bool) config('notify.tracking.links.enabled', false);
    }
}
