# 🎯 HTML Structure Matching - Complete Guide

**Date**: 2026-03-30  
**Goal**: Make FixCity HTML (excluding scripts) match Design Comuni 100%  
**Principle**: Same structure, same classes, same accessibility

---

## 📊 Current Status

| Page | Reference | FixCity | Match | Gap |
|------|-----------|---------|-------|-----|
| **argomenti** | ✅ | 🟡 | 60% | 40% |
| **homepage** | ✅ | ❌ | 0% | 100% |
| **appuntamento-06** | ✅ | ❌ | 0% | 100% |
| **servizi** | ✅ | ❌ | 0% | 100% |
| **eventi** | ✅ | ❌ | 0% | 100% |

**Overall**: 12% match  
**Target**: 95%+ match (excluding scripts)

---

## 🔍 What Must Match

### ✅ MUST Match Exactly

1. **Semantic HTML Tags**
   - `<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`
   - Same hierarchy and nesting

2. **Bootstrap Italia Classes**
   - `container`, `row`, `col-lg-8`, etc.
   - `card-wrapper`, `card-space`, `card-bg`
   - `breadcrumb-container`, `breadcrumb-item`

3. **ARIA Attributes**
   - `role="banner"`, `role="navigation"`
   - `aria-label="breadcrumb"`, `aria-current="page"`

4. **Data Attributes**
   - `data-element="topbar"`, `data-toggle="collapse"`

5. **Icon Structure**
   ```html
   <svg class="icon icon-primary">
       <use href="/assets/svg/sprites.svg#icon-name"></use>
   </svg>
   ```

### ❌ DON'T Need to Match

1. **Script Tags**
   - Different JS framework (Livewire vs vanilla)
   - Different bundle structure

2. **Inline Styles**
   - We use external CSS files

3. **Framework Attributes**
   - Livewire: `wire:*`, Alpine: `x-*`
   - These are implementation details

4. **Dynamic IDs**
   - Livewire component IDs
   - Cache-busting attributes

---

## 🏗️ Reference Structure (Argomenti)

```html
<body>
    <!-- Skip Links -->
    <a class="skiplinks" href="#main">Vai al contenuto principale</a>
    
    <!-- Header -->
    <header class="text-white" role="banner">
        <div class="h-10 min-h-10 border-b" style="background-color: var(--agid-primary-dark);">
            <div class="flex items-center justify-between w-full max-w-screen-xl mx-auto">
                <!-- Top bar content -->
            </div>
        </div>
        
        <div class="bg-white border-b">
            <div class="max-w-screen-xl mx-auto px-4 py-4">
                <!-- Logo, Navigation, Search -->
            </div>
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="container" id="main">
        <!-- Breadcrumbs -->
        <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="/it">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Argomenti</li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="row">
            <div class="col">
                <h1>Argomenti</h1>
                <p class="lead">Gli argomenti rispondono a un'esigenza...</p>
            </div>
        </div>
        
        <!-- Topics Grid -->
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Esplora per argomento</h2>
                
                <div class="row g-4">
                    <!-- Topic Cards -->
                    <div class="col-12 col-md-6">
                        <div class="card-wrapper card-space">
                            <div class="card card-bg">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <svg class="icon">...</svg>
                                        Cultura
                                    </h5>
                                    <p class="card-text">...</p>
                                    <a href="#" class="read-more">
                                        <span class="text">Leggi di più</span>
                                        <svg class="icon icon-primary">...</svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="sticky-top">...</aside>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-dark text-white">...</footer>
</body>
```

---

## 🔧 Implementation Plan

### Phase 1: Create Base Layout (4h)

**File**: `laravel/Themes/Sixteen/resources/views/layouts/design-comuni.blade.php`

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FixCity')</title>
    
    <!-- AGID CSS -->
    @vite(['resources/css/app.css'])
</head>
<body>
    {{-- Skip Links --}}
    <a class="skiplinks" href="#main">Vai al contenuto principale</a>
    
    {{-- Header Section --}}
    <x-section slug="header" :data="$headerData ?? []" />
    
    {{-- Main Content --}}
    @yield('content')
    
    {{-- Footer Section --}}
    <x-section slug="footer" :data="$footerData ?? []" />
    
    {{-- AGID JS --}}
    @vite(['resources/js/app.js'])
</body>
</html>
```

### Phase 2: Create Argomenti Page (4h)

**File**: `laravel/Themes/Sixteen/resources/views/pages/tests/argomenti.blade.php`

```blade
@extends('layouts.design-comuni')

@section('title', 'Argomenti - FixCity')

@section('content')
<main class="container" id="main">
    {{-- Breadcrumbs --}}
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="text-decoration-none" href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Argomenti</li>
        </ol>
    </nav>
    
    {{-- Page Title --}}
    <div class="row">
        <div class="col">
            <h1>Argomenti</h1>
            <p class="lead">
                Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti 
                del sito istituzionale per tematiche.
            </p>
        </div>
    </div>
    
    {{-- Topics Grid --}}
    <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Esplora per argomento</h2>
            
            <div class="row g-4">
                @foreach($topics as $topic)
                <div class="col-12 col-md-6">
                    <div class="card-wrapper card-space">
                        <div class="card card-bg">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <svg class="icon icon-primary" aria-hidden="true">
                                        <use href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#icon-' . $topic->icon) }}"></use>
                                    </svg>
                                    {{ $topic->name }}
                                </h5>
                                <p class="card-text">{{ $topic->description }}</p>
                                <a href="{{ $topic->url }}" class="read-more">
                                    <span class="text">Leggi di più</span>
                                    <svg class="icon icon-primary icon-xs" aria-hidden="true">
                                        <use href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#icon-arrow-right') }}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
        {{-- Sidebar --}}
        <div class="col-lg-4">
            <aside class="sticky-top top-100">
                {{-- Sidebar content --}}
            </aside>
        </div>
    </div>
</main>
@endsection
```

### Phase 3: Create Block Views (8h)

**File**: `components/blocks/breadcrumbs/breadcrumbs.blade.php`

```blade
@props(['items' => []])

<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($items as $index => $item)
        <li class="breadcrumb-item {{ $index === count($items) - 1 ? 'active' : '' }}">
            @if($index < count($items) - 1)
                <a class="text-decoration-none" href="{{ $item['url'] }}">
                    {{ $item['label'] }}
                </a>
            @else
                <span aria-current="page">{{ $item['label'] }}</span>
            @endif
        </li>
        @endforeach
    </ol>
</nav>
```

**File**: `components/blocks/topics_grid/topics_grid.blade.php`

```blade
@props(['block'])

<div class="row">
    <div class="col-lg-8">
        <h2 class="mb-4">{{ $block->data['title'] ?? 'Esplora per argomento' }}</h2>
        
        <div class="row g-4">
            @foreach($block->data['topics'] ?? [] as $topic)
            <div class="col-12 col-md-6">
                <div class="card-wrapper card-space">
                    <div class="card card-bg">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg class="icon icon-primary" aria-hidden="true">
                                    <use href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#icon-' . ($topic['icon'] ?? 'star')) }}"></use>
                                </svg>
                                {{ $topic['title'] ?? 'Topic' }}
                            </h5>
                            <p class="card-text">{{ $topic['description'] ?? '' }}</p>
                            <a href="{{ $topic['url'] ?? '#' }}" class="read-more">
                                <span class="text">Leggi di più</span>
                                <svg class="icon icon-primary icon-xs" aria-hidden="true">
                                    <use href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#icon-arrow-right') }}"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
```

### Phase 4: Build & Test (4h)

```bash
# Build assets
cd laravel/Themes/Sixteen
npm run build
npm run copy

# Clear cache
cd /var/www/_bases/base_fixcity_fila5
php artisan view:clear
php artisan cache:clear

# Test
firefox http://fixcity.local/it/tests/argomenti
```

---

## 📊 Verification Checklist

### HTML Structure

- [ ] Same `<body>` structure
- [ ] Same semantic tags
- [ ] Same nesting hierarchy
- [ ] Same ID attributes (main, etc.)

### Classes

- [ ] All Bootstrap Italia classes present
- [ ] Same class order (where applicable)
- [ ] No extra classes
- [ ] No missing classes

### Accessibility

- [ ] All ARIA attributes present
- [ ] All roles defined
- [ ] All labels present
- [ ] All alt text present

### Icons

- [ ] Same SVG structure
- [ ] Same `<use>` references
- [ ] Same icon sprites
- [ ] Same aria-hidden attributes

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Header Analysis** | `docs/design-comuni/screenshots/tests/header-analysis.md` |
| **Build Process** | `docs/BUILD_AND_PUBLISH_PROCESS.md` |
| **Header Scripts** | `docs/HEADER_SCRIPTS_DOCUMENTATION.md` |

---

**Status**: 🟡 **PLAN CREATED**  
**Next**: Execute Phase 1-4 (20h total)  
**Target**: 95%+ HTML match

**HTML matching plan complete! 🎯**
