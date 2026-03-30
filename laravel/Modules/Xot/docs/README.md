# Modulo Xot - Documentazione

## Overview

Il modulo **Xot** è il nucleo fondativo dell'intero progetto Laraxot PTVX. Fornisce classi base, trait, servizi e configurazioni condivise da tutti gli altri moduli.

## Active Theme

**Current Theme**: **Sixteen** (AGID/Bootstrap Italia compliant)  
**Domain**: `fixcity.local`  
**Config**: `laravel/config/localhost/xra.php` → `pub_theme`

**Theme Documentation**: [Themes Index](../../Themes/docs/README.md)  
**Theme Context**: [.planning/THEME_CONTEXT.md](../../../../.planning/THEME_CONTEXT.md)

## Architettura

### Classi Base Principali

| Classe | Scopo | Estende |
|--------|-------|---------|
| `XotBaseModel` | Modello base per tutti i moduli | `Illuminate\Database\Eloquent\Model` |
| `XotBaseMigration` | Migrazioni anonime standardizzate | `Illuminate\Database\Migrations\Migration` |
| `XotBaseResource` | Risorse Filament base | `Filament\Resources\Resource` |
| `XotBaseServiceProvider` | ServiceProvider modulare | `Illuminate\Support\ServiceProvider` |
| `XotBaseWidget` | Widget Filament base | `Filament\Widgets\Widget` |

### Trait Fondamentali

- `HasXotTable`: Gestione tabelle Filament centralizzata
- `InteractsWithForms`: Gestione form nei widget
- `RelationX`: Relazioni many-to-many estese

## Collegamenti

- [Documentazione Root](../../../docs/XOT_MODULE.md)
- [Regole Architettura](./architecture/)
- [PHPStan Configuration](./phpstan/)

## Regole Critiche

1. **MAI estendere direttamente classi Laravel/Filament** - Usare sempre wrapper Xot
2. **Configurazione PHPStan solo in `laravel/phpstan.neon`**
3. **Tutte le migrazioni devono usare classi anonime**

## Backlinks

- [User Module](../User/docs/)
- [UI Module](../UI/docs/)
- [Tenant Module](../Tenant/docs/)
