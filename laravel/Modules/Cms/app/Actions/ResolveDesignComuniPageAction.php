<?php

declare(strict_types=1);

namespace Modules\Cms\Actions;

use Spatie\QueueableAction\QueueableAction;

final class ResolveDesignComuniPageAction
{
    use QueueableAction;

    /**
     * @return array{source:string, slug:string, source_path:string}|null
     */
    public function execute(string $slug): ?array
    {
        $theme = config('xra.pub_theme', 'Sixteen');

        if (! is_string($theme) || $theme === '') {
            $theme = 'Sixteen';
        }

        $base = base_path('Themes/'.$theme.'/Main_files');

        // 1. Tailwind version (five/) — preferred
        $tailwindPath = $base.'/five/'.$slug.'.html';

        if (is_file($tailwindPath)) {
            return ['source' => 'tailwind', 'slug' => $slug, 'source_path' => $tailwindPath];
        }

        // 2. Static HTML snapshots
        foreach (['design-comuni-pages/sito', 'design-comuni-html/dist/sito', 'design-comuni-html/dist/servizi'] as $section) {
            $path = $base.'/'.$section.'/'.$slug.'.html';

            if (is_file($path)) {
                return ['source' => 'static', 'slug' => $slug, 'source_path' => $path];
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

        if (! is_string($html) || $html === '') {
            return null;
        }

        return $resolved['source'] === 'tailwind'
            ? $this->rewriteTailwindHtml($html, $locale)
            : $this->rewriteStaticHtml($html, $locale);
    }

    /** Tailwind pages: replace dev CSS path with production Vite asset. */
    private function rewriteTailwindHtml(string $html, string $locale): string
    {
        $cssUrl = $this->resolveViteAsset('resources/css/app.css');
        $jsUrl = $this->resolveViteAsset('resources/js/app.js');

        if ($cssUrl !== '') {
            $html = str_replace(
                ['href="/src/style-apply.css"', 'href="./src/style-apply.css"', 'href="../src/style-apply.css"'],
                'href="'.$cssUrl.'"',
                $html,
            );
        }

        if ($jsUrl !== '') {
            $html = str_replace(
                ['src="/src/app.js"', 'src="./src/app.js"'],
                'src="'.$jsUrl.'"',
                $html,
            );
        }

        return $this->rewriteInternalLinks($html, $locale);
    }

    /** Static CDN pages: strip CDN Bootstrap Italia, inject Vite compiled assets. */
    private function rewriteStaticHtml(string $html, string $locale): string
    {
        $cssUrl = $this->resolveViteAsset('resources/css/app.css');
        $jsUrl = $this->resolveViteAsset('resources/js/app.js');

        // Strip CDN Bootstrap Italia CSS/JS
        $html = (string) preg_replace('/<link[^>]*bootstrap-italia[^>]*>\n?/i', '', $html);
        $html = (string) preg_replace('/<link[^>]*bootstrap-italia-comuni[^>]*>\n?/i', '', $html);
        $html = (string) preg_replace('/<script[^>]*bootstrap-italia[^>]*>.*?<\/script>\n?/is', '', $html);
        $html = (string) preg_replace('/<script[^>]*scripts\.js[^>]*>.*?<\/script>\n?/is', '', $html);
        $html = (string) preg_replace('/<script>\s*bootstrap\.loadFonts[^<]*<\/script>\n?/i', '', $html);

        // Inject our Vite compiled CSS/JS before </head>
        $inject = '';

        if ($cssUrl !== '') {
            $inject .= "\n  <link rel=\"stylesheet\" href=\"{$cssUrl}\">";
        }

        if ($jsUrl !== '') {
            $inject .= "\n  <script src=\"{$jsUrl}\" defer></script>";
        }

        if ($inject !== '') {
            $html = str_replace('</head>', $inject."\n</head>", $html);
        }

        return $this->rewriteInternalLinks($html, $locale);
    }

    /** Rewrite .html links to /locale/tests/{slug} paths. */
    private function rewriteInternalLinks(string $html, string $locale): string
    {
        $testsBase = '/'.trim($locale, '/').'/tests';

        return (string) preg_replace_callback(
            '/\bhref="([^"]+\.html)"/',
            static function (array $matches) use ($testsBase): string {
                $href = $matches[1];

                if (str_starts_with($href, 'http://') || str_starts_with($href, 'https://')) {
                    return $matches[0];
                }

                $target = pathinfo($href, PATHINFO_FILENAME);

                if (! is_string($target) || $target === '') {
                    return $matches[0];
                }

                return 'href="'.$testsBase.'/'.$target.'"';
            },
            $html,
        ) ?? $html;
    }

    /** Read asset URL from served Vite manifest (public/themes/{theme}/manifest.json). */
    private function resolveViteAsset(string $entryKey): string
    {
        $theme = config('xra.pub_theme', 'Sixteen');

        if (! is_string($theme) || $theme === '') {
            $theme = 'Sixteen';
        }

        $manifestPath = public_path('themes/'.$theme.'/manifest.json');

        if (! is_file($manifestPath)) {
            return '';
        }

        $raw = file_get_contents($manifestPath);

        if (! is_string($raw)) {
            return '';
        }

        /** @var array<string, array{file: string}> $manifest */
        $manifest = json_decode($raw, true);

        if (! is_array($manifest) || ! isset($manifest[$entryKey]['file'])) {
            return '';
        }

        return '/themes/'.$theme.'/'.$manifest[$entryKey]['file'];
    }
}
