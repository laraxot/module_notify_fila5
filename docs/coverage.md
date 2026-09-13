---
title: "Notify — copertura dei test"
module: notify
type: reference
status: active
tags: [coverage, testing, pest, notify]
created: 2026-08-24
updated: 2026-08-27
qmd: "notify coverage pest unit 6.3 percento misurato xdebug db irraggiungibile"
---

# Notify — copertura dei test

## Misura

```bash
cd laravel
php -d memory_limit=3G -d xdebug.mode=coverage \
    ./vendor/bin/pest Modules/Notify/tests/Unit --coverage --min=0
```

Eseguita il 27 agosto 2026.

| Metrica | Valore |
|---|---:|
| Copertura totale | **6.3%** |
| Test passati | 463 |
| Test saltati | 300 |
| Assertion | 1.851 |
| Durata | 267 s |
| Aree a copertura 0% | 36 |

## Perché il numero è basso, e cosa non dice

**300 test su 763 sono saltati.** Il database di test (`10.100.200.53:3306`, `ptv_lara_test`)
non era raggiungibile al momento della misura: tutto ciò che tocca il DB non gira. Il 6.3%
misura quindi la sola parte Unit eseguibile senza DB, non la copertura reale del modulo.
Prima di rimisurare: `nc -z -w3 10.100.200.53 3306`.

**`xdebug.mode=coverage` è obbligatorio sulla riga di comando.** Senza, Pest esce con
`Unable to get coverage using Xdebug` — xdebug è caricato ma non in modalità coverage.

## Dove la copertura c'è

Interamente coperti (100%): `Http/Controllers/Controller`, `Http/Kernel`, i middleware
(`CheckForMaintenanceMode`, `EncryptCookies`, `PreventRequestsDuringMaintenance`,
`TrimStrings`, `TrustProxies`, `ValidateSignature`, `VerifyCsrfToken`),
`Providers/AppServiceProvider`, `Providers/Filament/AdminPanelProvider`.

Sono le classi di scaffolding: vengono attraversate dal bootstrap, non da test scritti
apposta. Il 100% qui non è un merito.

## Dove manca

36 aree a 0%, fra cui tutti i `View/Components/*` (`GuestLayout`, `Header`, `Input`).
È lì che il coverage va alzato, non nel middleware già al 100%.

## PHPStan / Jobs -> QueueableAction — 2026-09-04

Vedi story `docs/stories/4.27.jobs-to-queueable-actions.story.md`. In sintesi:
`app/Jobs/SendNotificationJob.php` (morto, zero call site) cancellato,
`app/Jobs/SendScheduledPushNotification.php` convertito in
`app/Actions/Push/SendScheduledPushNotificationAction.php`
(`Spatie\QueueableAction\QueueableAction`, entrypoint `execute()`).
`phpstan analyse Modules/Notify` pulito (0 errori, invariato). Suite Pest **non
verificabile in modo affidabile** in questa sessione: con l'invocazione
canonica (`-c Modules/Notify/phpunit.xml`) 417/813 passano ma 396 falliscono
con `A facade root has not been set.` / `Target class [config] does not
exist.` — verificato che questo fallimento e' preesistente e non causato da
questo diff (un file di test mai toccato fallisce nello stesso identico modo,
sia dentro la suite intera sia da solo). Vedi memoria second-brain
`env-sqlite-manca-suite-non-eseguibile.md`.

## Riduzione uso di `mixed` — 2026-09-04

Vedi story `docs/stories/4.28.mixed-type-reduction.story.md`. In sintesi: 125
file del modulo usano `mixed`; all'avvio 100 erano gia' "dirty" per lavoro
concorrente di un'altra sessione (non toccati, per non collidere). Sui 26
file puliti, 6 avevano una shape reale deducibile con certezza dal codice
circostante (return type di un'Action gia' tipizzata, o docblock del metodo
genitore Filament) e sono stati resi piu' specifici:
`array<string, mixed>` -> `array{status_code: int, status_txt: string}` in
`NetfunChannel.php` (matcha `SendSmsFactorSMSAction::execute()`);
`array<string, mixed>` -> `array<string, Action|ActionGroup>` in
`EditContactTestProxy.php`/`EditNotifyThemeTestProxy.php` (matcha
`XotBaseEditRecord::getHeaderActions()`); `array<int|string, mixed>` ->
`array<int|string, TextInput>` in `ContactSectionTestProxy.php` (matcha
`ContactSection::getFormSchema()`); `array<int, mixed>` -> `array<int,
Component>` in `ViewNotificationTestProxy.php` (matcha
`ViewNotification::getInfolistSchema()`); `array<int, mixed>` -> `array<int,
Action>` in `PreviewMailTemplateTestProxy.php`. Gli altri 20 file puliti sono
stati lasciati `mixed` con motivazione (bag di config/vars genuinamente
polimorfe, contratti multi-provider, firme idiomatiche `Factory::definition()`,
un falso positivo del grep). `phpstan analyse Modules/Notify`: 0 errori prima
e dopo. Pest: stesso pattern preesistente 417/396 gia' documentato sopra
(2026-09-04, story 4.27) — non causato da questo diff.

## `app/Services` -> `app/Actions` (QueueableAction) — 2026-09-04

Vedi story `docs/stories/4.29.notify-services-to-actions.story.md` per il
dettaglio file-per-file. In sintesi: 4 classi `.php` sotto `app/Services/`
(più 2 `.test` e 1 `.to_action`, artefatti morti non autoloadabili), tutte
Kind A (god-facade), due già completamente sostituite da Actions esistenti
in `Actions/Push/*` e `Actions/NotificationManager.php` (bastava cancellare
il Service e ripuntare i chiamanti-test), una (`MailtrapEngine`) morta con
zero caller e già superata da `Actions/Mail/SendMailtrapMailAction.php`, una
(`SmsService`) migrata in una nuova `Actions/SMS/SendSmsAction.php` con
`execute()` singolo (dispatch dinamico per riflessione preservato as-is,
comportamento invariato — lanciava già sempre `RuntimeException` prima
della migrazione, nessun engine concreto è mai esistito nel namespace di
destinazione). `app/Services/` ora contiene solo `.gitkeep`.

Nessun caller applicativo trovato repo-wide (solo test). 4 file di test
aggiornati, 1 cancellato (duplicato ridondante di un test già esistente su
`Actions\NotificationManager`).

**Collisione con sessione concorrente**: durante questa story un'altra
sessione stava eseguendo lo stesso task in tempo reale sugli stessi file,
lasciando file non tracciati con sintassi PHP non valida sotto
`app/Actions/{Sms,SMS,}/*` (non toccati, per rispetto del WIP altrui). Questo
ha impedito un run PHPStan pulito a modulo intero (bloccato da errori fatali
di parsing pre/post, non causati da questa story) — verifica sostitutiva
scoped ai file toccati qui: **0 errori**. Pest: stesso fallimento
pre-esistente e non attribuibile già documentato in `env-sqlite-manca-suite-
non-eseguibile` (verificato riproducendolo su un file mai toccato).

## Nota sulla versione precedente di questo file

Fino al 27 agosto 2026 questo documento dichiarava «comprehensive test coverage» e «all
tests are passing» con **tutti i numeri a zero**: files 0, classi 0, metodi 0, coverage 0%.
Un documento che afferma il contrario di ciò che misura è peggio della sua assenza, perché
chiude la domanda invece di aprirla. Gli stessi template vuoti restano in
`Modules/Tenant/docs/coverage.md` e `Modules/Xot/docs/coverage.md`.
