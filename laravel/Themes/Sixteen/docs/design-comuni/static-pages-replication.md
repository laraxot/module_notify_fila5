# Design Comuni Static Pages Replication

## Obiettivo
Replicare in FixCity l'intero catalogo dei template ufficiali di `italia/design-comuni-pagine-statiche` sotto il namespace Folio `/it/tests/*`, preservando la resa visiva e preparando il terreno per una successiva estrazione di componenti Blade riusabili.

## Fonti ufficiali studiate
- Repository: https://github.com/italia/design-comuni-pagine-statiche
- Demo: https://italia.github.io/design-comuni-pagine-statiche/
- Esempi chiave:
  - `argomenti.html`
  - `appuntamento-06-conferma.html`

## Strategia adottata
1. Manifest centrale degli slug in `resources/design-comuni/manifest.php`
2. Snapshot HTML locali ufficiali in `resources/design-comuni/pages/*.html`
3. Un solo renderer Folio dinamico in `resources/views/pages/tests/[slug].blade.php`
4. Indice locale in `resources/views/pages/tests/index.blade.php`
5. Script di import in `bashscripts/theme/import-design-comuni-pages.sh`

## Perché questa struttura è DRY/KISS
- niente 35 Blade quasi identiche
- una sola route dinamica per tutte le pagine demo
- sorgente ufficiale tracciata in un unico manifest
- possibilità di sostituire progressivamente gli snapshot con componenti Blade senza rompere le URL `/it/tests/*`

## Blocchi riconosciuti nel design ufficiale
I template mostrano blocchi ricorrenti che dovranno diventare componenti locali nella fase successiva:
- skiplink
- header slim istituzionale
- header principale con brand e ricerca
- breadcrumb
- hero/page heading
- tassonomie e chips argomento
- card list per contenuti e servizi
- sidebar informativa
- progress/stepper per flussi
- conferma finale con riepilogo
- footer istituzionale

## Route previste
- `/it/tests`
- `/it/tests/argomenti`
- `/it/tests/appuntamento-06-conferma`
- tutte le altre URL mappate nel manifest

## Prossima evoluzione consigliata
- estrarre header/footer/breadcrumb/hero/card/stepper in componenti Blade del tema
- sostituire gli asset remoti con asset locali versionati
- aggiungere test visuali sulle pagine campione
- documentare blocchi e varianti in un catalogo componenti dedicato
