# Design Comuni Docs Index

## Scopo
Questa cartella documenta il rollout delle pagine statiche Design Comuni dentro il tema Sixteen secondo il contratto corretto:
- route Folio + Volt
- rendering via `x-page`
- contenuti runtime in JSON CMS
- stack frontend Tailwind + Alpine + Vite
- decomposizione delle pagine in piu` blocchi riusabili

## Documenti principali
- [SISTEMA_BLOCCHI_FILAMENT.md](./SISTEMA_BLOCCHI_FILAMENT.md) - regola architetturale sui blocchi, anti-monoblocco, rapporto con Filament Builder
- [tests-slug-volt-folio.md](./tests-slug-volt-folio.md) - contratto di `tests/[slug].blade.php` e mapping `tests.{slug}`
- [static-pages-replication.md](./static-pages-replication.md) - stato del rollout, baseline JSON e policy slug

## Regole consolidate
- `Main_files` e` reference, non renderer runtime
- `@includeIf('pub_theme::design-comuni.pages.'.$slug)` e` scorretto
- il contenuto runtime passa da `x-page`
- i file `tests.*.json` sono baseline tecnica, non certificato di conversione finale
- una pagina completa va normalmente scomposta in `2+` blocchi

## Ridondanza da evitare
Se devi aggiornare il tema Design Comuni, modifica prima questi tre documenti e collega eventuali approfondimenti da qui. Non aprire nuovi file paralleli per ripetere le stesse regole.

