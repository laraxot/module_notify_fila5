# Design Comuni Static Pages Replication

## Obiettivo
Replicare in FixCity il catalogo dei template ufficiali di `italia/design-comuni-pagine-statiche` sotto il namespace Folio `/it/tests/*`, usando il linguaggio visivo locale del tema Sixteen e gli asset compilati via Vite/Tailwind.

## Fonti studiate
- repository ufficiale `italia/design-comuni-pagine-statiche`
- demo pubblica `italia.github.io/design-comuni-pagine-statiche`
- documentazione gia presente in `Themes/Sixteen/docs/`
- sorgenti locali in `Themes/Sixteen/Main_files/five/src`

## Direzione corretta
La replica non deve reincludere il bundle JS/CSS statico del dist ufficiale nelle pagine test.
Il riferimento visivo viene studiato dal progetto ufficiale, ma il rendering finale deve usare:
- componenti Blade del tema Sixteen
- classi e token locali
- asset gestiti dal tema via Vite
- CSS base e adattamenti gia presenti in `Main_files/five/src`

## Stato attuale
- route dinamica unica in `resources/views/pages/tests/[slug].blade.php`
- shell condivisa in `resources/views/components/design-comuni/page-shell.blade.php`
- pagina nativa `resources/views/pages/design-comuni/argomenti.blade.php`
- pagina nativa `resources/views/pages/design-comuni/appuntamento-06-conferma.blade.php`
- fallback agli snapshot locali solo per gli slug non ancora convertiti

## Blocchi riconosciuti
- slim header istituzionale
- header principale con brand
- breadcrumb
- hero di pagina
- topic cards e tassonomie
- sidebar informativa
- stepper di processo
- pannello di conferma con riepilogo
- footer istituzionale

## Riferimenti locali chiave
- `Main_files/five/src/style.css`
- `Main_files/five/src/style-apply.css`
- `resources/views/components/sections/header.blade.php`
- `resources/views/components/utilities/stepper.blade.php`
- `resources/views/components/blocks/navigation/*.blade.php`

## Prossimi passi
- estrarre altri blocchi riusabili a partire dai pattern di `Main_files/five/src`
- convertire progressivamente gli altri slug in viste native
- ridurre fino a eliminare il fallback snapshot
- documentare varianti e mapping blocchi nel catalogo componenti del tema
