# Laravel Themes - Master Index

## Overview

This directory contains documentation for all Laravel themes in the PTVX ecosystem. Each theme is a self-contained styling and presentation layer that integrates with the modular backend.

## Project Structure

```
<project_root>/
├── public_html/              # DOCUMENT ROOT (web accessible)
│   ├── index.php            # Entry point
│   ├── assets/              # Public assets
│   └── themes/              # Theme assets (build output)
├── laravel/Themes/          # All themes (source code)
├── laravel/Modules/         # All modules
├── docs/                     # Project-wide documentation
└── bashscripts/             # Shell scripts
```

> **Note**: Replace `<project_root>` with your actual project path (e.g., `base_fixcity_fila5`, `my-project`, etc.)

## Theme List

| Theme | Description | Documentation | Status | Config |
|-------|-------------|---------------|--------|--------|
| **Sixteen** | AGID/Bootstrap Italia compliant theme for PA | [docs/](Sixteen/docs/) | ✅ **ACTIVE** | `localhost/xra.php` |
| **TwentyOne** | Modern Tailwind CSS theme with Vite build | [docs/](TwentyOne/docs/) | 📦 Available | (configurable) |

## Active Theme

**Current Active Theme**: **Sixteen**  
**Domain**: `[YOUR_DOMAIN]` (e.g., `your-project.local`)  
**Configuration**: `laravel/config/[your_config]/xra.php` → `pub_theme`  
**Document Root**: `public_html/`  
**Theme Assets**: `public_html/themes/Sixteen/`

**Theme Context**: [.planning/THEME_CONTEXT.md](../../../../.planning/THEME_CONTEXT.md)

> **Note**: Replace `[YOUR_DOMAIN]` and `[your_config]` with your actual project configuration.

## Architectural Principles

### Document Root

**CRITICAL**: The web server document root is `public_html/`, NOT `laravel/`.

- **Entry Point**: `public_html/index.php`
- **Theme Assets**: `public_html/themes/{ThemeName}/`
- **Laravel App**: `laravel/` (not web accessible)

### Build Process

Themes use Vite for asset compilation:

```bash
# Development
npm run dev

# Production build
npm run build

# Copy to public_html
npm run copy
```

### Asset Loading

```blade
{{-- In Blade templates --}}
@vite(['themes/twentyone/resources/css/app.css', 'themes/twentyone/resources/js/app.js'])
```

## Theme Structure

Standard theme structure:

```
Themes/ThemeName/
├── app/                   # PHP components (View Composers, etc.)
├── docs/                  # Theme documentation
├── public/                # Build output (temporary)
├── resources/
│   ├── css/               # Source CSS (Tailwind, custom)
│   ├── js/                # Source JavaScript
│   └── views/             # Blade templates
│       ├── components/    # Blade components
│       ├── layouts/       # Layout templates
│       └── pages/         # Page templates
├── tailwind.config.js     # Tailwind configuration
├── vite.config.js         # Vite configuration
├── package.json           # NPM dependencies
└── theme.json             # Theme metadata
```

## Development Guidelines

### CSS Framework

All themes use **Tailwind CSS v4** as the primary CSS framework:

```javascript
// tailwind.config.js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

### Component Development

Blade components follow this pattern:

```blade
{{-- resources/views/components/button.blade.php --}}
@props(['variant' => 'primary', 'size' => 'md'])

@php
$classes = match($variant) {
    'primary' => 'bg-blue-600 hover:bg-blue-700',
    'secondary' => 'bg-gray-600 hover:bg-gray-700',
    default => 'bg-blue-600 hover:bg-blue-700',
};

$sizeClasses = match($size) {
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg',
    default => 'px-4 py-2 text-base',
};
@endphp

<button {{ $attributes->merge(['class' => "$classes $sizeClasses rounded"]) }}>
    {{ $slot }}
</button>
```

### Responsive Design

All themes follow mobile-first responsive design:

```blade
<div class="
    grid
    grid-cols-1
    sm:grid-cols-2
    lg:grid-cols-3
    xl:grid-cols-4
    gap-4
">
    {{-- Content --}}
</div>
```

## Theme-Specific Documentation

### Sixteen ✅ ACTIVE THEME

AGID/Bootstrap Italia compliant theme for Italian Public Administration:

- **Status**: ✅ **ACTIVE** (fixcity.local)
- **Design**: Bootstrap Italia design system
- **Compliance**: AGID guidelines, WCAG 2.1 AA
- **Framework**: Tailwind CSS (Bootstrap Italia port)
- **Config**: `laravel/config/localhost/xra.php` → `pub_theme`
- **Features**:
  - PA-compliant components
  - Accessibility built-in
  - SPID integration (planned)
  - PagoPA integration (planned)

**Documentation**: [Sixteen/docs/](Sixteen/docs/)

### TwentyOne 📦 AVAILABLE THEME

Modern, minimalist theme built with Tailwind CSS:

- **Status**: 📦 **AVAILABLE** (can be activated)
- **Design**: Clean, modern aesthetic
- **Framework**: Tailwind CSS v4
- **Build**: Vite
- **Config**: Update `pub_theme` in config to activate
- **Features**:
  - Responsive layouts
  - Dark mode support
  - Component library
  - Performance optimized

**Documentation**: [TwentyOne/docs/](TwentyOne/docs/)

## Quality Gates

### Before Commit

```bash
# Build check
npm run build

# Linting
npm run quality

# Test accessibility (Sixteen)
npm run test:a11y

# Performance check
npm run lighthouse
```

### Performance Targets

| Metric | Target |
|--------|--------|
| Lighthouse Score | > 90 |
| CSS Bundle Size | < 300KB |
| JS Bundle Size | < 200KB |
| First Contentful Paint | < 1.5s |
| Time to Interactive | < 3.5s |

## Integration with Modules

Themes integrate with modules via:

1. **Blade Components**: Reusable UI components
2. **Layout Templates**: Shared page layouts
3. **Asset Pipeline**: Centralized build process
4. **View Namespaces**: Module-specific views

```blade
{{-- Use module views with theme layout --}}
@extends('theme::layouts.app')

@section('content')
    @include('fixcity::tickets.index')
@endsection
```

## Related Documentation

- **Modules**: [laravel/Modules/docs/](../Modules/docs/)
- **Project Docs**: [docs/](../../../../docs/)
- **Bash Scripts**: [bashscripts/docs/](../../../../bashscripts/docs/)
- **AGENTS.md**: [AGENTS.md](../../../../AGENTS.md)

## Support

- **Issues**: [GitHub Issues](https://github.com/laraxot/base_fixcity_fila5/issues)
- **Documentation**: [Project Docs](../../../../docs/)
- **Team**: Laraxot Development Team

---

**Last Updated**: March 30, 2026
**Version**: 1.0.0
**Total Themes**: 2
