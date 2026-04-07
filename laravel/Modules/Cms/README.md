<<<<<<< HEAD
---
title: Cms
module: cms
related: Xot, UI, Media
status: production
---

# Cms Module

**Module**: `cms`
**Namespace**: `Modules\Cms\`
**Status**: ✅ Production

---

## Overview

Il modulo CMS gestisce contenuti strutturati: pagine composte da sezioni (blocchi riutilizzabili dal modulo UI), menu di navigazione gerarchici, allegati e configurazioni. Il rendering frontend avviene tramite Laravel Folio e Livewire Volt per interattivita.

### Key Features

- Feature 1
- Feature 2
- Feature 3

### Module Dependencies

- [Xot](../Xot/README.md) (required)
- [UI](../UI/README.md) (required)
- [Media](../Media/README.md) (required)
=======
# CMS Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PHP 8.3+](https://img.shields.io/badge/PHP-8.3+-blue.svg)](https://php.net)
[![Resources 5](https://img.shields.io/badge/Resources-5-purple.svg)](#filament)

> **Content management a blocchi**: pagine dinamiche con sezioni componibili, menu gerarchici, rendering frontend con Folio/Volt, SEO multi-tenant. Gestione contenuti completa da Filament.

---

## Cosa fa

Il modulo CMS gestisce contenuti strutturati: pagine composte da sezioni (blocchi riutilizzabili dal modulo UI), menu di navigazione gerarchici, allegati e configurazioni. Il rendering frontend avviene tramite Laravel Folio e Livewire Volt per interattivita.

```php
// Pagina composta da sezioni
$page = Page::with('sections.attachments')->find(1);

// Ogni sezione ha un tipo che determina il rendering
// (hero, features, cta, blog, newsletter...)
foreach ($page->sections as $section) {
    // Renderizza il blocco UI corrispondente
    echo view("ui::blocks.{$section->type}", $section->data);
}
```

---

## Modelli (7)

| Modello | Funzione |
|---------|----------|
| **Page** | Pagina con slug, SEO, stato (draft/published) |
| **Section** | Sezione/blocco di contenuto con tipo e dati |
| **Menu** | Menu di navigazione gerarchico |
| **Module** | Modulo CMS configurabile |
| **Attachment** | File allegato a pagina/sezione |
| **PageContent** | Contenuto pagina per lingua |
| **Conf** | Configurazioni CMS |

---

## Azioni (4)

| Action | Funzione |
|--------|----------|
| **SaveFooterAction** | Salva configurazione footer |
| **SaveHeadernavAction** | Salva navigazione header |
| **GetViewThemeAction** | Risolve tema vista per tenant |
| **GetStyleClassAction** | Risolve classi CSS per componente |

---

## Filament Integration (5 Resource)

| Resource | Funzione |
|----------|----------|
| **PageResource** | CRUD pagine con editor visuale |
| **SectionResource** | CRUD sezioni/blocchi |
| **MenuResource** | Gestione menu gerarchici |
| **AttachmentResource** | Gestione allegati |
| **PageContentResource** | Contenuto multilingua |

---

## Rendering Frontend

```
Page (CMS Module)
    |
    +-- Sections (blocchi ordinati)
    |     +-- type: "hero.centered" → x-ui::blocks.hero.centered
    |     +-- type: "features.grid" → x-ui::blocks.features.grid
    |     +-- type: "cta.branded"   → x-ui::blocks.cta.branded
    |
    v
Laravel Folio (file-based routing)
    +-- Livewire Volt (interattivita)
    +-- Tailwind CSS v4 (styling)
```

---

## Integrazione con altri moduli

```
Cms ──> UI         (211 blocchi pre-costruiti per sezioni)
Cms ──> Media      (allegati immagini/documenti)
Cms ──> Seo        (meta tag per pagine)
Cms ──> Lang       (contenuto multilingua IT/EN/DE)
Cms ──> Tenant     (pagine per tenant)
Cms ──> Activity   (audit trail modifiche contenuto)
```
>>>>>>> origin/dev

---

## Quick Start

<<<<<<< HEAD
### Installation

```bash
# Already included in main project
# No additional setup required
```

### Basic Usage

```php
use Modules\Cms\Models\YourModel;

$item = YourModel::first();
```

### Configuration

Configuration file: `config/cms.php`

Key settings:
- `setting1` - Description
- `setting2` - Description

---

## Architecture

### Directory Structure

```
Cms/
├── src/
│   ├── Models/
│   ├── Controllers/
│   ├── Resources/
│   ├── Actions/
│   └── Traits/
├── routes/
│   ├── api.php
│   └── web.php
├── database/
│   ├── migrations/
│   └── seeders/
├── tests/
│   ├── Unit/
│   └── Feature/
├── config/
│   └── cms.php
├── docs/
│   └── README.md
└── composer.json
```

### Key Components



---

## API Reference

Reference

---

## Usage Examples

### Common Tasks

#### Task 1: Description

```php
// Code example
=======
```bash
php artisan module:enable Cms
php artisan migrate
>>>>>>> origin/dev
```

---

<<<<<<< HEAD
## Testing

### Running Tests

```bash
# Run all module tests
composer test -- Modules/Cms
```

---

## Troubleshooting

### Common Issues

#### Issue: Problem description

**Solution**: How to fix this issue

---

## Related Modules

### Dependencies

- [Xot](../Xot/README.md) - Required module
- [UI](../UI/README.md) - Required module
- [Media](../Media/README.md) - Required module

---

Navigation: [Project Home](../../docs/INDEX.md) | [Modules](../../docs/modules/README.md)
=======
## Metriche

| Metrica | Valore |
|---------|--------|
| **Modelli** | 7 |
| **Azioni** | 4 |
| **Resource Filament** | 5 |
| **PHPStan Level** | 10 |

---

**Module Type**: Content Management
**Architecture**: Block-based pages, Folio routing, Volt interactivity
**Quality**: PHPStan Level 10

*Contenuti strutturati a blocchi: pagine, sezioni, menu e allegati gestiti da Filament, renderizzati con Folio/Volt.*
>>>>>>> origin/dev
