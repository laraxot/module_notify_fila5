# Design Comuni Static Pages Replication

## Obiettivo
Replicare in FixCity il catalogo dei template ufficiali di `italia/design-comuni-pagine-statiche` sotto il namespace Folio `/it/tests/*`, preservando la resa visiva e preparando il terreno per l'estrazione di componenti Blade riusabili.

## Fonti ufficiali studiate
- Repository: https://github.com/italia/design-comuni-pagine-statiche
- Demo: https://italia.github.io/design-comuni-pagine-statiche/
- Draft interni del tema: `laravel/Themes/Sixteen/Main_files/five/`
- Sorgente runtime contenuti: `laravel/config/local/fixcity/database/content/pages/*.json`

## Decisioni bloccate
- route file-based in `resources/views/pages/tests/[slug].blade.php`
- pattern Volt + Folio + `PageSlugMiddleware`
- renderer finale via `<x-page side="content" :slug="$pageSlug" :data="$data" />`
- namespace tema: `pub_theme`
- header/footer come sezioni CMS, non come componenti tema diretti
- Tailwind + Alpine + Vite come stack finale
- `Main_files` come materiale di studio/traduzione, non renderer runtime
- i contenuti runtime delle pagine `tests.*` vivono nei JSON CMS sotto `laravel/config/local/fixcity/database/content/pages/`

## Stato minimo raggiunto
E` stato creato uno scaffold JSON locale per tutto il set statico upstream rilevato.

Metriche verificate:
- `86` file `tests*.json`
- corrispondenza `filename == slug` validata su tutto il set
- preservati i file gia` presenti (`tests.argomenti`, `tests.appuntamento-06-conferma`, ecc.)

Questo baseline non conclude il lavoro visuale, ma stabilisce la base CMS corretta e non aggirabile.

## Mappa di responsabilita`
### Folio/Volt route
- riceve `{slug}`
- costruisce `tests.{slug}`
- passa il controllo a `x-page`

### CMS
- risolve il file JSON coerente con lo slug canonico
- applica i middleware slug-driven
- rende i blocchi del lato `content`

### JSON content store
- persiste il contenuto reale delle pagine demo
- usa `slug` come chiave canonica di allineamento
- esempio: `tests.appuntamento-06-conferma.json` con nodo `"slug": "tests.appuntamento-06-conferma"`

### Main_files
- conserva HTML/CSS/JS di reference
- documenta la conversione gia` fatta
- alimenta la traduzione verso blocchi/section/componenti riusabili

## Convenzione slug
### Pagine univoche
Se il basename upstream e` univoco, lo slug resta puro:
- `argomenti.hbs` -> `tests.argomenti.json`
- `servizi.hbs` -> `tests.servizi.json`
- `appuntamento-06-conferma.hbs` -> `tests.appuntamento-06-conferma.json`

### Collisioni
Se due file upstream condividono lo stesso basename, si appiattisce con prefisso folder:
- `index.hbs` -> `tests.index.json`
- `sito/index.hbs` -> `tests.sito-index.json`
- `servizi/index.hbs` -> `tests.servizi-index.json`

Questa regola evita collisioni senza introdurre route nested o eccezioni lato renderer.

## Perche' e` DRY/KISS
- una sola route dinamica per tutte le pagine test
- nessun parser HTML runtime dentro il file Folio
- nessuna duplicazione del layout delle pagine statiche nella route
- un solo punto di composizione CMS: `x-page`
- una sola sorgente di verita` runtime: i JSON CMS

## Prossimo livello
Dopo il baseline JSON, il lavoro corretto e`:
1. riconoscere blocchi ricorrenti nei template upstream
2. trasformarli in blocchi/section/componenti riusabili del tema
3. popolare i `content_blocks` dei JSON pagina per pagina
4. verificare resa visiva e interazioni con Tailwind + Alpine + Vite

## Documenti correlati
- `Themes/Sixteen/docs/design-comuni/tests-slug-volt-folio.md`
- `Modules/Cms/docs/frontoffice/tests-page-slug-pattern.md`
