# Modulo User - Documentazione Completa

## Overview

Il modulo **User** gestisce l'autenticazione, l'autorizzazione e la gestione utenti completa nel sistema Laraxot PTVX.

## Funzionalità Principali

### Autenticazione
- Login multi-tenant
- Gestione sessioni sicure
- Two-factor authentication (opzionale)

### Autorizzazione
- RBAC (Role-Based Access Control) via Spatie Permission
- Teams e Tenant isolation
- Policy Filament integrate

### Modelli

```php
// User base model
Modules\User\Models\User extends BaseModel

// Team management
Modules\User\Models\Team

// Tenant isolation
Modules\User\Models\Tenant
```

## Trait Disponibili

| Trait | Scopo | Requisiti |
|-------|-------|-----------|
| `HasTeams` | Gestione team multipli | `HasRoles` |
| `HasTenants` | Multi-tenancy Filament | `HasRoles` |
| `HasAuthenticationLogTrait` | Logging autenticazioni | - |

## Struttura Progetto

```
base_fixcity_fila5/
├── public_html/              # DOCUMENT ROOT
│   └── index.php            # Entry point
├── laravel/Modules/User/    # Questo modulo
└── docs/                     # Documentazione progetto
```

## Collegamenti

- [Documentazione Root](../../../../docs/README.md)
- [Regole Trait](./traits.md)
- [Filament Resources](./filament/)
- [Master Module Index](../README.md)

## Backlinks

- [Xot Base](../Xot/docs/)
- [Tenant Module](../Tenant/docs/)
- [UI Components](../UI/docs/)

## Requisiti

- PHP 8.3+
- Laravel 11/12
- Spatie Laravel Permission
- Filament v5

## Architectural Rules

### No Log calls in production code
`Log::info()`, `Log::debug()`, `Log::error()` are forbidden in Actions, Models, Services, and Widgets.
Laravel logs unhandled exceptions automatically.
See: [no-log-in-production.md](./no-log-in-production.md)

### Git merge conflicts in migrations
Never commit files with conflict markers (`<<<<<<< HEAD`, `=======`, `>>>>>>>`).
Fix immediately when found.
