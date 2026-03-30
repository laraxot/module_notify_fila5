# 📸 Header Analysis - Argomenti Page

**Data**: 2026-03-30  
**Originale**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html  
**FixCity**: http://fixcity.local/it/tests/argomenti  
**Stato**: 📝 **ANALISI COMPLETATA**

## 🏗️ Struttura Header Originale

### 3 Livelli Header

```
Header Bootstrap Italia
├── 1. it-header-slim-wrapper (Regione, Lingua, Login)
├── 2. it-header-center-wrapper (Logo, Social, Search)
└── 3. it-header-navbar-wrapper (Menu navigazione)
```

### Livello 1: Header Slim
```html
<div class="it-header-slim-wrapper">
  - Nome della Regione (link esterno)
  - Dropdown Lingua (ITA/ENG)
  - Bottone "Accedi all'area personale"
</div>
```

### Livello 2: Header Center
```html
<div class="it-header-center-wrapper">
  - Logo Comune (82x82)
  - Titolo: "Il mio Comune"
  - Tagline: "Un comune da vivere"
  - Social icons (Twitter, Facebook, YouTube, Telegram, Whatsapp, RSS)
  - Search button
</div>
```

### Livello 3: Header Navbar
```html
<div class="it-header-navbar-wrapper">
  - Menu principale: Amministrazione, Novità, Servizi, Vivere il Comune
  - Menu secondario: Iscrizioni, Estate in città, Polizia locale, Tutti gli argomenti
  - Mobile: Hamburger menu con overlay
</div>
```

## 🎨 Colori Bootstrap Italia

```css
--bs-primary: #007a52 (Verde principale)
--bs-primary-dark: #00614a (Verde scuro - slim header)
--bs-secondary: #5d7083 (Grigio secondario)
--text-white: #ffffff
```

## 📐 Classi CSS Principali

```css
.it-header-wrapper
.it-header-slim-wrapper
.it-header-slim-wrapper-content
.it-header-slim-right-zone
.it-nav-wrapper
.it-header-center-wrapper
.it-header-center-content-wrapper
.it-brand-wrapper
.it-brand-text
.it-brand-title
.it-brand-tagline
.it-right-zone
.it-socials
.it-search-wrapper
.it-header-navbar-wrapper
.navbar-collapsable
.menu-wrapper
```

## 🔧 Componenti da Creare

### 1. Header Section Component
**File**: `resources/views/components/sections/header-bootstrap-italia.blade.php`

**Props**:
- `$region_name` = "Nome della Regione"
- `$logo_url` = URL logo
- `$title` = "Il mio Comune"
- `$tagline` = "Un comune da vivere"
- `$social_links` = Array social links
- `$nav_items` = Array menu items

### 2. CSS Necessario
**File**: `resources/css/components/header-bootstrap-italia.css`

**Importante**: Usare variabili CSS per colori Bootstrap Italia

## 📋 Differenze con Implementazione Attuale

### Attuale (❌ SBAGLIATO)
```blade
<x-section slug="header" />
<!-- Usa header-comune.blade.php -->
<!-- Layout moderno con Heroicons -->
<!-- Non Bootstrap Italia -->
```

### Richiesto (✅ CORRETTO)
```blade
<x-section slug="header" />
<!-- Deve usare Bootstrap Italia structure -->
<!-- Classi: it-header-wrapper, it-header-slim-wrapper, etc. -->
<!-- SVG sprites: Bootstrap Italia icons -->
```

## 🔧 Come Correggere

### Step 1: Creare Componente Header Bootstrap Italia
```blade
{{-- resources/views/components/bootstrap-italia/header.blade.php --}}
<header class="it-header-wrapper">
  {{-- Level 1: Slim --}}
  <div class="it-header-slim-wrapper">...</div>
  
  {{-- Level 2: Center --}}
  <div class="it-nav-wrapper">
    <div class="it-header-center-wrapper">...</div>
    
    {{-- Level 3: Navbar --}}
    <div class="it-header-navbar-wrapper">...</div>
  </div>
</header>
```

### Step 2: Aggiornare Section Registry
```php
// Sections registry o config
'header' => 'bootstrap-italia.header'
```

### Step 3: Compilare CSS
```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

## 📊 Priority

| Task | Priority | Status |
|------|----------|--------|
| Creare header component | 🔴 High | ⏳ Da fare |
| Creare CSS header | 🔴 High | ⏳ Da fare |
| Testare rendering | 🟠 Medium | ⏳ Da fare |
| Documentare script | 🟡 Low | ⏳ Da fare |

---

**Prossimo Step**: Creare componente `bootstrap-italia/header.blade.php`
