# Design Comuni Replication Documentation

> **Replicare le pagine di Design Comuni Italia utilizzando Tailwind CSS + Laravel Folio + Volt**

## 📋 Panoramica

Questo documento guida la replica delle pagine statiche del progetto [Design Comuni](https://github.com/italia/design-comuni-pagine-statiche) nel tema Sixteen, convertendo Bootstrap Italia in Tailwind CSS.

## 🎯 Obiettivi

1. **Replica Fedele:** HTML identico (dentro `<body>`, esclusi script)
2. **Tailwind CSS:** NO import Bootstrap, SI @apply per replicare stili
3. **Architettura Moderna:** Laravel Folio + Livewire Volt
4. **Contenuti JSON:** CMS-driven pages con blocchi universali
5. **Documentazione:** Screenshot + analisi per ogni pagina

## 📚 Struttura Documentazione

```
design-comuni/
├── 00-index.md                      ← Questo file
├── QUICK_START.md                   ← Guida rapida
├── product-brief.md                 ← BMAD Product Brief ✅
├── pages-census.md                  ← Censimento 38 pagine ✅
├── HTML_PARITY_VERIFICATION_REPORT.md ← Verifica HTML parity ✅ NEW
├── replication-guide.md             ← Guida completa (link a prompts/replikate.txt)
├── pages/                           ← Documentazione pagine
│   ├── 00-index.md
│   ├── homepage.md
│   ├── argomenti.md
│   ├── appuntamento-06-conferma.md
│   ├── amministrazione.md
│   └── documenti-dati.md
├── blocks/                          ← Blocchi universali
│   ├── 00-index.md
│   ├── hero.md
│   ├── card-grid.md
│   ├── topics-grid.md
│   ├── list.md
│   └── form.md
├── components/                      ← Componenti Blade
│   ├── 00-index.md
│   ├── header.md
│   └── footer.md
└── screenshots/                     ← Screenshot + analisi
    ├── 00-index.md
    ├── homepage/
    ├── argomenti/
    └── appuntamento-06-conferma/
```

## 🚀 Quick Start

### 1. Build Tema

```bash
cd laravel/Themes/Sixteen
npm install
npm run build
npm run copy
```

### 2. Verifica Vite

```blade
{{-- Layout: Themes/Sixteen/resources/views/components/layouts/app.blade.php --}}
@vite(['resources/css/app.css', 'resources/js/app.js'], 'themes/Sixteen')
```

### 3. Crea Pagina

**JSON Content:** `config/local/fixcity/database/content/pages/tests.homepage.json`

```json
{
    "slug": "tests.homepage",
    "title": "Homepage",
    "blocks": [...]
}
```

**Route:** Già pronta in `Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`

### 4. Verifica

```
http://fixcity.local/it/tests/homepage
```

## 📖 Pagine da Replicare

| Pagina | Originale | Locale | Stato |
|--------|-----------|--------|-------|
| Homepage | [homepage.html](https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html) | `/it/tests/homepage` | 🔄 In Progress |
| Argomenti | [argomenti.html](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html) | `/it/tests/argomenti` | 🔄 In Progress |
| Appuntamento 06 | [appuntamento-06-conferma.html](https://italia.github.io/design-comuni-pagine-statiche/sito/appuntamento-06-conferma.html) | `/it/tests/appuntamento-06-conferma` | ⏳ Pending |
| Amministrazione | [amministrazione.html](https://italia.github.io/design-comuni-pagine-statiche/sito/amministrazione.html) | `/it/tests/amministrazione` | ⏳ Pending |
| Documenti Dati | [documenti-dati.html](https://italia.github.io/design-comuni-pagine-statiche/sito/documenti-dati.html) | `/it/tests/documenti-dati` | ⏳ Pending |

## 🧩 Blocchi Universali

### Tipologie Disponibili

Ispirate da:
- https://flowbite.com/blocks/
- https://tailwindcss.com/plus/ui-blocks
- https://daisyui.com/components/

| Tipo | Descrizione | Esempi |
|------|-------------|--------|
| `hero` | Hero section, newscard featured | `hero.newscard`, `hero.featured` |
| `card-grid` | Griglia di card | `card-grid.governance`, `card-grid.topics` |
| `topics-grid` | Griglia argomenti | `topics-grid.default` |
| `list` | Liste verticali | `list.events`, `list.news` |
| `form` | Form e feedback | `form.feedback`, `form.search` |
| `navigation` | Navigazione | `navigation.breadcrumb`, `navigation.primary-menu` |

### Prototipo View

```
pub_theme::components.blocks.<tipo>.<blade>
```

**Esempio:**

```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.newscard",
        "title": "Contenuti in Evidenza",
        "date": "2024-01-15",
        "description": "Lorem ipsum...",
        "link": "/it/tests/news-detail"
    }
}
```

## 🎨 Styling: Tailwind @apply

### File Principali

- **CSS:** `Themes/Sixteen/resources/css/style-apply.css`
- **JS:** `Themes/Sixteen/resources/js/app.js`
- **Riferimento:** `Themes/Sixteen/Main_files/five/src/style-apply.css`

### Esempio Replica Classi

```css
/* Bootstrap Italia → Tailwind @apply */

.it-header-slim-wrapper {
    @apply bg-primary-800 text-white py-2;
}

.it-header-slim-wrapper-content {
    @apply flex justify-between items-center;
}

.visually-hidden-focusable {
    @apply sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0;
}

.card {
    @apply bg-white rounded-lg shadow-md p-4;
}
```

## 🏗️ Architettura

### Theme Detection

```
APP_URL → Domain Parsing → Config Path → pub_theme
fixcity.local → local/fixcity → config/local/fixcity/xra.php → "Sixteen"
```

### Layout Hierarchy (DRY + KISS)

```
main.blade.php (HTML boilerplate, Vite assets)
    ↓ extends
app.blade.php (Skip links, Header, Footer)
    ↓ extends
[slug].blade.php (Folio routing + page content ONLY)
```

**Perché:**
- ✅ **DRY:** Header/footer scritti UNA volta in `app.blade.php`
- ✅ **KISS:** `[slug].blade.php` gestisce SOLO routing e contenuto
- ✅ **Manutenibilità:** Modifica header/footer in 1 file solo

**Documentazione:** [Layout Architecture](../architecture/layout-architecture.md)

### Page Routing

```
Folio: Themes/Sixteen/resources/views/pages/tests/[slug].blade.php
       ↓
Volt:  Component mount() → pageSlug = 'tests.'.$slug
       ↓
JSON:  config/local/fixcity/database/content/pages/tests.<slug>.json
       ↓
Page:  <x-page side="content" :slug="$pageSlug" :data="$data" />
       ↓
Blocks: Render universal blocks from JSON
```

### Sections

```blade
{{-- Header --}}
<x-section slug="header" />

{{-- Footer --}}
<x-section slug="footer" />
<x-section slug="footer" tpl="slim" /> {{-- Variante slim --}}
```

### Layout

```blade
<x-layouts.app>  {{-- Estende <x-layouts.main> --}}
    @volt('tests.view')
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    @endvolt
</x-layouts.app>
```

## 🔍 Quality Assurance

### Screenshot & Analisi

**Percorso:** `Themes/Sixteen/docs/design-comuni/screenshots/<pagina>/`

**File richiesti:**
- `originale.png`
- `replica.png`
- `confronto.png` (side-by-side)
- `<pagina>.md` (analisi differenze)

### Checklist Verifica

```markdown
## Pre-Build
- [ ] CSS modificato in style-apply.css
- [ ] JS modificato in app.js
- [ ] Nessun @import Bootstrap

## Build
- [ ] npm run build completato
- [ ] Manifest generato
- [ ] npm run copy eseguito

## Post-Build
- [ ] File in public_html/themes/Sixteen/
- [ ] Cache pulita: php artisan optimize:clear
- [ ] Pagina ricaricata

## Verifica
- [ ] HTML body identico (View Source)
- [ ] Stili corretti
- [ ] Screenshot aggiornati
- [ ] Analisi documentata
```

## 🤖 Agent Collaboration

Questo progetto coinvolve multipli agenti AI:

| Agente | Responsabilità |
|--------|---------------|
| `gsd-codebase-mapper` | Mappatura codebase |
| `gsd-ui-researcher` | Ricerca pattern UI |
| `gsd-ui-checker` | Verifica conformità |
| `gsd-executor` | Esecuzione piano |
| `gsd-verifier` | Verifica finale |
| `gsd-nyquist-auditor` | Test coverage |

## 📎 Risorse

### Design System

- [Design Comuni GitHub](https://github.com/italia/design-comuni-pagine-statiche)
- [Design Comuni Demo](https://italia.github.io/design-comuni-pagine-statiche/)
- [Bootstrap Italia Docs](https://italia.github.io/bootstrap-italia/docs/componenti/introduzione/)
- [Flowbite Blocks](https://flowbite.com/blocks/)
- [Tailwind UI Blocks](https://tailwindcss.com/plus/ui-blocks)
- [DaisyUI](https://daisyui.com/components/)

### Laravel Ecosystem

- [Laravel Folio](https://laravel.com/docs/folio)
- [Livewire Volt](https://livewire.laravel.com/docs/volt)
- [Filament v5](https://filamentphp.com/docs/5.x)
- [Filament Icon](https://filamentphp.com/docs/5.x/components/icon)

### Methodologies

- [BMAD Method](https://github.com/bmad-code-org/BMAD-METHOD)
- [GSD (Get Shit Done)](https://github.com/gsd-build/get-shit-done)
- [Superpowers](https://github.com/obra/superpowers)
- [Ralph Loop](https://github.com/snarktank/ralph)
- [OpenViking](https://github.com/volcengine/OpenViking)

## 📝 Documenti Correlati

- [Replication Guide](./replication-guide.md) - Guida completa (prompts/replikate.txt)
- [Block System](../components/blocks/README.md) - Sistema blocchi universali
- [Vite Build System](../architecture/vite-build.md) - Configurazione build
- [Folio + Volt](../architecture/folio-volt.md) - Routing e componenti
- [Theme Detection](../architecture/theme-detection.md) - Rilevamento tema

## 📊 Coverage Map

| Pagina | HTML | Stili | Blocchi | Docs | Stato |
|--------|------|-------|---------|------|-------|
| Homepage | ✅ | ✅ | ✅ | ✅ | 🔄 CSS/JS refinement |
| Argomenti | ⏳ | ⏳ | ⏳ | ⏳ | 🔄 |
| Appuntamento 06 | ⏳ | ⏳ | ⏳ | ⏳ | ⏳ |
| Amministrazione | ⏳ | ⏳ | ⏳ | ⏳ | ⏳ |
| Documenti Dati | ⏳ | ⏳ | ⏳ | ⏳ | ⏳ |

**Legenda:** ✅ Completo | 🔄 In Progress | ⏳ Pending

---

## 📸 Analisi Visiva Homepage (2026-04-02)

### Report Disponibili

| Report | File | Descrizione |
|--------|------|-------------|
| Struttura HTML | [html-structure-comparison-2026-04-02.md](html-structure-comparison-2026-04-02.md) | Analisi struttura 53% match |
| Comparazione Visiva | [visual-comparison-report-2026-04-02.md](visual-comparison-report-2026-04-02.md) | 93.3% classi CSS replicate |
| Analisi Dettagliata | [visual-comparison-analysis-2026-04-02.md](visual-comparison-analysis-2026-04-02.md) | Analisi per sezione |
| Piano di Lavoro | [work-plan.md](work-plan.md) | Piano condiviso agenti |

### Screenshots per Sezione

| Sezione | Reference | FixCity | Match |
|---------|-----------|---------|-------|
| Header Slim | [ref](screenshots/reference-02-header-slim.png) | [fix](screenshots/fixcity-02-header-slim.png) | ✅ 0.86x |
| Header Center | [ref](screenshots/reference-03-header-center.png) | [fix](screenshots/fixcity-03-header-center.png) | ⚠️ 0.58x |
| Header Navbar | [ref](screenshots/reference-04-header-navbar.png) | [fix](screenshots/fixcity-04-header-navbar.png) | ✅ 1.29x |
| Header Full | [ref](screenshots/reference-05-header-full.png) | [fix](screenshots/fixcity-05-header-full.png) | ✅ 0.86x |
| Hero Section | [ref](screenshots/reference-06-hero-section.png) | [fix](screenshots/fixcity-06-hero-section.png) | ✅ 1.06x |
| Calendario | [ref](screenshots/reference-07-calendario.png) | [fix](screenshots/fixcity-07-calendario.png) | ❌ 1.40x |
| Evidence | [ref](screenshots/reference-08-evidence-section.png) | [fix](screenshots/fixcity-08-evidence-section.png) | ✅ 0.88x |
| Useful Links | [ref](screenshots/reference-09-useful-links.png) | [fix](screenshots/fixcity-09-useful-links.png) | ✅ 1.14x |
| Rating | [ref](screenshots/reference-10-rating-section.png) | [fix](screenshots/fixcity-10-rating-section.png) | ❌ 2.14x |
| Footer | [ref](screenshots/reference-11-footer.png) | [fix](screenshots/fixcity-11-footer.png) | ✅ 1.27x |

### Screenshot Full Page

| Tipo | File |
|------|------|
| Reference Desktop | [reference-desktop.png](screenshots/reference-desktop.png) |
| FixCity Desktop | [fixcity-desktop.png](screenshots/fixcity-desktop.png) |
| Reference Mobile | [reference-mobile.png](screenshots/reference-mobile.png) |
| FixCity Mobile | [fixcity-mobile.png](screenshots/fixcity-mobile.png) |

---

**Ultimo Aggiornamento:** 2026-04-02  
**Versione:** 1.1  
**Stato:** 🔄 In Progress - CSS/JS refinement
