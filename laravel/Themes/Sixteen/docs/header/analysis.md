# Header Analysis: Design Comuni Alignment

> *"L'header è il volto del sito, come il titolo è del libro."*

## 🎯 Obiettivo

Allineare il nostro header a **Design Comuni**:
- **Reference**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html
- **Our Site**: http://fixcity.local/it/tests/argomenti

---

## 📊 Analisi Comparativa

### Design Comuni Header Structure

```
┌─────────────────────────────────────────────────────────┐
│ TOP BAR (Region, Language, Personal Area)               │
├─────────────────────────────────────────────────────────┤
│ HEADER (Logo, Municipality Name, Social)                │
├─────────────────────────────────────────────────────────┤
│ MAIN NAV (Amministrazione, Novità, Servizi, Vivere)     │
├─────────────────────────────────────────────────────────┤
│ SECONDARY NAV (Sottotemi, Breadcrumb)                   │
└─────────────────────────────────────────────────────────┘
```

### Nostro Header (Attuale)

```
┌─────────────────────────────────────────────────────────┐
│ TOP BAR (Language, User)                                │
├─────────────────────────────────────────────────────────┤
│ HEADER (Logo, Site Name)                                │
├─────────────────────────────────────────────────────────┤
│ MAIN NAV (Home, Servizi, Info)                          │
└─────────────────────────────────────────────────────────┘
```

### Differenze Chiave

| Elemento | Design Comuni | Nostro | Gap |
|----------|---------------|--------|-----|
| **Top Bar** | Region + Lang + Personal Area | Lang + User | 🟡 Partial |
| **Logo** | Municipality stemma | Generic logo | 🟡 Partial |
| **Municipality Name** | "Comune di..." | Site name | 🟡 Partial |
| **Main Nav** | 4 voci (PA pattern) | 3 voci | 🔴 Missing |
| **Secondary Nav** | Sottotemi + Breadcrumb | Breadcrumb only | 🔴 Missing |
| **Social Icons** | Twitter, FB, YT, etc. | Missing | 🔴 Missing |

---

## 🎨 Design Comuni Header Breakdown

### 1. Top Bar

**Struttura**:
```html
<div class="it-topbar">
    <div class="container">
        <span class="region">Regione Lazio</span>
        <div class="utilities">
            <select class="language-selector">
                <option>ITA</option>
                <option>ENG</option>
            </select>
            <a href="/login" class="personal-area">
                <svg><!-- Icon --></svg>
                Area Personale
            </a>
        </div>
    </div>
</div>
```

**Bootstrap Italia Classes**:
- `.it-topbar`
- `.container`
- `.region`
- `.utilities`
- `.language-selector`
- `.personal-area`

### 2. Header

**Struttura**:
```html
<header class="it-header-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-3 logo">
                <img src="stemma-comune.svg" alt="Stemma">
            </div>
            <div class="col-9 municipality">
                <h1>Comune di Roma</h1>
                <p>Città Metropolitana di Roma Capitale</p>
                <div class="social">
                    <!-- Social icons -->
                </div>
            </div>
        </div>
    </div>
</header>
```

**Bootstrap Italia Classes**:
- `.it-header-wrapper`
- `.logo`
- `.municipality`
- `.social`

### 3. Main Navigation

**Struttura**:
```html
<nav class="it-main-nav">
    <div class="container">
        <ul class="nav-list">
            <li><a href="/amministrazione">Amministrazione</a></li>
            <li><a href="/novita">Novità</a></li>
            <li><a href="/servizi">Servizi</a></li>
            <li><a href="/vivere">Vivere il Comune</a></li>
        </ul>
    </div>
</nav>
```

**Bootstrap Italia Classes**:
- `.it-main-nav`
- `.nav-list`

### 4. Secondary Navigation

**Struttura**:
```html
<nav class="it-secondary-nav">
    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Argomenti</li>
            </ol>
        </nav>
        
        <!-- Subtopics (optional) -->
        <div class="subtopics">
            <a href="#">Tutti gli argomenti</a>
            <a href="#">In evidenza</a>
        </div>
    </div>
</nav>
```

**Bootstrap Italia Classes**:
- `.it-secondary-nav`
- `.breadcrumb`
- `.subtopics`

---

## 🔧 Implementazione Sixteen Theme

### Current Header Component

**File**: `Themes/Sixteen/resources/views/components/header.blade.php`

```blade
<header class="site-header">
    {{-- Top Bar --}}
    <div class="top-bar">
        <div class="container">
            {{-- Language Switcher --}}
            <x-language-switcher />
            
            {{-- User Menu --}}
            @auth
                <x-user-dropdown />
            @else
                <a href="{{ route('login') }}" class="btn btn-sm">
                    Accedi
                </a>
            @endauth
        </div>
    </div>
    
    {{-- Main Header --}}
    <div class="main-header">
        <div class="container">
            <div class="logo">
                <img src="{{ asset('themes/sixteen/logo.svg') }}" alt="Logo">
            </div>
            <div class="site-name">
                <h1>{{ config('app.name') }}</h1>
            </div>
        </div>
    </div>
    
    {{-- Navigation --}}
    <nav class="main-nav">
        <div class="container">
            <ul class="nav-list">
                <li><a href="/">Home</a></li>
                <li><a href="/servizi">Servizi</a></li>
                <li><a href="/info">Info</a></li>
            </ul>
        </div>
    </nav>
</header>
```

### Updated Header (Design Comuni Aligned)

**File**: `Themes/Sixteen/resources/views/components/header.blade.php`

```blade
<header class="site-header">
    {{-- 1. Top Bar (Design Comuni Style) --}}
    <div class="it-topbar bg-light py-2">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Region --}}
                <span class="region text-muted small">
                    Regione Lazio
                </span>
                
                {{-- Utilities --}}
                <div class="utilities d-flex gap-3">
                    {{-- Language Switcher --}}
                    <x-language-switcher variant="compact" />
                    
                    {{-- Personal Area --}}
                    @auth
                        <a href="{{ route('profile') }}" class="personal-area text-decoration-none d-flex align-items-center gap-2">
                            <x-heroicon-o-user class="w-4 h-4" />
                            <span class="small">{{ auth()->user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="personal-area text-decoration-none d-flex align-items-center gap-2">
                            <x-heroicon-o-login class="w-4 h-4" />
                            <span class="small">Accedi</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    {{-- 2. Main Header (Design Comuni Style) --}}
    <div class="it-header-wrapper py-4">
        <div class="container">
            <div class="row align-items-center">
                {{-- Logo --}}
                <div class="col-3 logo">
                    <img src="{{ asset('themes/sixteen/stemma-comune.svg') }}" 
                         alt="Stemma del Comune" 
                         class="img-fluid">
                </div>
                
                {{-- Municipality Info --}}
                <div class="col-9 municipality">
                    <h1 class="h3 mb-1">
                        <a href="/" class="text-decoration-none text-dark">
                            Comune di FixCity
                        </a>
                    </h1>
                    <p class="text-muted small mb-2">
                        Città Metropolitana
                    </p>
                    
                    {{-- Social Icons --}}
                    <div class="social d-flex gap-2">
                        <a href="#" class="text-primary" aria-label="Facebook">
                            <x-heroicon-o-facebook class="w-5 h-5" />
                        </a>
                        <a href="#" class="text-info" aria-label="Twitter">
                            <x-heroicon-o-twitter class="w-5 h-5" />
                        </a>
                        <a href="#" class="text-danger" aria-label="YouTube">
                            <x-heroicon-o-youtube class="w-5 h-5" />
                        </a>
                        <a href="#" class="text-pink" aria-label="Instagram">
                            <x-heroicon-o-instagram class="w-5 h-5" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- 3. Main Navigation (Design Comuni Style) --}}
    <nav class="it-main-nav bg-primary">
        <div class="container">
            <ul class="nav-list d-flex gap-4 list-unstyled mb-0 py-2">
                <li>
                    <a href="/amministrazione" class="text-white text-decoration-none fw-semibold">
                        Amministrazione
                    </a>
                </li>
                <li>
                    <a href="/novita" class="text-white text-decoration-none fw-semibold">
                        Novità
                    </a>
                </li>
                <li>
                    <a href="/servizi" class="text-white text-decoration-none fw-semibold">
                        Servizi
                    </a>
                </li>
                <li>
                    <a href="/vivere" class="text-white text-decoration-none fw-semibold">
                        Vivere il Comune
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
    {{-- 4. Secondary Navigation (Breadcrumb + Subtopics) --}}
    <nav class="it-secondary-nav bg-light border-bottom">
        <div class="container py-2">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/" class="text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $currentPage ?? 'Pagina' }}
                    </li>
                </ol>
            </nav>
            
            {{-- Subtopics (if available) --}}
            @if(isset($subtopics) && count($subtopics) > 0)
            <div class="subtopics mt-2">
                <span class="small text-muted me-2">Esplora:</span>
                @foreach($subtopics as $topic)
                    <a href="{{ $topic['url'] }}" class="badge bg-secondary text-decoration-none me-1">
                        {{ $topic['name'] }}
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </nav>
</header>
```

---

## 🎨 CSS Customizations

### File: `Themes/Sixteen/resources/css/header-design-comuni.css`

```css
/* ============================================
   Design Comuni Header Styles
   ============================================ */

/* Top Bar */
.it-topbar {
    font-size: 0.875rem;
    border-bottom: 1px solid #e5e5e5;
}

.it-topbar .region {
    font-weight: 600;
    color: #5c6b7f;
}

.it-topbar .personal-area:hover {
    color: #0066cc;
}

/* Main Header */
.it-header-wrapper {
    background-color: #ffffff;
}

.it-header-wrapper .logo img {
    max-height: 80px;
    width: auto;
}

.it-header-wrapper .municipality h1 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a1a1a;
}

.it-header-wrapper .municipality p {
    font-size: 0.875rem;
    color: #666;
}

/* Social Icons */
.it-header-wrapper .social a {
    transition: transform 0.2s;
}

.it-header-wrapper .social a:hover {
    transform: scale(1.1);
}

/* Main Navigation */
.it-main-nav {
    background-color: #0066cc; /* Design Comuni primary blue */
}

.it-main-nav .nav-list a {
    padding: 0.75rem 1rem;
    transition: background-color 0.2s;
}

.it-main-nav .nav-list a:hover {
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
}

/* Secondary Navigation */
.it-secondary-nav {
    background-color: #f8f9fa;
}

.it-secondary-nav .breadcrumb {
    background: transparent;
    padding: 0;
    margin: 0;
}

.it-secondary-nav .breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: #666;
}

.it-secondary-nav .subtopics .badge {
    font-weight: 500;
    padding: 0.5rem 0.75rem;
}

/* Responsive */
@media (max-width: 768px) {
    .it-header-wrapper .row {
        flex-direction: column;
        text-align: center;
    }
    
    .it-header-wrapper .logo {
        margin-bottom: 1rem;
    }
    
    .it-main-nav .nav-list {
        flex-direction: column;
        gap: 0;
    }
    
    .it-main-nav .nav-list li {
        width: 100%;
    }
    
    .it-main-nav .nav-list a {
        display: block;
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
}
```

---

## 📋 Implementation Checklist

### Phase 1: Header Structure (Today)
- [ ] Update `components/header.blade.php` with Design Comuni structure
- [ ] Add Top Bar with region + language + personal area
- [ ] Add Main Header with logo + municipality info
- [ ] Add Main Navigation with 4 PA voices
- [ ] Add Secondary Navigation with breadcrumb

### Phase 2: Styling (Tomorrow)
- [ ] Create `css/header-design-comuni.css`
- [ ] Add social icons (Heroicons)
- [ ] Test responsive behavior (mobile, tablet, desktop)
- [ ] Add hover effects and transitions

### Phase 3: Integration (Day 3)
- [ ] Test on `/it/tests/argomenti`
- [ ] Verify breadcrumb dynamic population
- [ ] Test language switcher integration
- [ ] Test user dropdown integration

### Phase 4: Build & Deploy
```bash
# 1. Compile CSS
cd laravel/Themes/Sixteen
npm run build

# 2. Copy to public
npm run copy

# 3. Test
http://fixcity.local/it/tests/argomenti
```

---

## 📊 Before/After Comparison

### Before (Current)
```
┌────────────────────────────────────┐
│ Lang | User                        │  ← Top Bar (minimal)
├────────────────────────────────────┤
│ [Logo] Site Name                   │  ← Header (basic)
├────────────────────────────────────┤
│ Home | Servizi | Info              │  ← Nav (3 items)
└────────────────────────────────────┘
```

### After (Design Comuni)
```
┌────────────────────────────────────────────────────┐
│ Regione Lazio | ITA/ENG | Area Personale           │  ← Top Bar (complete)
├────────────────────────────────────────────────────┤
│ [Stemma] Comune di FixCity                         │  ← Header (institutional)
│            Città Metropolitana                     │
│            [Social Icons]                          │
├────────────────────────────────────────────────────┤
│ Amministrazione | Novità | Servizi | Vivere        │  ← Nav (4 PA voices)
├────────────────────────────────────────────────────┤
│ Home / Argomenti                                   │  ← Breadcrumb
│ Esplora: Cultura | Sport | Famiglia                │  ← Subtopics
└────────────────────────────────────────────────────┘
```

---

## 🎯 Success Metrics

| Metric | Target | Measurement |
|--------|--------|-------------|
| Visual similarity | >95% | Screenshot comparison |
| Navigation items | 4 voices | Manual count |
| Social icons | 4+ platforms | Manual count |
| Responsive | 100% | Mobile/tablet/desktop test |
| Accessibility | AA | axe DevTools |

---

## 🔗 References

### Internal
- [Slug File Analysis](./pages/slug-file-analysis.md)
- [Build Workflow](./build-workflow.md)
- [Folio + Volt Best Practices](./folio-volt-best-practices.md)

### External
- [Design Comuni Header](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Bootstrap Italia Header](https://italia.github.io/bootstrap-italia/documentation/componenti/header/)
- [Heroicons](https://heroicons.com/)

---

## 🧘 Developer Meditation

> *"L'header non è solo navigazione, è l'identità istituzionale del Comune."*

When designing the header:
1. Is it institutional enough?
2. Does it follow Design Comuni pattern?
3. Is it accessible (keyboard, screen readers)?
4. Does it work on mobile?

---

**Version**: 1.0  
**Date**: 2026-03-30  
**Status**: ✅ Analysis Complete, Ready for Implementation  
**OpenViking URI**: `viking://themes/sixteen/docs/header/analysis`
