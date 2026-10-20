---
title: "Notify: punti d'ingresso mancanti, helper cssInLine e pagine Test"
type: story
status: ready-for-dev
priority: P1
created: 2026-10-20
updated: 2026-10-20
module: Notify
epic: ../../../Xot/docs/bmad/epic-code-quality-ratchet.md
depends_on:
  - ./services-parity-audit-notify.story.md
  - ./notify-security-and-mail-actions.story.md
  - ../../../Xot/docs/stories/test-database-guard.story.md
tags: [bmad, notify, queueable-action, entrypoints, helper, filament-pages, authorization, w1, w3]
---

# Notify: punti d'ingresso mancanti, helper cssInLine e pagine Test

Fase BMAD: Create Story (waves W1 e W3 dell'epic, lane Notify). Solo documentazione: nessun PHP toccato per scriverla.

## Richiesta

Ordine permanente dell'utente (2026-10-20): "migliora qualità codice , fa tutto con bmad + second brain + filament blueprint". Qui: capire perche' in Notify esistono Action che nessuno chiama o che non possono girare in coda, e correggere la causa. Epic: [epic-code-quality-ratchet](../../../Xot/docs/bmad/epic-code-quality-ratchet.md). Le decisioni su `SendSmsAction`, `SendNotificationAction` e `NotificationManager` sono gia' impostate in [services-parity-audit-notify](./services-parity-audit-notify.story.md) (difetti 1-3, acceptance criteria): questa story non le riscrive, le ordina e aggiunge cio' che manca (helper, pagine Test, verifica del merge).

## Scopo

- `SendNotificationAction` e' il caso d'uso centrale: sceglie il template per codice, risolve i canali e crea la riga `Notification`. Per girare in coda con Spatie deve avere `execute()` (il trait chiama `queueMethod()`, cioe' `execute` o `__invoke`).
- `NotificationManager` (in `Actions/`) era il vecchio Service con lo stesso nome: orchestra invio singolo, multiplo e ricerche di template.
- `SendSmsAction` e' la riscrittura del vecchio `SmsService`: scelta del motore per riflessione. La consegna SMS vera oggi e' `Factories/SmsActionFactory` + `Channels/SmsChannel` + `Send*SMSAction`.
- `cssInLine()` doveva incorporare un file CSS di modulo (`notify::css/ark.css`) nei layout mail, per i client che ignorano i fogli di stile esterni.
- Il cluster `Filament/Clusters/Test` serve a provare a mano canali e provider (mail, SMS, Telegram, push, Slack, WhatsApp) dal pannello.

## Stato misurato

Misura del 2026-10-20 tra le 13:35 e le 14:05 UTC. Cifre volatili.

- `SendSmsAction`: `Actions/SMS/SendSmsAction.php:59-62` cerca `Actions\SMS\SmsEngines\{Driver}Engine`; `ls laravel/Modules/Notify/app/Actions/SMS/SmsEngines` non trova nulla, quindi lancia sempre. Zero consumatori in `app/` (`rg -n 'SendSmsAction' laravel/Modules/*/app -g '*.php'` stampa solo la classe); in test: `NotifyGapAttackCoverageTest.php:133` si aspetta l'eccezione.
- `SendNotificationAction`: `Actions/SendNotificationAction.php:22` usa `QueueableAction`, ma l'unico metodo e' `handle()` (riga 31). Chiamanti: `NotificationManager.php:61` e `Jobs/SendNotificationJob.php:70`. `rg -n 'function execute' laravel/Modules/Notify/app/Actions/SendNotificationAction.php` stampa 0 (controprova: lo stesso pattern su `Actions/NotificationManager.php` stampa la riga 29).
- `NotificationManager`: 8 metodi pubblici; zero consumatori in produzione (`rg -n 'NotificationManager\b' laravel/Modules/*/app laravel/app laravel/routes -g '*.php'` stampa solo la classe).
- `cssInLine`: definita solo in `Modules/Xot/Helpers/Helper.php:1168-1169` (maiuscolo). Composer carica solo `Modules/Xot/helpers/Helper.php` (`laravel/vendor/composer/autoload_files.php:177`); nessun file include quello maiuscolo. Chiamata come funzione in `Notify/resources/views/layouts/ark.blade.php:11` e come metodo `$_theme->cssInLine` in `emails/templates/{ark,sunny,minty}.blade.php`. `$_theme` e' `XotComposer` (`Xot/app/View/Composers/XotComposer.php:68`), il cui `__call` cerca un `ThemeComposer` con quel metodo e altrimenti lancia (righe 31-47); `rg -n 'function cssInLine' laravel/Modules/*/app` stampa 0. Nessun `@extends` o `view()` usa `notify::layouts.ark` (`rg -n 'layouts.ark' laravel/Modules laravel/Themes --glob '!**/docs/**'` non trova rendering): guasto latente.
- Pagine Test: `ls laravel/Modules/Notify/app/Filament/Clusters/Test/Pages | wc -l` stampa 15, tutte con `$cluster = Test::class`; Media ne ha 2 (`Media/app/Filament/Clusters/Test/Pages/{S3Test,AwsTest}.php`). Nessun `canAccess` (`rg -n 'canAccess' laravel/Modules/Notify/app/Filament laravel/Modules/Xot/app/Filament` stampa 0; controprova: `rg -n 'function canAccess' laravel/Modules/*/app` trova `Activity/.../LogViewer.php:58`). Il default di Filament e' `true` (`vendor/filament/filament/src/Pages/Concerns/CanAuthorizeAccess.php:17-24`). Il filtro reale e' il pannello `notify::admin` (`XotBasePanelProvider.php:86`): serve il ruolo `notify::admin` (`User/app/Models/BaseUser.php:320-338`). Le pagine inviano davvero: `Mail::to` in `SendEmail.php:68`, `SendEmailPage.php:76`, `SendAwsEmailPage.php:122`; `Http::get` in `SendTelegram.php:76`. 4 coppie quasi doppie: `SendEmail`/`SendEmailPage`, `SendTelegram`/`SendTelegramPage`, `SlackNotification`/`SlackNotificationPage`, `SendPushNotification`/`SendPushNotificationPage` (la coppia push ha 230 righe per file).
- Merge su `SmsService`/`MailtrapEngine`: chiuso. `ls laravel/Modules/Notify/app/Services` non esiste; nessun `MERGE_HEAD`; `git -C laravel/Modules/Notify status --short` senza stati `UU/DU/UD`; zero marker `<<<<<<<` in app, tests, config. Le due sigle restano solo in docblock (`SendSmsAction.php:16,24`).

## Lavoro

1. `SendNotificationAction.php:31`: rinominare `handle` in `execute` e aggiornare `NotificationManager.php:61`, `SendNotificationJob.php:70` e i test che lo chiamano (`SendNotificationActionTest`, `SendNotificationFlowTest`, `NotifyHighestMissCoverageTest`, mock in `NotificationManagerTest`). Rischio basso. Va fatto prima di cancellare il Job (story sicurezza, punto 5).
2. `SendSmsAction.php`: cancellare togliendo i riferimenti nei 3 file di test (`SendSmsActionTest`, `NotifyGapAttackCoverageTest`, `NotifyHighestMissCoverageTest`), oppure collegarla a `SmsActionFactory`. Non scrivere i motori mancanti. Rischio basso. Decisione 1.
3. `NotificationManager.php`: zero consumatori; cancellare togliendo i riferimenti nei test oppure ridurlo a `send`. I due stub `getTemplateStats` e `getRecipientStats` (ritornano zeri) non vanno ripristinati. Rischio basso. Decisione 2.
4. `layouts/ark.blade.php:11`: dato che nessuno rende il layout, cancellarlo con le due righe commentate; per `emails/templates/{ark,sunny,minty}.blade.php` scegliere tra un `ThemeComposer` in Notify con `cssInLine()` (Action di lettura CSS con `execute()`) o togliere la chiamata. Rischio medio: il percorso legacy `NotifyTheme` esiste ancora (`Actions/NotifyTheme/Get.php:54`).
5. Coordinamento con Xot: la lane Xot propone di cancellare `Modules/Xot/Helpers/Helper.php` (zero include). Se lo fa prima del punto 4, `cssInLine` sparisce senza che nessuno lo noti. Avvisare la lane Xot.
6. Pagine Test: dichiarare `canAccess()` sul cluster (solo ambiente locale o ruolo `super-admin`) e rendere `shouldRegisterNavigation` coerente. Valutare l'unificazione delle 4 coppie quasi doppie (stesso schema, un solo file). Rischio basso. Decisione 3. Le 2 pagine di Media sono della lane Media: segnalare, non toccare.

## Acceptance criteria

- [ ] `rg -n 'function execute' laravel/Modules/Notify/app/Actions/SendNotificationAction.php` stampa 1 riga e `rg -nP '->handle\(' laravel/Modules/Notify/app/Actions/NotificationManager.php laravel/Modules/Notify/app/Jobs` stampa 0.
- [ ] Decisione scritta su `SendSmsAction` e `NotificationManager` (cancellati con i test oppure collegati con un chiamante reale); nessuna nuova Action che incarta una relazione Eloquent.
- [ ] `rg -n 'cssInLine' laravel/Modules/Notify/resources` stampa 0 oppure ogni chiamata ha un `ThemeComposer::cssInLine` che la serve (`rg -n 'function cssInLine' laravel/Modules/Notify/app` stampa 1).
- [ ] `rg -n 'function canAccess' laravel/Modules/Notify/app/Filament/Clusters` stampa almeno 1 riga.
- [ ] `phpstan analyse` mirato sui file toccati: `[OK] No errors`; nessun ignore, nessun `mixed` nuovo.
- [ ] `git -C laravel/Modules/Notify status --short app tests` elenca solo i file del perimetro.

## Verifica

Da `laravel/`, solo lettura:

```bash
rg -n 'function (handle|execute)' Modules/Notify/app/Actions/SendNotificationAction.php
ls Modules/Notify/app/Actions/SMS/SmsEngines 2>&1
rg -n 'function cssInLine' Modules/*/app Modules/Xot/Helpers Modules/Xot/helpers -g '*.php'
rg -n 'canAccess' Modules/Notify/app/Filament
ls Modules/Notify/app/Filament/Clusters/Test/Pages | wc -l
```

## Vincoli

Nessun Pest/PHPUnit finche' la guardia DB (`Xot/tests/Support/TestDatabaseGuard.php`) non e' dentro e l'utente non ha confermato che i DB `*_test` sono usa-e-getta. PHPStan solo mirato, in coda `flock` di `bashscripts/docs/prompts/11-phpstan.md`; un solo run completo, a swarm fermo e a RAM libera. Un solo agente per modulo che edita PHP (oggi `Notify/app/Filament` ha 3 file modificati da un'altra sessione). `laravel/phpstan.neon` immutabile. Forward-only. Pest resta Pest. Niente nuovi `*Service`: logica in Spatie QueueableAction con `execute()`. Niente `mixed`, `@var` o ignore di comodo. Il `docs/` di Notify e' di un'altra sessione.

## Decisioni aperte

1. `SendSmsAction`: cancellare (raccomandato, zero consumatori) o cablare alla factory?
2. `NotificationManager`: cancellare o tenere `send` come facciata?
3. Il cluster Test deve esistere in produzione? Se no, `shouldRegisterNavigation` solo in `local`.
4. `cssInLine`: i template `emails/templates/*` sono ancora usati da qualche cliente?

## Come ripartire

1. Aprire [services-parity-audit-notify](./services-parity-audit-notify.story.md), confermare con l'utente le decisioni 1 e 2 e rileggere i 5 comandi di Verifica.
2. Con il gate lock+mtime, fare il punto 1 (`handle` in `execute`), poi aggiornare i chiamanti e i 4 test senza eseguirli.
3. Avvisare la lane Xot del punto 5 prima che tocchi `Helpers/Helper.php`, poi passare al punto 6 (cluster Test).
