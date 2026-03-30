# 📖 Header Scripts Documentation

**Date**: 2026-03-30  
**Status**: ✅ **DOCUMENTED**  
**Purpose**: How header scripts work and how to modify them

---

## 🎯 Header Architecture

### Component Structure

```
laravel/Themes/Sixteen/resources/views/sections/
└── header.blade.php          # Main header component
```

### CSS Files

```
laravel/Themes/Sixteen/resources/css/
├── app.css                    # Main entry point
├── agid-variables.css         # AGID CSS variables
├── agid-colors.css            # AGID colors
└── bootstrap-italia.css       # Bootstrap Italia
```

### JavaScript Files

```
laravel/Themes/Sixteen/resources/js/
├── app.js                     # Main entry point
└── alpine.js                  # Alpine.js components
```

---

## 🔧 Header Component

### File: `sections/header.blade.php`

**Purpose**: Renders the complete header with top bar and main navigation

**Props**:
```php
@props(['data' => []])
```

**Data Structure**:
```php
[
    'region_name' => 'Regione Example',
    'region_url' => '/it',
    'show_dark_mode' => true,
    'show_language' => true,
    'show_login' => true,
    'main' => [
        'logo' => '/themes/Sixteen/images/logo.svg',
        'logo_alt' => 'Comune di Example',
        'navigation' => [
            ['label' => 'Home', 'url' => '/it'],
            ['label' => 'Amministrazione', 'url' => '/it/amministrazione'],
            // ...
        ],
        'search_enabled' => true
    ]
]
```

**Usage**:
```blade
<x-section slug="header" :data="$headerData" />
```

---

## 🎨 AGID CSS Variables

### File: `agid-variables.css`

**Purpose**: Defines AGID design tokens as CSS custom properties

**Variables**:
```css
:root {
    /* Colors */
    --agid-primary-dark: #003366;
    --agid-primary: #0066CC;
    --agid-primary-light: #3399FF;
    
    /* Typography */
    --agid-font-family: 'Titillium Web', sans-serif;
    --agid-font-size-base: 16px;
    --agid-line-height-base: 1.5;
    
    /* Spacing */
    --agid-spacing-xs: 0.5rem;
    --agid-spacing-sm: 1rem;
    --agid-spacing-md: 1.5rem;
    
    /* Border Radius */
    --agid-radius-sm: 0.25rem;
    --agid-radius-md: 0.5rem;
    
    /* Shadows */
    --agid-shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
    --agid-shadow-md: 0 4px 6px rgba(0,0,0,0.1);
}
```

**Usage in Blade**:
```blade
<div style="background-color: var(--agid-primary);">
    Content
</div>
```

---

## 🔄 Livewire Components

### Dark Mode Switcher

**File**: `app/Livewire/DarkModeSwitcher.php`

**Purpose**: Toggle dark/light mode

**Usage**:
```blade
<livewire:dark-mode-switcher />
```

**How It Works**:
1. User clicks toggle button
2. Livewire updates state
3. JavaScript updates cookie
4. JavaScript toggles `dark` class on `<html>`
5. Tailwind dark mode activates

**Cookie**:
```javascript
document.cookie = `dark_mode=${darkMode}; path=/; max-age=31536000`;
```

### Language Switcher

**File**: `app/Livewire/Lang/Switcher.php`

**Purpose**: Switch between languages (IT/EN/DE/ES)

**Usage**:
```blade
<livewire:lang.switcher />
```

**How It Works**:
1. User clicks language button
2. Dropdown opens (Alpine.js)
3. User selects language
4. Livewire redirects to localized URL
5. Session stores language preference

---

## 📦 Build Process

### Step 1: Edit Source Files

**CSS**:
```bash
# Edit AGID variables
vim resources/css/agid-variables.css

# Add new color
:root {
    --agid-new-color: #FF5733;
}
```

**JavaScript**:
```bash
# Edit Alpine components
vim resources/js/alpine.js

// Add new component
document.addEventListener('alpine:init', () => {
    Alpine.data('header', () => ({
        // Component logic
    }))
})
```

### Step 2: Build Assets

```bash
cd laravel/Themes/Sixteen
npm run build
```

**Output**:
```
public/
├── css/
│   └── app-C2dl2E51.css       # Compiled CSS (731KB)
├── js/
│   └── app-AM7MqlSQ.js        # Compiled JS (332KB)
└── manifest.json               # Vite manifest
```

### Step 3: Copy to Public

```bash
npm run copy
```

**Output**:
```
public_html/themes/Sixteen/
├── css/
│   └── app-C2dl2E51.css       # Live CSS
├── js/
│   └── app-AM7MqlSQ.js        # Live JS
└── manifest.json               # Live manifest
```

### Step 4: Test

```bash
# Clear Laravel cache
php artisan view:clear
php artisan cache:clear

# Hard refresh browser
Ctrl+Shift+R

# Verify changes
firefox http://fixcity.local/it/tests/argomenti
```

---

## 🔍 Debugging

### Check CSS Variables

**Browser Console**:
```javascript
getComputedStyle(document.documentElement)
  .getPropertyValue('--agid-primary')
// Output: " #0066CC"
```

### Check Loaded Assets

**Browser DevTools**:
```
Network tab → Filter: CSS
Check: app-[hash].css loaded
Check: Status 200
```

### Check Manifest

**File**: `public_html/themes/Sixteen/manifest.json`

```json
{
  "resources/css/app.css": {
    "file": "css/app-C2dl2E51.css",
    "src": "resources/css/app.css"
  },
  "resources/js/app.js": {
    "file": "js/app-AM7MqlSQ.js",
    "src": "resources/js/app.js"
  }
}
```

---

## 📊 Performance Metrics

| Metric | Value | Target |
|--------|-------|--------|
| **CSS Size** | 731KB (raw) | <500KB |
| **CSS Gzip** | 81KB | <100KB ✅ |
| **JS Size** | 332KB (raw) | <300KB |
| **JS Gzip** | 86KB | <100KB ✅ |
| **Build Time** | 11s | <15s ✅ |
| **Copy Time** | 2s | <5s ✅ |

---

## 🚀 Optimization Tips

### CSS

- ✅ Use CSS variables (DRY)
- ✅ Import order matters (@import first)
- ✅ Minimize custom CSS (use Tailwind)
- ✅ Use AGID tokens

### JavaScript

- ✅ Use Alpine.js for interactivity
- ✅ Minimize custom JS
- ✅ Use Livewire for server state
- ✅ Lazy load non-critical scripts

### Build

- ✅ Build before testing
- ✅ Copy after build
- ✅ Clear cache after changes
- ✅ Use sourcemaps for debugging

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Build Process** | `docs/BUILD_AND_PUBLISH_PROCESS.md` |
| **Header Analysis** | `docs/design-comuni/screenshots/tests/header-analysis.md` |
| **AGID Variables** | `resources/css/agid-variables.css` |
| **Header Component** | `resources/views/sections/header.blade.php` |

---

**Status**: ✅ **DOCUMENTED**  
**Next**: Test header on all pages  
**Build Time**: ~11s  
**Copy Time**: ~2s

**Header scripts documented! 📖**
