# 🎯 HTML Structure Matching - Argomenti Page

**Date**: 2026-03-30  
**Goal**: Make FixCity HTML match Design Comuni HTML (excluding scripts)  
**Reference**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html  
**Target**: http://fixcity.local/it/tests/argomenti

---

## 📊 Analysis Approach

### What We Match

✅ **Structure HTML**:
- Header tags (`<header>`, `<nav>`, etc.)
- Content tags (`<main>`, `<section>`, `<article>`, etc.)
- Class names (Bootstrap Italia classes)
- ARIA attributes
- Data attributes

❌ **What We Don't Match**:
- `<script>` tags (different JS frameworks)
- Inline `<style>` tags (we use external CSS)
- Livewire attributes (wire:*, x-*)
- Dynamic content IDs

---

## 🏗️ Reference HTML Structure

### Design Comuni Argomenti

```html
<body>
    <!-- Skip Links -->
    <a class="skiplinks" href="#main">...</a>
    
    <!-- Header -->
    <header class="text-white" role="banner">
        <div class="h-10 min-h-10 border-b" style="background-color: var(--agid-primary-dark);">
            <!-- Top bar content -->
        </div>
        
        <div class="bg-white">
            <!-- Main header content -->
        </div>
    </header>
    
    <!-- Main Content -->
    <main class="container" id="main">
        <!-- Breadcrumbs -->
        <nav class="breadcrumb-container" aria-label="breadcrumb">...</nav>
        
        <!-- Page Title -->
        <div class="row">
            <div class="col">
                <h1>Argomenti</h1>
                <p class="lead">...</p>
            </div>
        </div>
        
        <!-- Topics Grid -->
        <div class="row">
            <div class="col">
                <div class="card-wrapper card-space">
                    <div class="card card-bg">
                        <!-- Topic cards -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-dark text-white">
        <!-- Footer content -->
    </footer>
</body>
```

---

## 🔧 Implementation Strategy

### Option 1: Pure HTML/Blade (Recommended)

**Approach**: Create Blade template that outputs exact HTML structure

**File**: `laravel/Themes/Sixteen/resources/views/pages/tests/argomenti.blade.php`

```blade
@extends('layouts.app')

@section('content')
{{-- Skip Links --}}
<a class="skiplinks" href="#main">Vai al contenuto principale</a>

{{-- Header --}}
<x-section slug="header" />

{{-- Main Content --}}
<main class="container" id="main">
    {{-- Breadcrumbs --}}
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Argomenti</li>
        </ol>
    </nav>
    
    {{-- Page Title --}}
    <div class="row">
        <div class="col">
            <h1>Argomenti</h1>
            <p class="lead">Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti del sito istituzionale per tematiche.</p>
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
                                    <svg class="icon">...</svg>
                                    {{ $topic->name }}
                                </h5>
                                <p class="card-text">{{ $topic->description }}</p>
                                <a href="{{ $topic->url }}" class="read-more">
                                    <span class="text">Leggi di più</span>
                                    <svg class="icon">...</svg>
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
            <aside class="sticky-top">
                {{-- Sidebar content --}}
            </aside>
        </div>
    </div>
</main>

{{-- Footer --}}
<x-section slug="footer" />
@endsection
```

### Option 2: JSON Block System (Current)

**Approach**: Use existing JSON block system but ensure output matches

**File**: `laravel/config/local/fixcity/database/content/pages/tests.argomenti.json`

```json
{
    "slug": "tests.argomenti",
    "content_blocks": {
        "it": [
            {
                "type": "breadcrumbs",
                "data": {
                    "items": [
                        {"label": "Home", "url": "/it"},
                        {"label": "Argomenti"}
                    ]
                }
            },
            {
                "type": "page_header",
                "data": {
                    "title": "Argomenti",
                    "lead": "Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti del sito istituzionale per tematiche."
                }
            },
            {
                "type": "topics_grid",
                "data": {
                    "title": "Esplora per argomento",
                    "topics": [...]
                }
            }
        ]
    }
}
```

**Block View**: `components/blocks/topics_grid/topics_grid.blade.php`

```blade
@props(['block'])

<div class="row">
    <div class="col-lg-8">
        <h2 class="mb-4">{{ $block->data['title'] }}</h2>
        
        <div class="row g-4">
            @foreach($block->data['topics'] as $topic)
            <div class="col-12 col-md-6">
                <div class="card-wrapper card-space">
                    <div class="card card-bg">
                        <div class="card-body">
                            <h5 class="card-title">
                                <svg class="icon" aria-hidden="true">
                                    <use href="/themes/Sixteen/assets/svg/sprites.svg#icon-{{ $topic['icon'] }}"></use>
                                </svg>
                                {{ $topic['title'] }}
                            </h5>
                            <p class="card-text">{{ $topic['description'] }}</p>
                            <a href="{{ $topic['url'] }}" class="read-more">
                                <span class="text">Leggi di più</span>
                                <svg class="icon icon-primary icon-xs" aria-hidden="true">
                                    <use href="/themes/Sixteen/assets/svg/sprites.svg#icon-arrow-right"></use>
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

---

## 📋 Checklist for HTML Matching

### Header Section

- [ ] Same `<header>` tag with `role="banner"`
- [ ] Same top bar structure
- [ ] Same main header structure
- [ ] Same navigation structure
- [ ] Same class names (Bootstrap Italia)

### Main Content

- [ ] Same `<main>` tag with `id="main"`
- [ ] Same container structure (`<div class="container">`)
- [ ] Same grid structure (`<div class="row">`)
- [ ] Same column structure (`<div class="col-lg-8">`)
- [ ] Same heading hierarchy (h1 → h2)
- [ ] Same ARIA attributes

### Components

- [ ] Breadcrumbs: same `<nav class="breadcrumb-container">`
- [ ] Cards: same `<div class="card-wrapper card-space">`
- [ ] Icons: same `<svg class="icon">` structure
- [ ] Links: same `<a class="read-more">` structure

### Footer

- [ ] Same `<footer>` tag
- [ ] Same structure
- [ ] Same class names

---

## 🔄 Multi-Agent Task Distribution

### Agent A (Frontend Specialist)
**Task**: Create Blade templates with exact HTML structure
- [ ] argomenti.blade.php
- [ ] homepage.blade.php
- [ ] appuntamento-*.blade.php
**ETA**: 8h

### Agent B (Block Developer)
**Task**: Update block views to match HTML
- [ ] topics_grid block
- [ ] breadcrumbs block
- [ ] page_header block
**ETA**: 6h

### Agent C (QA Specialist)
**Task**: Verify HTML match
- [ ] Compare structures
- [ ] Check class names
- [ ] Verify ARIA attributes
**ETA**: 4h

### Agent D (Documentation)
**Task**: Document HTML patterns
- [ ] Create HTML pattern guide
- [ ] Document Bootstrap Italia classes
- [ ] Create component catalog
**ETA**: 4h

**Total ETA**: 22h (parallel work possible)

---

## 📊 Progress Tracking

| Page | Reference | FixCity | Match % | Status |
|------|-----------|---------|---------|--------|
| **argomenti** | ✅ | 🟡 | 60% | In Progress |
| **homepage** | ✅ | ❌ | 0% | Pending |
| **appuntamento-06** | ✅ | ❌ | 0% | Pending |
| **servizi** | ✅ | ❌ | 0% | Pending |
| **eventi** | ✅ | ❌ | 0% | Pending |

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Header Analysis** | `docs/design-comuni/screenshots/tests/header-analysis.md` |
| **Build Process** | `docs/BUILD_AND_PUBLISH_PROCESS.md` |
| **Header Scripts** | `docs/HEADER_SCRIPTS_DOCUMENTATION.md` |

---

**Status**: 🟡 **ANALYSIS COMPLETE**  
**Next**: Create Blade templates with exact HTML match  
**ETA**: 22h total

**HTML matching analysis complete! 🎯**
