# Modulo Lang

## Overview

Il modulo **Lang** gestisce il sistema di traduzioni e localizzazione multi-lingua nell'ecosistema Laraxot PTVX.

## Scopo

Questo modulo gestisce:
- Traduzioni multi-lingua (IT/EN e altre)
- Localizzazione di contenuti
- Gestione lingue attive
- Fallback linguistici
- Traduzioni dinamiche via Filament

## Struttura

```
laravel/Modules/Lang/
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
// Language model
Modules\Lang\Models\Language

// Translation model
Modules\Lang\Models\Translation
```

## Utilizzo

```php
// Get translation
__('lang::messages.welcome');

// Set locale
App::setLocale('en');

// Check if language exists
Language::isActive('en');
```

## Traduzioni

Le traduzioni sono organizzate per namespace:
- `lang::messages` - Messaggi generici
- `lang::fields` - Etichette campi
- `lang::validation` - Messaggi validazione
