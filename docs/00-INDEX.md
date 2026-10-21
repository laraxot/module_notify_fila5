---
title: "00 INDEX"
type: note
<<<<<<< .merge_file_VKmujK
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "00 INDEX"
issues: []
discussions: []
=======
status: active
tags: [documentation]
created: 2026-09-26
updated: 2026-10-20
qmd: "notify 00-INDEX indice operativo canonico famiglie radice directory canoniche evidence legacy"
issues: []
discussions: []
related:
  - ./stories/docs-ingressi-notify.story.md
>>>>>>> .merge_file_dpCBWi
---

# 📚 **Indice Documentazione Modulo Notify**

**Status gate**: `cd laravel && ./vendor/bin/phpstan analyse Modules` → **file_errors 0**, exit 0 (verificato 2026-10-20). Religione: **scopo → fix** (capire perche' esiste il codice, poi correggere la causa; niente ignore/baseline). **Config unica:** solo `laravel/phpstan.neon` (modifica solo umano; mai `-c` o neon temporanei) — [Xot — phpstan single neon](../../Xot/docs/wiki/memories/phpstan-single-neon-config.md).
**Versione**: non dichiarata in `composer.json` ne' in `module.json`; il "2.1.0" qui riportato in passato viene solo dal changelog di `README.md` (2025-01-22).

**Perche' esiste:** [scopo.md](./scopo.md). Cosa fa il codice: [README.md](./README.md) (sezioni "Mappa del codice" e "Limiti verificati"). Wave PHPStan: [stories/phpstan-wave-coord.story.md](./stories/phpstan-wave-coord.story.md) (`.cursor-scratch/phpstan-wave/Notify.tsv`). `Services\NotificationManager` riesumato da merge e **eliminato** (7 errori): [stories/phpstan-notificationmanager-service-removed.story.md](./stories/phpstan-notificationmanager-service-removed.story.md) — canonico `Actions\NotificationManager` con `execute()` tipizzato. Gate Modules a zero: [phpstan-modules-zero-gate](../../Xot/docs/stories/phpstan-modules-zero-gate.story.md). Wave Services→Actions (hub Xot): [services-to-actions-global-wave](../../Xot/docs/stories/services-to-actions-global-wave.story.md). `00-index.md` e' stub verso qui.

## Come orientarsi in 3.465 file (misurato il 2026-10-14)

La cartella ha 3.465 file `.md`, 1.552 dei quali nella radice. Quasi tutto e' storico accumulato da sessioni di lavoro di
agenti AI (848 dei 1.551 file `.md` della radice contengono emoji, 1.243 hanno `status: draft`, in gran parte assegnato
dalla passata meccanica del 2026-10-14, 36 sono `deprecated`, 258 non hanno la chiave `status`). Per rispondere a una domanda sul modulo l'ordine di fiducia e': codice, poi
[README.md](./README.md), poi le pagine elencate sotto, poi il resto.

| Directory | File .md | Ruolo |
|---|---|---|
| `wiki/` | 912 | canonica per regole e concetti, ma con molte copie e stub; ingresso [wiki/index.md](./wiki/index.md), registro [wiki/log.md](./wiki/log.md) |
| `ai-agents/` | 288 | evidence: copie di guide per agenti AI valide per tutto il repo (GSD, BMAD, bootstrap `claude`/`gemini`/`qwen`/`iflow`; il suo `00-INDEX.md` indica come origine `bashscripts/ai/.agents/docs/`), non specifiche di Notify |
| `project_docs/` | 130 | evidence: report e cronaca di progetto, in gran parte di ottobre 2025 (`COMPLETION_SUMMARY.md`, `FINAL_*_REPORT*`, `roadmaps/*-completion-report*`) |
| `mail-templates/` (67), `notifications/` (23), `email-sending/`, `emails/`, `sms/`, `messaging/` | 67, 23 | documentazione tematica viva, da verificare contro il codice |
| `project/` | 65 | evidence/legacy: pianificazione |
| `bmad/` | 54 | canonica per il dossier BMAD ([bmad/architecture.md](./bmad/architecture.md)) |
| `raw/` | 45 | evidence immutabile: non modificare |
| `stories/` | 28 | canonica per le story del modulo |
| `github/`, `roadmap/`, `superpowers/`, `architecture/`, `reports/`, `refactoring/`, `_integration/`, `best-practices/` | 26, 26, 22, 17, 17, 15, 15, 13 | evidence o legacy |
| radice | 1.552 | storico: vedi famiglie sotto |

Famiglie dei 1.551 file `.md` della radice, classificate **per nome file** con espressioni regolari (non per contenuto; conteggi del 2026-10-14, riproducibili con uno script di una trentina di righe):
cronaca di sessione e completamento 263 (`sessione-*`, `*-complet*`, `super-*`, `master-*`, `zen-*`, `*-summary`, `*-report`);
canali email, mail e template 119; architettura, convenzioni e standard 113; Filament, UI, Tailwind e design 107;
analisi e audit 102; PHPStan 82; Git, merge, percorsi, composer e sync 76; refactoring, correzioni e implementazioni 71;
canali SMS e provider 71; database, DTO, factory e migrazioni 58; roadmap, prodotto e progetto 56; piani e guide operative 48;
agenti AI, MCP, BMAD e regole 42; traduzioni 40; notifiche, contatti e tracking 39; Telegram, WhatsApp, push 27;
indici e ingressi 17; verifica e controlli 11; non classificati 209.
Varianti dello stesso nome (maiuscole, `_` contro `-`, suffisso `-N`): 413 gruppi che coinvolgono 1.106 file.
21 nomi finiscono con `-.md` (data tolta dal nome da un rinomina automatico, es. `analisi-completa-.md`).
34 file della radice hanno chiavi duplicate nel frontmatter (YAML non valido per i parser rigorosi).

## 🎯 **Lettura Essenziale**
1. [README.md](./README.md) - Codice reale, mappa, limiti (la `readme.md` minuscola e' una copia parziale della seconda meta' di `README.md`).
2. [roadmap.md](./roadmap.md) - ATTENZIONE: e' la roadmap del "FixCity Design System" (aggiornata al 3 aprile 2026), non del modulo Notify; non descrive "Multi-channel API e AI Templates".
3. [philosophy.md](./philosophy.md) - Filosofia del modulo (`status: draft`).

## 🏗️ **Architettura & Canali**
- 📧 **[Email System](./email-templates.md)** - Stub di 281 byte ("template Blade in `resources/views/emails`"). Per il sistema reale: [mail-templates/](./mail-templates/) e [spatie-database-mail-templates-deep-dive.md](./spatie-database-mail-templates-deep-dive.md).
- 💬 **[SMS & WhatsApp](./whatsapp-integration.md)** - Guida WhatsApp (17 KB, `status: draft`); i driver SMS reali sono elencati in README, "Mappa del codice".
- 🚀 **[Bulk Notifications](./send-notification-bulk-action.md)** - Guida (13 KB) a una `SendNotificationBulkAction` che NON esiste in `app/` ne' in `tests/`; l'invio massivo reale e' `app/Actions/SendRecordsNotificationAction.php` con `Datas/SendNotificationBulkResultData.php`.
- 🧱 **[Base Templates](./base-templates.md)** - Struttura HTML responsive per messaggi transazionali.

## ⚙️ **Configurazione Avanzata**
- 📦 **[Composer Dependencies](./composer-dependencies.md)** - Firebase, FCM, Telegram: package nel modulo Notify, mai nel root.
- 📦 **[Riferimento pacchetti](../../../../bashscripts/ai/wiki/rules/composer-packages-reference.md)** - AWS, Telegram, Postmark, Spatie mail templates. L'"Inventario 312 pacchetti" (`docs/architecture/composer-packages-full-inventory.md`) non esiste nel repository (find del 2026-10-14).
- 🛠️ **[Channel Provider](./provider-actions-architecture.md)** - Come estendere il modulo con nuovi driver.
- 🏷️ **[Acronym Naming](./acronym-naming-conventions.md)** - Standard per la denominazione dei driver e canali.
- 🔄 **[Monitoring](./monitoring.md)** - Metriche e log proposti; cita `TrackNotificationEventAction`, che non esiste in `app/`. Le code reali: `app/Jobs/SendNotificationJob.php` e `SendScheduledPushNotification.php`.

## 🧪 **Qualità e Sviluppo**
- ✅ **Gate Modules a zero (2026-10-20)** — `phpstan analyse Modules`: file_errors 0. Story chiusura NotificationManager: [phpstan-notificationmanager-service-removed](./stories/phpstan-notificationmanager-service-removed.story.md). Hub: [Xot phpstan-modules-zero-wave3](../../Xot/docs/stories/phpstan-modules-zero-wave3.story.md).
- ✅ **[PHPStan Analysis](./phpstan-fixes.md)** - Report storici Level 10 (evidence; lo stato vivo e' il gate sopra).
- 🚨 **[PHPStan Cluster](./phpstan-cluster.md)** - Modelli canonici mancanti per log/canali e impatto su factory/controller (il file con data `phpstan-cluster-2026-03-10.md` non esiste).
- 🧭 **[No Orphan Http Controllers](./no-orphan-http-controllers.md)** - Regola: i controller web senza route non devono restare nel modulo. Stato del codice: `NotificationTrackingController` esiste ancora, senza rotta (vedi README, "Limiti verificati").
- 🚫 **[No NotificationTrackingController](./no-notification-tracking-controller.md)** - Regola, non stato: il file e' ancora in `app/Http/Controllers/`; il test d'architettura che dovrebbe vietarlo usa un path errato e non protegge.
- **[PHPStan test wave, lane notify-b](./stories/phpstan-test-wave-notify-b.story.md)** - 32 file di test portati a 0 errori (2026-10-20): cause, file neutralizzati (`Theme`, `EmailTemplate`) e decisioni aperte (`template_id` vs `mail_template_id`, `mail_template_logs` senza migration).
- **[PHPStan test wave, lane notify-a](./stories/phpstan-test-wave-notify-a.story.md)** - 34 file (test e produzione) da 835 a 7 errori (2026-10-20): helper di `tests/TestCase.php`, 7 test riportati alla forma allineata dell'8 ottobre, `NotificationManager` che chiamava `execute()` inesistente; `NotificationApiTest` saltato per gate.
- **[PHPStan test wave, lane notify (residuo)](./stories/phpstan-test-wave-notify.story.md)** - Residuo di `notify-a` e `notify-b` (2026-10-20): `NotificationApiTest` testa un'API REST (`/api/notify/send`, `/api/notify/templates`) senza rotte ne' controller; i quattro `.lock` tracciati in git bloccano il gate.
- 🔬 **[Testing Guidelines](./testing.md)** - Mocking dei canali e verifica invio.
- 📘 **[Docs-First Workflow](./docs-first-workflow.md)** - Sequenza obbligatoria docs -> codice -> tracking GitHub.
- 🧪 **PSR-4 Test Helpers** - Nei file Pest usare helper anonimi o support file dedicati; evitare classi top-level extra che rompono `composer dump-autoload`.

## 🪮 **Ponytail audit**
- 📋 **[Over-engineering audit](./ponytail-audit-over-engineering.md)** - SMS multi-driver, policy stub, remediation `.bak`. Lo stato dichiarato (8 Action SMS e 3 varianti Agiletelecom spostate in `.php.bak`) NON corrisponde al codice del 2026-10-14: in `app/` non c'e' nessun `.bak` tracciato e `app/Actions/SMS/` contiene ancora Twilio, Nexmo, Plivo, Gammu e le tre Agiletelecom; `SmsDriverEnum` ha solo `smsfactor`, ma `app/Factories/SmsActionFactory.php` mappa anche `twilio`.
- 🧾 **Decisione di consolidamento SMS** - il contenuto sta in [wiki/decisions/sms-actions-consolidation-consolidamento-contracts-ponytail-audit.md](./wiki/decisions/sms-actions-consolidation-consolidamento-contracts-ponytail-audit.md) (5,8 KB, `status: draft`); [sms-actions-consolidation.md](./wiki/decisions/sms-actions-consolidation.md) e' un rimando di 490 byte `deprecated` che punta a se stesso. Stessa discrepanza con il codice.

## 🧹 **Manutenzione**
- 🗑️ **[Cleanup Plan](./translation-cleanup-plan.md)** - Piano di pulizia delle traduzioni italiane, scritto per il progetto Quaeris (cita `/var/www/html/Quaeris/...`); non riguarda la pulizia dei file di docs.
- 🛡️ **[Security Analysis](./security-analysis.md)** - Analisi di sicurezza (289 righe, `status: draft`), non verificata contro il codice.

## 🔗 **Moduli Correlati**
- [Xot](../../Xot/docs/README.md) - Dispatcher centrale.
- [User](../../User/docs/readme.md) - Definizione dei destinatari e preferenze.

<!-- Blocco di frontmatter duplicato a meta' file, reso commento il 2026-10-14 (YAML invalido):
title: "00 INDEX"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "00 INDEX"
issues: []
discussions: []
-->

<<<<<<< .merge_file_VKmujK
---
title: "00 INDEX"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "00 INDEX"
issues: []
discussions: []
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

=======
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Duplicati e ingressi non canonici

- [00-index.md](./00-index.md) e' una copia per sola differenza di maiuscole (contenuto leggermente diverso: 3.755 contro 4.158 byte); `00-INDEX.md` e' l'unico indice.
- [INDEX.md](./INDEX.md) e [index.md](./index.md) hanno lo stesso testo (16 KB): un indice multilingue con sezioni ripetute ("Documentazione e Aggiornamenti" x5), link a SaluteOra e PTV e a file di `docs/` radice che non esistono; marcati `stale`.
- [readme.md](./readme.md) e' la seconda meta' di [README.md](./README.md) (che l'ha incorporata): non e' un ingresso.
- Wiki: [wiki/00-INDEX.md](./wiki/00-INDEX.md) e [wiki/00-index.md](./wiki/00-index.md) copiano questo indice con link relativi sbagliati; [wiki/INDEX.md](./wiki/INDEX.md) (8 KB) e [wiki/index.md](./wiki/index.md) (15 KB) sono copie dell'indice generico del progetto, con bersagli inesistenti: tutte e quattro marcate `stale`. Ingressi della wiki di Notify: [wiki/README.md](./wiki/README.md) (copia identica in `wiki/readme.md`), [wiki/log.md](./wiki/log.md) (registro cronologico), `wiki/concepts/` (30 file), `wiki/rules/`, `wiki/memories/`, `wiki/decisions/`.
- Pagine marcate `stale` con la ragione in testa al file: [roadmap.md](./roadmap.md), [send-notification-bulk-action.md](./send-notification-bulk-action.md), [monitoring.md](./monitoring.md), [ponytail-audit-over-engineering.md](./ponytail-audit-over-engineering.md), [wiki/decisions/sms-actions-consolidation-consolidamento-contracts-ponytail-audit.md](./wiki/decisions/sms-actions-consolidation-consolidamento-contracts-ponytail-audit.md).

>>>>>>> .merge_file_dpCBWi
## Documentazione BMAD del modulo

Aggiornata il 2026-10-07 dopo la risoluzione dei marker di merge nei docs (versioni composte, non scelte a un lato).

- [Brainstorming](bmad/brainstorming.md): decisioni, questioni aperte, opzioni scartate.
- [Architecture](bmad/architecture.md)
- [Quick reference](bmad/quick-reference.md)
- [Setup guide](bmad/setup-guide.md)
- Story: cartella [bmad/stories/](bmad/stories/).

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)
