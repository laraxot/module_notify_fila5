---
title: "Notify Module Documentation"
type: documentation
tags: [module, documentation, notifications]
created: 2026-07-14
updated: 2026-07-14
---

# Modulo Notify

## Overview

Il modulo **Notify** gestisce il sistema di notifiche per la piattaforma Laraxot. Fornisce notifiche via mail, database, e integrazione con queue per un'esperienza di notificazione robusta e scalabile.

## Scopo

- Gestione centralizzata di notifiche via mail e database
- Template email customizzabili via Filament
- Queue integration per invio asincrono
- Tracking notifiche e delivery status
- Support per notifiche multi-canale

## Funzionalità Principali

- **Mail Notifications**: Invio email customizzabili via template
- **Database Notifications**: Notifiche persistenti nel database
- **Template Management**: Admin UI per gestire template email
- **Queue Integration**: Invio asincrono via Laravel Queue
- **Delivery Tracking**: Tracking status invio notifiche
- **Multi-channel**: Mail, Database, SMS (extensibile)

## Struttura del Modulo

```
Modules/Notify/
├── app/
│   ├── Models/
│   │   ├── MailTemplate.php        # Email template model
│   │   ├── MailTemplateVersion.php # Template versioning
│   │   └── Notification.php        # Notification record
│   ├── Services/
│   │   ├── MailTemplateService.php
│   │   └── NotificationService.php
│   ├── Actions/
│   │   ├── SendNotificationAction.php
│   │   └── RenderTemplateAction.php
│   ├── Filament/
│   │   └── Resources/
│   │       ├── MailTemplateResource.php
│   │       └── NotificationResource.php
│   ├── Notifications/
│   │   └── BaseNotification.php
│   └── Traits/
│       └── HasNotify.php
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── views/
│   │   └── emails/
│   └── lang/
├── tests/
├── docs/
│   ├── README.md
│   ├── templates.md
│   └── sending-notifications.md
├── module.json
└── composer.json
```

## Componenti Principali

| Classe | Scopo | Extends |
|--------|-------|---------|
| `MailTemplate` | Email template | `XotBaseModel` |
| `MailTemplateVersion` | Template version history | `XotBaseModel` |
| `Notification` | Notification record | `XotBaseModel` |
| `MailTemplateResource` | Admin UI template | `XotBaseResource` |
| `SendNotificationAction` | Send notification | `XotBaseAction` |

## Trait Disponibili

| Trait | Scopo | Utilizzo |
|-------|-------|----------|
| `HasNotify` | Notifiable models | User, Team, etc |

**Utilizzo**:
```php
use Modules\Notify\Traits\HasNotify;

class User extends Model
{
    use HasNotify;
}

// Send notification
$user->notify(new WelcomeNotification());
```

## Utilizzo Comune

### Scenario 1: Inviare Notifica Email

```php
use Modules\Notify\Actions\SendNotificationAction;

$notification = SendNotificationAction::execute([
    'to' => 'user@example.com',
    'template' => 'welcome',
    'data' => ['name' => 'John'],
    'queue' => true, // async via queue
]);
```

### Scenario 2: Creare Template Email

```php
use Modules\Notify\Models\MailTemplate;

$template = MailTemplate::create([
    'name' => 'Welcome Email',
    'code' => 'welcome',
    'subject' => 'Welcome {{ $name }}',
    'body' => '<p>Hello {{ $name }},</p>...',
]);
```

### Scenario 3: Notificare Utente

```php
use Modules\Notify\Notifications\UserNotification;

$user->notify(new UserNotification('order-shipped', [
    'order_id' => 123,
    'status' => 'shipped',
]));
```

## Configuration

### Mail Configuration

Configurare driver SMTP in `laravel/config/local/mail/config.php`:

```php
return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST'),
    'port' => env('MAIL_PORT'),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS'),
        'name' => env('MAIL_FROM_NAME'),
    ],
];
```

### Queue Configuration

Configurare queue in `laravel/config/local/queue/config.php`:

```php
return [
    'default' => env('QUEUE_DRIVER', 'database'),
    'connections' => [
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
        ],
    ],
];
```

### Template Variables

Template supportano variabili via Blade syntax:

```blade
<p>Hello {{ $name }},</p>
<p>Your order #{{ $order_id }} is {{ $status }}.</p>
```

## Spatie Queued Actions

Il modulo integra **Spatie Queued Actions** per notifiche background:

```php
use Modules\Notify\Actions\SendNotificationAction;

// Dispatchare action nel background
SendNotificationAction::dispatch([
    'to' => $user->email,
    'template' => 'welcome',
    'data' => [...],
]);
```

## Testing

```bash
# Run Notify module tests
./vendor/bin/pest Modules/Notify/tests

# Run mail tests
./vendor/bin/pest Modules/Notify/tests/Feature/MailSendingTest.php

# With coverage
./vendor/bin/pest Modules/Notify/tests --coverage
```

Test email invio senza reale SMTP:

```php
use Illuminate\Support\Facades\Mail;

public function test_welcome_email_sent()
{
    Mail::fake();
    
    SendNotificationAction::execute([
        'to' => 'test@example.com',
        'template' => 'welcome',
    ]);
    
    Mail::assertSent(WelcomeNotification::class);
}
```

## Quality Standards

- **PHPStan**: Level 10 (zero baseline)
- **Test Coverage**: Minimum 80%
- **Code Style**: PSR-12 via Pint

Run locally:
```bash
php -d memory_limit=-1 ./vendor/bin/phpstan analyse --level=max Modules/Notify
./vendor/bin/pest Modules/Notify/tests --coverage
./vendor/bin/pint Modules/Notify
```

## Documentation Index

- [Email Templates](./templates.md) — Managing email templates
- [Sending Notifications](./sending-notifications.md) — Notification delivery
- [Queue Configuration](./queue-configuration.md) — Background jobs
- [Troubleshooting](./troubleshooting.md) — Common issues

## Dipendenze / Moduli Correlati

- [Xot - Framework Base](../Xot/docs/README.md) — Always dependency
- [User - Authentication](../User/docs/README.md) — For user notifications
- [Job - Background Jobs](../Job/docs/README.md) — For queue integration
- [Lang - Translations](../Lang/docs/README.md) — For i18n in templates

## Documenti Correlati

- [Notification Best Practices](../../../docs/wiki/standards/notifications.md)
- [Email Template Patterns](../../../docs/wiki/standards/email-templates.md)
- [Queue Configuration](../../../docs/wiki/standards/queue-configuration.md)
- [PHPStan Configuration](../../../phpstan.neon)

## Regole Critiche

1. **Always extend Xot base classes** — Never extend Laravel/Filament directly
2. **Use namespace `Modules\Notify`** — Never `app\Notify`
3. **Strict typing** — `declare(strict_types=1);` in all files
4. **Use Spatie Queued Actions** — Never create `Jobs/` for notifications
5. **Template versioning** — Keep history of email templates
6. **No Log statements** — Let Laravel handle exceptions
7. **Escape template output** — Prevent injection in email templates

## Monitoring

### Queue Status

Monitor queue workers:

```bash
# Start queue worker
php artisan queue:work

# Check failed jobs
php artisan queue:failed

# Retry failed jobs
php artisan queue:retry all
```

## Standard Rules & Workflow

- [[BMAD Method](../../../docs/wiki/concepts/bmad-method.md)]
- [[Context Engineering](../../../docs/wiki/concepts/context-engineering.md)]
- [[LLM Wiki Governance](../../../docs/wiki/concepts/llm-wiki-governance.md)]

---

**Status**: ✅ Production  
**Last Updated**: 2026-07-14  
**Requirements**: PHP 8.3+, Laravel 12  
**PHPStan Level**: 10 (Target)

**Additional References**:
- [Laravel Mail Documentation](https://laravel.com/docs/12.x/mail)
- [Laravel Queue Documentation](https://laravel.com/docs/12.x/queues)
- [Spatie Queued Actions](https://github.com/spatie/laravel-queueable-action)
