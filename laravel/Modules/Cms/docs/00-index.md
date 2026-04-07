# Cms Module Documentation

## Overview
<<<<<<< HEAD

Il modulo Cms gestisce contenuti, composizione pagina e rendering CMS-driven dei blocchi. Nel lavoro corrente sulla parity Design Comuni, il Cms governa la struttura della homepage di test, mentre la resa visuale viene rifinita nel tema Sixteen.

## 📚 Design Comuni - Index Completo

- **[DESIGN_COMUNI_INDEX.md](./DESIGN_COMUNI_INDEX.md)** - **INDEX COMPLETO** con tutti i link bidirezionali

## Active design-comuni references

- [design-comuni-homepage.md](./design-comuni-homepage.md) - Coordinamento Cms per la homepage parity
- [design-comuni-faq.md](./design-comuni-faq.md) - Pagina FAQ ✅ 90%
- [design-comuni-argomenti.md](./design-comuni-argomenti.md) - Pagina argomenti
- [design-comuni-risultati-ricerca.md](./design-comuni-risultati-ricerca.md) - Pagina risultati ricerca
- [design-comuni-page-census.md](./design-comuni-page-census.md) - Censimento 38 pagine
- [design-comuni-services-implementation.md](./design-comuni-services-implementation.md) - Implementazione servizi
- [design-comuni-batch-audit.md](./design-comuni-batch-audit.md) - Audit batch pagine
- [design-comuni-batch-parity.md](./design-comuni-batch-parity.md) - Verifica parity
- [architecture/homepage-structure.md](./architecture/homepage-structure.md) - Flusso runtime aggiornato della homepage di test
- [PAGE_COMPONENT_ARCHITECTURE.md](./PAGE_COMPONENT_ARCHITECTURE.md) - Architettura generale componenti pagina

## Theme cross links

- [../../../Themes/Sixteen/docs/00-index.md](../../../Themes/Sixteen/docs/00-index.md) - Indice docs del tema
- [../../../Themes/Sixteen/docs/design-comuni/00-index.md](../../../Themes/Sixteen/docs/design-comuni/00-index.md) - Workspace attivo parity homepage
- [../../../Themes/Sixteen/docs/design-comuni/ALL_PAGES_ANALYSIS.md](../../../Themes/Sixteen/docs/design-comuni/ALL_PAGES_ANALYSIS.md) - Analisi 54 pagine
- [../../../Themes/Sixteen/docs/design-comuni/PROGRESS_REPORT.md](../../../Themes/Sixteen/docs/design-comuni/PROGRESS_REPORT.md) - Report progresso
- [../../../docs/design-comuni/MASTER_INDEX.md](../../../docs/design-comuni/MASTER_INDEX.md) - Master Index globale

## Runtime architecture

- La pagina di test e' servita da `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`.
- Il contenuto locale della homepage arriva da `config/local/fixcity/database/content/pages/tests.homepage.json`.
- Il Cms mantiene il contratto dati e la struttura dei blocchi.
- Il tema Sixteen mantiene layout, CSS e JS di parity visuale.

## Operational rule for this workstream

- Se il problema e' strutturale, verificare prima Cms JSON + routing.
- Se il problema e' visivo, lavorare nel tema e documentare i risultati anche qui.
- Mantenere collegamenti bidirezionali tra docs di modulo e docs di tema.
=======
The Cms module handles content management, page rendering, and multi-language support through a flexible block-based system.

**Pacchetti**: Nessuna dipendenza diretta; usa Xot, Tenant, UI. [Riferimento](../../../../docs/composer-packages-reference.md) | [Inventario 312 pacchetti](../../../../docs/architecture/composer-packages-full-inventory.md)

## Roadmap

- [Roadmap Cms](roadmap/00-index.md) - Stato, tasks, fasi

## Runtime Architecture

- [Composer Packages Study](../../../../docs/architecture/composer-packages-study.md) - Analisi globale pacchetto-per-pacchetto (composer show).
- [CMS Theme Template Runtime Architecture](cms-theme-template-runtime-architecture.md) - Verified runtime pipeline (Folio -> x-page -> JSON blocks -> pub_theme views), risks, and chaos targets.
- [Template Theme CMS Reference](template-theme-cms-reference.md) - Runtime reference for providers, namespaces, JSON contracts, and fallback behavior.
- [Package Dependency Chaos Map](package-dependency-chaos-map.md) - Dipendenze chiave (Folio/Volt/Sushi/Data) e superfici di fault.
- [Chaos Monkey Deep Dive](chaos-monkey-deep-dive.md) - Analisi approfondita: tenant path, BlockData, wrap_in, container0/slug0, punti di rottura.
- [Chaos Monkey Recovery Playbook](chaos-monkey-recovery-playbook.md) - Incident playbook to restore frontoffice rendering under randomized failures.
- [Chaos Readiness Toolkit](chaos-readiness-toolkit.md) - Runner operativo e baseline di stabilita prima/dopo bug injection.

## Key Components

### Page Model
- **Location**: `app/Models/Page.php`
- **Purpose**: Manages page content with multi-language JSON fields
- **Fields**: `title`, `content_blocks`, `sidebar_blocks`, `footer_blocks`

### Page Component
- **Location**: `app/View/Components/Page.php`
- **Purpose**: Renders pages using block-based architecture
- **Features**: Multi-language support, block processing, component resolution

### BlockData System
- **Location**: `app/Datas/BlockData.php`
- **Purpose**: Manages individual block data and view resolution
- **Features**: Type safety, view existence validation, data merging

## Multi-Language Support

### Language Detection Logic
```php
// In Page component
$current_lang = app()->getLocale();
if (in_array($current_lang, $locales)) {
    $blocks = $blocks[$current_lang];
} elseif (in_array('it', $locales)) {
    $blocks = $blocks['it']; // Fallback to Italian
}
```

### Content Structure
```json
{
  "title": {
    "it": "Titolo Italiano",
    "en": "English Title"
  },
  "content_blocks": {
    "it": [...],
    "en": [...]
  }
}
```

## Block System Architecture

### Block Types
- **Hero**: Page header sections
- **Services**: Service listings and grids
- **Content**: General content sections
- **Forms**: Contact and interaction forms
- **Testimonials**: Customer reviews
- **Resources**: Downloads and guides

### Component Resolution
Blocks use view paths like:
- `pub_theme::components.blocks.hero.simple`
- `pub_theme::components.blocks.services.grid`
- `pub_theme::components.blocks.newsletter.simple`

## Important Notes

### Critical Issues Identified ([DATE])
1. **Missing Component**: `hero.fullscreen.blade.php` referenced but non-existent
2. **Content Disparity**: Italian version has 9 blocks vs English 3 blocks
3. **Component Duplication**: 32+ hero variants across themes

### Recommendations
1. **Audit Component References**: Ensure all referenced views exist
2. **Standardize Content**: Maintain parity between language versions
3. **Consolidate Components**: Reduce redundant hero component variants

## File Structure

```
Modules/Cms/
├── app/
│   ├── Models/Page.php
│   ├── View/Components/
│   │   ├── Page.php
│   │   └── PageContent.php
│   └── Datas/BlockData.php
├── resources/views/
│   └── components/
│       ├── page.blade.php
│       └── page-content.blade.php
└── docs/
    ├── 00-index.md (this file)
    ├── page-translation-strategy.md
    ├── block-component-guidelines.md
    └── multi-language-content-management.md
```

## Filament

- **Compatibilità 5.x**: [filament-5x-compatibility.md](filament-5x-compatibility.md) — progetto su Filament 5.x; pattern e riferimenti per il modulo Cms.

## 📄 Documenti Aggiuntivi

### Panoramica
| File | Scopo |
|------|-------|
| [architecture.md](./architecture.md) | Architettura sistema |
| [philosophy.md](./philosophy.md) | Filosofia di design |

### Filament Integration
| File | Scopo |
|------|-------|
| [filament-resources.md](./filament-resources.md) | Resource Filament |
| [filament-forms.md](./filament-forms.md) | Form per CMS |
| [filament-widgets.md](./filament-widgets.md) | Widget per backoffice |

### Block System
| File | Scopo |
|------|-------|
| [block-system.md](./block-system.md) | Sistema blocchi |
| [content-blocks.md](./content-blocks.md) | Content blocks |
| [blocks-reference.md](./blocks-reference.md) | Riferimento blocchi |

### Frontend (Folio/Volt)
| File | Scopo |
|------|-------|
| [folio-routing.md](./folio-routing.md) | Routing Folio |
| [volt-components.md](./volt-components.md) | Componenti Volt |
| [page-rendering.md](./page-rendering.md) | Rendering pagine |

### SEO & Localization
| File | Scopo |
|------|-------|
| [seo-integration.md](./seo-integration.md) | Integrazione SEO |
| [multi-language.md](./multi-language.md) | Multilingua |
| [meta-tags.md](./meta-tags.md) | Meta tag management |

## 🔗 Riferimenti

- [Xot Module](../Xot/docs/00-index.md) - Base classes
- [UI Module](../UI/docs/00-index.md) - Blocchi UI
- [AGENTS.md](../../../../AGENTS.md) - Project guidelines

## Dependencies

- **Xot Module**: Base functionality and data structures
- **Lang Module**: Multi-language support (if available)
- **Themes**: Component rendering (active: "Two")

## Best Practices

1. **Always verify component existence** before referencing in page data
2. **Maintain content parity** across all supported languages
3. **Use consistent data structures** for similar block types
4. **Test multi-language functionality** thoroughly
5. **Document custom block types** and their required data structure

## Testing

- Use Pest testing framework
- Test multi-language scenarios
- Verify component rendering
- Test data validation and fallbacks

## Recent Changes

### [DATE]
- Identified critical missing component issue
- Documented content disparity between languages
- Created comprehensive duplicate content analysis

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)
>>>>>>> origin/dev
