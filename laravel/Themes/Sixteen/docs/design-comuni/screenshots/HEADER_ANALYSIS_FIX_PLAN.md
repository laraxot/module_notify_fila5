# 📸 Header Analysis & Fix Plan

**Data**: 2026-03-30  
**Pagina**: Argomenti (`/it/tests/argomenti`)  
**Riferimento**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html  
**Stato**: 🔴 Critical Differences

---

## 🎯 Header Structure (Upstream)

### 1. **Top Bar (Header Slim)**

```
┌─────────────────────────────────────────────────────────┐
│ [Regione]           [Lingua] [Login] [Social Icons]    │
└─────────────────────────────────────────────────────────┘
```

**Elementi**:
- **Skip Links**: "Vai ai contenuti", "Vai al footer"
- **Regione**: "Nome della Regione" (sinistra)
- **Lingua**: Dropdown "ITA/ENG" (destra)
- **Login**: "Accedi all'area personale" (destra)
- **Social**: Twitter, Facebook, YouTube, Telegram, Whatsapp, RSS (destra)

**CSS Classes** (da replicare):
```css
.it-header-slim-wrapper
.it-header-slim-link
.language-btn
.social-icons
```

### 2. **Main Header (Header Main)**

```
┌─────────────────────────────────────────────────────────┐
│ [Logo] [Nome Comune] [Sottotitolo]      [Social] [Cerca]│
└─────────────────────────────────────────────────────────┘
```

**Elementi**:
- **Brand**: "Il mio Comune" + "Un comune da vivere"
- **Nome Comune**: "Nome del Comune" (centro)
- **Social** (repeat): 6 icone social
- **Search**: Bottone "Cerca" con toggle

### 3. **Navigation (Navbar)**

```
┌─────────────────────────────────────────────────────────┐
│ [Hamburger] [Menu: Amministrazione, Novità, ...]       │
└─────────────────────────────────────────────────────────┘
```

**Menu Items**:
- Amministrazione
- Novità
- Servizi
- Vivere il Comune

**Submenu items** (context):
- Iscrizioni
- Estate in città
- Polizia locale
- Tutti gli argomenti

---

## 🔍 FixCity Header Analysis

### Current Implementation

**File**: `laravel/Themes/Sixteen/resources/views/components/layout/sections/header.blade.php`

**Problemi Identificati**:

1. **❌ Wrong Structure**:
   - Current: Generic Laravel-style header
   - Required: Bootstrap Italia header

2. **❌ Missing Top Bar**:
   - Current: No header-slim wrapper
   - Required: `it-header-slim-wrapper`

3. **❌ Missing Brand Elements**:
   - Current: Generic logo placeholder
   - Required: "Il mio Comune" + subtitle

4. **❌ Missing Social Icons**:
   - Current: No social links
   - Required: 6 social icons (Twitter, Facebook, etc.)

5. **❌ Missing Language Switcher**:
   - Current: No ITA/ENG dropdown
   - Required: Language selector

6. **❌ Missing Search Toggle**:
   - Current: No search button
   - Required: "Cerca" toggle

7. **❌ Wrong Navigation**:
   - Current: Laravel-style nav links
   - Required: Bootstrap Italia navbar

---

## 📊 Comparison Table

| Element | Upstream | FixCity | Gap |
|---------|----------|---------|-----|
| Top Bar | ✅ Present | ❌ Missing | 🔴 |
| Language Switcher | ✅ ITA/ENG | ❌ Missing | 🔴 |
| Social Icons (6) | ✅ Present | ❌ Missing | 🔴 |
| Brand (Logo + Text) | ✅ Complete | ❌ Partial | 🔴 |
| Search Toggle | ✅ "Cerca" | ❌ Missing | 🔴 |
| Navbar (Bootstrap) | ✅ Italia | ❌ Generic | 🔴 |
| Mobile Menu | ✅ Hamburger | ⚠️ Partial | 🟡 |
| Skip Links | ✅ 2 links | ❌ Missing | 🔴 |

---

## 🛠️ Fix Plan

### Phase 1: Create Header Slim Component

**File**: `laravel/Themes/Sixteen/resources/views/components/layout/sections/header-slim.blade.php`

**Template**:
```blade
{{-- Bootstrap Italia Header Slim --}}
<div class="it-header-slim-wrapper">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-2">
            {{-- Left: Region --}}
            <div>
                <a href="#" class="it-header-slim-link">
                    <span class="text-small">Nome della Regione</span>
                </a>
            </div>

            {{-- Right: Utilities --}}
            <div class="d-flex align-items-center gap-3">
                {{-- Language Switcher --}}
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle language-btn" 
                            data-bs-toggle="dropdown">
                        <span class="text-small">ITA</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ITA</a></li>
                        <li><a class="dropdown-item" href="#">ENG</a></li>
                    </ul>
                </div>

                {{-- Login --}}
                <a href="#" class="it-header-slim-link">
                    <span class="text-small">Accedi all'area personale</span>
                </a>

                {{-- Social Icons --}}
                <div class="d-flex gap-2 social-icons">
                    <a href="#" class="text-link">
                        <svg class="icon icon-sm"><use href="#it-twitter"></use></svg>
                    </a>
                    <a href="#" class="text-link">
                        <svg class="icon icon-sm"><use href="#it-facebook"></use></svg>
                    </a>
                    <a href="#" class="text-link">
                        <svg class="icon icon-sm"><use href="#it-youtube"></use></svg>
                    </a>
                    <a href="#" class="text-link">
                        <svg class="icon icon-sm"><use href="#it-telegram"></use></svg>
                    </a>
                    <a href="#" class="text-link">
                        <svg class="icon icon-sm"><use href="#it-whatsapp"></use></svg>
                    </a>
                    <a href="#" class="text-link">
                        <svg class="icon icon-sm"><use href="#it-rss"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Phase 2: Update Header Main Component

**File**: `laravel/Themes/Sixteen/resources/views/components/layout/sections/header-main.blade.php`

**Template**:
```blade
{{-- Bootstrap Italia Header Main --}}
<div class="it-header-main-wrapper">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            {{-- Brand --}}
            <div class="it-brand-wrapper">
                <a href="/">
                    <img src="{{ theme_asset('images/logo-comune.svg') }}" 
                         alt="Logo Comune" 
                         class="icon">
                    <div class="it-brand-text">
                        <h2 class="h5 mb-0">Il mio Comune</h2>
                        <p class="text-small mb-0">Un comune da vivere</p>
                    </div>
                </a>
            </div>

            {{-- Comune Name --}}
            <div class="d-none d-lg-block">
                <h3 class="h6 mb-0">Nome del Comune</h3>
            </div>

            {{-- Right: Social + Search --}}
            <div class="d-flex align-items-center gap-3">
                {{-- Social (repeat) --}}
                <div class="d-none d-md-flex gap-2">
                    {{-- 6 social icons --}}
                </div>

                {{-- Search Toggle --}}
                <button class="btn btn-search" 
                        data-bs-toggle="modal" 
                        data-bs-target="#searchModal">
                    <svg class="icon"><use href="#it-search"></use></svg>
                    <span class="d-none d-lg-inline">Cerca</span>
                </button>
            </div>
        </div>
    </div>
</div>
```

### Phase 3: Update Navigation

**File**: `laravel/Themes/Sixteen/resources/views/components/layout/sections/navbar.blade.php`

**Template**:
```blade
{{-- Bootstrap Italia Navbar --}}
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="custom-navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/it/tests/amministrazione">
                        Amministrazione
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/it/tests/novita">
                        Novità
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/it/tests/servizi">
                        Servizi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/it/tests/eventi">
                        Vivere il Comune
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
```

### Phase 4: Update Layout Component

**File**: `laravel/Themes/Sixteen/resources/views/components/layout/app.blade.php`

**Change**:
```blade
{{-- BEFORE --}}
<x-layouts.sections.header />

{{-- AFTER --}}
<div class="it-header-wrapper">
    <x-layouts.sections.header-slim />
    <x-layouts.sections.header-main />
    <x-layouts.sections.navbar />
</div>
```

---

## 🎨 CSS/JS Build Process

### Development

```bash
# 1. Enter theme directory
cd laravel/Themes/Sixteen

# 2. Install dependencies (first time only)
npm install

# 3. Start development server (with hot reload)
npm run dev

# 4. Make changes to:
#    - resources/css/*.css
#    - resources/js/*.js
#    - resources/views/**/*.blade.php

# 5. Changes auto-compile to public/
```

### Production Build

```bash
# 1. Build assets
npm run build

# Output: public/css/app.css, public/js/app.js

# 2. Copy to public_html
npm run copy

# Copies: public/* → ../../../public_html/themes/Sixteen/
```

### Build Scripts Explained

| Script | Command | Purpose |
|--------|---------|---------|
| `dev` | `vite` | Development server with HMR |
| `build` | `vite build` | Production build (minified) |
| `build:production` | `vite build --mode production` | Optimized production build |
| `copy` | `cp -r ./public/* ../../../public_html/themes/Sixteen/` | Copy assets to public |
| `copy:watch` | `nodemon --watch ./public --exec 'npm run copy'` | Auto-copy on change |

### File Structure

```
laravel/Themes/Sixteen/
├── resources/
│   ├── css/
│   │   ├── app.css           # Main CSS
│   │   └── bootstrap-italia.css
│   ├── js/
│   │   ├── app.js            # Main JS
│   │   └── bootstrap-italia.js
│   └── views/
│       └── components/
│           └── layout/
│               └── sections/
│                   ├── header-slim.blade.php
│                   ├── header-main.blade.php
│                   └── navbar.blade.php
├── public/
│   ├── css/
│   │   └── app.css           # Compiled CSS
│   └── js/
│       └── app.js            # Compiled JS
└── package.json
```

---

## 📋 Implementation Checklist

- [ ] Create `header-slim.blade.php` with top bar
- [ ] Update `header-main.blade.php` with brand
- [ ] Create `navbar.blade.php` with Bootstrap Italia menu
- [ ] Update `app.blade.php` layout
- [ ] Add social icons SVG sprites
- [ ] Add language switcher functionality
- [ ] Add search modal
- [ ] Test responsive (mobile/tablet/desktop)
- [ ] Run `npm run build`
- [ ] Run `npm run copy`
- [ ] Verify on http://fixcity.local/it/tests/argomenti

---

## 📊 Success Metrics

| Metric | Target | Current | Status |
|--------|--------|---------|--------|
| Top Bar Present | ✅ | ❌ | 🔴 |
| Social Icons (6) | ✅ | ❌ | 🔴 |
| Language Switcher | ✅ | ❌ | 🔴 |
| Search Toggle | ✅ | ❌ | 🔴 |
| Bootstrap Navbar | ✅ | ❌ | 🔴 |
| Visual Match | 95%+ | 0% | 🔴 |

---

## 🤖 Multi-Agent Coordination

**OpenViking Context**:
```bash
openviking add-memory "Header fix: Need header-slim + header-main + navbar components for Bootstrap Italia compliance"
```

**GSD Phase**: `.planning/phases/07-header-fix/`

**Owner**: Amelia (Dev) + Sally (UX)

---

**Next Step**: Execute GSD Phase 07  
**ETA**: 2 ore  
**Blockers**: Nessuno
