# Folio + Volt per /tests/[slug]

## Regola
Le pagine di test sotto `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php` devono seguire il pattern Folio + Volt del progetto e non devono scegliere direttamente una vista di pagina.

## Pattern corretto
- `name('tests.view')`
- `middleware(PageSlugMiddleware::class)`
- componente Volt con `slug`, `pageSlug` e `data`
- layout tramite `<x-layouts.app>`
- rendering contenuto tramite `<x-page side="content" :slug="$pageSlug" :data="$data" />`

## Sorgente di verita
La route Folio non carica HTML statico e non fa `@includeIf('pub_theme::design-comuni.pages...')`.
La sorgente di verita e il JSON tenant in `laravel/config/local/fixcity/database/content/pages/`.

Esempi:
- `tests.argomenti` -> `laravel/config/local/fixcity/database/content/pages/tests.argomenti.json`
- `tests.appuntamento-06-conferma` -> `laravel/config/local/fixcity/database/content/pages/tests.appuntamento-06-conferma.json`

Ogni file JSON deve avere almeno:
- nodo `slug` coerente con lo slug CMS, per esempio `tests.appuntamento-06-conferma`
- `content_blocks.it[]`
- `data.view` che punta a un blocco Blade reale, per esempio `pub_theme::components.blocks.tests.appuntamento-conferma`

## Perche
Non vogliamo una pagina che incorpori HTML statico o che aggiri il runtime CMS.
La pagina Folio deve restare un adapter sottile:
- Folio risolve la route
- Volt prepara il contesto minimo
- `PageSlugMiddleware` mantiene coerente il page slug
- `<x-page>` delega al runtime CMS e ai blocchi JSON
- il tenant decide il contenuto pubblicato

## Conseguenze pratiche
- niente `file_get_contents()` nel file Folio
- niente parsing manuale di HTML dentro la route page
- niente bypass del componente `x-page`
- niente include diretti di template pagina dal file `[slug].blade.php`
- i riferimenti Design Comuni servono per studiare struttura e blocchi, non per sostituire il runtime CMS
