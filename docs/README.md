<<<<<<< HEAD
---
title: "Notify Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-08-02
---

# Documentation

This directory contains documentation for the Notify module.
=======
# Documentation

This directory contains documentation for the module.
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

## Structure

- **architecture.md** - Module architecture and design patterns
- **README.md** - This file

## Guidelines

Documentation should be:
- Clear and concise
- Example-driven
- Updated with code changes
- Use Markdown format (.md)
<<<<<<< HEAD

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
- [On-Demand Pattern](./ON-DEMAND-PATTERN.md) — Pattern per caricamento efficiente
- [QMD Setup](./QMD-SETUP.md) — Configurazione ricerca locale
- [Performance](./PERFORMANCE-OPTIMIZATION.md) — Metriche e best practice
- [Project Structure](./PROJECT-STRUCTURE.md) — Directory layout
=======
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
