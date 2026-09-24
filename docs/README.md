---
title: "Notify Module Documentation"
type: documentation
tags: [module, documentation, notify, notifications, mail, sms, whatsapp, telegram]
created: 2026-06-05
updated: 2026-09-17
---

# Modulo Notify

Modulo Laraxot per l'invio e il tracciamento di notifiche multi-canale (email, SMS, WhatsApp,
Telegram, push, database) con template gestiti da database e log di ogni invio.

## Canali di notifica supportati

| Canale | Channel/Action | Provider disponibili |
|---|---|---|
| Email | `app/Emails/SpatieEmail.php`, `app/Emails/EmailDataEmail.php` | SMTP, Mailtrap (`Actions/Mail/SendMailtrapMailAction.php`) |
| SMS | `app/Channels/SmsChannel.php` | SMSFactor (default), Netfun, Twilio, Nexmo, Plivo, Gammu, Agiletelecom (`app/Actions/SMS/Send*SMSAction.php`) |
| WhatsApp | `app/Channels/WhatsAppChannel.php` | Twilio (default), Vonage, Facebook Cloud API, 360dialog (`app/Actions/WhatsApp/Send*WhatsAppAction.php`) |
| Telegram | `app/Channels/TelegramChannel.php` | Bot API ufficiale (default), BotMan, Nutgram (`app/Actions/Telegram/Send*TelegramAction.php`) |
| Netfun | `app/Channels/NetfunChannel.php` | Provider SMS/voce Netfun dedicato |
| Push (Firebase) | `app/Notifications/FirebaseAndroidNotification.php` | `app/Actions/Push/Send*Action.php` (device, topic, targeting, schedulato) |
| Database | Laravel notification database channel | Persistenza standard Laravel per notifiche in-app |

Ogni canale ha un driver di default configurabile in `config/sms.php`, `config/whatsapp.php`,
`config/telegram.php`; ogni config espone anche `retry`, `rate_limit`, `circuit_breaker`,
`timeout` e `logging` per la resilienza degli invii.

## Template

- **`Modules\Notify\Models\MailTemplate`** — estende `Spatie\MailTemplates\Models\MailTemplate`,
  con `HasSlug` (Spatie Sluggable) e `HasTranslations` (Spatie Translatable) sui campi
  `subject`, `html_template`, `text_template`. Placeholder dinamici, preview in admin panel.
- **`MailTemplateVersion`** — storicizza le versioni di un `MailTemplate` (versioning dei
  contenuti).
- **`MailTemplateLog`** — un record per ogni invio effettuato da un template: `mailable_type`/
  `mailable_id` (relazione polimorfica al Mailable), `status`, `status_message`, `sent_at`,
  `delivered_at`, `failed_at`, `opened_at`, `clicked_at`.
- **`NotificationTemplate`** / **`NotificationTemplateVersion`** — equivalenti per le notifiche
  multi-canale (non email), con lo stesso pattern di versioning.
- **`NotificationType`** — anagrafica dei tipi di notifica (`slug`, `category`, `channels`,
  `settings`, `template`).
- **`EmailTemplate`** — modello di supporto per template email legacy/minimali.

## Log e tracciamento

- **`NotificationLog`** — un record per ogni notifica multi-canale inviata: `notifiable_type`/
  `notifiable_id` (morph al destinatario), `channel`, `template_id`, `status`, `status_message`,
  `data`, `metadata`, timestamp di `sent_at`/`delivered_at`/`failed_at`/`opened_at`/`clicked_at`.
  Scope disponibili: `forChannel()`, `forNotifiable()`, `withStatus()`.
- **`MailTemplateLog`** — vedi sopra, stesso pattern applicato alle email.
- **`NotificationChannel`** — configurazione persistita dei canali attivi (`driver`, `config`,
  `is_enabled`, `priority`), usata per abilitare/disabilitare provider da admin panel senza
  deploy.

## Notifiche applicative principali

- **`RecordNotification`** — notifica generica basata su un record Eloquent + slug di template,
  con supporto ad allegati (path o contenuto binario) e invio multi-canale
  (`Notification::route('mail', ...)->route('sms', ...)->route('whatsapp', ...)`).
- **`GenericNotification`**, **`EmailDataNotification`**, **`SmsNotification`**,
  **`WhatsAppNotification`**, **`TelegramNotification`**, **`ThemeNotification`**,
  **`TicketAssignedNotification`**, **`TicketStatusChangedNotification`**,
  **`FirebaseAndroidNotification`** — notifiche specializzate per dominio/canale.

## Admin panel (Filament)

Risorse in `app/Filament/Resources/`:
`MailTemplateResource`, `NotificationResource`, `NotificationLogResource`,
`NotificationTemplateResource`, `NotifyThemeResource`, `ContactResource`.
Ogni Resource segue il pattern `Schemas/` (form) + `Tables/` (colonne) + `Pages/`
(non schema/colonne inline nella classe Resource).

## Modelli principali (verificato contro `app/Models/`)

```php
Modules\Notify\Models\MailTemplate
Modules\Notify\Models\MailTemplateVersion
Modules\Notify\Models\MailTemplateLog
Modules\Notify\Models\EmailTemplate
Modules\Notify\Models\Notification
Modules\Notify\Models\NotificationLog
Modules\Notify\Models\NotificationType
Modules\Notify\Models\NotificationChannel
Modules\Notify\Models\NotificationTemplate
Modules\Notify\Models\NotificationTemplateVersion
Modules\Notify\Models\Contact
Modules\Notify\Models\NotifyTheme
Modules\Notify\Models\NotifyThemeable
```

## Quick start

### Email semplice

```php
use Modules\Notify\Emails\SpatieEmail;
use Illuminate\Support\Facades\Mail;

$user = User::find(1);
$email = new SpatieEmail($user, 'welcome');

Mail::to('user@example.com')->send($email);
```

### Notifica multi-canale basata su record

```php
use Modules\Notify\Notifications\RecordNotification;
use Illuminate\Support\Facades\Notification;

$notify = new RecordNotification($record, 'template-slug');
$notify = $notify->mergeData(['custom_var' => 'value']);

Notification::route('mail', 'user@example.com')
    ->route('sms', '+393331234567')
    ->route('whatsapp', '+393331234567')
    ->notify($notify);
```

### Email con allegato PDF binario

```php
use Modules\Notify\Notifications\RecordNotification;
use Modules\Xot\Actions\Pdf\GetPdfContentByRecordAction;
use Illuminate\Support\Facades\Notification;

$pdfContent = app(GetPdfContentByRecordAction::class)->execute($record);

$notify = (new RecordNotification($record, 'template-slug'))
    ->addAttachments([
        ['data' => $pdfContent, 'as' => 'documento.pdf', 'mime' => 'application/pdf'],
    ]);

Notification::route('mail', 'destinatario@example.com')->notify($notify);
```

## Testing

```bash
php artisan test --filter=RecordNotificationTest
```

## Struttura

- **`app/Actions/`** — un'Action per provider/canale (`Mail`, `SMS`, `WhatsApp`, `Telegram`,
  `Push`, `NotifyTheme`), pattern Spatie Queueable Actions.
- **`app/Channels/`** — implementazioni `NotificationChannel` di Laravel per SMS, WhatsApp,
  Telegram, Netfun.
- **`app/Notifications/`** — classi notifica applicative.
- **`app/Emails/`** — Mailable basati su `MailTemplate`.
- **`app/Models/`** — modelli Eloquent (vedi sopra).
- **`app/Filament/`** — Resources/Schemas/Tables per l'admin panel.
- **`config/`** — `notify.php`, `sms.php`, `whatsapp.php`, `telegram.php`, `beautymail.php`,
  `config.php`.

## Collegamenti

- [Changelog](./CHANGELOG.md)
- [Architettura](./architecture.md)
- [Project structure](./project-structure.md)
- [Performance](./performance-optimization.md)
- [On-Demand Pattern](./on-demand-pattern.md)
- [QMD Setup](./qmd-setup.md)
- [Email attachments usage](./email-sending/attachments_usage.md)
- [Spatie Mail Templates deep dive](./spatie-database-mail-templates-deep-dive.md)
- [Notifications implementation guide](./notifications/notifications_implementation_guide.md)
- [RecordNotification usage](./notifications/record-notification.md)
- [WhatsApp provider architecture](./whatsapp_provider_architecture.md)
- [PHPStan config](./phpstan/)
- [Xot Base](../../Xot/docs/) — core framework
- [User Module](../../User/docs/) — integrazione utenti

---

**Ultimo aggiornamento**: 2026-09-17
**PHPStan Level**: 10
