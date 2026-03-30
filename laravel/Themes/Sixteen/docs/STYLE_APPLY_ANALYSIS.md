# 📖 style-apply.css + app1.js - Complete Analysis

**Date**: 2026-03-30  
**Files**: `Main_files/five/src/style-apply.css` (1740 lines), `Main_files/five/src/app1.js`  
**Purpose**: Bootstrap Italia Design System converted to Tailwind CSS + Alpine.js

---

## 🎯 Key Insights

### 1. CSS Architecture (style-apply.css)

**What It Does**:
- ✅ Converts Bootstrap Italia CSS to Tailwind `@apply` directives
- ✅ Defines ALL Bootstrap Italia classes (`.container`, `.row`, `.col-*`, `.card`, etc.)
- ✅ Uses CSS Custom Properties (`--bs-primary: #007a52`, etc.)
- ✅ Implements full grid system (12 columns, responsive)
- ✅ Defines all components (header, nav, cards, breadcrumbs, etc.)

**Key Sections**:

```css
/* Lines 1-100: Base Setup */
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web...');
@import 'tailwindcss';
html { data-theme: bootstrap_italia; }

/* CSS Custom Properties */
:root {
  --bs-primary: #007a52;      /* Bootstrap Italia Green */
  --bs-primary-dark: #00614a;
  --bs-secondary: #5d7083;    /* Gray */
  --bs-success: #008055;
  --bs-blue: #006cc6;
  --bs-dark: #17334f;
}

/* Lines 100-500: Header Components */
.it-header-wrapper { background-color: var(--bs-primary); }
.it-header-slim-wrapper { @apply py-2 text-sm; }
.it-brand-wrapper { @apply flex items-center gap-3; }

/* Lines 500-800: Navigation */
.navbar { @apply p-0; background: var(--bs-primary) !important; }
.navbar-nav .nav-link { @apply text-white font-semibold px-6 py-3; }

/* Lines 800-1000: Grid System */
.container { @apply w-full px-3 mx-auto; max-width: 1200px; }
.row { @apply flex flex-wrap -mx-3; }
.col-lg-8 { @apply flex-none w-2/3; max-width: 66.666667%; }

/* Lines 1000-1400: Components */
.card { @apply bg-white border border-gray-200 rounded-lg; }
.breadcrumb { @apply flex items-center p-0 m-0 list-none text-sm; }
.btn { @apply inline-flex items-center justify-center px-6 py-3; }

/* Lines 1400-1740: Utilities */
.d-none { @apply hidden; }
.d-lg-block { @apply hidden; }
@media (min-width: 992px) { .d-lg-block { @apply block; } }
```

### 2. JavaScript Architecture (app1.js)

**What It Does**:
- ✅ Initializes Alpine.js globally
- ✅ Handles language dropdown (ITA/ENG toggle)
- ✅ Handles hamburger menu (mobile navigation)
- ✅ Manages overlay for mobile menu
- ✅ Bootstrap Italia component interactions

**Key Functions**:

```javascript
// Alpine.js Initialization
window.Alpine = Alpine
document.addEventListener('alpine:init', () => {
    // Language dropdown
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

Alpine.start()

// Bootstrap Italia Components
document.addEventListener('DOMContentLoaded', function() {
    // Language dropdown handler
    const languageButton = document.getElementById('language-button');
    const languageMenu = document.getElementById('language-menu');
    
    // Hamburger menu handler
    const hamburgerButton = document.querySelector('[data-bs-toggle="navbarcollapsible"]');
    const navCollapsible = document.querySelector('#nav4');
    
    // Close button & overlay
    const closeButton = document.querySelector('.close-menu');
    const overlay = document.querySelector('.overlay');
});
```

---

## 🏗️ How It Works Together

### Request Flow

```
1. User requests page
   ↓
2. Blade template renders HTML
   - Uses Bootstrap Italia classes (.container, .row, .card)
   - Uses ARIA attributes (role="banner", aria-label)
   - Uses icon sprites (<svg><use href="#icon-name"></use></svg>)
   ↓
3. style-apply.css processes classes
   - .container → Tailwind @apply styles
   - .row → flex flex-wrap
   - .col-lg-8 → w-2/3 max-width
   ↓
4. app1.js adds interactivity
   - Language dropdown (Alpine.js)
   - Hamburger menu (event listeners)
   - Mobile overlay
   ↓
5. Final rendered page
   - Looks like Bootstrap Italia
   - Built with Tailwind CSS
   - Powered by Alpine.js
```

---

## 📋 Critical Classes for HTML Matching

### Header Classes (MUST Match)

```html
<header class="text-white" role="banner">
    <div class="h-10 min-h-10 border-b" style="background-color: var(--agid-primary-dark);">
        <!-- Top bar -->
    </div>
    
    <div class="bg-white border-b">
        <!-- Main header -->
    </div>
</header>
```

**CSS from style-apply.css**:
- `.it-header-wrapper` → `background-color: var(--bs-primary)`
- `.it-header-slim-wrapper` → `@apply py-2 text-sm`
- `.it-brand-wrapper` → `@apply flex items-center gap-3`

### Navigation Classes (MUST Match)

```html
<nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
    </ul>
</nav>
```

**CSS from style-apply.css**:
- `.navbar` → `@apply p-0; background: var(--bs-primary)`
- `.navbar-nav` → `@apply flex gap-0 list-none m-0 p-0`
- `.navbar-nav .nav-link` → `@apply text-white font-semibold px-6 py-3`

### Grid Classes (MUST Match)

```html
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Main content -->
        </div>
        <div class="col-lg-4">
            <!-- Sidebar -->
        </div>
    </div>
</div>
```

**CSS from style-apply.css**:
- `.container` → `@apply w-full px-3 mx-auto; max-width: 1200px`
- `.row` → `@apply flex flex-wrap -mx-3`
- `.col-lg-8` → `@apply flex-none w-2/3; max-width: 66.666667%`

### Card Classes (MUST Match)

```html
<div class="card-wrapper card-space">
    <div class="card card-bg">
        <div class="card-body">
            <h5 class="card-title">...</h5>
            <p class="card-text">...</p>
        </div>
    </div>
</div>
```

**CSS from style-apply.css**:
- `.card` → `@apply bg-white border border-gray-200 rounded-lg`
- `.card-body` → `@apply p-0`
- `.card-title` → `@apply text-lg font-semibold`

---

## 🔧 Implementation Strategy

### Option 1: Use style-apply.css Directly (Recommended)

**Step 1**: Import style-apply.css in app.css

```css
/* laravel/Themes/Sixteen/resources/css/app.css */
@import '../../Main_files/five/src/style-apply.css';
```

**Step 2**: Use Bootstrap Italia classes in Blade

```blade
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card-wrapper card-space">
                <div class="card card-bg">
                    <!-- Content -->
                </div>
            </div>
        </div>
    </div>
</div>
```

**Step 3**: Include app1.js for interactivity

```blade
{{-- layouts/app.blade.php --}}
@vite(['resources/js/app1.js'])
```

### Option 2: Extract Only Needed Classes

**Step 1**: Copy critical sections from style-apply.css

```css
/* Custom Bootstrap Italia subset */
.container { @apply w-full px-3 mx-auto; max-width: 1200px; }
.row { @apply flex flex-wrap -mx-3; }
.col-lg-8 { @apply flex-none w-2/3; max-width: 66.666667%; }
.card { @apply bg-white border border-gray-200 rounded-lg; }
```

**Step 2**: Use in Blade templates

---

## 📊 Class Reference (Most Used)

### Layout

| Class | Tailwind Equivalent | Purpose |
|-------|-------------------|---------|
| `.container` | `max-w-screen-xl mx-auto px-3` | Main container |
| `.row` | `flex flex-wrap -mx-3` | Grid row |
| `.col-lg-8` | `w-2/3 max-w-2/3` | 8/12 columns |
| `.col-lg-4` | `w-1/3 max-w-1/3` | 4/12 columns |

### Components

| Class | Tailwind Equivalent | Purpose |
|-------|-------------------|---------|
| `.card` | `bg-white border rounded-lg` | Card component |
| `.breadcrumb` | `flex list-none p-0 m-0` | Breadcrumbs |
| `.btn` | `inline-flex px-6 py-3` | Button |
| `.navbar` | `flex p-0` | Navigation bar |

### Utilities

| Class | Tailwind Equivalent | Purpose |
|-------|-------------------|---------|
| `.d-none` | `hidden` | Display none |
| `.d-lg-block` | `hidden lg:block` | Hidden on mobile |
| `.mt-4` | `mt-4` | Margin top |
| `.mb-8` | `mb-8` | Margin bottom |

---

## 🎯 Next Steps

### 1. Import style-apply.css

```bash
# Edit app.css
echo "@import '../../Main_files/five/src/style-apply.css';" >> resources/css/app.css

# Rebuild
npm run build
npm run copy
```

### 2. Update Blade Templates

```blade
{{-- Use Bootstrap Italia classes --}}
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!-- Content -->
        </div>
    </div>
</div>
```

### 3. Include app1.js

```blade
@vite(['resources/js/app1.js'])
```

### 4. Test

```bash
firefox http://fixcity.local/it/tests/argomenti
```

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Build Process** | `docs/BUILD_AND_PUBLISH_PROCESS.md` |
| **Header Scripts** | `docs/HEADER_SCRIPTS_DOCUMENTATION.md` |
| **HTML Matching Plan** | `docs/design-comuni/HTML_MATCHING_PLAN.md` |

---

**Status**: ✅ **ANALYSIS COMPLETE**  
**Key Finding**: style-apply.css contains ALL Bootstrap Italia classes converted to Tailwind  
**Next**: Import style-apply.css + use Bootstrap Italia classes in Blade

**style-apply.css analysis complete! 📖**
