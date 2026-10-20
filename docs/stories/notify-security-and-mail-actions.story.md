---
title: "Notify: sicurezza di EsendexSendAction e delle Action mail"
type: story
status: ready-for-dev
priority: P1
created: 2026-10-20
updated: 2026-10-20
module: Notify
epic: ../../../Xot/docs/bmad/epic-code-quality-ratchet.md
depends_on:
  - ../../../Xot/docs/stories/test-database-guard.story.md
  - ./services-parity-audit-notify.story.md
tags: [bmad, notify, security, esendex, tls, mail, queueable-action, jobs, w1]
---

# Notify: sicurezza di EsendexSendAction e delle Action mail

Fase BMAD: Create Story (wave W1 dell'epic, lane Notify). Solo documentazione: nessun PHP toccato per scriverla.

## Richiesta

Ordine permanente dell'utente (2026-10-20): "migliora qualità codice , fa tutto con bmad + second brain + filament blueprint". Qui significa andare alla sorgente di ogni difetto di sicurezza del modulo Notify, capire a che cosa serviva il codice e correggere la causa. Epic: [epic-code-quality-ratchet](../../../Xot/docs/bmad/epic-code-quality-ratchet.md), riga W1 n. 3. Parte del lavoro sulle Action mail e' gia' descritta in [services-parity-audit-notify](./services-parity-audit-notify.story.md) (punto 4 dei difetti ereditati): questa story non la duplica, aggiunge solo l'ordine di esecuzione e le prove.

## Scopo

- `Actions/EsendexSendAction.php` e' il client del provider SMS `app.messaggissima.it` (riga 26): `login()` ottiene `user_key` e `Session_key`, `execute(SmsData)` posta il messaggio. Serve a inviare SMS con un secondo provider accanto a Netfun e Twilio. Conta perche' con la verifica del certificato spenta chiunque sul percorso di rete puo' impersonare il provider, e con le credenziali nell'URL user e password finiscono nei log di proxy e web server.
- Le 5 Action mail (`SendMailAction`, `TryMailAction`, `SendMailtrapMailAction`, `Engines/Duocircle/{Send,Try}DuocircleMailAction`) ereditano dal vecchio `MailService` fluente il `setLocalVars()`: ogni chiave di `$vars` diventa una proprieta'. Il contratto giusto e' gia' scritto in `SMS/SendSmsAction.php:116-127`, che ammette solo `to`, `from`, `body`.
- `Jobs/SendNotificationJob.php` incapsulava `SendNotificationAction::handle()` in coda. La story [4.27](./4.27.jobs-to-queueable-actions.story.md) lo dichiara cancellato.

## Stato misurato

Misura del 2026-10-20 tra le 13:35 e le 14:05 UTC. Cifre volatili: altre sessioni editano.

- TLS spento: `rg -n 'VERIFYPEER' laravel/Modules/Notify/app` stampa `EsendexSendAction.php:47` e `:83` (2 righe; controprova: lo stesso pattern su `laravel/vendor/guzzlehttp/guzzle/src` ne stampa 3).
- Credenziali in query string: `EsendexSendAction.php:88` (`login?username=..&password=..`).
- Zero consumatori in produzione: `rg -n 'EsendexSendAction' laravel/Modules --glob '!**/docs/**' -g '*.php'` trova solo `Notify/tests/Unit/NotifyHighestMissCoverageTest.php:18,577` e `Notify/tests/Unit/Actions/EsendexSendActionTest.php`. Non e' registrata in `Factories/SmsActionFactory.php`.
- Nessuna config: `rg -n -i 'esendex' laravel/config laravel/Modules/*/config` stampa 0 righe (controprova: `rg -n 'openai' laravel/config` ne stampa 2). `Assert::string(config('esendex.username'))` (righe 85-86) lancia, quindi l'Action oggi non puo' girare: il rischio e' latente.
- Iniezione di proprieta': `rg -nF '$this->{$key}' laravel/Modules/Notify/app` stampa 5 righe: `Mail/SendMailAction.php:46`, `Mail/TryMailAction.php:46`, `Mail/SendMailtrapMailAction.php:27`, `Mail/Engines/Duocircle/SendDuocircleMailAction.php:40`, `Mail/Engines/Duocircle/TryDuocircleMailAction.php:35`. Nelle prime due l'iniezione viene DOPO `$this->to/$body/$from/$driver = ...`: un `$vars['to']` o `$vars['driver']` li sovrascrive, e `driver` sceglie la classe motore (riga 52). Nella Mailtrap viene prima, quindi to/body/from non si sovrascrivono ma si creano proprieta' dinamiche.
- Il driver di default `duocircle` non funziona: `SendDuocircleMailAction.php:46` lancia sempre `RuntimeException('WIP')`. Le 5 Action mail hanno 0 consumatori in produzione (`rg -n 'SendMailAction|TryMailAction|SendMailtrapMailAction' laravel/Modules --glob '!**/Actions/Mail/**' --glob '!**/tests/**' --glob '!**/docs/**' -g '*.php'`).
- `SendNotificationJob`: il file esiste ancora (`git -C laravel/Modules/Notify ls-files app/Jobs` lo elenca, ultimo commit `f49605a37` del 2026-09-24), contro la story 4.27. Nessun `dispatch` nel codice. Legge `config('notify.queue.*')` (righe 55-61), chiavi assenti da `Notify/config/notify.php` (`rg -n -i 'queue' laravel/Modules/Notify/config/notify.php` stampa 0; controprova: `rg -c -i 'sms|mail'` sullo stesso file ne stampa 3).
- Deriva della 4.27 su `Jobs/SendScheduledPushNotification.php`: `Actions/Push/SendScheduledPushNotificationAction.php:21` esiste ma nessuno la usa, mentre `Actions/Push/SchedulePushNotificationAction.php:34` fa ancora `SendScheduledPushNotification::dispatch($jobId)`.
- Nessun merge aperto: `ls laravel/Modules/Notify/.git/MERGE_HEAD` assente, nessun marker `<<<<<<<` in app e tests.

## Lavoro

1. `EsendexSendAction.php:47,83`: riattivare la verifica TLS passando a `Http::` di Laravel (default sicuro). Rischio basso. Prima la decisione 1.
2. `EsendexSendAction.php:88`: togliere la password dall'URL. Fix: `Http::post` con le credenziali nel body, oppure header se il provider lo prevede. Rischio medio: il provider potrebbe accettare il login solo via GET (doc del provider non verificata). Decisione 2.
3. Config: creare `Notify/config/esendex.php` con `env()` per username, password, sender, oppure cancellare l'Action. Senza uno dei due l'Action e' un guscio.
4. `Mail/SendMailAction.php:46`, `Mail/TryMailAction.php:46`: sostituire il ciclo con un elenco chiuso (`to`, `from`, `body`, come `SendSmsAction.php:116-127`) e tenere il resto solo in `$this->vars`. Rischio basso (0 consumatori). Eseguire lo stesso schema negli altri 3 file oppure togliere il ciclo, perche' tutto passa da `$this->vars = array_merge(...)`.
5. `SendNotificationJob.php`: cancellarlo se `SendNotificationAction` ottiene `execute()` (vedi [notify-entrypoints-and-missing-helper](./notify-entrypoints-and-missing-helper.story.md)), altrimenti togliere le chiavi `notify.queue.*` e registrare il motivo. Rischio basso.
6. `SchedulePushNotificationAction.php:34`: finire la migrazione della 4.27 (chiamare `SendScheduledPushNotificationAction` con `onQueue()->execute()` e poi cancellare il Job) oppure marcare la 4.27 come parziale con una nota datata in coda. Rischio medio: il percorso e' vivo e usa la cache `scheduled_push:*`.

## Acceptance criteria

- [ ] `rg -n 'VERIFYPEER' laravel/Modules/Notify/app` stampa 0 righe (prima del fix: 47 e 83).
- [ ] `rg -nP 'login\?username|&password=' laravel/Modules/Notify/app` stampa 0 righe (prima: riga 88).
- [ ] `rg -nF '$this->{$key}' laravel/Modules/Notify/app` stampa 0 righe (prima: 5).
- [ ] Decisione scritta su Esendex (cancellata oppure con `config/esendex.php` e `SmsActionFactory`) e su `SendNotificationJob`.
- [ ] Per ogni Action toccata esiste un test scritto prima del fix; non si esegue finche' la guardia DB non e' dentro.
- [ ] `phpstan analyse` mirato sui soli file toccati: `[OK] No errors`, nessun `@phpstan-ignore`, nessun `mixed` nuovo.
- [ ] `git -C laravel/Modules/Notify status --short app tests` elenca solo i file del perimetro.

## Verifica

Da `laravel/`, solo lettura. Ogni zero va controprovato (vedi sopra).

```bash
rg -n 'VERIFYPEER' Modules/Notify/app
rg -nF '$this->{$key}' Modules/Notify/app
rg -n 'EsendexSendAction' Modules --glob '!**/docs/**' -g '*.php'
git -C Modules/Notify ls-files app/Jobs
rg -nF 'SendScheduledPushNotification::dispatch' Modules/Notify/app
```

## Vincoli

Nessun Pest/PHPUnit finche' la guardia DB (`Xot/tests/Support/TestDatabaseGuard.php`) non e' dentro e l'utente non ha confermato che i DB `*_test` sono usa-e-getta. PHPStan solo mirato, in coda `flock` di `bashscripts/docs/prompts/11-phpstan.md`; un solo run completo, a swarm fermo e a RAM libera. Un solo agente per modulo che edita PHP: oggi in `Notify/app/Filament` ci sono 3 file modificati e non committati da un'altra sessione (`git -C laravel/Modules/Notify status --short app`), chiedere prima di aprire PHP. `laravel/phpstan.neon` immutabile. Forward-only: niente commit, checkout, reset, restore, stash. Pest resta Pest. Niente nuovi `*Service`: logica in Spatie QueueableAction con `execute()`. Niente `mixed`, `@var` o ignore di comodo. Il `docs/` di Notify e' di un'altra sessione: non toccarlo.

## Decisioni aperte

1. Esendex: cancellare l'Action con i suoi 2 test (zero consumatori, regola 25) oppure completarla? Raccomandato: cancellare, a meno che un cliente usi quel provider.
2. Il provider accetta il login senza password nell'URL? Se no, l'unica mitigazione e' TLS attivo piu' niente log dell'URL.
3. Il Job `SendScheduledPushNotification` va tolto adesso o con la lane Push?

## Come ripartire

1. Chiedere chi sta editando `Notify/app` e leggere la decisione 1 con l'utente; senza risposta, partire dai punti 4 e 5, che non toccano la rete.
2. Scrivere il test (non eseguirlo) per l'elenco chiuso di `$vars` in `SendMailAction`, poi applicare il fix del punto 4 con il gate lock+mtime.
3. Rilanciare i 5 comandi di Verifica, annotare l'output nella sezione di chiusura e aggiornare second brain (memoria e wiki del modulo).
