# 📋 Bootstrap Italia HTML Identical Implementation

**Data**: 2026-03-30  
**Stato**: 📝 **LINEE GUIDA**

## 🎯 Obiettivo

Replicare ESATTAMENTE l'HTML di Bootstrap Italia per tutte le pagine Design Comuni.

## 📐 Regole Fondamentali

### 1. HTML Identical (Body Content)

**REGOLA**: Tutto l'HTML dentro `<body>` (esclusi gli script) deve essere IDENTICO all'originale.

```html
<!-- ORIGINALE -->
<div class="skiplink">
    <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
</div>

<!-- BLADE - DEVE ESSERE IDENTICO -->
<div class="skiplink">
    <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
</div>
```

### 2. Classi CSS Bootstrap Italia

**REGOLA**: Usare ESATTAMENTE le stesse classi CSS.

```html
<!-- ✅ CORRETTO -->
<div class="it-header-wrapper">
<div class="it-header-slim-wrapper">
<div class="container">
<div class="row">
<div class="col-12">

<!-- ❌ SBAGLIATO -->
<div class="header">
<div class="slim-header">
<div class="container mx-auto">
```

### 3. Struttura Annidata

**REGOLA**: Mantenere ESATTAMENTE la stessa struttura annidata.

```html
<!-- ORIGINALE -->
<header class="it-header-wrapper">
  <div class="it-header-slim-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">

<!-- BLADE - STESSA STRUTTURA -->
<header class="it-header-wrapper">
  <div class="it-header-slim-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
```

### 4. Attributi ARIA e Accessibility

**REGOLA**: Mantenere TUTTI gli attributi di accessibilità.

```html
<!-- ✅ CORRETTO - Tutti gli attributi -->
<button type="button" 
        class="nav-link dropdown-toggle" 
        data-bs-toggle="dropdown" 
        aria-expanded="false" 
        aria-controls="languages" 
        aria-haspopup="true">

<!-- ❌ SBAGLIATO - Attributi mancanti -->
<button class="dropdown-toggle">
```

### 5. SVG Sprites

**REGOLA**: Usare ESATTAMENTE gli stessi SVG sprites.

```html
<!-- ✅ CORRETTO -->
<svg class="icon">
    <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-expand"></use>
</svg>

<!-- ❌ SBAGLIATO -->
<x-heroicon-o-chevron-down />
```

## 📁 Struttura Template

### Layout Principale
```blade
{{-- resources/views/layouts/bootstrap-italia.blade.php --}}
<!doctype html>
<html lang="it">
<head>
    {{-- Meta tags --}}
    <link rel="stylesheet" href="/themes/sixteen/bootstrap-italia/dist/css/bootstrap-italia.min.css">
</head>
<body>
    @yield('content')
    <script src="/themes/sixteen/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js"></script>
</body>
</html>
```

### Pagina Singola
```blade
{{-- resources/views/design-comuni/pages/argomenti.blade.php --}}
@extends('pub_theme::layouts.bootstrap-italia')

@section('content')
{{-- Skip Links --}}
<div class="skiplink">
    <a href="#main-container">Vai ai contenuti</a>
</div>

{{-- Header --}}
@include('pub_theme::bootstrap-italia.header')

{{-- Main --}}
<main>
    {{-- Breadcrumb --}}
    <div class="container">
        <nav class="breadcrumb">...</nav>
    </div>
    
    {{-- Hero --}}
    <div class="cmp-hero">...</div>
    
    {{-- Content --}}
    <div class="container py-5">...</div>
</main>

{{-- Footer --}}
@include('pub_theme::footer-comune')
@endsection
```

## 🔧 Componenti Richiesti

### Header Component
**File**: `bootstrap-italia/header.blade.php`

**Struttura**:
1. `it-header-slim-wrapper` (Regione, Lingua, Login)
2. `it-header-center-wrapper` (Logo, Social, Search)
3. `it-header-navbar-wrapper` (Menu)

### Footer Component
**File**: `footer-comune.blade.php`

**Struttura**:
1. `it-footer-main`
2. `it-footer-secondary`
3. `it-footer-bottom`

### Breadcrumb Component
**File**: `bootstrap-italia/breadcrumb.blade.php`

**Struttura**:
```html
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb p-0">
        <li class="breadcrumb-item">...</li>
    </ol>
</nav>
```

## 📊 Checklist Implementazione

Per ogni pagina:

- [ ] Copiare HTML originale
- [ ] Mantenere tutte le classi CSS
- [ ] Mantenere struttura annidata
- [ ] Mantenere attributi ARIA
- [ ] Usare SVG sprites Bootstrap Italia
- [ ] Testare accessibilità
- [ ] Testare responsive
- [ ] Verificare con diff HTML

## 🎯 Pagine da Implementare

### Priority 1 - Generali (9)
- [x] `argomenti.blade.php` - In corso
- [ ] `homepage.blade.php`
- [ ] `argomento.blade.php`
- [ ] `domande-frequenti.blade.php`
- [ ] `risultati-ricerca.blade.php`
- [ ] `lista-risorse.blade.php`
- [ ] `lista-categorie.blade.php`
- [ ] `lista-risorse-categorie.blade.php`
- [ ] `mappa-sito.blade.php`

### Priority 2 - Altre (30)
... (tutte le altre pagine)

## 🔍 Strumenti di Verifica

### 1. HTML Diff
```bash
diff -u /tmp/original-body.html /tmp/fixcity-body.html
```

### 2. Accessibility Audit
```bash
# Usare Lighthouse o axe-devtools
# Verificare WCAG 2.1 AA
```

### 3. Visual Regression
```bash
# Screenshot comparison
# Percy, Chromatic, o simili
```

## 📚 Riferimenti

### Originali
- [Design Comuni Argomenti](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Bootstrap Italia Documentation](https://italia.github.io/bootstrap-italia/)

### File Template
- `layouts/bootstrap-italia.blade.php`
- `bootstrap-italia/header.blade.php`
- `design-comuni/pages/argomenti.blade.php`

---

**Regola d'Oro**: L'HTML dentro `<body>` deve essere IDENTICO all'originale Bootstrap Italia!
