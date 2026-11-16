---
id: Notify/module-bmad-audit-20261116
title: "Notify: audit modulare completo"
status: ready-for-dev
module: Notify
epic: module-governance
priority: P1
created: 2026-11-16
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
  - ../audit.md
  - ../audits
---
# Story — Notify: audit modulare completo

Come manutentore del modulo Notify, voglio una baseline BMAD verificabile e un
audit tecnico aggiornato, così da poter pianificare lavoro senza confondere
ipotesi, WIP e comportamento osservato.

## Acceptance criteria

- [ ] Confermare API pubblica e confini con riferimenti a codice reale.
- [ ] Inventariare i flussi critici e collegarli a test Pest.
- [ ] Misurare PHPStan/Pest nel contesto stabile del modulo.
- [ ] Registrare dipendenze, rischi e decisioni nel modulo.
- [ ] Aggiornare lo stato reale in `docs/sprint-status.yaml`.

## Task

- [ ] Revisione architettura.
- [ ] Brainstorming con stakeholder.
- [ ] Decomposizione epic in story più piccole.
- [ ] Quality gate e second-brain write-back.

## Audit tecnico — 2026-11-16

Misurato sul worktree corrente. PHPStan level max su `Modules/Notify`: **0 errori**.

### Struttura e conteggi

| Area | Conteggio |
|---|---:|
| File PHP in `app/` | 254 |
| Modelli Eloquent | 18 (+ `Models/Contracts`, `BaseModel`, `BasePivot`, `BaseMorphPivot`) |
| Notification custom | 10 (`app/Notifications/`) |
| Mailable | 2 (`app/Mail/`) + `Emails/` |
| Business Action | 53 in `app/Actions/` (Mail+Engines/Duocircle, NotifyTheme, Push, SMS, Telegram, WhatsApp) |
| Channel custom | `app/Channels/` (WhatsApp, Telegram, Netfun, Sms) + `Notifications/Channels/` |
| Filament Resources | 6 (Contact, MailTemplate, Notification, NotificationLog, NotificationTemplate, NotifyTheme) |
| Pagine Filament | Dashboard, SettingPage + cluster `Test` (~15 pagine: SendEmail, SendSms, SendTelegram, SendWhatsApp, SendPush, Slack, Smtp, Firebase…) |
| Migrazioni | 32 |
| File di test | 170 PHP, 138 con `test()`/`it()` Pest, 0 `expect(true)` |
| Lang | `it` 91 file / `en` 48 / `de` 60 / `es` 21; `fr`/`hi`/`pl`/`pt`/`ru`/`zh` solo 1-2 file (stub) |

Nessuna directory `Services/` né `Listeners/` — logica in Action/Channel,
coerente con la convenzione Xot.

### Finding

1. **[Code — alta] File di backup `.up` nel codice**: 10 residui
   (`app/Models/NotificationLog.php.up`, `notificationlog.php.up`,
   `NotificationTemplateVersion.php.up`, `notificationtemplateversion.php.up`,
   `app/Filament/Resources/notificationtemplateresource.php.up`,
   `NotificationTemplateResource.php.up`,
   `MailTemplateResource/RelationManagers/*.php.up` ×5). Rischio: file non-PHP
   con estensione `.up` non sono autoloadati ma sono duplicati stale che
   confondono ricerche e merge. Da eliminare.
2. **[i18n — alta] `lang/en` molto incompleto**: `it` ha 91 file, `en` 48;
   ~30 file it-only (forms/infolist Filament, enum, template). Le locale
   `fr/hi/pl/pt/ru/zh` sono stub di 1-2 file — o completare o rimuovere.
   Presente anche `lang/it/.php.fixed` (residuo).
3. **[Filament — media] 27 chiamate hardcoded `->label()/->helperText()/->placeholder()`**
   in 6 file: `NotificationResource/Schemas/NotificationForm.php` e
   `Tables/NotificationsTable.php` (label inglesi hardcoded: 'Notification
   Type', 'Read', 'Unread'…), `MailTemplateResource/Schemas/MailTemplateForm.php`,
   e le pagine del cluster Test (`SendTelegramPage`, `SendWhatsAppPage`,
   `SendNetfunSmsPage`). Violano `no-filament-labels`.
4. **[Test — media] File test duplicati minuscoli**: `tests/Feature/jsoncomponentstest.php`
   e `emailtemplatestest.php` duplicano `JsonComponentTest.php` /
   `EmailTemplatesTest.php` senza namespace/TestCase — probabilmente non
   eseguiti o eseguiti in modo anomalo. Da rimuovere o consolidare.
5. **[Qualità — bassa] 279 occorrenze `mixed`**, quasi tutte docblock
   `array<string, mixed>`/`Builder<static>` annotate e firmate `mixed`
   intenzionali e documentate (es. `ConfigHelper::get`, `invoke()` verso
   librerie esterne). Solo ~5 type-hint `mixed` reali. Nessun
   `property_exists()` su Eloquent, nessun `@phpstan-ignore`, nessun merge
   marker.
6. **[Docs — alta] Doc sprawl estremo**: `docs/` contiene **3.205 file `.md`**,
   con centinaia di duplicati datati (`*-1.md`, `*-2025-10-01.md`,
   `analisi-*.md`). Una pulizia massiva è in corso da altri agenti (molti `D`
   in git status); questo audit si limita a `docs/bmad/`.
7. **[Docs/bmad — ok]** Struttura BMAD presente (architecture, audits,
   brainstorming, epics, production, raw, screenshots, stories) + `README.md`.

### Rischi

- I file `.up` e i duplicati test minuscoli sono sorgenti di confusione e
  potenziali divergenze silenziose.
- Il gap i18n EN è il più ampio dei tre moduli auditati: le label IT sono la
  fonte di verità de facto.
- Le 15+ pagine del cluster Test espongono canali reali (Telegram, WhatsApp,
  SMS, push, SMTP): verificare permission e che non sparino messaggi in prod.

### Next steps (priorizzati)

1. **P1** — Eliminare i 10 file `.up` e `lang/it/.php.fixed`.
2. **P1** — Verificare `canView`/permission del cluster Filament `Test`
   (canali di messaggistica reale).
3. **P1** — Sweep label hardcoded in `NotificationResource`, `MailTemplateForm`
   e pagine Test → traduzioni auto.
4. **P1** — Allineare `lang/en` (~30 file mancanti) o decidere officially
   IT-only; rimuovere/implementare le 6 locale stub.
5. **P2** — Consolidare i test duplicati minuscoli in `tests/Feature/`.
6. **P2** — Coordinare con la doc-sprawl cleanup già in corso su `docs/`.
