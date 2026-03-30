# Modulo Notify

## Overview

Il modulo **Notify** gestisce il sistema di notifiche dell'applicazione, fornendo un'architettura unificata per notifiche multi-canale.

## Funzionalità

- Mail notifications
- Database notifications
- Template management
- Queue integration
- Notifiche real-time

## Modelli Principali

```php
// Mail Template
Modules\Notify\Models\MailTemplate

// Mail Template Version
Modules\Notify\Models\MailTemplateVersion

// Notification
Modules\Notify\Models\Notification
```

## Trait

```php
use Modules\Notify\Models\Traits\HasNotify;
```

## Struttura Progetto

```
base_fixcity_fila5/
├── public_html/              # DOCUMENT ROOT
│   └── index.php            # Entry point
├── laravel/Modules/Notify/  # Questo modulo
└── docs/                     # Documentazione progetto
```

## Collegamenti

- [Documentazione Root](../../../../docs/README.md)
- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)
- [Master Module Index](../README.md)

## Backlinks

- [Filament Resources](./filament/)
- [PHPStan Config](./phpstan/)

## Utilizzo

```php
// Send notification
Notification::send($user, new CustomNotification());

// Database notification
$user->notify(new OrderShipped($order));

// Mail notification
Mail::to($user)->send(new OrderMail($order));
```
