# Bootstrap Italia Integration with Laravel Blade

**Document Version:** 1.0  
**Last Updated:** March 30, 2026  
**Bootstrap Italia Version:** 2.18.0  
**Base Framework:** Bootstrap 5.2.3

---

## Table of Contents

1. [Overview](#overview)
2. [Installation Guide](#installation-guide)
3. [Vite Configuration](#vite-configuration)
4. [CDN Alternative](#cdn-alternative)
5. [Required Dependencies](#required-dependencies)
6. [Blade Component Patterns](#blade-component-patterns)
7. [Component Examples](#component-examples)
8. [SVG Sprite Usage](#svg-sprite-usage)
9. [Accessibility Considerations](#accessibility-considerations)

---

## Overview

Bootstrap Italia is the official CSS framework for Italian Public Administration websites, based on Bootstrap 5.2.3. It implements the UI Kit Italia design guidelines and provides accessible, responsive components specifically designed for government and institutional websites.

**Key Characteristics:**
- Based on Bootstrap 5.2.3 (not Tailwind)
- Requires jQuery-free vanilla JavaScript
- Includes custom SVG icon system
- WCAG 2.1 accessible components
- Mobile-first responsive design

---

## Installation Guide

### Option 1: NPM Installation (Recommended)

```bash
# Install Bootstrap Italia
npm install bootstrap-italia@latest --save

# Install additional required dependencies
npm install @popperjs/core --save
npm install sass --save-dev
```

### Option 2: Laravel Preset (Simplified)

A community Laravel preset exists for quick setup:

```bash
# Install the preset as dev dependency
composer require robertogallea/bootstrap-italia-preset --dev

# Run the preset command (Laravel >= 7.0)
php artisan ui bootstrap-italia

# Install npm dependencies and build
npm install && npm run dev
```

### Option 3: Manual Download

Download from [GitHub Releases](https://github.com/italia/bootstrap-italia/releases) and extract to your project's `public/` directory.

---

## Vite Configuration

### Step 1: Update `vite.config.js`

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap-italia': path.resolve(__dirname, 'node_modules/bootstrap-italia'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});
```

### Step 2: Create SCSS Entry Point

Rename `resources/css/app.css` to `resources/scss/app.scss`:

```scss
// Bootstrap Italia requires importing in this specific order

// 1. Functions (required first)
@import "~bootstrap-italia/src/scss/functions";

// 2. Variables
@import "~bootstrap-italia/src/scss/variables";

// 3. Colors
@import "~bootstrap-italia/src/scss/colors";

// 4. Core Bootstrap (optional - import only what you need)
@import "~bootstrap/scss/bootstrap";

// 5. Bootstrap Italia Core
@import "~bootstrap-italia/src/scss/bootstrap-italia";

// 6. Custom overrides (your theme)
@import "custom";
```

**Alternative: Use Pre-compiled CSS**

For simpler projects, import the pre-compiled CSS:

```scss
@import "~bootstrap-italia/dist/css/bootstrap-italia.min.css";
```

### Step 3: Configure JavaScript Entry Point

Create or update `resources/js/app.js`:

```javascript
// Import Bootstrap Italia (includes all components)
import * as bootstrapItalia from 'bootstrap-italia';

// Or import specific components only (smaller bundle)
// import { Header, Megamenu, Carousel } from 'bootstrap-italia';

// Initialize Bootstrap Italia
document.addEventListener('DOMContentLoaded', () => {
    // Components auto-initialize via data-bs-toggle attributes
    // Manual initialization if needed:
    // const headers = document.querySelectorAll('.it-header-sticky');
    // headers.forEach(header => new bootstrapItalia.HeaderSticky(header));
});

// Load fonts (required for proper typography)
import { loadFonts } from 'bootstrap-italia';
loadFonts('/bootstrap-italia/dist/fonts');
```

### Step 4: Update Blade Layout

In your main layout file (e.g., `resources/views/layouts/app.blade.php`):

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>@yield('title', config('app.name'))</title>
    
    <!-- Vite Assets -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    
    <!-- Additional meta tags -->
    @stack('meta')
</head>
<body class="antialiased">
    @yield('content')
    
    @stack('scripts')
</body>
</html>
```

### Step 5: Build Assets

```bash
# Development (with hot reload)
npm run dev

# Production build
npm run build
```

---

## CDN Alternative

For quick prototyping or when npm is not available, use CDN links. **Note:** jsDelivr and unpkg are available but **not recommended for production**.

```html
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap Italia CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-italia@2.18.0/dist/css/bootstrap-italia.min.css">
    
    <title>Bootstrap Italia CDN Example</title>
</head>
<body>
    <!-- Your content here -->
    
    <!-- Dependencies (if not using bundle) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    
    <!-- Bootstrap Italia JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-italia@2.18.0/dist/js/bootstrap-italia.bundle.min.js"></script>
    
    <!-- Initialize fonts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof loadFonts === 'function') {
                loadFonts('https://cdn.jsdelivr.net/npm/bootstrap-italia@2.18.0/dist/fonts');
            }
        });
    </script>
</body>
</html>
```

---

## Required Dependencies

| Dependency | Version | Purpose | Required |
|------------|---------|---------|----------|
| **Bootstrap** | 5.2.3 | Base framework | ✅ Yes |
| **@popperjs/core** | 2.9.2+ | Dropdown positioning | ✅ Yes |
| **@splidejs/splide** | 4.1.4 | Carousel/slider | ✅ Yes |
| **animejs** | 3.2.1 | Animations | ✅ Yes |
| **jQuery** | — | **NOT required** (Bootstrap 5 removed jQuery) | ❌ No |

**Important:** Bootstrap Italia follows Bootstrap 5's jQuery-free approach. All JavaScript is vanilla ES6+.

### Optional Dependencies

| Dependency | Purpose |
|------------|---------|
| `accessible-autocomplete` | Accessible autocomplete inputs |
| `just-validate` | Form validation |
| `mini-masonry` | Masonry layouts |
| `progressbar.js` | Progress indicators |

---

## Blade Component Patterns

### Basic Component Structure

Bootstrap Italia components use standard HTML with specific class names. Create reusable Blade components:

```blade
{{-- resources/views/components/bi-card.blade.php --}}
@props([
    'title' => '',
    'subtitle' => null,
    'text' => '',
    'image' => null,
    'href' => '#',
    'date' => null,
    'category' => null,
    'signature' => null,
])

<article {{ $attributes->merge(['class' => 'it-card it-card-image rounded shadow-sm border']) }}>
    {{-- Title --}}
    <h3 class="it-card-title">
        <a href="{{ $href }}">{{ $title }}</a>
    </h3>
    
    {{-- Optional Image --}}
    @if($image)
    <div class="it-card-image-wrapper">
        <div class="ratio ratio-16x9">
            <figure class="figure img-full">
                <img src="{{ $image }}" alt="{{ $title }}" class="figure-img img-fluid rounded">
            </figure>
        </div>
    </div>
    @endif
    
    {{-- Body Content --}}
    <div class="it-card-body">
        @if($subtitle)
        <p class="it-card-subtitle">{{ $subtitle }}</p>
        @endif
        
        <p class="it-card-text">{{ $text }}</p>
        
        @if($signature)
        <address class="it-card-signature">di {{ $signature }}</address>
        @endif
    </div>
    
    {{-- Optional Footer --}}
    @if($date || $category)
    <footer class="it-card-related it-card-footer">
        @if($category)
        <div class="it-card-taxonomy">
            <a href="#" class="it-card-category it-card-link">
                <span class="visually-hidden">Categoria correlata: </span>
                {{ $category }}
            </a>
        </div>
        @endif
        
        @if($date)
        <time class="it-card-date" datetime="{{ $date->format('Y-m-d') }}">
            {{ $date->format('d F Y') }}
        </time>
        @endif
    </footer>
    @endif
</article>
```

### Usage Example

```blade
{{-- In your Blade view --}}
<x-bi-card 
    title="Titolo del contenuto"
    subtitle="Sottotitolo opzionale"
    text="Breve descrizione del contenuto in massimo tre o quattro righe."
    image="https://placeholderimage.eu/api/city/800/600"
    href="/dettaglio/1"
    :date="now()"
    category="Categoria"
    signature="Mario Rossi"
    class="mb-4"
/>
```

### Component with Slots

```blade
{{-- resources/views/components/bi-card-with-slot.blade.php --}}
@props(['href' => '#', 'image' => null])

<article {{ $attributes->merge(['class' => 'it-card it-card-image rounded shadow-sm border']) }}>
    <h3 class="it-card-title">
        <a href="{{ $href }}">{{ $title ?? $slot }}</a>
    </h3>
    
    @if($image)
    <div class="it-card-image-wrapper">
        <div class="ratio ratio-16x9">
            <figure class="figure img-full">
                <img src="{{ $image }}" alt="" class="figure-img img-fluid rounded">
            </figure>
        </div>
    </div>
    @endif
    
    <div class="it-card-body">
        {{ $body ?? $slot }}
    </div>
    
    @isset($footer)
    <footer class="it-card-related it-card-footer">
        {{ $footer }}
    </footer>
    @endisset
</article>
```

### Usage with Slots

```blade
<x-bi-card-with-slot href="/articolo/1" :image="$articolo->image_url">
    <x-slot:title>
        {{ $articolo->title }}
    </x-slot:title>
    
    <x-slot:body>
        <p class="it-card-subtitle">{{ $articolo->subtitle }}</p>
        <p class="it-card-text">{{ Str::limit($articolo->content, 150) }}</p>
    </x-slot:body>
    
    <x-slot:footer>
        <time class="it-card-date" datetime="{{ $articolo->published_at->format('Y-m-d') }}">
            {{ $articolo->published_at->format('d F Y') }}
        </time>
    </x-slot:footer>
</x-bi-card-with-slot>
```

---

## Component Examples

### 1. Header Component (Complete)

```blade
{{-- resources/views/components/bi-header.blade.php --}}
<header class="it-header-wrapper">
    {{-- Slim Header (Top Bar) --}}
    <div class="it-header-slim-wrapper">
        <div class="container-xxl">
            <div class="row">
                <div class="col-12">
                    <div class="it-header-slim-wrapper-content">
                        {{-- Brand/Entity Name --}}
                        <a class="d-none d-lg-block navbar-brand" href="#">
                            Nome dell'Ente
                        </a>
                        
                        {{-- Mobile Nav Toggler --}}
                        <div class="nav-mobile">
                            <a class="it-button" href="#" data-bs-toggle="navbarcollapsible" data-bs-target="#navbar-mobile" aria-label="Mostra o nascondi il menu">
                                <svg class="icon"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-burger"></use></svg>
                            </a>
                        </div>
                        
                        {{-- Right Zone (Language/Login) --}}
                        <div class="it-right-zone">
                            <span class="text d-none d-md-block">ITA</span>
                            <div class="org-wrapper d-none d-md-block">
                                <span>Organizzazione</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Nav Wrapper --}}
    <div class="it-nav-wrapper">
        {{-- Header Center (Logo + Search) --}}
        <div class="it-header-center-wrapper">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-center-content-wrapper">
                            {{-- Logo/Brand --}}
                            <div class="it-brand-wrapper">
                                <a href="/">
                                    <svg class="icon" aria-hidden="true">
                                        <use href="/bootstrap-italia/dist/svg/sprites.svg#it-pa"></use>
                                    </svg>
                                    <div class="it-brand-text">
                                        <div class="it-brand-title">{{ config('app.name') }}</div>
                                        <div class="it-brand-tagline d-none d-md-block">Tag line istituzionale</div>
                                    </div>
                                </a>
                            </div>
                            
                            {{-- Right Zone (Social + Search) --}}
                            <div class="it-right-zone">
                                {{-- Social --}}
                                <div class="it-socials d-none d-md-flex">
                                    <span>Seguici su</span>
                                    <ul>
                                        <li>
                                            <a href="#" aria-label="Facebook">
                                                <svg class="icon"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use></svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Twitter">
                                                <svg class="icon"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use></svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                
                                {{-- Search --}}
                                <div class="it-search-wrapper">
                                    <span class="d-none d-md-block">Cerca</span>
                                    <a class="search-link rounded-icon" aria-label="Cerca nel sito" href="/cerca">
                                        <svg class="icon"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-search"></use></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Header Navbar --}}
        <div class="it-header-navbar-wrapper">
            <div class="container-xxl">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg has-megamenu" aria-label="Navigazione principale">
                            <button type="button" aria-label="Mostra o nascondi il menu" 
                                    class="custom-navbar-toggler" 
                                    aria-controls="navbar-main" 
                                    data-bs-toggle="navbarcollapsible" 
                                    data-bs-target="#navbar-main">
                                <span>
                                    <svg role="img" class="icon"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-burger"></use></svg>
                                </span>
                            </button>
                            
                            <div class="navbar-collapsable" id="navbar-main" tabindex="-1">
                                <div class="close-div">
                                    <button type="button" aria-label="Chiudi il menu" class="btn close-menu">
                                        <span><svg role="img" class="icon"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-close-big"></use></svg></span>
                                    </button>
                                </div>
                                
                                <div class="menu-wrapper justify-content-lg-between">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown megamenu">
                                            <button type="button" class="nav-link dropdown-toggle px-lg-2 px-xl-3" 
                                                    data-bs-toggle="dropdown" 
                                                    aria-expanded="false" 
                                                    id="megamenu-1">
                                                <span>Servizi</span>
                                                <svg role="img" class="icon icon-xs ms-1">
                                                    <use href="/bootstrap-italia/dist/svg/sprites.svg#it-expand"></use>
                                                </svg>
                                            </button>
                                            
                                            <div class="dropdown-menu shadow-lg" role="region" aria-labelledby="megamenu-1">
                                                <div class="megamenu pb-5 pt-3 py-lg-0">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-lg-4 px-0">
                                                            <div class="row">
                                                                <div class="col-12 it-description pb-lg-3">
                                                                    <div class="description-content ps-4 ps-sm-5 ms-3">
                                                                        <p>Descrizione della sezione Servizi</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-lg-8">
                                                            <div class="row">
                                                                <div class="col-12 col-lg-6">
                                                                    <div class="link-list-wrapper">
                                                                        <ul class="link-list">
                                                                            <li>
                                                                                <a class="list-item dropdown-item" href="#">
                                                                                    <svg role="img" class="icon icon-sm me-2">
                                                                                        <use href="/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right-triangle"></use>
                                                                                    </svg>
                                                                                    <span>Servizio 1</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="list-item dropdown-item" href="#">
                                                                                    <svg role="img" class="icon icon-sm me-2">
                                                                                        <use href="/bootstrap-italia/dist/svg/sprites.svg#it-arrow-right-triangle"></use>
                                                                                    </svg>
                                                                                    <span>Servizio 2</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
```

### 2. Breadcrumb Component

```blade
{{-- resources/views/components/bi-breadcrumb.blade.php --}}
@props([
    'items' => [], // Array of ['label' => 'Home', 'url' => '/']
    'currentPage' => '',
])

<nav class="breadcrumb-container" aria-label="Percorso di navigazione">
    <ol class="breadcrumb">
        @foreach($items as $index => $item)
        <li class="breadcrumb-item">
            @if($index < count($items) - 1)
                <a href="{{ $item['url'] ?? '#' }}">{{ $item['label'] }}</a>
                <span class="separator" aria-hidden="true">/</span>
            @else
                <span class="active">{{ $item['label'] }}</span>
            @endif
        </li>
        @endforeach
        
        {{-- Current page (always last, not clickable) --}}
        <li class="breadcrumb-item active" aria-current="page">
            {{ $currentPage }}
        </li>
    </ol>
</nav>
```

### Usage

```blade
<x-bi-breadcrumb 
    :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Servizi', 'url' => '/servizi'],
    ]"
    current-page="Dettaglio servizio"
/>
```

### 3. Card Component (Simplified)

```blade
{{-- resources/views/components/bi-card-simple.blade.php --}}
@props([
    'title' => '',
    'text' => '',
    'href' => '#',
    'image' => null,
    'date' => null,
])

<article {{ $attributes->merge(['class' => 'it-card rounded shadow-sm border']) }}>
    <h3 class="it-card-title">
        <a href="{{ $href }}">{{ $title }}</a>
    </h3>
    
    @if($image)
    <div class="it-card-image-wrapper">
        <div class="ratio ratio-16x9">
            <figure class="figure img-full">
                <img src="{{ $image }}" alt="" class="figure-img img-fluid rounded">
            </figure>
        </div>
    </div>
    @endif
    
    <div class="it-card-body">
        <p class="it-card-text">{{ $text }}</p>
    </div>
    
    @if($date)
    <footer class="it-card-related it-card-footer">
        <time class="it-card-date" datetime="{{ $date->format('Y-m-d') }}">
            {{ $date->format('d F Y') }}
        </time>
    </footer>
    @endif
</article>
```

### 4. Navigation Menu (Mega Menu)

See the complete header example above for the full megamenu structure. Key points:

- Use `has-megamenu` class on `<nav>`
- Megamenu items use `.nav-item.dropdown.megamenu`
- Content organized in Bootstrap grid (`.row`, `.col-lg-*`)
- SVG icons from sprite sheet for arrows and decorations

---

## SVG Sprite Usage

Bootstrap Italia uses an SVG sprite system for icons.

### Sprite Path

Default path: `/bootstrap-italia/dist/svg/sprites.svg`

### Basic Usage

```blade
<svg class="icon" aria-hidden="true">
    <use href="/bootstrap-italia/dist/svg/sprites.svg#it-icon-name"></use>
</svg>
```

### Common Icons

| Icon Name | Usage |
|-----------|-------|
| `#it-pa` | Institutional logo |
| `#it-search` | Search icon |
| `#it-burger` | Mobile menu toggle |
| `#it-close-big` | Close button |
| `#it-expand` | Dropdown arrow |
| `#it-arrow-right-triangle` | List item bullet |
| `#it-facebook` | Facebook social |
| `#it-twitter` | Twitter social |
| `#it-github` | GitHub social |
| `#it-user` | User/profile icon |
| `#it-external-link` | External link indicator |

### Icon Variations

```blade
{{-- Primary color --}}
<svg class="icon icon-primary"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-star"></use></svg>

{{-- Secondary color --}}
<svg class="icon icon-secondary"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-star"></use></svg>

{{-- Small size --}}
<svg class="icon icon-sm"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-star"></use></svg>

{{-- Large size --}}
<svg class="icon icon-lg"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-star"></use></svg>

{{-- Extra large --}}
<svg class="icon icon-xl"><use href="/bootstrap-italia/dist/svg/sprites.svg#it-star"></use></svg>
```

---

## Accessibility Considerations

Bootstrap Italia is designed for WCAG 2.1 compliance. Key requirements:

### 1. Skip Links

Add skip navigation links at the start of your layout:

```blade
<a class="visually-hidden-focusable" href="#main-content">Vai al contenuto principale</a>
```

### 2. ARIA Labels

Always include `aria-label` on interactive elements:

```blade
<a href="#" aria-label="Cerca nel sito">
    <svg class="icon"><use href="#it-search"></use></svg>
</a>
```

### 3. Screen Reader Text

Use `.visually-hidden` for text only screen readers should read:

```blade
<span class="visually-hidden">Categoria correlata: </span>Categoria
```

### 4. Focus Management

Ensure all interactive elements are keyboard accessible. Bootstrap Italia handles most of this automatically.

### 5. Language Attribute

Set the proper language on your HTML tag:

```blade
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
```

---

## Troubleshooting

### Issue: Icons not displaying

**Solution:** Ensure the SVG sprite path is correct. Update in `vite.config.js`:

```javascript
// Copy SVG sprites to public directory
export default defineConfig({
    // ... other config
    build: {
        copyPublicDir: true,
    },
});
```

Or manually copy:

```bash
cp -r node_modules/bootstrap-italia/dist/svg public/bootstrap-italia/dist/
```

### Issue: Fonts not loading

**Solution:** Initialize fonts in your JavaScript:

```javascript
import { loadFonts } from 'bootstrap-italia';
loadFonts('/bootstrap-italia/dist/fonts');
```

### Issue: Megamenu not working

**Solution:** Ensure Popper.js is loaded before Bootstrap Italia:

```javascript
import * as bootstrapItalia from 'bootstrap-italia';
// Bootstrap Italia bundle includes Popper, but verify order if using separate imports
```

---

## Resources

- **Official Documentation:** https://italia.github.io/bootstrap-italia/
- **GitHub Repository:** https://github.com/italia/bootstrap-italia
- **UI Kit Italia:** https://github.com/italia/design-ui-kit
- **Laravel Preset:** https://github.com/robertogallea/bootstrap-italia-preset

---

## Component Reference

| Component | Documentation URL |
|-----------|------------------|
| Header | https://italia.github.io/bootstrap-italia/docs/menu-di-navigazione/header/ |
| Megamenu | https://italia.github.io/bootstrap-italia/docs/menu-di-navigazione/megamenu/ |
| Breadcrumb | https://italia.github.io/bootstrap-italia/docs/menu-di-navigazione/breadcrumbs/ |
| Card | https://italia.github.io/bootstrap-italia/docs/componenti/card/ |
| Dropdown | https://italia.github.io/bootstrap-italia/docs/componenti/dropdown/ |
| Buttons | https://italia.github.io/bootstrap-italia/docs/componenti/buttons/ |
| Alert | https://italia.github.io/bootstrap-italia/docs/componenti/alert/ |
| Modal | https://italia.github.io/bootstrap-italia/docs/componenti/modale/ |
| Accordion | https://italia.github.io/bootstrap-italia/docs/componenti/accordion/ |
| Carousel | https://italia.github.io/bootstrap-italia/docs/componenti/carousel/ |
