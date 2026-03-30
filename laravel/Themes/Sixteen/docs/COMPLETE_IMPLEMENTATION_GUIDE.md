# Complete Implementation Guide: Argomenti Page

> *"Tutto era già pronto. Dovevamo solo usarlo."*

## 🎯 Panoramica

Questa documentazione mostra come usare l'architettura **Bootstrap Italia → Tailwind @apply** già implementata per creare pagine Design Comuni compliant.

## 📁 File Chiave

### 1. Pagina Argomenti Completa

**File**: `laravel/Themes/Sixteen/resources/views/design-comuni/pages/argomenti.blade.php`

**Componenti Usati**:
```blade
{{-- 1. Skip Links (Accessibilità) --}}
<x-accessibility.skiplinks />

{{-- 2. Header Bootstrap Italia --}}
<x-bootstrap-italia.header 
    :regionName="'Regione Lazio'"
    :logoUrl="'/themes/sixteen/images/stemma-comune.svg'"
    :title="'Comune di FixCity'"
    :tagline="'Città Metropolitana'"
    :navItems="[...]"
    :secondaryNavItems="[...]"
/>

{{-- 3. Breadcrumb --}}
<x-agid.breadcrumb :items="[...]" />

{{-- 4. Main Content --}}
<main id="main-content" class="container py-5">
    {{-- Page Title --}}
    <div class="cmp-heading mb-5">
        <h1 class="title-xxxlarge mb-2">ARGOMENTI</h1>
        <p class="subtitle-small">Esplora i temi del sito</p>
    </div>
    
    {{-- Featured Topics --}}
    <section class="mb-5" aria-labelledby="featured-heading">
        <h2 id="featured-heading" class="h4 mb-3">IN EVIDENZA</h2>
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="card card-topic shadow-sm h-100">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="/cultura" class="stretched-link">Cultura</a>
                        </h3>
                        <p class="card-text">Eventi e notizie culturali</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <span class="badge bg-primary">In evidenza</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- All Topics Grid --}}
    <section aria-labelledby="all-topics-heading">
        <h2 id="all-topics-heading" class="h4 mb-3">ESPLORA PER ARGOMENTO</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <x-blocks.topics.grid :items="[...]" />
        </div>
    </section>
    
    {{-- Feedback Section --}}
    <section class="mt-5" aria-labelledby="feedback-heading">
        <h2 id="feedback-heading" class="h5">Valuta la pagina</h2>
        <x-blocks.feedback.rating />
    </section>
</main>

{{-- 5. Footer --}}
<x-footer-comune />
```

---

## 🎨 Componenti Disponibili

### Header Component

**File**: `components/bootstrap-italia/header.blade.php`

**Features**:
- ✅ Top bar (Regione, Lingua, Login)
- ✅ Header center (Logo, Social, Search)
- ✅ Main navigation (4 voci PA)
- ✅ Secondary navigation
- ✅ Mobile hamburger menu
- ✅ Search modal

**Usage**:
```blade
<x-bootstrap-italia.header 
    :regionName="'Regione Lazio'"
    :logoUrl="'/themes/sixteen/images/stemma-comune.svg'"
    :title="'Comune di FixCity'"
    :tagline="'Città Metropolitana'"
    :navItems="[
        ['label' => 'Amministrazione', 'url' => '/amministrazione'],
        ['label' => 'Novità', 'url' => '/novita'],
        ['label' => 'Servizi', 'url' => '/servizi'],
        ['label' => 'Vivere', 'url' => '/vivere'],
    ]"
    :secondaryNavItems="[
        ['label' => 'Tutti gli argomenti', 'url' => '/argomenti'],
        ['label' => 'In evidenza', 'url' => '/evidenza'],
    ]"
/>
```

### Skip Links Component

**File**: `components/accessibility/skiplinks.blade.php`

**Features**:
- ✅ WCAG 2.1 AA compliant
- ✅ Keyboard navigation support
- ✅ Focus management
- ✅ High contrast support

**Usage**:
```blade
<x-accessibility.skiplinks 
    :links="[
        'main' => 'Vai al contenuto principale',
        'navigation' => 'Vai alla navigazione',
        'search' => 'Vai alla ricerca',
        'footer' => 'Vai al footer',
    ]" 
/>
```

### Breadcrumb Component

**File**: `components/agid/breadcrumb.blade.php`

**Features**:
- ✅ Bootstrap Italia structure
- ✅ ARIA labels
- ✅ Separator icons

**Usage**:
```blade
<x-agid.breadcrumb 
    :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Argomenti', 'url' => null],
    ]" 
/>
```

### Topics Grid Component

**File**: `components/blocks/topics/grid.blade.php`

**Features**:
- ✅ Responsive grid (1→2→4 columns)
- ✅ Card styling
- ✅ Hover effects

**Usage**:
```blade
<x-blocks.topics.grid 
    :title="'Esplora per argomento'"
    :items="[
        ['title' => 'Agricoltura', 'href' => '/agricoltura'],
        ['title' => 'Animali', 'href' => '/animali'],
        ['title' => 'Casa', 'href' => '/casa'],
        ['title' => 'Cultura', 'href' => '/cultura'],
    ]"
/>
```

### Feedback Rating Component

**File**: `components/blocks/feedback/rating.blade.php`

**Features**:
- ✅ Star rating (1-5)
- ✅ Survey form
- ✅ Accessibility compliant

**Usage**:
```blade
<x-blocks.feedback.rating />
```

---

## 🏗️ HTML Structure (Design Comuni Compliant)

### Complete Page Structure

```html
<!DOCTYPE html>
<html lang="it">
<head>
    <!-- Meta tags -->
    <!-- Bootstrap Italia CSS -->
    <!-- Custom CSS -->
</head>
<body>
    <!-- 1. Skip Links (Accessibility) -->
    <x-accessibility.skiplinks />
    
    <!-- 2. Header -->
    <x-bootstrap-italia.header />
    
    <!-- 3. Breadcrumb -->
    <x-agid.breadcrumb />
    
    <!-- 4. Main Content -->
    <main id="main-content" class="container py-5">
        <!-- Page Title -->
        <div class="cmp-heading">
            <h1 class="title-xxxlarge">TITLE</h1>
            <p class="subtitle-small">Subtitle</p>
        </div>
        
        <!-- Content Sections -->
        <section aria-labelledby="section-heading">
            <h2 id="section-heading" class="h4">Section Title</h2>
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="card card-topic">...</div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- 5. Footer -->
    <x-footer-comune />
</body>
</html>
```

---

## 🎨 CSS Classes Reference

### Typography

```css
.title-xxxlarge      /* H1 equivalent (5xl) */
.title-xxlarge       /* H2 equivalent (4xl) */
.medium-title        /* H3 equivalent (lg) */
.subtitle-small      /* Subtitle (sm) */
```

### Layout

```css
.container           /* Max-width: 1200px */
.row                 /* Flexbox grid row */
.col-12              /* Full width (mobile) */
.col-md-4            /* 1/3 width (tablet) */
.col-lg-3            /* 1/4 width (desktop) */
.g-4                 /* Gap: 1.5rem */
```

### Cards

```css
.card                /* Base card */
.card-topic          /* Topic card variant */
.card-body           /* Card content area */
.card-title          /* Card title */
.card-text           /* Card description */
.card-footer         /* Card footer */
.shadow-sm           /* Small shadow */
.h-100               /* Full height */
```

### Buttons

```css
.btn                 /* Base button */
.btn-primary         /* Primary button */
.btn-outline-primary /* Outline button */
.btn-icon            /* Icon button */
.btn-full            /* Full width button */
```

---

## 📋 Implementation Checklist

### For New Pages

- [ ] Use `<x-layouts.bootstrap-italia>` layout
- [ ] Add `<x-accessibility.skiplinks />`
- [ ] Add `<x-bootstrap-italia.header />`
- [ ] Add `<x-agid.breadcrumb />`
- [ ] Use `<main id="main-content">` wrapper
- [ ] Use Bootstrap Italia typography classes
- [ ] Use Bootstrap Grid (`.row .col-*`)
- [ ] Use `.card-topic` for topic cards
- [ ] Add ARIA labels (`aria-labelledby`)
- [ ] Add `<x-footer-comune />`

### Accessibility Requirements

- [ ] Skip links present
- [ ] `id="main-content"` on main element
- [ ] `aria-labelledby` on sections
- [ ] `aria-label` on navigation
- [ ] `visually-hidden` for screen reader text
- [ ] Focus management for interactive elements
- [ ] Keyboard navigation support

---

## 🔧 Build & Deploy

### Development

```bash
cd laravel/Themes/Sixteen

# Start dev server (hot reload)
npm run dev

# Access page
http://fixcity.local/it/tests/argomenti
```

### Production

```bash
cd laravel/Themes/Sixteen

# Build assets
npm run build

# Copy to public
npm run copy

# Clear cache
php artisan view:clear
php artisan route:clear
```

---

## 📊 Validation

### HTML Structure Check

```bash
# Fetch our HTML
curl http://fixcity.local/it/tests/argomenti > our.html

# Fetch Design Comuni reference
curl https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html > reference.html

# Compare structure (exclude scripts)
diff <(grep -v '<script>' our.html) <(grep -v '<script>' reference.html)
```

**Expected**: Minimal differences (only content, not structure)

### Accessibility Check

```bash
# Use axe DevTools
# Install: https://www.deque.com/axe/devtools/

# Run audit on:
# http://fixcity.local/it/tests/argomenti

# Target: WCAG 2.1 AA compliance
# Expected: 0 violations
```

---

## 🧘 Developer Mantra

> *"Non stiamo creando nulla di nuovo. Stiamo usando ciò che già esiste."*

> *"Bootstrap Italia → Tailwind @apply è la Via."*

> *"L'HTML deve essere identico a Design Comuni. I componenti Blade lo rendono possibile."*

---

## 🔗 References

### Internal
- [Bootstrap Italia Tailwind Conversion](./BOOTSTRAP_ITALIA_TAILWIND_CONVERSION.md)
- [HTML-First Compliance](./HTML_FIRST_DESIGN_COMUNI_COMPLIANCE.md)
- [Build Workflow](./build-workflow.md)

### External
- [Design Comuni Argomenti](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Bootstrap Italia Docs](https://italia.github.io/bootstrap-italia/)
- [WCAG 2.1 AA Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)

---

**Version**: 1.0  
**Date**: 2026-03-30  
**Status**: ✅ Complete & Ready to Use  
**OpenViking URI**: `viking://themes/sixteen/docs/complete-implementation-guide`
