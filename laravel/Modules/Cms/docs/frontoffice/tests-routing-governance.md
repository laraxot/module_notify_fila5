# Tests Routing Governance

## Scopo

Questa nota fissa la governance frontoffice per le pagine `tests.*` servite via Folio e Volt.

## Regola

Le pagine `tests` non fanno rendering diretto di template Blade dedicati e non leggono i JSON a mano nel file route.

Devono invece delegare tutto a:
- `PageSlugMiddleware`
- `x-page`
- JSON tenant `config/local/<tenant>/database/content/pages/tests.*.json`

## Distinzione corretta

- `pages/tests/index.blade.php` -> `tests.index`
- `pages/tests/[slug].blade.php` -> `tests.{slug}`

Entrambi i file devono essere adapter sottili Folio + Volt.
