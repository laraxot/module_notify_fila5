# Laravel Themes - Master Index

## Overview

This directory contains documentation for all Laravel themes in the FixCity PTVX ecosystem. Each theme is a self-contained styling and presentation layer that integrates with the modular backend.

## Project Structure

```
base_fixcity_fila5/
├── public_html/              # DOCUMENT ROOT (web accessible)
│   ├── index.php            # Entry point
│   ├── assets/              # Public assets
│   └── themes/              # Theme assets (build output)
├── laravel/Themes/          # All themes (source code)
├── laravel/Modules/         # All modules
├── docs/                     # Project-wide documentation
└── bashscripts/             # Shell scripts
```

## Theme List

| Theme | Description | Documentation | Status |
|-------|-------------|---------------|--------|
| **TwentyOne** | Modern Tailwind CSS theme with Vite build | [docs/](TwentyOne/docs/) | ✅ Active |
| **Sixteen** | AGID/Bootstrap Italia compliant theme for PA | [docs/](Sixteen/docs/) | ✅ Active |

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

### TwentyOne

Modern, minimalist theme built with Tailwind CSS:

- **Design**: Clean, modern aesthetic
- **Framework**: Tailwind CSS v4
- **Build**: Vite
- **Features**:
  - Responsive layouts
  - Dark mode support
  - Component library
  - Performance optimized

**Documentation**: [TwentyOne/docs/](TwentyOne/docs/)

### Sixteen

AGID/Bootstrap Italia compliant theme for Italian Public Administration:

- **Design**: Bootstrap Italia design system
- **Compliance**: AGID guidelines, WCAG 2.1 AA
- **Framework**: Tailwind CSS (Bootstrap Italia port)
- **Features**:
  - PA-compliant components
  - Accessibility built-in
  - SPID integration (planned)
  - PagoPA integration (planned)

**Documentation**: [Sixteen/docs/](Sixteen/docs/)

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
