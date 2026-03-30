# Tests Slug Renderer: Volt + Folio + x-page

## Regola
Il file corretto per `/it/tests/{slug}` e`:

- `laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`

## Pattern corretto
Il renderer NON deve leggere HTML raw da `Main_files` e NON deve montare una view dedicata via `@includeIf('pub_theme::design-comuni.pages.'.$slug)`.

Deve invece:
1. usare Folio per la route file-based
2. usare Volt per il component state minimo
3. applicare `PageSlugMiddleware`
4. costruire uno slug CMS derivato: `tests.{slug}`
5. delegare il rendering a `<x-page side="content" :slug="$pageSlug" :data="$data" />`

## Sorgente di verita`
La pagina non nasce da Blade statiche ma dai JSON CMS salvati in:

- `laravel/config/local/fixcity/database/content/pages/`

Esempi reali:
- `laravel/config/local/fixcity/database/content/pages/tests.appuntamento-06-conferma.json`
- `laravel/config/local/fixcity/database/content/pages/tests.argomenti.json`
- `laravel/config/local/fixcity/database/content/pages/tests.servizi-index.json`
- `laravel/config/local/fixcity/database/content/pages/tests.sito-index.json`

Il nodo chiave deve essere coerente con lo slug costruito dalla route:

```json
{
  "slug": "tests.appuntamento-06-conferma"
}
```

Quindi:
- URL `/it/tests/appuntamento-06-conferma`
- route slug `appuntamento-06-conferma`
- page slug `tests.appuntamento-06-conferma`
- JSON letto da `.../pages/tests.appuntamento-06-conferma.json`

## Copertura minima attuale
Il content store locale contiene uno scaffold JSON per tutto il catalogo statico upstream rilevato.

Conteggio validato:
- `86` file `tests*.json`
- `0` mismatch tra nome file e nodo `slug`

Questo e` il baseline corretto per lavorare poi sui blocchi reali pagina per pagina.

## Policy anti-collisione
Quando il basename upstream e` univoco, si usa lo slug puro:
- `argomenti.hbs` -> `tests.argomenti.json`
- `appuntamento-06-conferma.hbs` -> `tests.appuntamento-06-conferma.json`

Quando esistono collisioni di basename tra cartelle diverse, si appiattisce con prefisso folder nel solo slug pubblico:
- `src/pages/index.hbs` -> `tests.index.json`
- `src/pages/sito/index.hbs` -> `tests.sito-index.json`
- `src/pages/servizi/index.hbs` -> `tests.servizi-index.json`

Questo mantiene:
- URL monosegmento sotto `/it/tests/*`
- nessuna ambiguita` nel content store
- nessun bisogno di route annidate aggiuntive

## Perche'
### Logica
`x-page` e` il punto canonico del frontoffice CMS. Concentra recupero blocchi, dati, lato (`content/sidebar`) e composizione finale.

### Visione
Le route pubbliche devono essere entrypoint sottili. Il contenuto vive nel CMS, non nella route e non in template duplicati.

### Filosofia
La pagina Folio e` un contenitore nudo. Nessun parser HTML, nessun include condizionale di viste ad hoc, nessuna duplicazione del dominio contenutistico.

### Politica
Il tema attivo espone il namespace `pub_theme`, ma la politica del repository e` che header/footer siano sezioni CMS e che il contenuto passi da `x-page`.

### Religione
La religione del repository e` DRY + KISS:
- un solo entrypoint dinamico
- una sola pipeline di rendering CMS
- un solo posto dove i contenuti vengono salvati: i JSON

### Zen
La route non “sa” come e` fatta la pagina. Sa solo calcolare lo slug canonico e affidarsi al CMS.

## Struttura corretta
```php
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

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = [
            'slug' => $slug,
        ];
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

## Regola type -> view
Se un blocco ha tipo `tests`, la view deve essere `pub_theme::components.blocks.tests.<blade>`.
Lo stesso principio vale per ogni altra famiglia: `hero -> hero/*`, `services -> services/*`, `cta -> cta/*`.

## Cosa e` sbagliato
- leggere `Main_files/*.html` e stamparli nella route
- usare `@includeIf('pub_theme::design-comuni.pages.'.$slug)`
- usare `x-sixteen::...`
- trattare header/footer come blocchi locali invece che sezioni
- duplicare nel file route la struttura delle pagine statiche

## Ruolo di Main_files
`Main_files` resta sorgente di studio e traduzione:
- reference visuale
- draft CSS/JS
- materiale di analisi

Non e` il renderer runtime finale delle pagine `/it/tests/*`.
