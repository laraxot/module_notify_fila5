# 🎨 Bootstrap Italia CSS Integration Guide

**Data**: 2026-03-30  
**Stato**: ✅ **INTEGRATO**

## 📁 File Origine

### style-apply.css
**Path**: `Main_files/five/src/style-apply.css`  
**Dimensione**: 1740 righe  
**Descrizione**: Bootstrap Italia convertito a Tailwind CSS con `@apply`

### app1.js
**Path**: `Main_files/five/src/app1.js`  
**Descrizione**: Alpine.js + Bootstrap Italia components

## 🔧 Integrazione

### 1. CSS Integration
```bash
# Copia file
cp Main_files/five/src/style-apply.css resources/css/design-comuni.css
```

**Contenuto**:
- CSS Custom Properties (variabili colori)
- Header styling completo
- Navigation styling
- Grid system Bootstrap
- Typography
- Breadcrumbs
- Cards
- Buttons
- Form elements
- Utilities

### 2. JavaScript Integration
```bash
# Copia file
cp Main_files/five/src/app1.js resources/js/design-comuni.js
```

**Contenuto**:
- Alpine.js initialization
- Language dropdown handler
- Hamburger menu handler
- Overlay management
- Close button handler

### 3. Build Configuration
```javascript
// vite.config.js
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/css/design-comuni.css',
        'resources/js/app.js',
        'resources/js/design-comuni.js',
      ],
    }),
    tailwindcss(),
  ],
})
```

## 📋 CSS Classes Principali

### Header
```css
.it-header-wrapper
.it-header-slim-wrapper
.it-header-slim-wrapper-content
.it-header-slim-right-zone
.it-nav-wrapper
.it-header-center-wrapper
.it-header-center-content-wrapper
.it-header-navbar-wrapper
```

### Navigation
```css
.navbar
.navbar-nav
.navbar-secondary
.navbar-collapsable
.custom-navbar-toggler
.menu-wrapper
```

### Grid System
```css
.container
.row
.col-12
.col-lg-3
.col-lg-6
.col-lg-10
```

### Typography
```css
.title-xxxlarge
.title-xxlarge
.medium-title
.subtitle-small
```

### Components
```css
.cmp-breadcrumbs
.breadcrumb
.card
.btn
.form-check
```

## 🎨 Colori Bootstrap Italia

```css
:root {
  --bs-primary: #007a52;      /* Verde principale */
  --bs-primary-dark: #00614a; /* Verde scuro */
  --bs-secondary: #5d7083;    /* Grigio */
  --bs-success: #008055;      /* Verde successo */
  --bs-blue: #006cc6;         /* Blu */
  --bs-dark: #17334f;         /* Scuro */
}
```

## 🚀 Build Commands

```bash
cd laravel/Themes/Sixteen

# Sviluppo
npm run dev

# Produzione
npm run build
npm run copy
```

## 📊 File Size

| File | Original | After Build |
|------|----------|-------------|
| style-apply.css | ~60KB | ~45KB (minified) |
| app1.js | ~5KB | ~3KB (minified) |

## ✅ Checklist Integrazione

- [x] Copiare style-apply.css
- [x] Copiare app1.js
- [x] Aggiornare vite.config.js
- [x] Testare build
- [x] Testare header
- [x] Testare navigation
- [x] Testare responsive
- [x] Documentare

## 🔗 Riferimenti

- [Bootstrap Italia Documentation](https://italia.github.io/bootstrap-italia/)
- [Tailwind CSS @apply](https://tailwindcss.com/docs/reusing-styles#extracting-classes-with-apply)
- [Alpine.js Documentation](https://alpinejs.dev/)

---

**Stato**: ✅ **CSS e JS integrati nel build system**
