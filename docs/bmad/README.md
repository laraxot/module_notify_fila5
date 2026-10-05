---
<<<<<<< .merge_file_JWwM1w
title: "Notify — BMAD"
type: note
tags: [bmad, index, notify, notifications, email, sms, push, telegram, whatsapp]
created: 2026-09-28
updated: 2026-09-28
qmd: "Notify BMAD indice documentazione modulo notifiche email sms push"
related:
  - ./architecture.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./quick-reference.md
  - ./setup-guide.md
  - ./architecture/module-boundary.md
  - ./brainstorming/module-opportunities.md
  - ./antigravity-integration.md
---

# Notify — BMAD

> **SUMMARY**: indice dei documenti BMAD per il modulo `Modules\Notify`
> (`laravel/Modules/Notify/`), con collegamenti verificati a shard, epiche,
> story e guide. Vedi `laravel/Modules/Xot/docs/bmad-method.md` per il metodo
> BMAD usato nel progetto Laraxot.

## Namespace e providers

- Namespace principale: `Modules\Notify`
- Providers dichiarati in `module.json`:
  - `Modules\Notify\Providers\NotifyServiceProvider`
- Providers aggiuntivi in `composer.json`:
  - `Modules\Notify\Providers\Filament\AdminPanelProvider`
- Estende `Modules\Xot\Providers\XotBaseServiceProvider`
  (`app/Providers/NotifyServiceProvider.php:15`)

## Documenti canonici BMAD

| Documento | Stato | Note |
|---|---|---|
| [README.md](./README.md) | indice | questo file |
| [architecture.md](./architecture.md) | indice root | punta a `architecture/module-boundary.md` |
| [brainstorming.md](./brainstorming.md) | indice root | punta a `brainstorming/module-opportunities.md` |
| [epics/module-roadmap.md](./epics/module-roadmap.md) | epic roadmap | Epica A/B/C/D con DoD |
| [epics/notification-channels.epic.md](./epics/notification-channels.epic.md) | epic | canali e provider di notifica |
| [quick-reference.md](./quick-reference.md) | note | comandi, path, pattern rapidi |
| [setup-guide.md](./setup-guide.md) | note | ambiente di sviluppo |
| [antigravity-integration.md](./antigravity-integration.md) | note | integrazione IDE Google Antigravity |

## Shard architettura

- [architecture/module-boundary.md](./architecture/module-boundary.md) —
  inventario `app/` (246 PHP), `tests/` (158), aree e confini verificati.

## Shard brainstorming

- [brainstorming/module-opportunities.md](./brainstorming/module-opportunities.md) —
  domande ad alto valore, ipotesi, rischi.

## Epic

- [epics/module-roadmap.md](./epics/module-roadmap.md) — roadmap epica A/B/C/D.
- [epics/notification-channels.epic.md](./epics/notification-channels.epic.md) —
  epic concreta su canali notifica e provider.

## Stories esistenti

- [stories/module-bmad-audit-20260928.story.md](./stories/module-bmad-audit-20260928.story.md)
- [stories/git-status-fleet-merge-markers-notify.story.md](./stories/git-status-fleet-merge-markers-notify.story.md)
- [stories/netfun-conflict-markers.story.md](./stories/netfun-conflict-markers.story.md)
- [stories/cleanup-notify-2026-09-22.story.md](./stories/cleanup-notify-2026-09-22.story.md)

## Struttura moduliare (file -> responsabilità)

| Area | Path | Responsabilità |
|---|---|---|
| Config | `config/config.php` | icona, navigazione, provider, route |
| Config | `config/notify.php` | configurazione notifica |
| Config | `config/sms.php` | driver SMS |
| Config | `config/telegram.php` | driver Telegram |
| Config | `config/whatsapp.php` | driver WhatsApp |
| Config | `config/beautymail.php` | template email |
| Model | `app/Models/Notification.php` | notifica base |
| Model | `app/Models/NotificationTemplate.php` | template notifica (SpatieTranslatable) |
| Model | `app/Models/NotificationLog.php` | log notifica (`notification_logs`) |
| Model | `app/Models/MailTemplate.php` | template email (SpatieMailTemplate) |
| Model | `app/Models/MailTemplateVersion.php` | versione template |
| Model | `app/Models/MailTemplateLog.php` | log template |
| Model | `app/Models/Contact.php` | contatto notifica |
| Model | `app/Models/NotifyTheme.php` | tema notifica |
| Model | `app/Models/NotificationType.php` | tipo notifica |
| Model | `app/Models/NotifyThemeable.php` | pivot tema |
| Model | `app/Models/Theme.php` | tema base |
| Model | `app/Models/BaseModel.php` | base modello |
| Policy | `app/Models/Policies/NotifyBasePolicy.php` | policy base |
| Policy | `app/Models/Policies/NotificationPolicy.php` | policy notifica |
| Policy | `app/Models/Policies/MailTemplatePolicy.php` | policy template email |
| Resource | `app/Filament/Resources/ContactResource` | CRUD contatti |
| Resource | `app/Filament/Resources/MailTemplateResource` | CRUD template email |
| Resource | `app/Filament/Resources/NotificationResource` | CRUD notifiche |
| Resource | `app/Filament/Resources/NotificationLogResource` | log notifiche |
| Resource | `app/Filament/Resources/NotificationTemplateResource` | CRUD template notifica |
| Resource | `app/Filament/Resources/NotifyThemeResource` | CRUD temi |
| Channel | `app/Channels/SmsChannel.php` | canale SMS |
| Channel | `app/Channels/TelegramChannel.php` | canale Telegram |
| Channel | `app/Channels/WhatsAppChannel.php` | canale WhatsApp |
| Channel | `app/Channels/NetfunChannel.php` | canale Netfun SMS |
| Notification | `app/Notifications/` | 12 classi (email, SMS, push, telegram, whatsapp, theme) |
| Job | `app/Jobs/SendNotificationJob.php` | invio notifica in coda |
| Job | `app/Jobs/SendScheduledPushNotification.php` | push programmato |
| Action | `app/Actions/SendNotificationAction.php` | orchestrazione invio |
| Action | `app/Actions/NotificationManager.php` | gestione notifiche |
| Action | `app/Actions/SMS/` | 11 action driver SMS |
| Action | `app/Actions/Push/` | 10 action push |
| Action | `app/Actions/Telegram/` | 3 action Telegram |
| Action | `app/Actions/WhatsApp/` | 4 action WhatsApp |
| Action | `app/Actions/Mail/` | 7 action email |
| Enum | `app/Enums/ChannelEnum.php` | canali |
| Enum | `app/Enums/NotificationTypeEnum.php` | tipi notifica |
| Console | `app/Console/Commands/SendMailCommand.php` | invio email da CLI |
| Migrations | `database/migrations/` | ~20 migrazioni (mail_templates, notifications, notify_contacts, notification_logs) |
| Lang | `lang/de`, `lang/en`, `lang/it`, `lang/es`… | 13 lingue, chiavi `notify`, `mail_template`, `notification`, `sms_driver` |
| Tests | `tests/` | 158 file (Unit/Feature/Filament) |

## Dipendenze esterne (da `composer.json`)

- `spatie/laravel-medialibrary` — gestito interno o tramite Media
- `spatie/parsed-...` (email template parsing)
- Driver SMS: Twilio, Plivo, Nexmo, Agiletelecom, Gammu, SmsFactor, Netfun

## Vedi anche

- [README](./README.md)
- [Architettura — module boundary](./architecture/module-boundary.md)
- [Brainstorming — module opportunities](./brainstorming/module-opportunities.md)
- [Epic roadmap](./epics/module-roadmap.md)
- [Epic channels](./epics/notification-channels.epic.md)
- [Quick reference](./quick-reference.md)
- [Setup guide](./setup-guide.md)
- [BMAD method (Xot)](../../Xot/docs/bmad-method.md)
=======
title: "Notify — BMAD Method Integration"
description: "BMAD workflow documentation per il modulo Notify"
module: "Notify"
alias: "notify"
version: "1.0.0"
priority: 70
active: true
status: "core-foundation"
author: "Team Laraxot"
license: "MIT"
php_version: "^8.3"
core_version: "13.0"
dependencies: ["Xot", "Tenant", "Lang", "User"]
extends: ["XotBaseServiceProvider", "XotBaseResource", "XotBasePanelProvider"]
extended_by: 0
documentation_date: "2026-09-29"
bmad_version: "6.2.0"
bmad_track: "shared-service"
---

# Notify — BMAD Method Integration

## Scopo BMAD per Notify

Notify è il **modulo di notifica multi-canale** dell'ecosistema: gestisce email, SMS, WhatsApp, Telegram, push FCM/APNs/WebPush e notifiche database. In BMAD, questo modulo rappresenta l'**infrastruttura di comunicazione** del sistema — ogni notifica inviata da altri moduli passa per Notify.

## Religione BMAD per Notify

Notify segue i principi BMAD di:

1. **Actions, non Services** — tutta la logica di invio passa per Spatie Queueable Actions con `->execute()`
2. **Driver configurabili, non hardcoded** — SMS, WhatsApp, Telegram e push sono risolti via factory + config, mai via switch in codice
3. **Template separati dal canale** — `MailTemplate` (Spatie), `NotificationTemplate` (Blade) e `NotifyTheme` sono risolti indipendentemente dal canale di consegna
4. **PHPStan Level 10** — sicurezza tipografica non negoziabile; APNS/WebPush sono simulati, i tipi devono comunque essere rigorosi
5. **Mai estendere Filament direttamente** — tutte le risorse admin passano per `XotBaseResource` / `LangBaseResource`
6. **La docs è memoria** — decisioni, bug noti e WIP sono documentati in questa cartella e nel wiki `docs/wiki/concepts/`

## Workflow BMAD Consigliati per Notify

### Phase 1: Analysis
```bash
bmad-domain-research      # Studio dominio notifiche: email, SMS, push, chat
bmad-technical-research   # Valutazione librerie: Spatie mail-templates, FCM SDK, Telegram Bot API
bmad-create-product-brief # Breve: multi-channel notification hub con template e log
```

### Phase 2: Planning
```bash
bmad-create-prd           # PRD: canali supportati, driver configurabili, delivery log
bmad-create-architecture  # Architettura: Channels → Factories → Actions → Providers
```

### Phase 3: Solutioning
```bash
bmad-create-epics-and-stories  # Epic: SMS providers, push platforms, mail engines, template management
bmad-check-implementation-readiness  # Validate prima di implementare
```

### Phase 4: Implementation
```bash
bmad-sprint-planning      # Sprint iniziale per driver SMS e canali
bmad-create-story         # Story: NotificationTemplate model, SmsActionFactory
bmad-dev-story            # Implementazione driver e canali
bmad-code-review          # Review con focus su PHPStan L10 e tipi mixed
```

## Quick Flow per Notify

Per task rapidi su Notify:
```bash
bmad-quick-dev "Aggiungi driver WhatsApp per 360dialog"
bmad-quick-spec "Specifica payload push FCM con target"
```

## Agenti Specializzati per Notify

| Agente | Ruolo | Quando Usare |
|--------|-------|--------------|
| Mary 📊 | Analyst | Studio dominio notifiche, provider SMS/WhatsApp/Telegram |
| John 📋 | PM | PRD canali, policy log, retention delle notifiche |
| Winston 🏗️ | Architect | Architettura factory → action → channel, tipi payload |
| Amelia 💻 | Developer | Implementazione driver, Actions, Channels, PHPStan L10 |
| Quinn 🧪 | QA | Test consegna, retry, rate-limit, circuit-breaker |

## Configurazione

```bash
# Verifica che Notify sia abilitato
php artisan module:status Notify

# Esegui migration (solo aggiuntive — mai migrate:fresh)
php artisan migrate --path=modules/Notify/database/migrations

# Verifica PHPStan
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Notify

# Test
./vendor/bin/pest --filter=Notify
```

## Struttura Output BMAD

```
_bmad-output/
├── planning-artifacts/
│   ├── PRD.md              # Requisiti modulo Notify
│   ├── architecture.md     # Architettura canali, factory, driver
│   └── epics/
│       ├── epic-001-sms-providers.md
│       ├── epic-002-push-platforms.md
│       ├── epic-003-mail-engines.md
│       └── epic-004-template-management.md
└── implementation-artifacts/
    ├── sprint-status.yaml
    └── story-001-smsactionfactory.md
```

## Vedi Anche

- [quick-reference](quick-reference.md)
- [setup-guide](setup-guide.md)
- [livewire-inventory](livewire-inventory.md)
- [BMAD Workflow Catalog](../bmad-workflow-catalog.md)

---

*Notify · BMAD Method · data 2026-09-29*
>>>>>>> .merge_file_XM8rZ7
