# Modulo Activity

## Overview

Il modulo **Activity** gestisce il sistema di tracciamento attività e audit log nell'ecosistema Laraxot PTVX.

## Scopo

Questo modulo gestisce:
- Log delle attività utente
- Audit trail per compliance
- Cronologia operazioni
- Reporting attività
- Analisi comportamenti utente

## Struttura

```
laravel/Modules/Activity/
├── app/
│   ├── Models/
│   ├── Filament/
│   └── ...
├── docs/
├── lang/
└── resources/
```

## Dipendenze

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/) - Autenticazione
- [Tenant Module](../Tenant/docs/) - Multi-tenancy

## Collegamenti

- [Documentazione Root](../../../../docs/README.md)
- [Regole Architecture](../Xot/docs/architecture/)
- [Master Module Index](../README.md)

## Backlinks

- [Indice Moduli](../README.md)

## Modelli Principali

```php
// Activity model
Modules\Activity\Models\Activity

// Activity Log
Modules\Activity\Models\ActivityLog
```

## Utilizzo

```php
// Log activity
Activity::log([
    'user_id' => $user->id,
    'action' => 'user.login',
    'description' => 'User logged in',
    'metadata' => [
        'ip' => request()->ip(),
        'user_agent' => request()->userAgent(),
    ],
]);

// Get user activities
$activities = Activity::forUser($user)->latest()->get();

// Audit trail
$audit = Activity::audit($model);
```

## Features

- **Activity Logging**: Tracciamento completo operazioni
- **User Tracking**: Associazione attività a utenti
- **Metadata Storage**: Contesto operativo (IP, user agent, etc.)
- **Search & Filter**: Ricerca avanzata attività
- **Export**: Esportazione report per compliance
