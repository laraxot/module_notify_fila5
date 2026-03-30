# Tests Page Slug Pattern

## Obiettivo
Documentare il pattern CMS corretto per le pagine demo raggiungibili come `/it/tests/{slug}`.

## Contratto
La route Folio del tema costruisce uno slug CMS con prefisso `tests.` e delega a `x-page`.

Esempio:
- URL: `/it/tests/argomenti`
- slug route: `argomenti`
- slug CMS finale: `tests.argomenti`
- file contenuto: `laravel/config/local/fixcity/database/content/pages/tests.argomenti.json`

Altro esempio:
- URL: `/it/tests/appuntamento-06-conferma`
- slug route: `appuntamento-06-conferma`
- slug CMS finale: `tests.appuntamento-06-conferma`
- file contenuto: `laravel/config/local/fixcity/database/content/pages/tests.appuntamento-06-conferma.json`

## Collisioni di basename
Per i nomi duplicati del catalogo statico upstream si usa un flattening deterministico nel solo slug finale.

Esempi:
- `src/pages/index.hbs` -> `tests.index`
- `src/pages/sito/index.hbs` -> `tests.sito-index`
- `src/pages/servizi/index.hbs` -> `tests.servizi-index`

Questo consente di mantenere il route file `tests/[slug].blade.php` unico e lineare.

## Middleware
Va applicato `Modules\Cms\Http\Middleware\PageSlugMiddleware` per mantenere il comportamento coerente con il resto delle pagine CMS-driven.

## Motivazione architetturale
- le regole di accesso restano centralizzate
- i blocchi continuano a vivere nel dominio CMS
- il tema non fa parsing HTML runtime
- il frontoffice mantiene un entrypoint sottile e compositivo
- il contenuto e` serializzato nei JSON CMS, non in Blade dedicate

## Baseline attuale
Nel content store locale esiste ora uno scaffold `tests.*` completo per il catalogo statico upstream studiato.

Verifiche fatte:
- `86` file `tests*.json`
- `0` incoerenze tra nome file e nodo `slug`

## DRY/KISS
Questo pattern evita:
- una blade per ogni pagina demo
- logica duplicata tra route, tema e CMS
- fork tra pagine normali e pagine `tests`
- viste parallele tipo `@includeIf(...)` che aggirano il CMS
