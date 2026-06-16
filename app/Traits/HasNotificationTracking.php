<?php

declare(strict_types=1);

namespace Modules\Notify\Traits;

use Illuminate\Support\Str;

<<<<<<< HEAD
use function Safe\preg_replace_callback;

=======
>>>>>>> 929ed821d (.)
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

<<<<<<< HEAD
        $route = route((string) config('notify.tracking.pixel.route'), ['id' => $trackingId]);
=======
        $route = route(config('notify.tracking.pixel.route'), ['id' => $trackingId]);
>>>>>>> 929ed821d (.)
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

<<<<<<< HEAD
        $result = preg_replace_callback(
            '/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/i',
            function (array $matches) use ($trackingId): string {
                $url = (string) $matches[2];
=======
        return preg_replace_callback(
            '/<a\s+(?:[^>]*?\s+)?href=(["\'])(.*?)\1/i',
            function ($matches) use ($trackingId) {
                $url = $matches[2];
>>>>>>> 929ed821d (.)

                // Ignora link di unsubscribe, anchor e link relativi
                if (
                    Str::contains($url, ['unsubscribe', 'mailto:', 'tel:', '#']) ||
                        ! Str::startsWith($url, ['http://', 'https://'])
                ) {
<<<<<<< HEAD
                    return (string) $matches[0];
                }

                $trackingUrl = route((string) config('notify.tracking.links.route'), [
=======
                    return $matches[0];
                }

                $trackingUrl = route(config('notify.tracking.links.route'), [
>>>>>>> 929ed821d (.)
                    'id' => $trackingId,
                    'url' => $url,
                ]);

<<<<<<< HEAD
                return str_replace($url, $trackingUrl, (string) $matches[0]);
            },
            $html,
        );

        return $result ?? $html;
=======
                return str_replace($url, $trackingUrl, $matches[0]);
            },
            $html,
        );
>>>>>>> 929ed821d (.)
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
<<<<<<< HEAD
        return (bool) config('notify.tracking.enabled', false);
=======
        return config('notify.tracking.enabled', false);
>>>>>>> 929ed821d (.)
    }

    /**
     * Verifica se il tracking dei pixel è abilitato.
     */
    protected function isPixelTrackingEnabled(): bool
    {
<<<<<<< HEAD
        return $this->isTrackingEnabled() && (bool) config('notify.tracking.pixel.enabled', false);
=======
        return $this->isTrackingEnabled() && config('notify.tracking.pixel.enabled', false);
>>>>>>> 929ed821d (.)
    }

    /**
     * Verifica se il tracking dei link è abilitato.
     */
    protected function isLinkTrackingEnabled(): bool
    {
<<<<<<< HEAD
        return $this->isTrackingEnabled() && (bool) config('notify.tracking.links.enabled', false);
=======
        return $this->isTrackingEnabled() && config('notify.tracking.links.enabled', false);
>>>>>>> 929ed821d (.)
    }
}
