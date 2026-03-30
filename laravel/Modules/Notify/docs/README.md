# Modulo Notify

## Overview

Il modulo **Notify** gestisce il sistema di notifiche dell'applicazione.

## Active Theme

**Current Theme**: **Sixteen** (AGID/Bootstrap Italia compliant)  
**Domain**: `fixcity.local`  
**Config**: `laravel/config/localhost/xra.php` → `pub_theme`

**Theme Documentation**: [Themes Index](../../Themes/docs/README.md)  
**Theme Context**: [.planning/THEME_CONTEXT.md](../../../../.planning/THEME_CONTEXT.md)

## Funzionalità

- Mail notifications
- Database notifications
- Template management
- Queue integration

## Modelli Principali

```php
// Mail Template
Notify\Models\MailTemplate

// Mail Template Version
Notify\Models\MailTemplateVersion

// Notification
Notify\Models\Notification
```

## Trait

```php
use Modules\Notify\Models\Traits\HasNotify;
```

## Collegamenti

- [Documentazione Root](../../../docs/NOTIFY_MODULE.md)
- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)

## Backlinks

- [Filament Resources](./filament/)
- [PHPStan Config](./phpstan/)
