# 🎨 Bootstrap Italia CSS Implementation Guide

**Version**: 2.0  
**Created**: 2026-03-30  
**Status**: ✅ Active Implementation  
**Owner**: Multi-Agent Team (Amelia + Winston)

---

## 📁 File Structure

```
laravel/Themes/Sixteen/
├── Main_files/five/src/
│   ├── style-apply.css        # Main CSS (1740 righe)
│   └── app1.js               # Main JS (Alpine.js)
├── resources/css/
│   └── app.css               # Compiled output
└── public/css/
    └── app.css               # Production build
```

---

## 🎯 Golden Rules

### 1. **Use @apply Pattern**

**Bootstrap Italia → Tailwind CSS**:
```css
/* Bootstrap Italia */
.it-header-slim-wrapper {
  background-color: var(--bs-primary-dark);
  padding: 0.5rem;
  font-size: 0.875rem;
}

/* Tailwind CSS with @apply */
.it-header-slim-wrapper {
  background-color: var(--bs-primary-dark);
  @apply py-2 text-sm;
}
```

### 2. **CSS Custom Properties**

```css
:root {
  --bs-primary: #007a52;
  --bs-primary-dark: #00614a;
  --bs-secondary: #5d7083;
  --bs-success: #008055;
  --bs-blue: #006cc6;
  --bs-dark: #17334f;
  --bs-light: #f8f9fa;
}
```

**Usage**:
```css
.it-header-wrapper {
  background-color: var(--bs-primary);
  @apply text-white relative;
}
```

### 3. **Font: Titillium Web**

```css
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap');

html {
  font-family: "Titillium Web", Geneva, Tahoma, sans-serif;
}
```

---

## 🧱 Header Implementation (style-apply.css)

### Header Slim (Top Bar)

**File**: `Main_files/five/src/style-apply.css` (Lines 1-200)

```css
.it-header-slim-wrapper {
  background-color: var(--bs-primary-dark);
  @apply py-2 text-sm;
}

.it-header-slim-wrapper-content {
  @apply flex justify-between items-center;
}

.it-header-slim-wrapper a {
  @apply text-white no-underline text-sm;
}

.it-header-slim-right-zone {
  @apply flex items-center gap-4;
}
```

**Blade Component**:
```blade
<div class="it-header-slim-wrapper">
  <div class="container">
    <div class="it-header-slim-wrapper-content">
      {{-- Left: Region --}}
      <a href="#" class="it-header-slim-link">
        <span class="text-small">Nome della Regione</span>
      </a>
      
      {{-- Right: Utilities --}}
      <div class="it-header-slim-right-zone">
        {{-- Language dropdown --}}
        <div class="nav-item dropdown" x-data="{ open: false }">
          <button class="nav-link dropdown-toggle" @click="open = !open">
            <span x-text="currentLang">ITA</span>
          </button>
          <div class="dropdown-menu" x-show="open">
            <a class="dropdown-item" @click="select('ITA')">ITA</a>
            <a class="dropdown-item" @click="select('ENG')">ENG</a>
          </div>
        </div>
        
        {{-- Login --}}
        <a href="#" class="btn-icon btn-full">
          <span class="rounded-icon">
            <svg class="icon icon-white"><use href="#it-user"></use></svg>
          </span>
          <span>Accedi all'area personale</span>
        </a>
        
        {{-- Social Icons --}}
        <div class="it-socials">
          <span>Seguici su</span>
          <ul>
            <li><a href="#"><svg class="icon icon-white"><use href="#it-twitter"></use></svg></a></li>
            <!-- ... -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
```

### Header Main (Branding)

**File**: `Main_files/five/src/style-apply.css` (Lines 200-400)

```css
.it-brand-wrapper {
  @apply flex items-center gap-3;
}

.it-brand-wrapper a {
  @apply flex items-center gap-3 no-underline text-white;
}

.it-brand-text {
  @apply flex flex-col;
}

.it-right-zone {
  @apply flex items-center gap-4;
}

.it-socials {
  @apply flex items-center gap-2;
}

.it-socials span {
  @apply text-sm text-white mr-3 font-normal;
}

.it-socials ul {
  @apply flex gap-0.5 list-none m-0 p-0;
}

.it-search-wrapper {
  @apply flex items-center gap-2;
}

.search-link {
  background: white;
  color: var(--bs-primary);
  @apply p-3 rounded-full border-0 inline-flex items-center justify-center transition-colors duration-200 w-12 h-12;
}
```

### Navbar (Navigation)

**File**: `Main_files/five/src/style-apply.css` (Lines 400-600)

```css
.it-nav-wrapper {
  @apply bg-white shadow-sm;
}

.it-header-navbar-wrapper {
  background: var(--bs-primary) !important;
  @apply py-3 border-t-0;
}

.navbar {
  @apply p-0;
  background: var(--bs-primary) !important;
}

.navbar-nav {
  @apply flex gap-0 list-none m-0 p-0;
}

.navbar-nav .nav-item {
  @apply relative;
}

.navbar-nav .nav-link {
  @apply text-white font-semibold text-base px-6 py-3 no-underline block transition-colors duration-200;
}

.navbar-nav .nav-link:hover {
  color: var(--bs-primary);
}

.custom-navbar-toggler {
  @apply border-0 bg-transparent p-2 text-white block;
}
```

**Mobile Menu**:
```css
@media (min-width: 992px) {
  .custom-navbar-toggler {
    @apply hidden;
  }
  
  .navbar-collapsable {
    @apply flex static w-full;
    background: var(--bs-primary) !important;
  }
  
  .navbar-collapsable .navbar-nav {
    @apply flex flex-row m-0 p-0;
  }
}

@media (max-width: 991px) {
  .navbar-collapsable {
    @apply fixed top-0 left-0 right-0 bottom-0 bg-white z-50 overflow-y-auto hidden;
  }
  
  .navbar-collapsable.show {
    @apply block;
  }
}
```

---

## ⚡ JavaScript Implementation (app1.js)

### Alpine.js Integration

**File**: `Main_files/five/src/app1.js`

```javascript
import Alpine from 'alpinejs'

window.Alpine = Alpine

document.addEventListener('alpine:init', () => {
  // Language dropdown
  const dropdown = document.querySelector('.nav-item.dropdown');

  if (dropdown) {
    dropdown.setAttribute('x-data', `{
      open: false,
      currentLang: 'ITA',
      toggle() { this.open = !this.open },
      select(lang) {
        this.currentLang = lang;
        this.open = false;
        this.$el.querySelector('.nav-link span').textContent = lang;
      }
    }`);

    dropdown.querySelector('.dropdown-toggle').setAttribute('x-on:click', 'toggle()');
    dropdown.querySelector('.dropdown-menu').setAttribute('x-show', 'open');
    
    dropdown.querySelectorAll('.dropdown-item').forEach((item, i) => {
      const lang = i === 0 ? 'ITA' : 'ENG';
      item.setAttribute('x-on:click.prevent', `select('${lang}')`);
    });

    dropdown.setAttribute('x-on:click.outside', 'open = false');
  }
});

Alpine.start()
```

### Bootstrap Italia Components

```javascript
document.addEventListener('DOMContentLoaded', function() {
  setTimeout(() => {
    // Language dropdown
    const languageButton = document.getElementById('language-button');
    const languageMenu = document.getElementById('language-menu');

    if (languageButton && languageMenu) {
      languageButton.addEventListener('click', function() {
        const isExpanded = languageButton.getAttribute('aria-expanded') === 'true';
        languageMenu.style.display = isExpanded ? 'none' : 'block';
        languageButton.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
      });
    }

    // Hamburger menu
    const hamburgerButton = document.querySelector('[data-bs-toggle="navbarcollapsible"]');
    const navCollapsible = document.querySelector('#nav4');
    const closeButton = document.querySelector('.close-menu');
    const overlay = document.querySelector('.overlay');

    if (hamburgerButton && navCollapsible) {
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
    }
  }, 100);
});
```

---

## 🎨 Key CSS Classes

### Header Classes

| Class | Purpose | Tailwind Equivalent |
|-------|---------|---------------------|
| `.it-header-slim-wrapper` | Top bar container | `bg-primary-dark py-2 text-sm` |
| `.it-header-slim-wrapper-content` | Flex container | `flex justify-between items-center` |
| `.it-header-slim-right-zone` | Right utilities | `flex items-center gap-4` |
| `.it-brand-wrapper` | Brand container | `flex items-center gap-3` |
| `.it-right-zone` | Right zone | `flex items-center gap-4` |
| `.it-socials` | Social icons | `flex items-center gap-2` |
| `.search-link` | Search button | `w-12 h-12 rounded-full bg-white` |

### Navigation Classes

| Class | Purpose | Tailwind Equivalent |
|-------|---------|---------------------|
| `.it-nav-wrapper` | Nav wrapper | `bg-white shadow-sm` |
| `.it-header-navbar-wrapper` | Navbar wrapper | `bg-primary py-3` |
| `.navbar-nav` | Nav list | `flex gap-0 list-none` |
| `.nav-link` | Nav item | `text-white font-semibold px-6 py-3` |
| `.custom-navbar-toggler` | Hamburger | `border-0 bg-transparent` |

### Grid Classes

| Class | Purpose | Tailwind Equivalent |
|-------|---------|---------------------|
| `.container` | Max width container | `max-w-1200px mx-auto px-3` |
| `.row` | Flex row | `flex flex-wrap -mx-3` |
| `.col-lg-3` | 25% column | `w-1/4` (≥992px) |
| `.col-lg-6` | 50% column | `w-1/2` (≥992px) |
| `.col-md-4` | 33% column | `w-1/3` (≥768px) |

---

## 🔧 Build Process

### Development

```bash
cd laravel/Themes/Sixteen

# Start dev server (watches Main_files/five/src/)
npm run dev

# Edit:
# - Main_files/five/src/style-apply.css
# - Main_files/five/src/app1.js
# - resources/views/**/*.blade.php
```

### Production

```bash
# Build
npm run build

# Output:
# - public/css/app.css (compiled from style-apply.css)
# - public/js/app.js (compiled from app1.js)

# Copy to public_html
npm run copy
```

---

## 📋 Implementation Checklist

### Header Components

- [ ] Create `header-slim.blade.php` with:
  - Region link
  - Language dropdown (Alpine.js)
  - Login button
  - Social icons (6)

- [ ] Create `header-main.blade.php` with:
  - Brand (logo + text)
  - Search button
  - Social icons (repeat)

- [ ] Create `navbar.blade.php` with:
  - Hamburger toggle
  - Menu items (Amministrazione, Novità, etc.)
  - Mobile menu overlay

### CSS/JS Integration

- [ ] Copy `Main_files/five/src/style-apply.css` → `resources/css/app.css`
- [ ] Copy `Main_files/five/src/app1.js` → `resources/js/app.js`
- [ ] Ensure Titillium Web font is loaded
- [ ] Ensure CSS custom properties are defined
- [ ] Ensure Alpine.js is initialized

### Testing

- [ ] Test language dropdown (Alpine.js)
- [ ] Test hamburger menu (mobile)
- [ ] Test search button
- [ ] Test responsive (mobile/tablet/desktop)
- [ ] Test with `npm run build && npm run copy`

---

## 🤖 Multi-Agent Coordination

**OpenViking Context**:
```bash
openviking add-memory "Bootstrap Italia CSS implemented in Main_files/five/src/style-apply.css using @apply pattern. JS in app1.js with Alpine.js."
```

**GSD Phase**: `.planning/phases/09-bootstrap-italia-implementation/`

**Agents**:
- **Amelia (Dev)**: Implementation
- **Winston (Architect)**: CSS architecture review
- **Sally (UX)**: Visual compliance
- **gsd-verifier**: HTML/CSS match validation

---

## 📚 Related Documentation

- [AGID HTML Compliance](./AGID_HTML_COMPLIANCE.md)
- [Header Analysis](./design-comuni/screenshots/HEADER_ANALYSIS_FIX_PLAN.md)
- [Build Scripts](./BUILD_SCRIPTS.md)
- [Universal Block Types](./design-comuni/UNIVERSAL_BLOCK_TYPES_TAXONOMY.md)

---

**Last Updated**: 2026-03-30  
**Implementation Status**: 🟡 In Progress (60%)  
**Owner**: Multi-Agent Team
