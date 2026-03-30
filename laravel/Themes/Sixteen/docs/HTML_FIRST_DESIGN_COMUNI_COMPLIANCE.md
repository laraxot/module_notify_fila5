# HTML-First Design Comuni Compliance

> *"L'HTML dentro `<body>` deve essere identico a Design Comuni. Il CSS è Bootstrap Italia. I componenti sono Blade."*

## 🎯 Principio Fondamentale

### La Regola d'Oro

```
ENTRO <body> (esclusi <script>):
  HTML Nostro = HTML Design Comuni
```

**Questo non è un suggerimento. È un REQUISITO.**

### Perché HTML Identico?

1. **Accessibilità**: Design Comuni è WCAG AA compliant
2. **Consistenza**: Tutti i siti PA hanno stessa struttura
3. **Bootstrap Italia**: Le classi CSS richiedono struttura HTML specifica
4. **SEO**: Struttura semantica standardizzata
5. **Interoperabilità**: Tool di terze parti si aspettano questa struttura

---

## 📊 Analisi Comparativa: Argomenti

### Design Comuni HTML (Reference)

**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html

**Struttura `<body>`**:

```html
<body>
    <!-- 1. Skip Links (Accessibilità) -->
    <a href="#main-content" class="visually-hidden">Skip to main content</a>
    
    <!-- 2. Header Wrapper -->
    <div class="it-header-wrapper">
        
        <!-- 3. Top Bar -->
        <div class="it-topbar">
            <div class="container">
                <span class="region">Regione Lazio</span>
                <div class="utilities">
                    <!-- Language selector, personal area -->
                </div>
            </div>
        </div>
        
        <!-- 4. Main Header -->
        <header class="it-header">
            <div class="container">
                <div class="row">
                    <div class="col-3 logo">
                        <img src="stemma.svg" alt="Stemma">
                    </div>
                    <div class="col-9 municipality">
                        <h1>Comune di Roma</h1>
                        <p>Città Metropolitana</p>
                        <div class="social">...</div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- 5. Main Navigation -->
        <nav class="it-main-nav">
            <div class="container">
                <ul class="nav-list">
                    <li><a href="/amministrazione">Amministrazione</a></li>
                    <li><a href="/novita">Novità</a></li>
                    <li><a href="/servizi">Servizi</a></li>
                    <li><a href="/vivere">Vivere</a></li>
                </ul>
            </div>
        </nav>
        
        <!-- 6. Secondary Navigation -->
        <nav class="it-secondary-nav" aria-label="Breadcrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li class="active">Argomenti</li>
                    </ol>
                </nav>
            </div>
        </nav>
    </div>
    
    <!-- 7. Main Content -->
    <main id="main-content" class="container py-5">
        
        <!-- 8. Page Title -->
        <h1 class="mb-4">ARGOMENTI</h1>
        <p class="lead">Esplora i temi del sito</p>
        
        <!-- 9. Featured Topics -->
        <section class="mb-5">
            <h2 class="h4 mb-3">IN EVIDENZA</h2>
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="card card-topic shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5">
                                <a href="/cultura" class="stretched-link">Cultura</a>
                            </h3>
                            <p class="card-text">Eventi e notizie culturali</p>
                        </div>
                    </div>
                </div>
                <!-- More cards... -->
            </div>
        </section>
        
        <!-- 10. All Topics Grid -->
        <section>
            <h2 class="h4 mb-3">ESPLORA PER ARGOMENTO</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="card card-topic shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5">
                                <a href="/agricoltura" class="stretched-link">Agricoltura</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- More cards... -->
            </div>
        </section>
        
        <!-- 11. Feedback Section -->
        <section class="mt-5">
            <h2 class="h5">Valuta la pagina</h2>
            <div class="star-rating">...</div>
        </section>
    </main>
    
    <!-- 12. Footer -->
    <footer class="it-footer">
        <!-- Footer structure... -->
    </footer>
</body>
```

### Nostro HTML (Attuale)

**URL**: http://fixcity.local/it/tests/argomenti

**Struttura `<body>`**:

```html
<body>
    <!-- ❌ Skip links mancanti -->
    
    <!-- ❌ it-header-wrapper mancante -->
    <header class="site-header">  <!-- Classe custom, non Bootstrap Italia -->
        <div class="top-bar">     <!-- Classe custom -->
            <!-- ... -->
        </div>
        <div class="main-header"> <!-- Classe custom -->
            <!-- ... -->
        </div>
        <nav class="main-nav">    <!-- Classe custom -->
            <!-- ... -->
        </nav>
    </header>
    
    <!-- ❌ it-secondary-nav mancante -->
    
    <!-- ✅ Main content (parzialmente corretto) -->
    <main class="container py-5">
        <h1 class="mb-4">Argomenti</h1>
        
        <!-- ❌ card-topic class mancante -->
        <div class="grid grid-cols-3 gap-4">  <!-- Tailwind, non Bootstrap! -->
            <div class="card">  <!-- Card generica, non card-topic -->
                <!-- ... -->
            </div>
        </div>
    </main>
    
    <!-- ❌ Footer Bootstrap Italia mancante -->
</body>
```

---

## 🔴 Gap Analysis

### Differenze Critiche

| Elemento | Design Comuni | Nostro | Gap | Priority |
|----------|---------------|--------|-----|----------|
| **Skip Links** | ✅ Presenti | ❌ Mancanti | 🔴 Critical | P0 |
| **Header Wrapper** | `.it-header-wrapper` | `.site-header` | 🔴 Critical | P0 |
| **Top Bar** | `.it-topbar` | `.top-bar` | 🔴 Critical | P0 |
| **Main Header** | `.it-header` | `.main-header` | 🔴 Critical | P0 |
| **Main Nav** | `.it-main-nav` | `.main-nav` | 🔴 Critical | P0 |
| **Secondary Nav** | `.it-secondary-nav` | ❌ Mancante | 🔴 Critical | P0 |
| **Card Type** | `.card-topic` | `.card` | 🟡 Partial | P1 |
| **Grid** | Bootstrap (`.row .col-*`) | Tailwind (`.grid`) | 🔴 Critical | P0 |
| **Footer** | `.it-footer` | Custom | 🔴 Critical | P0 |

### Framework Mismatch

| Layer | Design Comuni | Noi | Action |
|-------|---------------|-----|--------|
| **CSS Framework** | Bootstrap 5.2.3 | Tailwind CSS v4 | ❌ CHANGE |
| **Component Library** | Bootstrap Italia | DaisyUI | ❌ CHANGE |
| **Grid System** | Bootstrap Grid | Tailwind Grid | ❌ CHANGE |
| **Icons** | Bootstrap Italia SVG Sprites | Heroicons | ❌ CHANGE |

---

## ✅ Soluzione: Bootstrap Italia Integration

### 1. Installazione

```bash
cd laravel/Themes/Sixteen

# Install Bootstrap Italia
npm install bootstrap-italia@latest --save

# Install dependencies
npm install @popperjs/core @splidejs/splide animejs --save
```

### 2. Vite Configuration

**File**: `vite.config.js`

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',  // Changed from .css to .scss
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources',
        },
    },
});
```

### 3. SCSS Entry Point

**File**: `resources/scss/app.scss`

```scss
// Import order is CRITICAL for Bootstrap Italia

// 1. Functions
@import "~bootstrap/scss/functions";

// 2. Variables (override if needed)
// $primary: #0066cc;

// 3. Colors
@import "~bootstrap-italia/src/scss/colors/colors.scss";

// 4. Bootstrap
@import "~bootstrap/scss/bootstrap";

// 5. Bootstrap Italia
@import "~bootstrap-italia/src/scss/bootstrap-italia.scss";

// 6. Custom styles (only if necessary)
@import "./custom.scss";
```

### 4. JavaScript Entry Point

**File**: `resources/js/app.js`

```javascript
// Import Bootstrap Italia (auto-initializes components)
import 'bootstrap-italia/dist/js/bootstrap-italia.min.js';

// Import icons
import 'bootstrap-italia/dist/svg/sprites.svg';

// Initialize (Bootstrap Italia auto-init via data-bs-toggle)
document.addEventListener('DOMContentLoaded', () => {
    // Custom JS here (minimal)
});
```

---

## 🎨 Blade Components (Bootstrap Italia HTML)

### Header Component

**File**: `resources/views/components/header.blade.php`

```blade
{{-- MUST output exact Bootstrap Italia HTML --}}
<div class="it-header-wrapper">
    
    {{-- Top Bar --}}
    <div class="it-topbar">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <span class="region">Regione Lazio</span>
                <div class="utilities">
                    {{-- Language --}}
                    <select class="form-select form-select-sm" aria-label="Lingua">
                        <option>ITA</option>
                        <option>ENG</option>
                    </select>
                    
                    {{-- User --}}
                    @auth
                        <a href="{{ route('profile') }}" class="btn btn-sm btn-primary">
                            {{ auth()->user()->name }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">
                            Accedi
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    
    {{-- Main Header --}}
    <header class="it-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-3 logo">
                    <img src="{{ asset('stemma-comune.svg') }}" alt="Stemma del Comune">
                </div>
                <div class="col-9 municipality">
                    <h1 class="h3 mb-1">
                        <a href="/" class="text-decoration-none text-dark">Comune di FixCity</a>
                    </h1>
                    <p class="text-muted small mb-2">Città Metropolitana</p>
                    <div class="social">
                        <a href="#" class="text-primary" aria-label="Facebook">
                            <svg class="icon icon-primary"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use></svg>
                        </a>
                        <a href="#" class="text-info" aria-label="Twitter">
                            <svg class="icon icon-info"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    {{-- Main Navigation --}}
    <nav class="it-main-nav">
        <div class="container">
            <ul class="nav-list d-flex gap-4 list-unstyled mb-0 py-2">
                <li>
                    <a href="/amministrazione" class="text-white text-decoration-none fw-semibold">Amministrazione</a>
                </li>
                <li>
                    <a href="/novita" class="text-white text-decoration-none fw-semibold">Novità</a>
                </li>
                <li>
                    <a href="/servizi" class="text-white text-decoration-none fw-semibold">Servizi</a>
                </li>
                <li>
                    <a href="/vivere" class="text-white text-decoration-none fw-semibold">Vivere il Comune</a>
                </li>
            </ul>
        </div>
    </nav>
    
    {{-- Secondary Navigation --}}
    <nav class="it-secondary-nav" aria-label="Breadcrumb">
        <div class="container py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $currentPage ?? 'Pagina' }}</li>
                </ol>
            </nav>
        </div>
    </nav>
</div>
```

### Card Topic Component

**File**: `resources/views/components/card-topic.blade.php`

```blade
{{-- MUST output exact Bootstrap Italia card-topic HTML --}}
@props(['title', 'url', 'description' => null, 'featured' => false])

<div class="col-{{ $featured ? '12 col-md-4' : '12 col-md-6 col-lg-3' }}">
    <div class="card card-topic shadow-sm h-100">
        <div class="card-body">
            <h3 class="card-title h5">
                <a href="{{ $url }}" class="stretched-link">{{ $title }}</a>
            </h3>
            @if($description)
            <p class="card-text">{{ Str::limit($description, 100) }}</p>
            @endif
        </div>
        @if($featured)
        <div class="card-footer bg-transparent border-0">
            <span class="badge bg-primary">In evidenza</span>
        </div>
        @endif
    </div>
</div>
```

### Argomenti Page

**File**: `resources/views/pages/tests/argomenti/index.blade.php`

```blade
<?php

declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.argomenti');

new class extends Component {
    public function mount(): void {}
};
?>

<x-layouts.app>
    @volt('tests.argomenti')
    
    {{-- Main Content --}}
    <main id="main-content" class="container py-5">
        
        {{-- Page Title --}}
        <h1 class="mb-4">ARGOMENTI</h1>
        <p class="lead">Esplora i temi del sito</p>
        
        {{-- Featured Topics --}}
        <section class="mb-5">
            <h2 class="h4 mb-3">IN EVIDENZA</h2>
            <div class="row g-4">
                <x-card-topic 
                    title="Cultura" 
                    url="/cultura" 
                    description="Eventi e notizie culturali" 
                    :featured="true" 
                />
                <x-card-topic 
                    title="Sport" 
                    url="/sport" 
                    description="Attività sportive e impianti" 
                    :featured="true" 
                />
                <x-card-topic 
                    title="Famiglia" 
                    url="/famiglia" 
                    description="Servizi per la famiglia" 
                    :featured="true" 
                />
            </div>
        </section>
        
        {{-- All Topics --}}
        <section>
            <h2 class="h4 mb-3">ESPLORA PER ARGOMENTO</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <x-card-topic title="Agricoltura" url="/agricoltura" />
                <x-card-topic title="Animali" url="/animali" />
                <x-card-topic title="Casa" url="/casa" />
                <x-card-topic title="Cultura" url="/cultura" />
                <x-card-topic title="Famiglia" url="/famiglia" />
                <x-card-topic title="Lavoro" url="/lavoro" />
                <x-card-topic title="Scuola" url="/scuola" />
                <x-card-topic title="Sport" url="/sport" />
            </div>
        </section>
        
        {{-- Feedback Section --}}
        <section class="mt-5">
            <h2 class="h5">Valuta la pagina</h2>
            <div class="star-rating">
                {{-- Star rating component --}}
            </div>
        </section>
    </main>
    
    @endvolt
</x-layouts.app>
```

---

## 📋 Implementation Checklist

### Phase 1: Bootstrap Italia Setup (Today)

- [ ] Install Bootstrap Italia: `npm install bootstrap-italia`
- [ ] Update `vite.config.js` (SCSS entry point)
- [ ] Create `resources/scss/app.scss` (import order)
- [ ] Update `resources/js/app.js` (Bootstrap Italia JS)
- [ ] Build: `npm run build && npm run copy`

### Phase 2: Header Component (Tomorrow)

- [ ] Rewrite `components/header.blade.php` with Bootstrap Italia HTML
- [ ] Add SVG sprite system for icons
- [ ] Test responsive behavior
- [ ] Verify accessibility (aria labels)

### Phase 3: Card Components (Day 3)

- [ ] Create `components/card-topic.blade.php`
- [ ] Create `components/breadcrumb.blade.php`
- [ ] Create `components/footer.blade.php`
- [ ] Update all test pages

### Phase 4: Validation (Day 4)

```bash
# 1. Fetch our HTML
curl http://fixcity.local/it/tests/argomenti > our.html

# 2. Fetch Design Comuni HTML
curl https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html > reference.html

# 3. Compare structure (exclude scripts)
diff <(grep -v '<script>' our.html) <(grep -v '<script>' reference.html)
```

**Expected**: Minimal differences (only content, not structure)

---

## 🎯 Success Metrics

| Metric | Target | Measurement |
|--------|--------|-------------|
| HTML structure match | >95% | diff comparison |
| Bootstrap Italia classes | 100% | Class name audit |
| Accessibility (WCAG) | AA | axe DevTools |
| Skip links present | ✅ Yes | Manual check |
| Breadcrumb structure | ✅ Identical | Manual check |
| Card structure | ✅ Identical | Manual check |

---

## 🧘 Developer Mantra

> *"L'HTML dentro body deve essere identico a Design Comuni. Non simile. Identico."*

> *"Bootstrap Italia non è un'opzione. È il requisito."*

> *"I componenti Blade generano HTML Bootstrap Italia. Niente Tailwind. Niente DaisyUI."*

---

## 🔗 References

### Internal
- [Bootstrap Italia Integration](./bootstrap-italia-integration.md)
- [Build Workflow](./build-workflow.md)
- [Header Analysis](./header/analysis.md)

### External
- [Design Comuni Argomenti](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Bootstrap Italia Docs](https://italia.github.io/bootstrap-italia/)
- [Bootstrap Italia GitHub](https://github.com/italia/bootstrap-italia)

---

**Versione**: 1.0  
**Data**: 2026-03-30  
**Stato**: ✅ Documentazione Completa, Pronto per Implementazione  
**OpenViking URI**: `viking://themes/sixteen/docs/html-first-compliance`
