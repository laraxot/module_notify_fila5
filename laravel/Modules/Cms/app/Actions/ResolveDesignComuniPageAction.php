<?php

declare(strict_types=1);

namespace Modules\Cms\Actions;

use Spatie\QueueableAction\QueueableAction;

final class ResolveDesignComuniPageAction
{
    use QueueableAction;

    /**
     * @return array{asset_base:string, section:string, slug:string, source_path:string}|null
     */
    public function execute(string $slug): ?array
    {
        $theme = config('xra.pub_theme', 'Sixteen');

        if (! is_string($theme) || '' === $theme) {
            $theme = 'Sixteen';
        }

        $root = base_path('Themes/' . $theme . '/resources/design-comuni/dist');

        foreach (['sito', 'servizi'] as $section) {
            $path = $root . '/' . $section . '/' . $slug . '.html';

            if (is_file($path)) {
                return [
                    'asset_base' => '/themes/' . $theme . '/design-comuni/assets',
                    'section' => $section,
                    'slug' => $slug,
                    'source_path' => $path,
                ];
            }
        }

        return null;
    }

    public function render(string $slug, string $locale = 'it'): ?string
    {
        $resolved = $this->execute($slug);

        if (! is_array($resolved)) {
            return null;
        }

        $html = file_get_contents($resolved['source_path']);

        if (! is_string($html) || '' === $html) {
            return null;
        }

        return $this->rewriteHtml($html, $locale, $resolved['asset_base']);
    }

    private function rewriteHtml(string $html, string $locale, string $assetBase): string
    {
        $testsBase = '/' . trim($locale, '/') . '/tests';

        $html = str_replace(['../assets/', './assets/'], $assetBase . '/', $html);

        $html = (string) preg_replace_callback(
            '/\bhref="([^"]+\.html)"/',
            static function (array $matches) use ($testsBase): string {
                $href = $matches[1];

                if (str_starts_with($href, 'http://') || str_starts_with($href, 'https://')) {
                    return $matches[0];
                }

                $target = pathinfo($href, PATHINFO_FILENAME);

                if (! is_string($target) || '' === $target) {
                    return $matches[0];
                }

                return 'href="' . $testsBase . '/' . $target . '"';
            },
            $html,
        ) ?? $html;

        return $html;
    }
}
