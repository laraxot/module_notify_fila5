# Folio + Volt per /tests/[slug]

## Regola
Le pagine di test sotto `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php` devono seguire il pattern Folio + Volt del progetto.

## Pattern corretto
- `name('tests.view')`
- `middleware(PageSlugMiddleware::class)`
- componente Volt con `slug`, `pageSlug` e `data`
- layout tramite `<x-layouts.app>`
- rendering contenuto tramite `<x-page side="content" :slug="$pageSlug" :data="$data" />`

## Perche
Non vogliamo una pagina che incorpori HTML statico o che aggiri il runtime CMS.
La pagina Folio deve restare un adapter sottile:
- Folio risolve la route
- Volt prepara il contesto minimo
- `PageSlugMiddleware` mantiene coerente il page slug
- `<x-page>` delega al runtime CMS e ai blocchi JSON

## Conseguenze pratiche
- niente `file_get_contents()` nel file Folio
- niente parsing manuale di HTML dentro la route page
- niente bypass del componente `x-page`
- i riferimenti Design Comuni servono per studiare struttura e blocchi, non per sostituire il runtime CMS
