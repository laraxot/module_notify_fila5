# Bootstrap Italia → Tailwind @apply Conversion Guide

> *"Il miglior modo per onorare Bootstrap Italia è mantenerne lo spirito, non copiarne le classi."*

## 🎯 Architettura Ibrida: Tailwind + Bootstrap Italia Design

### Filosofia del Progetto

```
DESIGN: Bootstrap Italia (PA compliant)
CSS: Tailwind CSS v4 con @apply
STRUTTURA HTML: Identica a Design Comuni
```

### Perché @apply Instead of Bootstrap CSS?

1. **Consistenza**: Tutto il CSS è in Tailwind
2. **Manutenibilità**: Single source of truth
3. **Performance**: Tailwind purge unused CSS
4. **Flexibility**: Possiamo adattare Bootstrap Italia a Tailwind
5. **Modernità**: Tailwind v4 è più moderno di Bootstrap 5

---

## 📁 File Chiave

### 1. `style-apply.css` (1740 righe)

**Location**: `laravel/Themes/Sixteen/Main_files/five/src/style-apply.css`

**Scopo**: Replica Bootstrap Italia usando Tailwind `@apply`

**Struttura**:

```css
/* 1. Import e setup */
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web...');
@import 'tailwindcss';

/* 2. DaisyUI theme */
html {
  data-theme: bootstrap_italia;
}

/* 3. Filament CSS */
@import '../vendor/filament/*/resources/css/index.css';

/* 4. CSS Custom Properties (Bootstrap Italia colors) */
:root {
  --bs-primary: #007a52;
  --bs-primary-dark: #00614a;
  --bs-secondary: #5d7083;
  /* ... */
}

/* 5. Componenti Bootstrap Italia → Tailwind */
.it-header-wrapper {
  background-color: var(--bs-primary);
  @apply text-white relative;
}

.it-nav-wrapper {
  @apply bg-white shadow-sm;
}

/* 6. Grid system Bootstrap */
.row {
  @apply flex flex-wrap;
}

.col-md-4 {
  @apply flex-none w-full max-w-full px-3;
}

@media (min-width: 768px) {
  .col-md-4 {
    @apply flex-none w-1/3;
    max-width: 33.333333%;
  }
}

/* 7. Componenti UI */
.card {
  @apply bg-white border border-gray-200 rounded-lg shadow-sm;
}

.btn {
  @apply inline-flex items-center justify-center px-6 py-3 
         text-base font-semibold leading-normal 
         no-underline border-2 border-transparent rounded 
         cursor-pointer transition-all duration-200 min-h-12;
}
```

### 2. `app1.js`

**Location**: `laravel/Themes/Sixteen/Main_files/five/src/app1.js`

**Scopo**: Alpine.js + Bootstrap Italia component behavior

**Struttura**:

```javascript
// 1. Import Alpine
import Alpine from 'alpinejs'

// 2. Make global
window.Alpine = Alpine

// 3. Alpine initialization
document.addEventListener('alpine:init', () => {
    // Language dropdown logic
    const dropdown = document.querySelector('.nav-item.dropdown');
    dropdown.setAttribute('x-data', `{
        open: false,
        currentLang: 'ITA',
        toggle() { this.open = !this.open },
        select(lang) {
            this.currentLang = lang;
            this.open = false;
        }
    }`);
});

// 4. Start Alpine
Alpine.start()

// 5. Bootstrap Italia Components
document.addEventListener('DOMContentLoaded', function() {
    // Language dropdown handler
    const languageButton = document.getElementById('language-button');
    const languageMenu = document.getElementById('language-menu');
    
    // Hamburger menu handler
    const hamburgerButton = document.querySelector('[data-bs-toggle="navbarcollapsible"]');
    const navCollapsible = document.querySelector('#nav4');
    
    // Close button, overlay handlers
    // ...
});
```

---

## 🎨 Bootstrap Italia Colors → Tailwind

### CSS Custom Properties

```css
:root {
  --bs-primary: #007a52;      /* Bootstrap Italia Green */
  --bs-primary-dark: #00614a;
  --bs-secondary: #5d7083;    /* Gray */
  --bs-success: #008055;
  --bs-blue: #006cc6;
  --bs-dark: #17334f;
  --bs-light: #f8f9fa;
}
```

### Usage in Components

```css
/* Header */
.it-header-wrapper {
  background-color: var(--bs-primary);
  @apply text-white;
}

/* Navigation */
.it-nav-wrapper {
  @apply bg-white;
}

.navbar-nav .nav-link:hover {
  color: var(--bs-primary);
}

/* Buttons */
.btn-primary {
  background-color: var(--bs-primary);
  @apply text-white;
}

.btn-primary:hover {
  background-color: var(--bs-primary-dark);
}
```

---

## 🏗️ Componenti Implementati

### 1. Header (Complete)

**Bootstrap Italia Structure**:
```html
<div class="it-header-wrapper">
    <div class="it-header-slim-wrapper">
        <!-- Top bar: language, user -->
    </div>
    <div class="it-brand-wrapper">
        <!-- Logo, municipality name -->
    </div>
    <nav class="navbar navbar-expand-lg">
        <!-- Main navigation -->
    </nav>
</div>
```

**Tailwind @apply Implementation**:
```css
.it-header-wrapper {
  background-color: var(--bs-primary);
  @apply text-white relative;
}

.it-header-slim-wrapper {
  background-color: var(--bs-primary-dark);
  @apply py-2 text-sm;
}

.it-header-slim-wrapper-content {
  @apply flex justify-between items-center;
}

.it-brand-wrapper {
  @apply flex items-center gap-3;
}
```

### 2. Navigation (Complete)

**Desktop Layout** (≥992px):
```css
@media (min-width: 992px) {
  .navbar-collapsable {
    @apply flex static w-full;
    background: var(--bs-primary) !important;
  }

  .navbar-collapsable .navbar-nav {
    @apply flex flex-row m-0 p-0;
  }

  .navbar-nav .nav-link {
    @apply text-white font-semibold text-base px-6 py-3;
  }

  .navbar-nav .nav-link:hover {
    color: var(--bs-primary);
  }
}
```

**Mobile Layout** (<992px):
```css
@media (max-width: 991px) {
  .navbar-collapsable {
    @apply fixed top-0 left-0 right-0 bottom-0 
           bg-white z-50 overflow-y-auto hidden;
  }

  .navbar-collapsable.show {
    @apply block;
  }
}
```

### 3. Grid System (Complete)

**Bootstrap Grid Classes**:
```css
.container {
  @apply w-full px-3 mx-auto;
  max-width: 1200px;
}

.row {
  @apply flex flex-wrap -mx-3;
}

/* Mobile first */
.col-12 {
  @apply flex-none w-full max-w-full px-3;
}

/* Tablet (≥768px) */
@media (min-width: 768px) {
  .col-md-4 {
    @apply flex-none w-1/3;
    max-width: 33.333333%;
  }

  .col-md-6 {
    @apply flex-none w-1/2;
    max-width: 50%;
  }
}

/* Desktop (≥992px) */
@media (min-width: 992px) {
  .col-lg-3 {
    @apply flex-none w-1/4;
    max-width: 25%;
  }

  .col-lg-6 {
    @apply flex-none w-1/2;
    max-width: 50%;
  }

  .col-lg-8 {
    @apply flex-none w-2/3;
    max-width: 66.666667%;
  }
}
```

### 4. Cards (Complete)

```css
.card {
  @apply bg-white border border-gray-200 rounded-lg shadow-sm;
}

.card.has-bkg-grey {
  @apply bg-gray-100 border-0;
}

.card-body {
  @apply p-0;
}

.card-title {
  @apply text-lg font-semibold text-gray-900 mb-2;
  color: var(--bs-dark);
}

.card-info {
  @apply text-sm text-gray-500 mb-4;
  color: var(--bs-secondary);
}
```

### 5. Breadcrumbs (Complete)

```css
.breadcrumb {
  @apply flex items-center p-0 m-0 list-none text-sm;
}

.breadcrumb-item {
  @apply flex items-center;
}

.breadcrumb-item a {
  color: var(--bs-primary);
  @apply no-underline;
}

.breadcrumb-item a:hover {
  @apply underline;
}

.breadcrumb-item.active {
  color: var(--bs-secondary);
}

.separator {
  @apply mx-2;
  color: var(--bs-gray-600);
}
```

### 6. Buttons (Complete)

```css
.btn {
  @apply inline-flex items-center justify-center 
         px-6 py-3 text-base font-semibold leading-normal 
         no-underline border-2 border-transparent rounded 
         cursor-pointer transition-all duration-200 min-h-12;
}

.btn-primary {
  background-color: var(--bs-primary);
  @apply text-white;
}

.btn-primary:hover {
  background-color: var(--bs-primary-dark);
}

.btn-outline-primary {
  @apply border-2 border-primary bg-transparent;
  color: var(--bs-primary);
}

.btn-outline-primary:hover {
  background-color: var(--bs-primary);
  color: white;
}
```

### 7. Tabs (Complete)

```css
.nav-tabs {
  @apply flex w-full border-b border-gray-200 mb-10 mt-3 p-0 list-none;
}

.nav-tabs .nav-item {
  @apply flex-1 relative;
}

.nav-tabs .nav-link {
  @apply block py-2 text-center font-semibold text-gray-500 
         no-underline border-b-2 border-transparent 
         transition-all duration-200;
  color: var(--bs-secondary);
}

.nav-tabs .nav-link:hover {
  @apply text-gray-900;
  color: var(--bs-dark);
}

.nav-tabs .nav-link.active {
  @apply text-green-600 border-green-600;
  color: var(--bs-primary);
}
```

---

## 🔧 JavaScript Components (Alpine.js)

### Language Dropdown

**HTML**:
```html
<div class="nav-item dropdown">
    <button class="nav-link dropdown-toggle" id="language-button">
        ITA
    </button>
    <div class="dropdown-menu" id="language-menu">
        <button class="dropdown-item">ITA</button>
        <button class="dropdown-item">ENG</button>
    </div>
</div>
```

**Alpine.js Logic** (`app1.js`):
```javascript
document.addEventListener('alpine:init', () => {
    const dropdown = document.querySelector('.nav-item.dropdown');

    if (dropdown) {
        dropdown.setAttribute('x-data', `{
            open: false,
            currentLang: 'ITA',
            toggle() { this.open = !this.open },
            select(lang) {
                this.currentLang = lang;
                this.open = false;
            }
        }`);

        dropdown.querySelector('.dropdown-toggle')
            .setAttribute('x-on:click', 'toggle()');
        dropdown.querySelector('.dropdown-menu')
            .setAttribute('x-show', 'open');
    }
});
```

### Hamburger Menu

**JavaScript Logic** (`app1.js`):
```javascript
const hamburgerButton = document.querySelector('[data-bs-toggle="navbarcollapsible"]');
const navCollapsible = document.querySelector('#nav4');
const closeButton = document.querySelector('.close-menu');
const overlay = document.querySelector('.overlay');

// Toggle menu
hamburgerButton.addEventListener('click', function() {
    const isExpanded = hamburgerButton.getAttribute('aria-expanded') === 'true';

    if (isExpanded) {
        navCollapsible.classList.remove('expanded');
        hamburgerButton.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('nav-open');
        if (overlay) overlay.style.display = 'none';
    } else {
        navCollapsible.classList.add('expanded');
        hamburgerButton.setAttribute('aria-expanded', 'true');
        document.body.classList.add('nav-open');
        if (overlay) overlay.style.display = 'block';
    }
});

// Close button
closeButton.addEventListener('click', function() {
    navCollapsible.classList.remove('expanded');
    hamburgerButton.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('nav-open');
    if (overlay) overlay.style.display = 'none';
});

// Overlay click
overlay.addEventListener('click', function() {
    navCollapsible.classList.remove('expanded');
    hamburgerButton.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('nav-open');
    overlay.style.display = 'none';
});
```

---

## 📋 Implementation Checklist

### Header Components

- [x] `.it-header-wrapper` - Main header container
- [x] `.it-header-slim-wrapper` - Top bar
- [x] `.it-brand-wrapper` - Logo + municipality
- [x] `.it-nav-wrapper` - Navigation container
- [x] `.navbar` - Main navigation
- [x] `.navbar-nav` - Nav items
- [x] Language dropdown (Alpine.js)
- [x] User access button
- [x] Social icons
- [x] Search link

### Grid System

- [x] `.container` - Main container (max-width: 1200px)
- [x] `.row` - Flexbox grid row
- [x] `.col-*` - Column classes (mobile, tablet, desktop)
- [x] Responsive breakpoints (768px, 992px)

### UI Components

- [x] `.card` - Card component
- [x] `.breadcrumb` - Breadcrumb navigation
- [x] `.btn` - Buttons (primary, outline)
- [x] `.nav-tabs` - Tabs
- [x] `.form-check` - Checkboxes
- [x] `.map-box` - Map container

### Typography

- [x] `.title-xxxlarge` - H1 equivalent
- [x] `.title-xxlarge` - H2 equivalent
- [x] `.medium-title` - H3 equivalent
- [x] `.subtitle-small` - Subtitle
- [x] Font: Titillium Web (Google Fonts)

### JavaScript Components

- [x] Language dropdown (Alpine.js)
- [x] Hamburger menu toggle
- [x] Mobile menu overlay
- [x] Close button handler
- [x] Click-outside-to-close

---

## 🎯 Best Practices

### 1. Use @apply for Component Classes

```css
/* ✅ CORRECT: Use @apply for Bootstrap Italia classes */
.it-header-wrapper {
  background-color: var(--bs-primary);
  @apply text-white relative z-50;
}

/* ❌ WRONG: Don't use inline Tailwind classes in HTML */
<div class="bg-[#007a52] text-white relative z-50">
  <!-- Should use: class="it-header-wrapper" -->
</div>
```

### 2. Maintain Bootstrap Italia Naming

```css
/* ✅ CORRECT: Keep Bootstrap Italia class names */
.it-header-wrapper { ... }
.it-nav-wrapper { ... }
.card-topic { ... }

/* ❌ WRONG: Don't rename to Tailwind style */
.header-wrapper { ... }
.navigation-wrapper { ... }
.topic-card { ... }
```

### 3. Use CSS Variables for Colors

```css
/* ✅ CORRECT: Use CSS variables */
.btn-primary {
  background-color: var(--bs-primary);
}

/* ❌ WRONG: Don't hardcode hex values */
.btn-primary {
  background-color: #007a52;
}
```

### 4. Responsive with Media Queries

```css
/* ✅ CORRECT: Bootstrap breakpoints */
.col-md-4 {
  @apply flex-none w-full;
}

@media (min-width: 768px) {
  .col-md-4 {
    @apply flex-none w-1/3;
  }
}

/* ❌ WRONG: Tailwind breakpoints don't match Bootstrap */
@media (min-width: 768px) { /* Tailwind uses 768px for md */
  /* Bootstrap uses 768px for md too, but verify each case */
}
```

---

## 📊 File Organization

```
Themes/Sixteen/
├── Main_files/five/src/
│   ├── style-apply.css       # Bootstrap Italia → Tailwind @apply
│   ├── app1.js               # Alpine.js + Bootstrap Italia JS
│   └── index.html            # Reference implementation
├── resources/
│   ├── css/
│   │   └── app.css           # Import style-apply.css
│   ├── js/
│   │   └── app.js            # Import app1.js
│   └── views/
│       ├── components/
│       │   ├── header.blade.php
│       │   ├── footer.blade.php
│       │   └── ...
│       └── layouts/
│           └── app.blade.php
└── docs/
    ├── BOOTSTRAP_ITALIA_TAILWIND_CONVERSION.md  # This doc
    └── ...
```

---

## 🔗 References

### Internal
- [HTML-First Compliance](./HTML_FIRST_DESIGN_COMUNI_COMPLIANCE.md)
- [Build Workflow](./build-workflow.md)
- [Header Analysis](./header/analysis.md)

### External
- [Design Comuni Argomenti](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Bootstrap Italia Docs](https://italia.github.io/bootstrap-italia/)
- [Tailwind @apply](https://tailwindcss.com/docs/reusing-styles#extracting-classes-with-apply)

---

## 🧘 Developer Mantra

> *"Il miglior modo per onorare Bootstrap Italia è mantenerne lo spirito, non copiarne le classi."*

> *"Tailwind @apply è il ponte tra Bootstrap Italia design e Tailwind implementation."*

> *"L'HTML deve essere identico a Design Comuni. Il CSS è Bootstrap Italia → Tailwind."*

---

**Version**: 1.0  
**Date**: 2026-03-30  
**Status**: ✅ Existing Implementation Documented  
**OpenViking URI**: `viking://themes/sixteen/docs/bootstrap-italia-tailwind-conversion`
