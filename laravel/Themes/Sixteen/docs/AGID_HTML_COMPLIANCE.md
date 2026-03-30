# 🎯 AGID HTML Compliance Requirement

**Version**: 1.0  
**Created**: 2026-03-30  
**Status**: 🔴 Critical Requirement  
**Owner**: Multi-Agent Team

---

## 🚨 Golden Rule

> **L'HTML dentro `<body>` (esclusi script) di FixCity deve essere IDENTICO all'upstream AGID.**

**URL di Riferimento**:
- Upstream: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html
- FixCity: http://fixcity.local/it/tests/argomenti

**Scope**:
- ✅ Tutti i tag dentro `<body>`
- ✅ Classi CSS (nomi esatti)
- ✅ Attributi data-*
- ✅ Attributi ARIA
- ✅ Gerarchia di nesting
- ✅ Testo in italiano
- ❌ Esclusi: `<script>` tags

---

## 📊 Compliance Checklist

### Header Section

| Element | Upstream Class | FixCity Class | Match |
|---------|---------------|---------------|-------|
| Top Bar Wrapper | `it-header-slim-wrapper` | ? | 🔴 |
| Main Header Wrapper | `it-header-main-wrapper` | ? | 🔴 |
| Brand Container | `it-brand-wrapper` | ? | 🔴 |
| Navbar | `navbar navbar-expand-lg` | ? | 🔴 |

### Navigation

| Element | Upstream Class | FixCity Class | Match |
|---------|---------------|---------------|-------|
| Nav Container | `container` | ? | 🔴 |
| Nav Item | `nav-item` | ? | 🔴 |
| Nav Link | `nav-link` | ? | 🔴 |
| Toggler | `custom-navbar-toggler` | ? | 🔴 |

### Main Content

| Element | Upstream Class | FixCity Class | Match |
|---------|---------------|---------------|-------|
| Breadcrumb | `breadcrumb` | ? | 🔴 |
| Page Title | `h1` (uppercase) | ? | 🔴 |
| Content Section | `py-8` | ? | 🔴 |
| Cards Grid | `grid-cols-3` | ? | 🔴 |

### Footer

| Element | Upstream Class | FixCity Class | Match |
|---------|---------------|---------------|-------|
| Footer Wrapper | `it-footer-wrapper` | ? | 🔴 |
| Footer Columns | `col-md-3` | ? | 🔴 |
| Social Icons | `icon-sm` | ? | 🔴 |

---

## 🔍 HTML Comparison Method

### Step 1: Fetch Upstream HTML

```bash
# Fetch upstream body (exclude scripts)
curl -s "https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html" \
  | sed -n '/<body/,/<\/body>/p' \
  | sed 's/<script[^>]*>.*<\/script>//g' \
  > /tmp/upstream-body.html
```

### Step 2: Fetch FixCity HTML

```bash
# Fetch FixCity body (exclude scripts)
curl -s "http://fixcity.local/it/tests/argomenti" \
  | sed -n '/<body/,/<\/body>/p' \
  | sed 's/<script[^>]*>.*<\/script>//g' \
  > /tmp/fixcity-body.html
```

### Step 3: Compare

```bash
# Diff with line numbers
diff -u /tmp/upstream-body.html /tmp/fixcity-body.html | head -100
```

### Step 4: Validate Classes

```bash
# Extract all classes from upstream
grep -oP 'class="\K[^"]+' /tmp/upstream-body.html | sort -u > /tmp/upstream-classes.txt

# Extract all classes from FixCity
grep -oP 'class="\K[^"]+' /tmp/fixcity-body.html | sort -u > /tmp/fixcity-classes.txt

# Find missing classes
comm -23 /tmp/upstream-classes.txt /tmp/fixcity-classes.txt
```

---

## 📋 Required HTML Structure

### Complete Body Structure (Upstream)

```html
<body>
  <!-- Skip Links -->
  <a class="skip-link" href="#main-content">Vai ai contenuti</a>
  <a class="skip-link" href="#footer">Vai al footer</a>

  <!-- Header Wrapper -->
  <div class="it-header-wrapper">
    
    <!-- Header Slim (Top Bar) -->
    <div class="it-header-slim-wrapper">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <!-- Region -->
          <a href="#" class="it-header-slim-link">
            <span class="text-small">Nome della Regione</span>
          </a>
          
          <!-- Utilities -->
          <div class="d-flex align-items-center">
            <!-- Language -->
            <div class="dropdown">
              <button class="btn btn-link dropdown-toggle">ITA</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">ITA</a></li>
                <li><a class="dropdown-item" href="#">ENG</a></li>
              </ul>
            </div>
            
            <!-- Login -->
            <a href="#" class="it-header-slim-link">
              <span class="text-small">Accedi all'area personale</span>
            </a>
            
            <!-- Social Icons -->
            <div class="d-flex gap-2">
              <a href="#" class="text-link">
                <svg class="icon icon-sm"><use href="#it-twitter"></use></svg>
              </a>
              <!-- ... 5 more social icons -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Main -->
    <div class="it-header-main-wrapper">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
          <!-- Brand -->
          <div class="it-brand-wrapper">
            <a href="/">
              <img src="logo.svg" alt="Logo" class="icon">
              <div class="it-brand-text">
                <h2 class="h5 mb-0">Il mio Comune</h2>
                <p class="text-small mb-0">Un comune da vivere</p>
              </div>
            </a>
          </div>
          
          <!-- Comune Name -->
          <div class="d-none d-lg-block">
            <h3 class="h6 mb-0">Nome del Comune</h3>
          </div>
          
          <!-- Search + Social -->
          <div class="d-flex align-items-center gap-3">
            <button class="btn btn-search" data-bs-toggle="modal" data-bs-target="#searchModal">
              <svg class="icon"><use href="#it-search"></use></svg>
              <span class="d-none d-lg-inline">Cerca</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <button class="custom-navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/amministrazione">Amministrazione</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/novita">Novità</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/servizi">Servizi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/vivere-comune">Vivere il Comune</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Main Content -->
  <main id="main-content">
    
    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="Percorso di navigazione">
      <ol class="breadcrumb-list">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <span>Lista Argomenti</span>
        </li>
      </ol>
    </nav>

    <!-- Page Content -->
    <div class="container py-8">
      
      <!-- Page Title -->
      <h1 class="text-uppercase mb-4">ARGOMENTI</h1>
      
      <!-- Intro Text -->
      <p class="mb-6">
        Gli argomenti rispondono a un'esigenza di organizzazione dei contenuti 
        del sito istituzionale per temi e rappresentano le principali categorie 
        di contenuti, informazioni e documenti specifici.
      </p>

      <!-- Featured Section -->
      <div class="mb-8">
        <h2 class="text-uppercase mb-4">IN EVIDENZA</h2>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title text-uppercase">CULTURA</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title text-uppercase">SPORT</h3>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title text-uppercase">FAMIGLIA</h3>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Topics Grid -->
      <div>
        <h2 class="text-uppercase mb-4">ESPLORA PER ARGOMENTO</h2>
        <div class="row g-4">
          <!-- 18+ topic cards -->
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title text-uppercase mb-2">AGRICOLTURA</h3>
                <p class="card-text">Lorem ipsum dolor sit amet...</p>
              </div>
            </div>
          </div>
          <!-- ... more topics -->
        </div>
      </div>

    </div>
  </main>

  <!-- Footer -->
  <footer class="it-footer">
    <!-- Footer content -->
  </footer>

</body>
```

---

## 🛠️ Implementation Strategy

### Phase 1: Create Bootstrap Italia Components

**Files to Create**:
1. `resources/views/components/bootstrap-italia/header-slim.blade.php`
2. `resources/views/components/bootstrap-italia/header-main.blade.php`
3. `resources/views/components/bootstrap-italia/navbar.blade.php`
4. `resources/views/components/bootstrap-italia/breadcrumb.blade.php`
5. `resources/views/components/bootstrap-italia/footer.blade.php`

### Phase 2: Update Layout

**File**: `resources/views/layouts/app.blade.php`

**Change**:
```blade
{{-- BEFORE --}}
<body>
  <x-header />
  @yield('content')
  <x-footer />
</body>

{{-- AFTER --}}
<body>
  <x-bootstrap-italia.header-slim />
  <x-bootstrap-italia.header-main />
  <x-bootstrap-italia.navbar />
  
  <main id="main-content">
    @yield('content')
  </main>
  
  <x-bootstrap-italia.footer />
</body>
```

### Phase 3: Update Page Templates

**File**: `resources/views/pages/tests/[slug].blade.php`

**Change**:
```blade
{{-- BEFORE --}}
<div>
  <x-page side="content" :slug="$pageSlug" :data="$data" />
</div>

{{-- AFTER --}}
<div class="container py-8">
  <x-bootstrap-italia.breadcrumb />
  
  <h1 class="text-uppercase mb-4">{{ $title }}</h1>
  
  @foreach($content_blocks as $block)
    @include($block['view'], $block['data'])
  @endforeach
</div>
```

### Phase 4: Build & Verify

```bash
# 1. Build assets
npm run build

# 2. Copy to public
npm run copy

# 3. Clear cache
cd ../../../laravel
php artisan view:clear
php artisan cache:clear

# 4. Fetch and compare
curl -s "http://fixcity.local/it/tests/argomenti" > /tmp/fixcity.html
curl -s "https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html" > /tmp/upstream.html

# 5. Compare (exclude scripts)
diff <(sed 's/<script[^>]*>.*<\/script>//g' /tmp/upstream.html) \
     <(sed 's/<script[^>]*>.*<\/script>//g' /tmp/fixcity.html)
```

---

## 📊 Compliance Metrics

| Metric | Target | Current | Status |
|--------|--------|---------|--------|
| HTML Structure Match | 100% | 0% | 🔴 |
| CSS Classes Match | 100% | 0% | 🔴 |
| ARIA Attributes | 100% | 0% | 🔴 |
| Data Attributes | 100% | 0% | 🔴 |
| Text Content (IT) | 100% | 50% | 🟡 |
| Accessibility | WCAG 2.1 AA | TBD | 🔴 |

---

## 🤖 Multi-Agent Coordination

**OpenViking Context**:
```bash
openviking add-memory "AGID HTML compliance: Body HTML must match upstream exactly (excluding scripts). Bootstrap Italia classes required."
```

**GSD Phase**: `.planning/phases/08-agid-html-compliance/`

**Agents**:
- **gsd-codebase-mapper**: Analyze HTML structure
- **gsd-ui-auditor**: Visual + structural audit
- **gsd-executor**: Implement fixes
- **gsd-verifier**: Validate compliance

---

## 📚 Related Documentation

- [Header Analysis & Fix Plan](./design-comuni/screenshots/HEADER_ANALYSIS_FIX_PLAN.md)
- [Build Scripts](./BUILD_SCRIPTS.md)
- [Folio + Volt Philosophy](./design-comuni/FOLIO_VOLT_PHILOSOPHY.md)
- [Universal Block Types](./design-comuni/UNIVERSAL_BLOCK_TYPES_TAXONOMY.md)

---

**Last Updated**: 2026-03-30  
**Priority**: 🔴 **CRITICAL**  
**Owner**: Multi-Agent Team
