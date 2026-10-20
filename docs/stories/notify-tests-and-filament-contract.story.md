---
title: "Notify: test che non provano nulla e contratto Filament"
type: story
status: ready-for-dev
priority: P2
created: 2026-10-20
updated: 2026-10-20
module: Notify
epic: ../../../Xot/docs/bmad/epic-code-quality-ratchet.md
depends_on:
  - ../../../Xot/docs/stories/test-database-guard.story.md
  - ./notify-pest-suite-database-resolver-broken.story.md
tags: [bmad, notify, tests, pest, refresh-database, filament-blueprint, lang-keys, xotbase, w2, w3]
---

# Notify: test che non provano nulla e contratto Filament

Fase BMAD: Create Story (waves W2 e W3 dell'epic, lane Notify). Solo documentazione: nessun PHP toccato per scriverla.

## Richiesta

Ordine permanente dell'utente (2026-10-20): "migliora qualità codice , fa tutto con bmad + second brain + filament blueprint". Qui: rendere onesta la suite di Notify (un test verde deve provare qualcosa che esiste) e portare il codice Filament al contratto di `Notify/docs/bmad/filament-blueprint.md`. Epic: [epic-code-quality-ratchet](../../../Xot/docs/bmad/epic-code-quality-ratchet.md). Il fallimento di bootstrap di Pest nel modulo ha gia' una story ([notify-pest-suite-database-resolver-broken](./notify-pest-suite-database-resolver-broken.story.md), 2026-09-15): qui non si duplica.

## Scopo

- `tests/Feature/NotificationApiTest.php` doveva provare l'API REST di invio notifiche e gestione template. Quell'API non e' mai stata scritta: `routes/api.php` contiene solo un blocco commentato per il webhook Telegram. Il test e' una specifica fantasma.
- Le coppie di file che differiscono per maiuscole sono rimaste da merge fra sistemi di file diversi: il suffisso `Test.php` di `laravel/phpunit.xml:11-12` e' case-sensitive, quindi il file in minuscolo non gira mai.
- I 4 test dei modelli con `RefreshDatabase` provano casting, scope e relazioni di `Contact`, `MailTemplate`, `NotificationTemplate`, `Notification`. Il comportamento e' utile, il mezzo (`migrate:fresh`) e' vietato dalla regola `no-refresh-database-in-tests`.
- Il blueprint dice: basi `XotBase*`, nessun `->label()` con testo, logica nelle Action.

## Stato misurato

Misura del 2026-10-20 tra le 13:35 e le 14:05 UTC. Cifre volatili.

- Endpoint inesistenti: `rg -c '^\s+it\(' laravel/Modules/Notify/tests/Feature/NotificationApiTest.php` stampa 8; le chiamate sono alle righe 38, 52, 70 (`/api/notify/send`), 83 (`/api/notify/templates`), 108, 120, 147, 159. `rg -n 'notify/send|notify/templates' laravel/routes laravel/Modules/*/routes` stampa 0 (controprova: `rg -n 'telegram/webhook' laravel/Modules/Notify/routes` trova 2 righe nel blocco commentato; `rg -c 'Route::' laravel/Modules/User/routes` trova route attive).
- Coppie per maiuscole, byte per byte uguali (`sha256sum`): `Feature/emailtemplatestest.php` = `EmailTemplatesTest.php` (`82e6bf11...`) e `Feature/jsoncomponentstest.php` = `JsonComponentsTest.php` (`29bb8400...`). I file in minuscolo non girano mai.
- `RefreshDatabase` attivo: `Unit/Models/ContactTest.php:13`, `MailTemplateTest.php:15`, `NotificationTemplateTest.php:16`, `NotificationTest.php:15`. Comando: `rg -nP '^\s*use\s+RefreshDatabase\s*;' laravel/Modules/Notify/tests` (controprova sulla Activity, dove i soli hit sono commenti: `rg -nP '^\s*use\s+RefreshDatabase\s*;' laravel/Modules/Activity/tests` stampa 0). `ContactTest` estende il `Tests\TestCase` di radice.
- 6 classi PHPUnit (non Pest): `rg -lP '^(final |abstract )?class \w+Test extends' laravel/Modules/Notify/tests` elenca `Unit/Enums/{MediaTypeEnum,WhatsAppDriverEnum}Test.php` e i 4 file `RefreshDatabase` di sopra.
- Skip: 2 stub `->skip('... not implemented')` (`Feature/ThemeManagementBusinessLogicTest.php:23`, `Feature/TemplateManagementBusinessLogicTest.php:22`) e 5 `markTestSkipped` (`ContactTest.php:348,354`, `NotifyHighestMissCoverageTest.php:155`, `Traits/NotifyTraitsCoverageTest.php:32,88`); i `->skip(1)` di `NotificationTest` sono `Collection::skip`, non test saltati.
- Filament: 33 stringhe di testo primarie secondo lo script del censimento; il comando riproducibile (include `body`, esclude i commenti) ne stampa 36: `rg -nP -e "->(label|placeholder|helperText|heading|description|title|body)\(\s*['\"][A-Za-z][^'\"]*['\"]" laravel/Modules/Notify/app/Filament -g '*.php' | rg -vP '^\S+:\d+:\s*(//|\*|#)'`. Top: `Clusters/Test/Pages/SendTelegramPage.php` 11, `SendWhatsAppPage.php` 8, `Resources/NotificationResource/Schemas/NotificationForm.php` 7. La "proprieta' statica" contata dal censimento e' `$recordTitleAttribute = 'id'` (`LinkableRelationManager.php`), nome di colonna: falso positivo.
- Extends diretti: il censimento ne contava 4. Sul disco restano 1: `Forms/Components/ChannelCheckboxList.php:25` (`extends CheckboxList`). Gli altri 3 (`HtmlLayoutPathSelect`, `MailTemplateSelect`, `ContactColumn`) sono gia' su `XotBaseSelect`/`XotBaseViewColumn` nell'albero di lavoro, NON committati (`git -C laravel/Modules/Notify status --short app`): lavoro di un'altra sessione. `Xot/app/Filament/Forms/Components/XotBaseCheckboxList.php` esiste.
- Blueprint: esiste (`Notify/docs/bmad/filament-blueprint.md`, 46 righe, creato il 2026-10-16) ma elenca 3 Resource (`NotificationResource`, `MailTemplateResource`, `NotificationLogResource`); su disco ce ne sono 6 (anche `ContactResource`, `NotificationTemplateResource`, `NotifyThemeResource`) e non cita i componenti `Forms/Components` ne' il cluster Test.

## Lavoro

1. `NotificationApiTest.php` (8 test): trasformare in stub `->skip('<endpoint> not implemented')` con la story di riferimento, come prevede la scala di `bashscripts/docs/prompts/10-test.md`; mai creare route per far passare il test. Rischio basso. Decisione 1.
2. `Feature/emailtemplatestest.php`, `Feature/jsoncomponentstest.php`: sono identici ai file con il nome giusto; cancellare i due in minuscolo con `git rm` (forward-only, senza `checkout`). Rischio basso, la prova e' il `sha256sum`.
3. I 4 file `RefreshDatabase`: togliere il trait e usare le transazioni del `TestCase` di modulo; portare `ContactTest` da `Tests\TestCase` a `Modules\Notify\Tests\TestCase`. Rischio medio: i test possono dipendere dallo schema pulito. Dipende dalla guardia DB e dall'esito della story del resolver.
4. 6 classi PHPUnit: convertire in Pest con `php laravel/Modules/Xot/tools/convert-phpunit-to-pest.php Notify` (Pest resta Pest). Rischio basso.
5. Stringhe e extends: `ChannelCheckboxList` verso `XotBaseCheckboxList`; le 33 stringhe verso chiavi in `Notify/lang/<locale>/` (togliere `->label()` dove la risoluzione e' automatica). Prima coordinarsi con la sessione che edita `Notify/app/Filament`. Rischio basso ma voluminoso.
6. Blueprint: aggiornare l'elenco Resource e aggiungere la regola per il cluster Test. E' `docs/`, di un'altra sessione: si segnala, non si tocca da questa story.

## Acceptance criteria

- [ ] `rg -nP '^\s*use\s+RefreshDatabase\s*;' laravel/Modules/Notify/tests` stampa 0 righe (prima: 4).
- [ ] `/usr/bin/find laravel/Modules/Notify/tests -type f -name '*test.php' ! -name '*Test.php'` stampa 0 file (prima: 2; controprova: lo stesso comando su `laravel/Modules/Cms/tests` ne trova).
- [ ] Nessun test attivo chiama `/api/notify/*` (`rg -n "api/notify" laravel/Modules/Notify/tests` solo dentro `->skip(...)`).
- [ ] `rg -lP '^(final |abstract )?class \w+Test extends' laravel/Modules/Notify/tests` stampa 0 file.
- [ ] `rg -nP '^class \w+ extends (Select|CheckboxList|ViewColumn)\b' laravel/Modules/Notify/app/Filament` stampa 0 righe.
- [ ] Il comando rg delle stringhe (con `-g '*.php'` e il filtro dei commenti) stampa 0 righe o ogni residuo ha una chiave `notify::...`.
- [ ] `phpstan analyse` mirato sui file toccati: `[OK] No errors`; nessun ignore, nessun `mixed` nuovo. Nessun Pest eseguito prima del via sulla guardia.

## Verifica

Da `laravel/`, solo lettura; i comandi sono quelli di "Stato misurato". Per le coppie: `sha256sum Modules/Notify/tests/Feature/*[Tt]est.php | sort | uniq -w64 -D`.

## Vincoli

Nessun Pest/PHPUnit finche' la guardia DB (`Xot/tests/Support/TestDatabaseGuard.php`, scritta e non provata a runtime) non e' dentro e l'utente non ha confermato che i DB `*_test` sono usa-e-getta. PHPStan solo mirato, in coda `flock` di `bashscripts/docs/prompts/11-phpstan.md`; un solo run completo, a swarm fermo e a RAM libera. Un solo agente per modulo che edita PHP. `laravel/phpstan.neon` immutabile. Forward-only. Pest resta Pest. Niente nuovi `*Service`: logica in Spatie QueueableAction con `execute()`. Niente `mixed`, `@var` o ignore di comodo.

## Decisioni aperte

1. Implementare un'API REST di Notify (nessuno l'ha chiesta) o lasciare gli 8 test come stub motivati? Raccomandato: stub.
2. Quando si potranno rimuovere i 4 `RefreshDatabase`: dopo la decisione 7.2 dell'epic (DB `*_test` usa-e-getta) o subito, riscrivendo con transazioni?

## Come ripartire

1. Chiedere chi edita `Notify/app/Filament` e rileggere `git -C laravel/Modules/Notify status --short app tests`.
2. Fare i punti 1 e 2 (stub e `git rm` dei due file in minuscolo): sono a rischio basso e non richiedono DB.
3. Preparare i punti 3 e 4 su un file alla volta (`MailTemplateTest.php` per primo), senza eseguirli, e aggiungere in coda a questa story l'output dei comandi di Verifica.
