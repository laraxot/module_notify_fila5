# Header Structure Analysis: Design Comuni vs Current Implementation

## Reference: `https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html`

## Regola Fondamentale

> **L'HTML dentro `<body>` (esclusi gli script) delle pagine fixcity DEVE essere uguale
> all'HTML dentro `<body>` delle corrispondenti pagine design-comuni-pagine-statiche.**
>
> I `<script>` vengono sostituiti da Alpine.js + Livewire + Tailwind CSS.
> Il CSS viene sostituito da Tailwind CSS utility classes.

---

## 1. Reference Header Structure (design-comuni)

```html
<header class="it-header-wrapper" data-bs-target="#header-nav-wrapper">

  <!-- Layer 1: Slim Bar -->
  <div class="it-header-slim-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="it-header-slim-wrapper-content">
            <a class="d-lg-block navbar-brand" href="#">
              Nome della Regione
            </a>
            <div class="it-header-slim-right-zone" role="navigation">
              <!-- Language dropdown -->
              <!-- Login button -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Layer 2+3: Nav Wrapper -->
  <div class="it-nav-wrapper">
    <!-- Layer 2: Center (Brand) -->
    <div class="it-header-center-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="it-header-center-content-wrapper">
              <div class="it-brand-wrapper">
                <a href="homepage.html">
                  <svg class="icon">...</svg>
                  <div class="it-brand-text">
                    <div class="it-brand-title">Il mio Comune</div>
                    <div class="it-brand-tagline">Un comune da vivere</div>
                  </div>
                </a>
              </div>
              <div class="it-right-zone">
                <div class="it-socials">
                  <span>Seguici su</span>
                  <ul>Twitter, Facebook, YouTube, Telegram, WhatsApp, RSS</ul>
                </div>
                <div class="it-search-wrapper">
                  <span>Cerca</span>
                  <button class="search-link rounded-icon">...</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Layer 3: Navbar -->
    <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="navbar navbar-expand-lg has-megamenu">
              <!-- Mobile toggle -->
              <button class="custom-navbar-toggler">...</button>
              <div class="navbar-collapsable" id="nav4">
                <div class="overlay"></div>
                <div class="close-div">...</div>
                <div class="menu-wrapper">
                  <a class="logo-hamburger">...</a>
                  <!-- Primary nav -->
                  <nav aria-label="Principale">
                    <ul class="navbar-nav" data-element="main-navigation">
                      <li><a href="#">Amministrazione</a></li>
                      <li><a href="#">Novità</a></li>
                      <li><a href="#">Servizi</a></li>
                      <li><a href="#">Vivere il Comune</a></li>
                    </ul>
                  </nav>
                  <!-- Secondary nav -->
                  <nav aria-label="Secondaria">
                    <ul class="navbar-nav navbar-secondary">
                      <li><a href="#">Iscrizioni</a></li>
                      <li><a href="#">Estate in città</a></li>
                      <li><a href="#">Polizia locale</a></li>
                      <li><a href="#">Tutti gli argomenti <icon></a></li>
                    </ul>
                  </nav>
                  <!-- Social (mobile) -->
                  <div class="it-socials">...</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
```

### Key CSS classes from Bootstrap Italia:
- `it-header-wrapper` - Main header container
- `it-header-slim-wrapper` - Top thin bar
- `it-header-slim-wrapper-content` - Slim bar content flex
- `it-header-slim-right-zone` - Slim bar right side
- `it-nav-wrapper` - Wraps center + navbar
- `it-header-center-wrapper` - Brand section
- `it-header-center-content-wrapper` - Brand content flex
- `it-brand-wrapper` - Logo + title wrapper
- `it-brand-text` / `it-brand-title` / `it-brand-tagline` - Brand text
- `it-right-zone` - Right side (socials + search)
- `it-socials` - Social icons list
- `it-search-wrapper` - Search button area
- `it-header-navbar-wrapper` - Navigation section
- `navbar-collapsable` - Collapsible nav
- `menu-wrapper` - Nav links container
- `navbar-nav` / `navbar-secondary` - Primary / secondary nav lists
- `logo-hamburger` - Mobile logo

### Key data attributes:
- `data-element="main-navigation"` - Primary nav
- `data-element="all-topics"` - "Tutti gli argomenti" link
- `data-element="management"` / `news` / `all-services` / `live` - Nav items
- `data-element="personal-area-login"` - Login button

---

## 2. Current Implementation (fixcity)

File: `Themes/Sixteen/resources/views/components/sections/header.blade.php`

**Problemi identificati:**

### 2.1 Manca Skiplink
La reference ha `<div class="skiplink">` PRIMA dell'header. Noi non lo abbiamo.

### 2.2 Header non usa classi Bootstrap Italia
Usiamo classi Tailwind custom (`var(--agid-primary)`) invece di classi BI (`it-header-wrapper`).

### 2.3 Struttura non corrisponde
La nostra header ha 3 divs separati, la reference usa nested `it-header-slim-wrapper` > `it-nav-wrapper` > `it-header-center-wrapper` + `it-header-navbar-wrapper`.

### 2.4 Social icons sbagliati
La reference usa: Twitter, Facebook, YouTube, Telegram, WhatsApp, RSS
Noi usiamo: Facebook, Twitter, Instagram, LinkedIn

### 2.5 Ricerca
La reference ha un bottone search che apre un modal. Noi abbiamo un bottone inline.

### 2.6 Navigation
La reference ha primary + secondary nav con `data-element` attributes. Noi abbiamo solo una lista flat.

---

## 3. Piano di Correzione

### Step 1: Skiplink Component
Creare `components/blocks/navigation/skiplink.blade.php`

### Step 2: Header Slim Block
Rifattorizzare la top bar come `components/blocks/navigation/header-slim.blade.php`
con struttura HTML identica alla reference.

### Step 3: Header Center Block  
Rifattorizzare la brand section come `components/blocks/navigation/header-center.blade.php`

### Step 4: Header Navbar Block
Rifattorizzare la navigation come `components/blocks/navigation/header-navbar.blade.php`

### Step 5: Header Wrapper
Aggiornare `components/sections/header.blade.php` per usare i nuovi blocks
con struttura HTML identica alla reference.

### Step 6: CSS
Aggiungere le classi Bootstrap Italia compatibili al CSS del tema.

### Step 7: Test
Verificare che l'HTML output sia identico alla reference.

---

## 4. Differenze Blocco per Blocco

### Breadcrumb
| Reference | Nostro |
|-----------|--------|
| `cmp-breadcrumbs` | `navigation.breadcrumb` |
| `<ol class="breadcrumb">` | `<ol class="flex items-center space-x-2">` |
| Container `col-12 col-lg-10` | `container mx-auto px-4` |
| `<span class="separator">/</span>` | `<li class="text-gray-400">/</li>` |

### Hero
| Reference | Nostro |
|-----------|--------|
| `cmp-hero` > `it-hero-wrapper` | `hero.page-intro` |
| `it-hero-text-wrapper pt-0 ps-0 pb-4 pb-lg-60` | `max-w-3xl` |
| `<h1 class="text-black" data-element="page-name">` | `<h1 class="text-4xl font-bold">` |
| `hero-text` per subtitle | `text-lg leading-8` |

### Topics Grid
| Reference | Nostro |
|-----------|--------|
| `cmp-card-simple card-wrapper` | `topics.grid` custom |
| `card shadow-sm rounded` | `rounded-3xl border` |
| `card-title t-primary title-xlarge` | `text-xl font-semibold` |
| `text-secondary description` | `text-sm text-slate-600` |
| `<h2 class="title-xxlarge mb-4">` | eyebrow + h2 inside section |

---

**Ultimo aggiornamento**: 2026-03-30
