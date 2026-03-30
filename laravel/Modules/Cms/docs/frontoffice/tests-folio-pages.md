# Tests Folio Pages

## Contratto Frontoffice

Le route di test Design Comuni seguono un pattern CMS puro:

- `/it/tests` legge `tests.index`
- `/it/tests/{slug}` legge `tests.{slug}`

Le pagine Folio non devono costruire markup editoriale, liste file o fallback custom. Devono solo:

- valorizzare `$pageSlug`
- valorizzare `$data`
- delegare a `<x-page side="content" :slug="$pageSlug" :data="$data" />`

## Perché

Questa scelta separa tre responsabilità:

1. Folio + Volt: routing e contesto runtime
2. JSON pages: struttura contenutistica
3. blocchi Blade `pub_theme::components.blocks.*`: resa visuale

Se `tests/index.blade.php` fa `glob()` o rendering diretto, rompe la grammatica del CMS e crea una seconda sorgente di verità.

## Regola Operativa

### Index

- file: `Themes/Sixteen/resources/views/pages/tests/index.blade.php`
- slug CMS: `tests.index`

### Dynamic

- file: `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`
- slug CMS: `tests.{slug}`

## Relazione con i JSON

Il contenuto effettivo deve stare in:

- `config/local/fixcity/database/content/pages/tests.index.json`
- `config/local/fixcity/database/content/pages/tests.<slug>.json`

Ogni JSON deve avere lo slug coerente con il nome file logico.

## Regola di Uniformità

Per il progetto FixCity, il path pubblico non decide la view finale. Decide solo quale slug CMS caricare.

Questo è il motivo per cui `tests/index.blade.php` deve essere Volt/Folio come `tests/[slug].blade.php`.
