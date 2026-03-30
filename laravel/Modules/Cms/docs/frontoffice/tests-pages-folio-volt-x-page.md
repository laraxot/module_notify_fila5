# Tests Pages: Folio + Volt + x-page

## Scopo
Documentare il pattern corretto per pagine come `/it/tests/{slug}` quando devono vivere nel tema ma restare dentro il runtime CMS.

## Formula
1. Folio definisce il file route.
2. Volt mantiene solo stato minimo e dati di contesto.
3. `PageSlugMiddleware` garantisce il page slug corretto.
4. `<x-layouts.app>` gestisce header e footer tramite sezioni.
5. `<x-page>` rende i blocchi CMS usando slug e data.

## Regola architetturale
Una pagina test non deve diventare un renderer HTML custom.
Se serve mostrare una pagina tematica, il file Folio passa sempre da `<x-page>` e lo slug CMS diventa la chiave del contenuto.

## JSON first
Per `/it/tests/appuntamento-06-conferma` il runtime deve leggere:
`laravel/config/local/fixcity/database/content/pages/tests.appuntamento-06-conferma.json`

Quel file deve avere:
- `"slug": "tests.appuntamento-06-conferma"`
- almeno un blocco in `content_blocks.it`
- un `data.view` risolvibile dal sistema Blade, per esempio `pub_theme::components.blocks.tests.appuntamento-conferma`

Lo stesso vale per `/it/tests/argomenti` con `tests.argomenti.json`.

## Esempio sintetico
```blade
<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';

    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = ['slug' => $slug];
    }
};
?>
<x-layouts.app>
    @volt('tests.view')
        <div>
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </div>
    @endvolt
</x-layouts.app>
```
