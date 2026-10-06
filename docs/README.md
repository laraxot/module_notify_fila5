<<<<<<< HEAD
# Notify Module Documentation

Complete documentation for the Notify module, organized by purpose and content type.

## Root Directory

- `README.md` - This file. Start here for navigation.
- `CHANGELOG.MD` - Historical changes to the Notify module.

## Main Structure

### BMAD (Brainstorm, Model, Action, Deliver)

**Directory**: `bmad/`

The primary home for all module analysis, design, brainstorming, and strategic content.

- `architecture/` - Technical architecture and design patterns
- `brainstorming/` - Working notes and exploratory documents
- `design/` - Design specifications and decisions
- `epics/` - Epic definitions and roadmap items
- `stories/` - Completed BMAD stories (work history)
- `analysis/` - Deep analysis and audit documents (if organized separately)
- `patterns/` - Reusable patterns and best practices

Key files:
- `architecture.md` - Module architecture overview
- `epics.md` - Epic tracker and roadmap
- `decision-log.md` - Key architectural decisions
- `setup-guide.md` - Setup and configuration guide

### Wiki (Knowledge Base)

**Directory**: `wiki/`

Reference documentation, concepts, and institutional knowledge.

- `concepts/` - Conceptual documentation (naming conventions, standards, etc.)
- `commands/` - CLI commands and workflows
- `memories/` - Institutional knowledge and lessons learned
- `rules/` - Module rules and constraints
- `skills/` - Tools, skills, and automation

Key files:
- `INDEX.md` - Wiki navigation index
- `overview.md` - High-level overview
- `AGENTS.md` - Agent/automation notes

### Specialized Directories

**Architecture**  
Directory: `architecture/`  
Technical design documents and module boundary specifications.

**Communication Channels**  
- `mail-templates/` - Email template documentation
- `notifications/` - Notification behavior and design
- `sms/` - SMS provider and channel documentation
- `templates/` - Template structure and standards

**Quality & Analysis**  
- `phpstan/` - PHPStan level 10 analysis, configuration, and fixes
- `deployment/` - Deployment guides and infrastructure docs

**Project Documentation**  
- `project_docs/` - Project-specific documentation
- `reports/` - Analysis reports and audits
- `llm-wiki/` - LLM-specific documentation
- `rules/` - Module-level rules and conventions

## Navigation

1. **New to the module?** Start with `bmad/setup-guide.md` and `bmad/architecture.md`
2. **Looking for a specific topic?** Check `wiki/INDEX.md` or search within subdirectories
3. **Need the module roadmap?** See `bmad/epics/` for strategic direction
4. **Want to understand past decisions?** Review `bmad/decision-log.md` and `bmad/stories/`

## File Count by Category

After consolidation (2026-10-06):

| Category | Files | Purpose |
|----------|-------|---------|
| bmad/ | 326 | Analysis, design, brainstorming, stories |
| wiki/ | 35 | Knowledge base and reference |
| phpstan/ | 35 | Quality analysis and fixes |
| architecture/ | 8 | Technical design |
| Other | 13 | Mail, SMS, deployment, reports, etc. |
| **Total** | **417** | |

## Consolidation History

**2026-10-06**: Initial consolidation phase
- Removed 19 duplicate and stub files (304 → 285 root files)
- Removed 8 stub directories (.obsidian, .schema, -integration, _integration, theme, superpowers)
- Moved specialized files into appropriate subdirectories
- Reduced root-level clutter from 304 files to 4 files

## Next Steps

Future consolidations may:
- Merge communication channel directories (mail, SMS, notifications) into a single `channels/` directory
- Consolidate analysis reports into `wiki/analysis/`
- Establish clear ownership and deprecation policy for old analysis files
=======
---
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
>>>>>>> laraxot/dev
