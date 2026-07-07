# Design Comuni Blade Components - Documentation

**Version:** 1.0.0  
**Created:** 2026-03-30  
**Source:** Design Comuni Pagine Statiche v2.4.0  
**Framework:** Bootstrap Italia  

---

## Table of Contents

1. [Introduction](#introduction)
2. [Installation](#installation)
3. [Configuration](#configuration)
4. [Layouts](#layouts)
5. [Components](#components)
6. [Pages](#pages)
7. [Usage Examples](#usage-examples)
8. [Best Practices](#best-practices)

---

## Introduction

Design Comuni Blade Components is a comprehensive library of reusable Blade components based on the **Design Comuni Pagine Statiche** system for Italian municipalities.

### Features

- ✅ 32 reusable components
- ✅ 35 page templates
- ✅ Bootstrap Italia integration
- ✅ Fully configurable via config file
- ✅ Accessible (WCAG 2.1 compliant)
- ✅ Responsive design
- ✅ DRY + KISS principles

### Component Categories

| Category | Count | Description |
|----------|-------|-------------|
| **Layouts** | 2 | Main layout, Page layout |
| **Header** | 5 | Slim header, Brand, Navigation, Search, Mobile |
| **Footer** | 4 | Main footer, Links, Social, Institutions |
| **Cards** | 6 | Teaser, Image, Radio, Latest Messages, BG, Standard |
| **Forms** | 8 | Input, Select, Checkbox, Toggle, Upload, Autocomplete, Search, DatePicker |
| **Blocks** | 7 | Hero, Calendar, Events, News, Topics, Services, Administration |

---

## Installation

### 1. Copy Assets

Copy Bootstrap Italia assets to your theme:

```bash
cp -r /tmp/design-comuni-pagine-statiche/dist/assets \
  laravel/Themes/Sixteen/public/design-comuni/assets/
```

### 2. Publish Configuration

```bash
php artisan vendor:publish --provider="DesignComuniServiceProvider" --tag=config
```

### 3. Configure Environment

Add to your `.env`:

```env
# Design Comuni Configuration
DESIGN_COMUNI_MUNICIPALITY_NAME="Comune di Milano"
DESIGN_COMUNI_TAGLINE="Una città da vivere"
DESIGN_COMUNI_REGION_NAME="Regione Lombardia"
DESIGN_COMUNI_REGION_URL="https://www.regione.lombardia.it"
```

---

## Configuration

### Config File Location

`laravel/Themes/Sixteen/config/design-comuni.php`

### Key Configuration Options

```php
return [
    // Municipality Information
    'municipality_name' => env('DESIGN_COMUNI_MUNICIPALITY_NAME', 'Il mio Comune'),
    'tagline' => env('DESIGN_COMUNI_TAGLINE', 'Un comune da vivere'),
    
    // Region Information
    'region_name' => env('DESIGN_COMUNI_REGION_NAME', 'Nome della Regione'),
    'region_url' => env('DESIGN_COMUNI_REGION_URL', '#'),
    
    // Features Toggle
    'show_login' => env('DESIGN_COMUNI_SHOW_LOGIN', true),
    'show_search' => env('DESIGN_COMUNI_SHOW_SEARCH', true),
    'show_social' => env('DESIGN_COMUNI_SHOW_SOCIAL', true),
    
    // Social Media Links
    'social' => [
        'twitter' => env('DESIGN_COMUNI_SOCIAL_TWITTER', '#'),
        'facebook' => env('DESIGN_COMUNI_SOCIAL_FACEBOOK', '#'),
        'youtube' => env('DESIGN_COMUNI_SOCIAL_YOUTUBE', '#'),
    ],
    
    // Footer Configuration
    'footer' => [
        'address' => "Comune di ...\nVia Roma 123",
        'phone_toll_free' => '800 016 123',
        'phone_mobile' => '+39 320 1234567',
        'phone_main' => '012 3456',
    ],
];
```

---

## Layouts

### Main Layout

**File:** `layouts/main.blade.php`

The main layout wrapper that includes header, main content, and footer.

```blade
@extends('design-comuni.layouts.main')

@section('title', 'Page Title')
@section('meta_description', 'Page description')

@section('content')
    <!-- Your content here -->
@endsection
```

---

## Components

### Header Components

#### 1. Header Partial (Complete)

**File:** `partials/header.blade.php`

Includes all header sections:
- Slim header (region link, language, login)
- Brand section (logo, social links)
- Search modal
- Navigation (main + secondary menus)

**Usage:**
```blade
@include('design-comuni.partials.header')
```

**Configuration:**
All header features are controlled via `config/design-comuni.php`.

---

### Footer Components

#### 1. Footer Partial (Complete)

**File:** `partials/footer.blade.php`

Includes:
- EU logo and municipality brand
- Administration links
- Services categories
- News and events links
- Contact information
- Social media links
- Legal links

**Usage:**
```blade
@include('design-comuni.partials.footer')
```

---

### Card Components

#### 1. Card Standard

**File:** `components/card-standard.blade.php`

Standard news/content card with image, category, date, and tags.

**Props:**
```php
@props([
    'title' => '',
    'text' => '',
    'link' => '#',
    'linkText' => null,
    'image' => null,
    'imagePosition' => 'top', // top, right, left
    'category' => null,
    'categoryIcon' => null,
    'date' => null,
    'tags' => [],
    'size' => 'default', // default, large
    'shadow' => true,
    'border' => 'light', // light, dark, null
])
```

**Usage:**
```blade
@include('design-comuni.components.card-standard', [
    'title' => "Parte l'estate con oltre 300 eventi",
    'text' => '<strong>Inaugurazione lunedì 2 luglio</strong> con il concerto...',
    'link' => route('news.show', 1),
    'linkText' => 'Tutte le novità',
    'category' => 'Notizie',
    'categoryIcon' => 'it-calendar',
    'date' => '18 mag 2022',
    'tags' => ['Estate in città'],
])
```

---

#### 2. Card Teaser

**File:** `components/card-teaser.blade.php`

Teaser card for topics with nested content support.

**Props:**
```php
@props([
    'title' => '',
    'description' => '',
    'link' => '#',
    'linkText' => 'Esplora argomento',
    'image' => null,
    'links' => [],
    'innerCard' => null,
    'shadow' => true,
    'border' => 'light',
])
```

**Usage:**
```blade
@include('design-comuni.components.card-teaser', [
    'title' => 'Trasporto pubblico',
    'description' => 'Informazioni sui servizi di trasporto pubblico',
    'link' => route('topic.show', 'transport'),
    'links' => [
        ['label' => 'Orari autobus', 'url' => route('transport.timetable')],
        ['label' => 'Biglietti', 'url' => route('transport.tickets')],
    ],
])
```

---

#### 3. Card BG

**File:** `components/card-bg.blade.php`

Background card for calendar events.

**Props:**
```php
@props([
    'date' => '',
    'day' => '',
    'events' => [],
    'link' => '#',
])
```

**Usage:**
```blade
@include('design-comuni.components.card-bg', [
    'date' => '15',
    'day' => 'lun',
    'events' => [
        ['title' => 'Saldo TASI', 'link' => '#'],
        ['title' => 'Concerto gratuito', 'link' => '#', 'image' => asset('img.jpg')],
    ],
])
```

---

## Pages

### Available Page Templates

All 35 pages from Design Comuni are available:

#### Generali (9 pages)
- `homepage.blade.php`
- `domande-frequenti.blade.php`
- `risultati-ricerca.blade.php`
- `argomenti.blade.php`
- `argomento.blade.php`
- `lista-risorse.blade.php`
- `lista-categorie.blade.php`
- `lista-risorse-categorie.blade.php`
- `mappa-sito.blade.php`

#### Amministrazione (2 pages)
- `amministrazione.blade.php`
- `documenti-dati.blade.php`

#### Novità (2 pages)
- `novita.blade.php`
- `novita-dettaglio.blade.php`

#### Servizi (3 pages)
- `servizi.blade.php`
- `servizi-categoria.blade.php`
- `servizio-dettaglio.blade.php`

#### Vivere il Comune (2 pages)
- `eventi.blade.php`
- `evento-dettaglio.blade.php`

#### Prenotazione Appuntamento (8 pages)
- `appuntamento-01-ufficio.blade.php`
- `appuntamento-01-ufficio-luogo.blade.php`
- `appuntamento-02-data-orario.blade.php`
- `appuntamento-03-dettagli.blade.php`
- `appuntamento-04-richiedente.blade.php`
- `appuntamento-04-richiedente-autenticato.blade.php`
- `appuntamento-05-riepilogo.blade.php`
- `appuntamento-06-conferma.blade.php`

#### Richiesta Assistenza (2 pages)
- `assistenza-01-dati.blade.php`
- `assistenza-02-conferma.blade.php`

#### Segnalazione Disservizio (7 pages)
- `segnalazione-dettaglio.blade.php`
- `segnalazione-01-privacy.blade.php`
- `segnalazione-02-dati.blade.php`
- `segnalazione-03-riepilogo.blade.php`
- `segnalazione-04-conferma.blade.php`
- `segnalazione-area-personale.blade.php`
- `segnalazioni-elenco.blade.php`

---

## Usage Examples

### Creating a New Page

```blade
@extends('design-comuni.layouts.main')

@section('title', 'News List')

@section('content')
<div class="container px-4 my-4">
    <h1>Novità</h1>
    
    <div class="row">
        @foreach($news as $item)
        <div class="col-lg-6">
            @include('design-comuni.components.card-standard', [
                'title' => $item->title,
                'text' => $item->excerpt,
                'link' => route('news.show', $item->id),
                'category' => $item->category,
                'date' => $item->published_at->format('d M Y'),
            ])
        </div>
        @endforeach
    </div>
</div>
@endsection
```

### Customizing Header Menu

In `config/design-comuni.php`:

```php
'main_menu' => [
    [
        'label' => 'Amministrazione',
        'url' => 'sito.amministrazione',
        'element' => 'management',
    ],
    [
        'label' => 'Servizi',
        'url' => 'sito.servizi',
        'element' => 'all-services',
    ],
],
```

---

## Best Practices

### DRY (Don't Repeat Yourself)

✅ **DO:**
- Use components for reusable UI elements
- Configure via config file
- Extend layouts

❌ **DON'T:**
- Duplicate HTML across pages
- Hardcode values (use config)
- Copy-paste component code

### KISS (Keep It Simple, Stupid)

✅ **DO:**
- Use simple `@props` declarations
- Keep components focused
- Use clear naming

❌ **DON'T:**
- Over-engineer components
- Add unnecessary complexity
- Create deeply nested components

### Accessibility

✅ **DO:**
- Use semantic HTML
- Add ARIA labels where needed
- Ensure keyboard navigation
- Test with screen readers

### Performance

✅ **DO:**
- Use `loading="lazy"` for images
- Minimize component nesting
- Cache configuration values

---

## Troubleshooting

### Common Issues

#### 1. Assets Not Loading

**Problem:** CSS/JS files return 404

**Solution:**
```bash
# Copy assets
cp -r /tmp/design-comuni-pagine-statiche/dist/assets \
  laravel/Themes/Sixteen/public/design-comuni/assets/

# Publish assets
php artisan vendor:publish --tag=public
```

#### 2. Configuration Not Applied

**Problem:** Config values not reflected

**Solution:**
```bash
# Clear config cache
php artisan config:clear
php artisan cache:clear
```

#### 3. Components Not Found

**Problem:** `ViewException: Component not found`

**Solution:**
- Check file path: `resources/views/design-comuni/components/`
- Clear view cache: `php artisan view:clear`

---

## Contributing

### Adding New Components

1. Create component in `components/`
2. Add documentation
3. Update this README
4. Test across all pages

### Component Template

```blade
{{--
    |--------------------------------------------------------------------------
    | Component Name - Design Comuni
    |--------------------------------------------------------------------------
    |
    | Description of component purpose
    |
    | Usage:
    | @include('design-comuni.components.component-name', [
    |     'prop' => 'value',
    | ])
    |
    | @package Design Comuni
    | @subpackage Components
    | @version 1.0.0
    |
--}}

@props([
    'prop' => 'default',
])

<div class="component-class">
    <!-- Component HTML -->
</div>
```

---

## Resources

- [Design Comuni Repository](https://github.com/italia/design-comuni-pagine-statiche)
- [Bootstrap Italia Documentation](https://italia.github.io/bootstrap-italia/)
- [Laravel Blade Components](https://laravel.com/docs/blade#components)

---

*Documentation created for Design Comuni Blade Components v1.0.0*
