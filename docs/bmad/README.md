---
<<<<<<< HEAD
title: "Notify Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-08-02
---

# Documentation

This directory contains documentation for the Notify module.

## Structure

- **architecture.md** - Module architecture and design patterns
- **README.md** - This file

## Guidelines

Documentation should be:
- Clear and concise
- Example-driven
- Updated with code changes
- Use Markdown format (.md)

## Sistemi di Notificazione

- Mail notifications
- Database notifications
- Template management
- Queue integration

## Modelli Principali (verificato 2026-07-24 contro `app/Models/`)

```php
Modules\Notify\Models\MailTemplate
Modules\Notify\Models\MailTemplateVersion
Modules\Notify\Models\MailTemplateLog
Modules\Notify\Models\Notification
Modules\Notify\Models\NotificationLog
Modules\Notify\Models\NotificationType
Modules\Notify\Models\NotificationChannel
Modules\Notify\Models\NotificationTemplate
Modules\Notify\Models\NotificationTemplateVersion
```

## Traits

> **Verificato 2026-07-24**: `Modules\Notify\Models\Traits\HasNotify` **non esiste** (unico trait presente in
> `app/Models/Traits/` è `HasContact.php`). Se questo trait serve, va creato, non documentato come
> già presente.

## Collegamenti

- [Xot Base](../Xot/docs/) - Core framework
- [User Module](../User/docs/) - User management integration

## Risorse

- [PHPStan Config](./phpstan/) - Type checking configuration
- [On-Demand Pattern](./on-demand-pattern.md) — Pattern per caricamento efficiente
- [QMD Setup](./qmd-setup.md) — Configurazione ricerca locale
- [Performance](./performance-optimization.md) — Metriche e best practice
- [Project Structure](./project-structure.md) — Directory layout

---

<!-- Merged from readme.md, which collided with this file on case-insensitive filesystems. -->

---
title: "Modulo Notify - Documentazione"
type: index
tags: [notify, docs]
module: Notify
created: 2026-07-20
updated: 2026-07-20
qmd: "notify documentazione readme modulo notify - documentazione index readme frontmatter qmd search"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/56"
discussions:
  - "https://github.com/laraxot/module_notify_fila5/discussions/57"
related:
  - README.md
  - wiki/index.md
  - notifications/readme.md
  - integrations/readme.md
  - templates/readme.md
---
# Modulo Notify - Documentazione

## 📚 Overview

Il modulo **Notify** è il sistema centrale per **email, notifiche, SMS e comunicazioni** nel framework Laraxot.  
Supporta template dinamici, allegati binari, multi-canale e integrazione completa con Spatie Laravel Mail Templates.

---

## 🎯 Funzionalità Principali

### 1. **Sistema Email con Template Database**
- Template email salvati su database (Spatie Mail Templates)
- Placeholder dinamici con Mustache
- Supporto HTML/Text/SMS
- Preview email in admin panel

### 2. **Allegati Email Avanzati**
- ⭐ **Allegati da contenuto binario** (PDF generati al volo)
- Allegati da file esistenti
- Multiple attachment support
- Auto-detection MIME types

### 3. **Multi-Channel Notifications**
- Email (SMTP, Mailgun, SES, ecc.)
- SMS (Twilio, Vonage, ecc.)
- WhatsApp (Twilio API)
- Database notifications

### 4. **Integrazione Filament**
- Admin panel per gestione template
- Preview email real-time
- Testing tools integrati

---

## 📖 Documentazione Disponibile

### Guide Complete

#### Email System
- **[Email Attachments Usage](./email-sending/attachments_usage.md)** ⭐  
  Guida completa agli allegati email (path e binary data)

- **[Spatie Mail Templates Deep Dive](./spatie-database-mail-templates-deep-dive.md)**  
  Sistema template email database

- **[Email Layouts Best Practices](./mail-templates/EMAIL_LAYOUTS_BEST_PRACTICES.md)**  
  Best practices layout email

#### Notifications
- **[Notifications Implementation Guide](./notifications/notifications_implementation_guide.md)**  
  Come implementare notifiche custom

- **[RecordNotification Usage](./notifications/record-notification.md)**  
  Notifiche basate su record Eloquent

#### SMS & WhatsApp
- **[WhatsApp Provider Architecture](./whatsapp_provider_architecture.md)**  
  Architettura provider WhatsApp

---

## 🏗️ Architettura

### Componenti Chiave

```
Modules/Notify/
├── app/
│   ├── Emails/
│   │   ├── SpatieEmail.php              ⭐ Email con allegati binari
│   │   └── EmailDataEmail.php
│   │  
│   ├── Notifications/
│   │   ├── RecordNotification.php       ⭐ Notifica generica per record
│   │   ├── ThemeNotification.php
│   │   └── SendSchedeNotification.php
│   │  
│   ├── Datas/
│   │   ├── EmailData.php                # DTO Email
│   │   ├── SmtpData.php                 # DTO SMTP config
│   │   ├── SmsData.php                  # DTO SMS
│   │   └── EmailAttachmentData.php      # DTO Attachment
│   │  
│   ├── Actions/
│   │   └── BuildMailMessageAction.php
│   │  
│   └── Channels/
│       ├── SmsChannel.php
│       └── WhatsAppChannel.php
│  
└── docs/                                 # Documentazione
    ├── README.md                         ⭐ QUESTO FILE
    ├── email-sending/
    │   └── attachments_usage.md
    └── notifications/
        └── record-notification.md
```

---

## 🚀 Quick Start

### 1. Invio Email Semplice

```php
use Modules\Notify\Emails\SpatieEmail;
use Illuminate\Support\Facades\Mail;

$user = User::find(1);
$email = new SpatieEmail($user, 'welcome');

Mail::to('user@example.com')->send($email);
```

### 2. Email con Allegato PDF Dinamico ⭐

```php
use Modules\Notify\Notifications\RecordNotification;
use Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction;
use Illuminate\Support\Facades\Notification;

// Genera PDF binario
$pdfContent = app(GetPdfContentByRecordAction::class)->execute($record);

// Prepara allegato
$attachments = [
    [
        'data' => $pdfContent,           // Contenuto binario PDF
        'as' => 'documento.pdf',         // Nome file nell'email
        'mime' => 'application/pdf',     // MIME type
    ],
];

// Crea e invia notifica
$notify = new RecordNotification($record, 'template-slug');
$notify = $notify->addAttachments($attachments);

Notification::route('mail', 'destinatario@example.com')->notify($notify);
```

### 3. Email con File Esistente

```php
$attachments = [
    [
        'path' => storage_path('pdfs/contratto.pdf'),
        'as' => 'contratto.pdf',
        'mime' => 'application/pdf',
    ],
];

$email = new SpatieEmail($user, 'contract-template');
$email->addAttachments($attachments);

Mail::to($user->email)->send($email);
```

### 4. Notifica Multi-Canale

```php
use Modules\Notify\Notifications\RecordNotification;

$notify = new RecordNotification($record, 'multi-channel-template');

// Invia via Email + SMS + WhatsApp
Notification::route('mail', 'user@example.com')
    ->route('sms', '+393331234567')
    ->route('whatsapp', '+393331234567')
    ->notify($notify);
```

---

## 💡 Pattern e Best Practices

### Pattern 1: Allegati Binari (Raccomandato)

**Quando usare:**
- PDF generati dinamicamente
- File creati al volo
- Contenuti non salvati su filesystem

**Vantaggi:**
- ✅ No file temporanei
- ✅ Performance migliori
- ✅ Thread-safe
- ✅ Scalabilità

```php
$attachments = [
    [
        'data' => $binaryContent,    // Contenuto binario
        'as' => 'filename.pdf',
        'mime' => 'application/pdf',
    ],
];
```

### Pattern 2: Allegati da Path

**Quando usare:**
- File esistenti su filesystem
- PDF pre-generati e cachati
- Asset statici

```php
$attachments = [
    [
        'path' => storage_path('files/doc.pdf'),
        'as' => 'documento.pdf',
        'mime' => 'application/pdf',
    ],
];
```

### Pattern 3: RecordNotification (Raccomandato)

**Quando usare:**
- Notifiche basate su record Eloquent
- Template dinamici da database
- Multi-canale support

```php
$notify = new RecordNotification($record, 'template-slug');
$notify = $notify->mergeData(['custom_var' => 'value']);
$notify = $notify->addAttachments($attachments);

Notification::route('mail', 'to@example.com')->notify($notify);
```

---

**Ultimo aggiornamento**: Novembre 2025 (PSR-4 fixes)  
**Versione**: 1.1  
**Stato**: PSR-4 compliant, test business logic completati (95% copertura)  
**Prossimi passi**: Completamento test modelli base  
**Changelog**: [changelog.md](./CHANGELOG.md)

## 🔗 Collegamenti

### Moduli Correlati

#### Ptv (Schede Valutazione)
- **[Complete PDF Email Guide](../../Ptv/docs/pdf-email-attachments-complete-guide.md)**  
  Caso d'uso completo: invio schede valutazione con PDF

- **[SendMailByRecord Action](../../Ptv/app/Actions/Scheda/SendMailByRecord.php)**  
  Implementation reference

#### Xot (Core Framework)
- **[GetPdfContentByRecordAction](../../Xot/docs/actions/pdf-content-generation-technical.md)**  
  Generazione PDF binario da record

- **[PDF Actions](../../Xot/app/Actions/Pdf/)**  
  Actions per gestione PDF

### Documentazione Interna

#### Email System
- [Email Layouts Best Practices](./mail-templates/EMAIL_LAYOUTS_BEST_PRACTICES.md)
- [Spatie Mail Templates Structure](./mail-templates/SPATIE_MAIL_TEMPLATES_STRUCTURE.md)
- [Email Troubleshooting](./email-sending/EMAIL_TROUBLESHOOTING.md)

#### Notifications
- [Notifications Implementation Guide](./notifications/notifications_implementation_guide.md)
- [Notification Management Business Logic](./notifications/notification-management-business-logic.md)

---

## 🧪 Testing

### Test Email con Allegati

```php
use Tests\TestCase;
use Modules\Notify\Emails\SpatieEmail;

class SpatieEmailTest extends TestCase
{
    /** @test */
    public function it_attaches_binary_pdf_content(): void
    {
        $pdfContent = '%PDF-1.4...'; // Mock binary
        
        $attachments = [
            [
                'data' => $pdfContent,
                'as' => 'test.pdf',
                'mime' => 'application/pdf',
            ],
        ];
        
        $email = new SpatieEmail($record, 'test-template');
        $email->addAttachments($attachments);
        
        $this->assertCount(1, $email->attachments());
    }
}
```

### Test Notifiche

```bash
php artisan test --filter=RecordNotificationTest
```

---

## 🛠️ Troubleshooting

### Email Non Arriva

**Checklist:**
- [ ] Configurazione SMTP corretta (`.env`)
- [ ] Template email esiste nel database
- [ ] Destinatario valido
- [ ] Allegati corretti (path esiste o data non vuoto)
- [ ] Log errori (`storage/logs/laravel.log`)

**Debug:**
```bash
php artisan tinker
>>> Mail::raw('Test', fn($m) => $m->to('test@example.com'));
>>> Mail::failures();
```

### Allegato Non Arriva

**Cause comuni:**
- Array allegati malformato
- MIME type errato
- Contenuto binario corrotto
- File path non esistente

**Test:**
```php
// Verifica formato allegato
$attachments = [
    [
        'data' => $content,  // DEVE essere presente
        'as' => 'file.pdf',  // DEVE essere stringa
        'mime' => 'application/pdf', // DEVE essere stringa
    ],
];
```

---

## 📊 Performance

### Ottimizzazioni Applicate

1. **Lazy Template Loading** - Template caricati on-demand
2. **Queue Support** - Notifiche in coda per performance
3. **Binary Attachments** - No file I/O per allegati dinamici
4. **Cache Templates** - Template cachati in produzione

### Monitoring

```php
use Illuminate\Support\Facades\Log;

Log::channel('email')->info('Email sent', [
    'to' => $recipient,
    'template' => $slug,
    'attachments_count' => count($attachments),
]);
```

---

## 🔐 Sicurezza

### Controlli Implementati

- ✅ **Email Validation** - Validazione indirizzi email (Webmozart Assert)
- ✅ **MIME Type Validation** - Validazione tipi file
- ✅ **File Existence Check** - Controllo esistenza file path
- ✅ **Input Sanitization** - Sanitizzazione input utente
- ✅ **Rate Limiting** - Throttle su invii massivi

---

## 📝 Changelog

### v2.1.0 (2025-01-22)
- ✨ Supporto allegati binari (data field)
- ✅ PHPStan Level 10 compliance
- 📚 Documentazione completa aggiornata
- 🐛 Fix tipizzazione SpatieEmail
- 🐛 Fix validazione RecordNotification

### v2.0.0
- Integrazione Spatie Mail Templates
- Multi-canale support
- Template database

---

## 👥 Contributors

- **Team Laraxot** - Core implementation
- **Xot Module** - PDF generation support

## Documentation

**Ultimo aggiornamento:** 2025-01-22  
**Versione:** 2.1.0  
**Stato:** ✅ Production Ready  
**PHPStan Level:** 10
=======
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
>>>>>>> laraxot/dev
