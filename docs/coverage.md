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

## Nota sulla versione precedente di questo file

Fino al 27 agosto 2026 questo documento dichiarava «comprehensive test coverage» e «all
tests are passing» con **tutti i numeri a zero**: files 0, classi 0, metodi 0, coverage 0%.
Un documento che afferma il contrario di ciò che misura è peggio della sua assenza, perché
chiude la domanda invece di aprirla. Gli stessi template vuoti restano in
`Modules/Tenant/docs/coverage.md` e `Modules/Xot/docs/coverage.md`.
