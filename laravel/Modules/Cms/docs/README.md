# Modulo CMS - Content Management System

## Panoramica

Il modulo **CMS** fornisce un sistema completo di gestione contenuti basato su Filament Builder Blocks per l'applicazione FixCity.

## Componenti Principali

- **PageResource**: Interfaccia amministrativa Filament
- **BlockSystem**: Sistema modulare blocchi contenuto
- **ContentBuilder**: Composizione dinamica pagine
- **Storage JSON**: Persistenza contenuti ottimizzata

## Struttura

```
laravel/Modules/Cms/
├── app/Filament/Resources/PageResource.php
├── app/Filament/Fields/PageContentBuilder.php
├── docs/                    # Documentazione completa
└── resources/views/components/
```

## Documentazione

### Documentazione Interna
- [Sistema Filament Blocks](./filament-blocks-system.md)
- [Strategia Contenuti](./content-management-strategy.md)
- [Regole Link Relativi](./link-relativi-regole.md)
- [Componenti Header](./componenti-header.md)
- [Processo Build Tema](./theme-build-process.md)
- [Architettura Frontend](./frontend-architecture/struttura-homepage.md)
- [Testing Guidelines](./tests/architecture-separation-rules.md)

### Moduli Correlati
- [Modulo UI - Blocchi](../../UI/docs/blocks-system.md)
- [Master Module Index](../README.md)

### Documentazione Root
- [Architettura Generale](../../../../docs/README.md)
- [Best Practices UX](../../../../docs/ux-design-principles.md)

## Regole Critiche

### Link Relativi Obbligatori

**TUTTI i link .md DEVONO essere relativi**

✅ **CORRETTO**:
- `./file.md` (stesso modulo)
- `../../Modulo/docs/file.md` (altro modulo)
- `../../../../docs/file.md` (root docs)

❌ **VIETATO**:
- `/var/www/html/...` (path assoluti filesystem)
- `http://...` (URL assoluti)

### Convenzioni

- File docs: minuscolo (eccetto README.md)
- Link: sempre relativi alla posizione file
- Filosofia: "Non avrai altro path all'infuori del relativo"

## Struttura Progetto

```
base_fixcity_fila5/
├── public_html/              # DOCUMENT ROOT
│   ├── index.php            # Entry point
│   └── themes/              # Theme assets
├── laravel/Modules/Cms/     # Questo modulo
└── docs/                     # Documentazione progetto
```

## Quick Reference

| Categoria | Guida | File |
|-----------|-------|------|
| **Content** | Management | [content-management.md](content-management.md) |
| **Components** | Blade | [components.md](components.md) |
| **Filament** | Integration | [filament-integration.md](filament-integration.md) |
| **Folio** | Pages | [folio-pages.md](folio-pages.md) |
| **Homepage** | Structure | [homepage-management.md](homepage-management.md) |
| **Architecture** | XotData | [architecture-xotdata-pattern.md](architecture-xotdata-pattern.md) |
| **Troubleshooting** | Git Issues | [git-conflicts-resolution-impact.md](git-conflicts-resolution-impact.md) |

## Core Features

- **Content Management**: Flexible content creation and editing
- **Folio Integration**: File-based routing system
- **Filament Resources**: Admin panel for content management
- **Blade Components**: Reusable UI components
- **Homepage Builder**: Dynamic homepage construction
- **Multi-language**: Full i18n support

## Dipendenze Principali

- Laravel Framework ^12.0
- Filament ^4.0
- Livewire ^3.0
- Laravel Folio ^1.0
- Laravel Volt ^1.0
- Tailwind CSS ^4.0
- Alpine.js ^3.0

## Best Practices

### Estensione Classi
- Estendere sempre le classi base di Xot
- Non estendere direttamente le classi di Filament
- Utilizzare i trait forniti dal modulo

### Convenzioni
- Seguire le [convenzioni di naming](../../../../docs/standards/file_naming_conventions.md)
- Documentare tutto il codice con PHPDoc
- Mantenere la struttura dei file coerente

### Performance
- Utilizzare il caching dove possibile
- Ottimizzare le query al database
- Seguire le [best practices di Laravel](https://laravel.com/docs/12.x/best-practices)

## Collegamenti Bidirezionali

- [Modulo User](../User/docs/) - Gestione utenti e permessi
- [Modulo Lang](../Lang/docs/) - Gestione traduzioni
- [Modulo UI](../UI/docs/) - Componenti di interfaccia
- [Modulo Xot](../Xot/docs/) - Modulo base e linee guida
- [Documentazione Principale](../../../../docs/README.md)

## Roadmap e Sviluppo

- [Roadmap](roadmap.md) - Piano di sviluppo futuro
- [Issues](phpstan_issues.md) - Problemi noti e soluzioni
- [Upgrade Guide](upgrade.md) - Guida all'aggiornamento

## Supporto

Per domande o problemi, consultare:
1. La [documentazione ufficiale](https://fixcity.laraxot.com/docs)
2. Il [forum di supporto](https://forum.laraxot.com)
3. Il team di sviluppo via [email](mailto:support@laraxot.com)
