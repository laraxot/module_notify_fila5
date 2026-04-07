<<<<<<< HEAD
# 📚 Indice Generale Documentazione - Fixcity

> **Navigazione Completa della Documentazione del Progetto**

## 🎯 Quick Access

| Categoria | Link Rapidi |
|-----------|-------------|
| **Panoramica** | [Overview](#overview) • [Architettura](#architettura) • [Get Started](#quick-start) |
| **Moduli** | [Core](#moduli-core) • [Business](#moduli-business) • [Utility](#moduli-utility) |
| **Temi** | [Sixteen](#theme-sixteen) • [TwentyOne](#theme-twentyone) • [One](#theme-one) |
| **Guide** | [Development](#guide-sviluppo) • [Testing](#testing) • [Deploy](#deployment) |

---

## 📖 Overview

### Documentazione Principale
- [README Principale](./README.md) - Panoramica progetto completa
- [Analisi Super Mucca](./SUPER_MUCCA_DOCS_ANALYSIS.md) - Report qualità documentazione
- [Architecture](./ARCHITECTURE_ANALYSIS.md) - Analisi architetturale
- [Roadmap](./MASTER_ROADMAP_2025.md) - Piano sviluppo 2025

### Guide Rapide
- [Quick Start](./QUICK_START.md) - Guida avvio rapido
- [Contributing](./CONTRIBUTING.md) - Come contribuire
- [Troubleshooting](./troubleshooting/README.md) - Risoluzione problemi

---

## 🏗️ Architettura

### Documentazione Architetturale
- [Design Patterns](./architecture.md) - Pattern architetturali
- [Database Schema](./database/schema.md) - Schema database
- [API Documentation](./api/README.md) - Documentazione API
- [Security](./security/README.md) - Sicurezza e conformità

### Best Practices
- [Coding Standards](./standards/coding-standards.md) - Standard codifica
- [PHPStan Guidelines](./phpstan/README.md) - Analisi statica
- [Testing Standards](./testing/README.md) - Standard testing
- [Translation Guidelines](./translations/README.md) - Gestione traduzioni

---

## 📦 Moduli

### Moduli Core

#### **Xot Module** - Base Framework
- [README](../laravel/Modules/Xot/docs/README.md) - Panoramica modulo base
- File docs: 395 files
- **Funzionalità**: Framework base, utilities, base classes
- **Status**: ✅ Eccellente (PHPStan Level 9)

#### **User Module** - Gestione Utenti
- [README](../laravel/Modules/User/docs/README.md) - Sistema autenticazione
- File docs: 421 files
- **Funzionalità**: Autenticazione, autorizzazione, profili
- **Status**: ✅ Eccellente (Multi-tenancy)

#### **Lang Module** - Internazionalizzazione
- [README](../laravel/Modules/Lang/docs/README.md) - Sistema traduzioni
- File docs: 279 files
- **Funzionalità**: Traduzioni, localizzazione, multi-lingua
- **Status**: ✅ Eccellente (IT/EN/DE)

### Moduli Business

#### **Fixcity Module** - Ticketing System
- [README](../laravel/Modules/Fixcity/docs/README.md) - Gestione ticket
- File docs: 38 files
- **Funzionalità**: Ticket, segnalazioni, supporto
- **Status**: ✅ Operativo (Filament 4.x)

#### **Notify Module** - Notifiche
- [README](../laravel/Modules/Notify/docs/README.md) - Sistema notifiche
- File docs: 605 files
- **Funzionalità**: Email, SMS, push notifications
- **Status**: ✅ Eccellente (Multi-channel)

#### **Blog Module** - Content Management
- [README](../laravel/Modules/Blog/docs/README.md) - Gestione contenuti
- File docs: 34 files
- **Funzionalità**: Articoli, categorie, commenti
- **Status**: ✅ Operativo (Visual editor)

### Moduli Utility

#### **Cms Module** - CMS System
- [README](../laravel/Modules/Cms/docs/README.md) - Content Management
- File docs: 247 files
- **Funzionalità**: Pagine, blocchi, Folio integration
- **Status**: ✅ Eccellente (Filament Blocks)

#### **UI Module** - Componenti UI
- [README](../laravel/Modules/UI/docs/README.md) - Libreria componenti
- File docs: 273 files
- **Funzionalità**: Blade components, widgets, themes
- **Status**: ✅ Eccellente (Bootstrap Italia)

#### **Media Module** - Gestione Media
- [README](../laravel/Modules/Media/docs/README.md) - Storage e processing
- File docs: 128 files
- **Funzionalità**: Upload, storage, image processing
- **Status**: ✅ Operativo (AWS S3)

#### **Geo Module** - Dati Geografici
- [README](../laravel/Modules/Geo/docs/README.md) - Geolocalizzazione
- File docs: 223 files
- **Funzionalità**: Indirizzi, geocoding, mappe
- **Status**: ✅ Operativo (Google Maps, Mapbox)

#### **Activity Module** - Audit Trail
- [README](../laravel/Modules/Activity/docs/README.md) - Logging attività
- File docs: 86 files
- **Funzionalità**: Audit log, event sourcing, analytics
- **Status**: ✅ Eccellente (PHPStan Level 9)

#### **Gdpr Module** - GDPR Compliance
- [README](../laravel/Modules/Gdpr/docs/README.md) - Conformità GDPR
- File docs: 79 files
- **Funzionalità**: Consensi, trattamenti, privacy
- **Status**: ✅ Operativo (EU compliant)

#### **Tenant Module** - Multi-tenancy
- [README](../laravel/Modules/Tenant/docs/README.md) - Multi-tenant
- File docs: 57 files
- **Funzionalità**: Tenant isolation, database separation
- **Status**: ✅ Operativo

#### **Job Module** - Queue Management
- [README](../laravel/Modules/Job/docs/README.md) - Gestione code
- File docs: 83 files
- **Funzionalità**: Jobs, queues, scheduling
- **Status**: ✅ Operativo

#### **AI Module** - Integrazione AI
- [README](../laravel/Modules/AI/docs/README.md) - MCP e AI
- File docs: 34 files
- **Funzionalità**: MCP protocol, AI chat, fine tuning
- **Status**: ✅ Operativo (MCP servers)

#### **Seo Module** - SEO Optimization
- [README](../laravel/Modules/Seo/docs/README.md) - Ottimizzazione SEO
- File docs: 21 files
- **Funzionalità**: Meta tags, sitemap, structured data
- **Status**: ✅ Operativo

#### **Comment Module** - Sistema Commenti
- [README](../laravel/Modules/Comment/docs/README.md) - Gestione commenti
- File docs: 9 files
- **Funzionalità**: Commenti, threading, moderazione
- **Status**: ✅ Operativo

#### **Rating Module** - Sistema Valutazioni
- [README](../laravel/Modules/Rating/docs/README.md) - Valutazioni e recensioni
- File docs: 13 files
- **Funzionalità**: Rating, reviews, feedback
- **Status**: ✅ Operativo

---

## 🎨 Temi

### Theme Sixteen - Design Comuni Italia
- [README](../laravel/Themes/Sixteen/docs/README.md) - Tema principale AGID
- **Funzionalità**: Bootstrap Italia, WCAG 2.1, Design Comuni
- **Status**: ✅ Eccellente (AGID compliant)
- **Componenti**: 100+ componenti certificati

### Theme TwentyOne - Modern Design
- [README](../laravel/Themes/TwentyOne/docs/README.md) - Tema moderno
- **Funzionalità**: Filament 4.x integration, Livewire
- **Status**: ✅ Operativo
- **Componenti**: 50+ componenti custom

### Theme One - Base Theme
- [README](../laravel/Themes/One/docs/README.md) - Tema base
- **Funzionalità**: Foundation theme, minimal styling
- **Status**: ✅ Minimale
- **Componenti**: Core components only

---

## 🛠️ Guide Sviluppo

### Development Setup
- [Environment Setup](./development/setup.md) - Configurazione ambiente
- [Docker Setup](./development/docker.md) - Configurazione Docker
- [Database Setup](./database/setup.md) - Setup database

### Coding Guidelines
- [PHP Standards](./standards/php.md) - Standard PHP (PSR-12)
- [Laravel Best Practices](./standards/laravel.md) - Best practices Laravel
- [Filament Guidelines](./standards/filament.md) - Linee guida Filament
- [Blade Components](./standards/blade.md) - Componenti Blade

### Quality Assurance
- [PHPStan Configuration](./phpstan/README.md) - Analisi statica
- [Testing Strategy](./testing/strategy.md) - Strategia testing
- [CI/CD Pipeline](./ci-cd/README.md) - Continuous integration

---

## 🧪 Testing

### Test Documentation
- [Testing Guide](./testing/README.md) - Guida completa testing
- [Unit Tests](./testing/unit.md) - Test unitari
- [Feature Tests](./testing/feature.md) - Test funzionali
- [Browser Tests](./testing/browser.md) - Test browser (Dusk)

### Coverage Reports
- [Coverage Overview](./testing/coverage.md) - Panoramica coverage
- [Module Coverage](./testing/module-coverage.md) - Coverage per modulo

---

## 🚀 Deployment

### Deployment Guides
- [Production Deploy](./deployment/production.md) - Deploy produzione
- [Staging Deploy](./deployment/staging.md) - Deploy staging
- [Rollback Strategy](./deployment/rollback.md) - Strategia rollback

### Server Configuration
- [Nginx Configuration](./deployment/nginx.md) - Configurazione Nginx
- [PHP-FPM Configuration](./deployment/php-fpm.md) - Configurazione PHP-FPM
- [SSL/TLS Setup](./deployment/ssl.md) - Configurazione SSL

---

## 📊 Monitoring & Analytics

### Monitoring
- [Application Monitoring](./monitoring/application.md) - Monitoraggio app
- [Performance Monitoring](./monitoring/performance.md) - Performance metrics
- [Error Tracking](./monitoring/errors.md) - Tracking errori

### Analytics
- [Usage Analytics](./analytics/usage.md) - Analisi utilizzo
- [Business Metrics](./analytics/business.md) - Metriche business

---

## 🔒 Security

### Security Documentation
- [Security Guidelines](./security/guidelines.md) - Linee guida sicurezza
- [GDPR Compliance](./security/gdpr.md) - Conformità GDPR
- [Authentication](./security/authentication.md) - Sistema autenticazione
- [Authorization](./security/authorization.md) - Sistema autorizzazioni

---

## 📝 Changelog & Versioning

### Version History
- [Changelog](./CHANGELOG.md) - Storico modifiche
- [Versioning Strategy](./versioning.md) - Strategia versioning
- [Migration Guides](./migrations/README.md) - Guide migrazione

---

## 🤝 Contributing

### Contribution Guidelines
- [How to Contribute](./CONTRIBUTING.md) - Come contribuire
- [Code of Conduct](./CODE_OF_CONDUCT.md) - Codice condotta
- [Pull Request Template](./.github/pull_request_template.md) - Template PR

---

## 📞 Support & Community

### Support Channels
- **📧 Email**: support@fixcity.com
- **🐛 Issues**: [GitHub Issues](https://github.com/laraxot/fixcity/issues)
- **💬 Discord**: [Laraxot Community](https://discord.gg/laraxot)
- **📚 Docs**: [Documentation Portal](https://docs.laraxot.com)

### Community Resources
- [FAQ](./faq/README.md) - Domande frequenti
- [Tutorials](./tutorials/README.md) - Tutorial passo-passo
- [Examples](./examples/README.md) - Esempi codice

---

## 🔗 Collegamenti Utili

### External Resources
- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Bootstrap Italia](https://italia.github.io/bootstrap-italia/)
- [Design Comuni](https://designers.italia.it/modello/comuni/)

### Package Documentation
- [Livewire](https://livewire.laravel.com)
- [Alpine.js](https://alpinejs.dev)
- [Tailwind CSS](https://tailwindcss.com)
- [Spatie Packages](https://spatie.be/open-source)

---

**🔄 Ultimo aggiornamento**: 14 Ottobre 2025  
**📦 Versione Progetto**: 4.0.0  
**🐄 Curato da**: Super Mucca Documentation Team  
**✨ Status**: Documentazione Completa e Aggiornata

---

*"La documentazione è il fondamento di ogni grande progetto"* - Team Laraxot
=======
# Module Documentation Index

**Generated:** 2026-03-30  
**Total Modules:** 19  
**Total Documentation Files:** 13,174  
**After Deduplication Target:** ~6,500

---

## Quick Navigation

### By Module
- [AI](#ai-module)
- [Activity](#activity-module)
- [Blog](#blog-module)
- [Cms](#cms-module)
- [Comment](#comment-module)
- [Fixcity](#fixcity-module)
- [Gdpr](#gdpr-module)
- [Geo](#geo-module)
- [Job](#job-module)
- [Lang](#lang-module)
- [Media](#media-module)
- [Notify](#notify-module)
- [Rating](#rating-module)
- [Seo](#seo-module)
- [Tenant](#tenant-module)
- [UI](#ui-module)
- [User](#user-module)
- [Xot](#xot-module)

### By Topic
- [Architecture](#architecture)
- [Testing](#testing)
- [Quality](#quality)
- [Translations](#translations)
- [Filament](#filament)
- [Routing](#routing)

---

## Module Documentation

### AI Module
**Location:** `laravel/Modules/AI/docs/`  
**Files:** ~50  
**Entry Point:** [`README.md`](../AI/docs/README.md)

**Key Topics:**
- AI integration patterns
- Model management
- Prediction generation

**Cross-References:**
- See also: [Predict Module](#fixcity-module)
- Related: [Xot Architecture](#xot-module)

---

### Activity Module
**Location:** `laravel/Modules/Activity/docs/`  
**Files:** ~200  
**Entry Point:** [`README.md`](../Activity/docs/README.md)

**Key Topics:**
- Activity tracking
- User actions logging
- Audit trails

**⚠️ Audit Note:** Contains `coverage-full.md` (2,930 lines) - should be split

**Cross-References:**
- Related: [User Module](#user-module)
- Related: [Gdpr Module](#gdpr-module)

---

### Blog Module
**Location:** `laravel/Modules/Blog/docs/`  
**Files:** 60  
**Entry Point:** [`README.md`](../Blog/docs/README.md)

**Key Topics:**
- Blog post management
- Content blocks
- Categories and tags
- Comments integration

**Key Documents:**
- [`prd.md`](../Blog/docs/prd.md) - Product Requirements
- [`structure.md`](../Blog/docs/structure.md) - Module architecture
- [`blocks.md`](../Blog/docs/blocks.md) - Content blocks system

**Cross-References:**
- Uses: [Cms Blocks](#cms-module)
- Related: [Comment Module](#comment-module)

---

### Cms Module
**Location:** `laravel/Modules/Cms/docs/`  
**Files:** 893  
**Entry Point:** [`index.md`](../Cms/docs/index.md)

**Key Topics:**
- Content Management System
- Page builder
- Content blocks
- Folio routing
- Volt components

**⚠️ Audit Note:** 793 files in `archive/` directory (89% duplication)

**Key Documents:**
- [`content-blocks-system.md`](../Cms/docs/content-blocks-system.md) - **SSOT** for blocks
- [`pages-content-blocks.md`](../Cms/docs/pages-content-blocks.md) - Page composition
- [`frontoffice/multi-block-page-builder-governance.md`](../Cms/docs/frontoffice/multi-block-page-builder-governance.md)

**Deprecated:**
- `archive/` directory - scheduled for removal
- `volt_web_application.md` → use `volt-web-application.md`

**Cross-References:**
- Links to: [UI Components](#ui-module)
- Uses: [Xot Base](#xot-module)
- Related: [Blog Module](#blog-module)

---

### Comment Module
**Location:** `laravel/Modules/Comment/docs/`  
**Files:** ~30  
**Entry Point:** [`00-INDEX.md`](../Comment/docs/00-INDEX.md)

**Key Topics:**
- Comment system
- Moderation
- Threading

**Cross-References:**
- Used by: [Blog Module](#blog-module)
- Related: [User Module](#user-module)

---

### Fixcity Module
**Location:** `laravel/Modules/Fixcity/docs/`  
**Files:** ~100  
**Entry Point:** [`README.md`](../Fixcity/docs/README.md)

**Key Topics:**
- Core platform features
- User research
- Roadmap

**Key Documents:**
- [`roadmap/user-research.md`](../Fixcity/docs/roadmap/user-research.md) - User insights

**Cross-References:**
- Depends on: [All modules](#)

---

### Gdpr Module
**Location:** `laravel/Modules/Gdpr/docs/`  
**Files:** ~40  
**Entry Point:** [`README.md`](../Gdpr/docs/README.md)

**Key Topics:**
- GDPR compliance
- Data privacy
- User consent

**Cross-References:**
- Related: [User Module](#user-module)
- Related: [Activity Module](#activity-module)

---

### Geo Module
**Location:** `laravel/Modules/Geo/docs/`  
**Files:** ~150  
**Entry Point:** [`README.md`](../Geo/docs/README.md)

**Key Topics:**
- Geographic data
- Location services
- Maps integration

**⚠️ Audit Note:** Contains `coverage-full.md` (2,048 lines) - should be split

**Cross-References:**
- Used by: [Fixcity Module](#fixcity-module)

---

### Job Module
**Location:** `laravel/Modules/Job/docs/`  
**Files:** ~50  
**Entry Point:** [`README.md`](../Job/docs/README.md)

**Key Topics:**
- Job postings
- Employment features

**Cross-References:**
- Related: [User Module](#user-module)

---

### Lang Module
**Location:** `laravel/Modules/Lang/docs/`  
**Files:** 879  
**Entry Point:** [`index.md`](../Lang/docs/index.md)

**Key Topics:**
- **SSOT** for all translation/i18n content
- Multi-language support
- Laravel Localization integration
- Translation file structure

**⚠️ Audit Note:** 700+ files in `archive/` directory

**Key Documents:**
- [`translation_system.md`](../Lang/docs/translation_system.md) - **SSOT**
- [`translation_keys_best_practices.md`](../Lang/docs/translation_keys_best_practices.md) - **SSOT**
- [`translation_files_update.md`](../Lang/docs/translation_files_update.md)
- [`working_with_locales.md`](../Lang/docs/working_with_locales.md)

**Deprecated:**
- `archive/` directory - scheduled for removal
- Multiple naming variants: `translation_*.md` vs `translations_*.md`

**Cross-References:**
- Used by: **All modules**
- Related: [mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)

---

### Media Module
**Location:** `laravel/Modules/Media/docs/`  
**Files:** ~80  
**Entry Point:** [`README.md`](../Media/docs/README.md)

**Key Topics:**
- Media library
- File management
- Image processing

**Cross-References:**
- Uses: [Spatie Media Library](https://spatie.be/docs/laravel-medialibrary)
- Related: [UI Module](#ui-module)

---

### Notify Module
**Location:** `laravel/Modules/Notify/docs/`  
**Files:** ~200  
**Entry Point:** [`README.md`](../Notify/docs/README.md)

**Key Topics:**
- Notification system
- Email templates
- Telegram integration
- Seasonal campaigns

**Key Documents:**
- [`seasonal-email-templates.md`](../Notify/docs/seasonal-email-templates.md) - 1,731 lines
- [`telegram-provider-architecture.md`](../Notify/docs/telegram-provider-architecture.md)

**Cross-References:**
- Related: [User Module](#user-module)

---

### Rating Module
**Location:** `laravel/Modules/Rating/docs/`  
**Files:** ~40  
**Entry Point:** [`00-INDEX.md`](../Rating/docs/00-INDEX.md)

**Key Topics:**
- Rating system
- Reviews
- Star ratings

**Cross-References:**
- Related: [Comment Module](#comment-module)

---

### Seo Module
**Location:** `laravel/Modules/Seo/docs/`  
**Files:** ~100  
**Entry Point:** [`00-INDEX.md`](../Seo/docs/00-INDEX.md)

**Key Topics:**
- SEO optimization
- Meta tags
- Sitemaps

**⚠️ Audit Note:** Contains `metodi-duplicati-analisi.md` (1,611 lines)

**Cross-References:**
- Related: [Cms Module](#cms-module)
- Related: [Blog Module](#blog-module)

---

### Tenant Module
**Location:** `laravel/Modules/Tenant/docs/`  
**Files:** ~60  
**Entry Point:** [`README.md`](../Tenant/docs/README.md)

**Key Topics:**
- Multi-tenancy
- Tenant isolation
- Database scoping

**Cross-References:**
- Related: [User Module](#user-module)

---

### UI Module
**Location:** `laravel/Modules/UI/docs/`  
**Files:** 589  
**Entry Point:** [`index.md`](../UI/docs/index.md)

**Key Topics:**
- **SSOT** for UI components
- Filament components
- Blade components
- Design system
- Charts and widgets

**⚠️ Audit Note:** 400+ files in `archive/` directory

**Key Documents:**
- [`components.md`](../UI/docs/components.md) - **SSOT**
- [`filament-components-usage.md`](../UI/docs/filament-components-usage.md)
- [`folo-volt-best-practices.md`](../UI/docs/folio-volt-best-practices.md)
- [`architecture.md`](../UI/docs/architecture.md)

**Deprecated:**
- `architecture-.md` → use `architecture.md`
- `naming_conventions.md` → use `naming-conventions.md`

**Cross-References:**
- Used by: **All modules with UI**
- Related: [Themes](../Themes/docs/README.md)

---

### User Module
**Location:** `laravel/Modules/User/docs/`  
**Files:** ~1,500  
**Entry Point:** [`README.md`](../User/docs/README.md)

**Key Topics:**
- User management
- Authentication
- Authorization
- Profile management
- GDPR compliance

**⚠️ Audit Note:** 
- 1,000+ files in `archive/` directory
- Contains `coverage-full.md` (11,055 lines) - **CRITICAL**: split immediately

**Key Documents:**
- [`gdpr-compliance.md`](../User/docs/gdpr-compliance.md) - **SSOT**
- [`guida-migrazione-step-by-step.md`](../User/docs/guida-migrazione-step-by-step.md)

**Deprecated:**
- `volt_errors.md` → use `volt-errors.md`
- `archive/` directory - scheduled for removal

**Cross-References:**
- Used by: **All modules**
- Related: [Gdpr Module](#gdpr-module)
- Related: [Tenant Module](#tenant-module)

---

### Xot Module
**Location:** `laravel/Modules/Xot/docs/`  
**Files:** 4,993  
**Entry Point:** [`00-INDEX.md`](../Xot/docs/00-INDEX.md)

**Key Topics:**
- **SSOT** for core architecture
- Base classes (XotBase*)
- Actions pattern
- Module system
- Quality standards

**⚠️ Audit Note:** 
- **CRITICAL**: 4,893 files in `archive/` directory (98% duplication)
- Multiple `laraxot.md` duplicates (8,831 lines each)

**Key Documents:**
- [`xot-engine.md`](../Xot/docs/xot-engine.md) - **SSOT**
- [`testing-best-practices.md`](../Xot/docs/testing-best-practices.md) - **SSOT**
- [`module-architecture.md`](../Xot/docs/module-architecture.md) - **SSOT**

**Deprecated:**
- `archive/` directory - **IMMEDIATE DELETION RECOMMENDED**
- `consolidated/archive/` - **IMMEDIATE DELETION RECOMMENDED**
- `historical/` subdirectories - **IMMEDIATE DELETION RECOMMENDED**

**Cross-References:**
- **Base framework for all modules**
- Related: [Laraxot Documentation](viking://docs/project/laraxot.md)

---

## Topic-Based Index

### Architecture

**Single Sources of Truth:**
1. [`Xot/docs/module-architecture.md`](../Xot/docs/module-architecture.md) - Core architecture
2. [`Xot/docs/xot-engine.md`](../Xot/docs/xot-engine.md) - Xot engine
3. [`UI/docs/architecture.md`](../UI/docs/architecture.md) - UI architecture

**Related:**
- `Cms/docs/folio-routing-locale.md`
- `User/docs/gdpr-compliance.md`

---

### Testing

**Single Sources of Truth:**
1. [`Xot/docs/testing-best-practices.md`](../Xot/docs/testing-best-practices.md) - **MASTER GUIDE**
2. [`Xot/docs/testing/pest-complete-guide.md`](../Xot/docs/testing/pest-complete-guide.md)

**Module-Specific:**
- `Activity/docs/coverage-full.md` (⚠️ too large)
- `User/docs/coverage-full.md` (⚠️ too large)
- `Geo/docs/coverage-full.md` (⚠️ too large)

---

### Quality

**Single Sources of Truth:**
1. [`Xot/docs/quality/phpstan-level-10-enforcement.md`](../Xot/docs/quality/phpstan-level-10-enforcement.md) - **MASTER GUIDE**
2. [`Xot/docs/phpstan-code-quality-guide.md`](../Xot/docs/phpstan-code-quality-guide.md)

**Module-Specific:**
- All modules have `phpstan-*.md` files - **CONSOLIDATE INTO MASTER**

---

### Translations

**Single Sources of Truth:**
1. [`Lang/docs/translation_system.md`](../Lang/docs/translation_system.md) - **MASTER GUIDE**
2. [`Lang/docs/translation_keys_best_practices.md`](../Lang/docs/translation_keys_best_practices.md)

**Related:**
- `Xot/docs/translation-rules-1.md`
- `UI/docs/translations-update-january-2026.md`

---

### Filament

**Single Sources of Truth:**
1. [`UI/docs/filament-components-usage.md`](../UI/docs/filament-components-usage.md) - **MASTER GUIDE**
2. [`Cms/docs/FILAMENT-RESOURCE-GUIDELINES.md`](../Cms/docs/FILAMENT-RESOURCE-GUIDELINES.md)

**Related:**
- `Xot/docs/volt-folio-best-practices.md`
- `UI/docs/filament-blade-components-usage.md`

---

### Routing

**Single Sources of Truth:**
1. [`Cms/docs/folio-routing-locale.md`](../Cms/docs/folio-routing-locale.md) - **MASTER GUIDE**

**Related:**
- `UI/docs/folio-volt-best-practices.md`
- `Xot/docs/volt-folio-best-practices.md`

---

## Deprecated Documents

### Marked for Deletion

**Archive Directories (IMMEDIATE):**
```
laravel/Modules/Xot/docs/archive/ (4,893 files)
laravel/Modules/Cms/docs/archive/ (793 files)
laravel/Modules/User/docs/archive/ (1,000+ files)
laravel/Modules/Lang/docs/archive/ (700+ files)
laravel/Modules/UI/docs/archive/ (400+ files)
```

**Exact Duplicates (by MD5 hash):**
- See [DOCUMENTATION_AUDIT.md](DOCUMENTATION_AUDIT.md) for complete list

**Naming Variants:**
- `*_*.md` → `*-*-*` (snake_case to kebab-case)
- `*-.md` → delete (trailing hyphen)
- `*-1.md` → merge or delete

---

## OpenViking URIs

**Master Documents (use these URIs):**
```
viking://modules/xot/docs/xot-engine.md
viking://modules/xot/docs/module-architecture.md
viking://modules/lang/docs/translation_system.md
viking://modules/ui/docs/filament-components-usage.md
viking://modules/cms/docs/content-blocks-system.md
```

---

## Maintenance

### Monthly Audit Checklist
- [ ] Check for new duplicates
- [ ] Verify all files <1000 lines
- [ ] Update deprecated markers
- [ ] Refresh OpenViking URIs

### Governance Rules
1. **DRY**: No topic duplication across modules
2. **KISS**: Files <500 lines, flat structure
3. **Forward-Only**: Mark DEPRECATED, never delete
4. **Single Source**: One master document per topic

---

**Index Generated:** 2026-03-30  
**Next Review:** 2026-04-30  
**Owner:** Documentation Governance Team

---

*For detailed audit findings, see [DOCUMENTATION_AUDIT.md](DOCUMENTATION_AUDIT.md)*
>>>>>>> origin/dev
