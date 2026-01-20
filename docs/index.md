# 📋 FixCity - Documentazione Principale

> **Principi DRY + KISS + SOLID + Laraxot**: Documentazione come memoria del progetto, collegamenti bidirezionali, conoscenza condivisa.

## 🏗️ Architettura del Sistema

FixCity è una **piattaforma di segnalazione cittadina** basata su **architettura modulare monolitica** (Nwidart + Laraxot):

- **Backend**: Laravel 12.24.0 + PHP 8.3.20 + SQLite
- **Frontend**: Folio + Volt + Livewire 3.x (cittadini)
- **Backoffice**: Filament 3.x + Laraxot (amministratori)
- **Routing**: File-based (NO web.php/api.php)
- **Tema**: Sixteen (Tailwind + Alpine)

## 📦 Moduli Attivi

| Modulo | Descrizione | Docs |
|--------|-------------|------|
| **Xot** | Framework base (XotBaseModel, providers) | [→](modules/xot.md) |
| **Fixcity** | Core business logic (tickets, segnalazioni) | [→](modules/fixcity.md) |
| **User** | Autenticazione, profili, permessi | [→](modules/user.md) |
| **Cms** | Gestione contenuti, pagine JSON | [→](modules/cms.md) |
| **UI** | Componenti condivisi interfaccia | [→](modules/ui.md) |
| **Geo** | Dati geografici, coordinate | [→](modules/geo.md) |
| **Notify** | Sistema notifiche multi-canale | [→](modules/notify.md) |
| **Activity** | Log attività, audit trail | [→](modules/activity.md) |
| **AI** | Integrazione intelligenza artificiale | [→](modules/ai.md) |
| **Chart** | Visualizzazione dati, grafici | [→](modules/chart.md) |

## 🎯 Quick Start

### Development
```bash
# Frontend changes (SEMPRE richiesto)
cd Themes/Sixteen/
npm run build && npm run copy

# Backend
php artisan test --filter=SpecificTest
vendor/bin/pint --dirty
```

### Routing Patterns
```php
// Frontend (cittadini)
/tickets/create → Themes/Sixteen/resources/views/pages/tickets/create.blade.php
/tickets/{slug} → Modules/Fixcity/resources/views/pages/tickets/[slug].blade.php

// Admin (staff)
/fixcity/admin/tickets → Auto-generato da TicketResource
/user/admin/users → Auto-generato da UserResource
```

## 📊 PHPStan Analysis

### Stato Compliance
- **Level 9**: Target di qualità del codice
- **Baseline**: Errori esistenti documentati
- **Continuous**: Analisi ad ogni commit

### Correzioni Principali
- [Xot MetatagData getColors fix](phpstan-fixes-summary.md#xot-metatagdata)
- [UI Components type safety](phpstan-fixes-summary.md#ui-components)
- [CMS Vite manifest resolution](phpstan-fixes-summary.md#cms-vite)

## 🔧 Convenzioni Sviluppo

### Modelli
```php
// SEMPRE estendere XotBaseModel
class Ticket extends XotBaseModel
{
    use UpdaterTrait; // created_by/updated_by automatici
}
```

### Filament Resources
```php
// Pattern standard
class TicketResource extends XotBaseResource
{
    protected static ?string $model = Ticket::class;
}
```

### Folio Pages
```php
<?php
use function Laravel\Folio\{name, middleware};

name('tickets.create');
middleware(['auth', 'verified']);
?>

<x-layout>
    @volt('ticket-form')
    <!-- Contenuto -->
    @endvolt
</x-layout>
```

## 🚀 Roadmap

### Q1 2025
- [ ] PHPStan Level 9 compliance completa
- [ ] Test coverage > 80%
- [ ] Performance optimization
- [ ] API REST standardization

### Q2 2025
- [ ] Mobile app integration
- [ ] Advanced reporting dashboard
- [ ] Multi-tenant architecture
- [ ] Real-time notifications

## 📖 Quick Links

### Core Documentation
- [System Architecture](ARCHITECTURE.md) 🏗️
- [Modules Overview](MODULES.md) 📦
- [Development Guide](DEVELOPMENT.md) 🛠️
- [Code Quality Standards](CODE_QUALITY.md) 🔍
- [Testing Strategy](testing-strategy.md) 🧪

### Technical References
- [Frontend Architecture](frontend-architecture.md) 🎨
- [Console Commands](console/commands.md)
- [Database Migrations](database/migrations.md)
- [Contratti e Interfacce](contracts.md)
- [Theme System](themes/index.md)
- [Testing Strategy](testing-strategy.md) 🧪

### Module Specific
- [Xot Framework](modules/xot.md) ⚙️
- [Fixcity Core](modules/fixcity.md) 🎯
- [User Management](modules/user.md) 👥
- [UI Components](modules/ui.md) 🎨

### Quality Assurance
- [PHPStan Analysis](phpstan.md) 📊
- [Testing Best Practices](testing-best-practices.md) ✅
- [Code Review Guidelines](CODE_QUALITY.md#code-review-checklist) 🔍

---

*Memoria del progetto: DRY + KISS + SOLID + Collegamenti bidirezionali*
