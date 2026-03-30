# 🧩 Universal Block Types - Design System

**Data**: 2026-03-30  
**Versione**: 1.0.0  
**Stato**: Documento Maestro

## 🎯 Filosofia

I blocchi devono essere **UNIVERSALI** e **RIUTILIZZABILI**, non specifici per pagina.

**CONVENTION**:
```
✅ CORRETTO: pub_theme::components.blocks.hero.hero
✅ CORRETTO: pub_theme::components.blocks.features.grid
✅ CORRETTO: pub_theme::components.blocks.cards.grid

❌ SBAGLIATO: pub_theme::components.blocks.tests.argomenti.topics-grid
❌ SBAGLIATO: pub_theme::components.blocks.homepage.hero
```

## 📚 Block Types Universali

### 1. HERO Blocks
**File**: `components/blocks/hero/{hero,main,enhanced}.blade.php`

**Ispirazione**: 
- Flowbite: Hero Sections (12 variants)
- Tailwind UI: Hero sections
- DaisyUI: Hero

**Props**:
```php
@props([
    'title' => '',
    'subtitle' => '',
    'content' => '',
    'image' => '',
    'background_color' => 'bg-white',
    'text_color' => 'text-gray-900',
    'cta_text' => '',
    'cta_link' => '',
    'cta_color' => 'bg-blue-600'
])
```

**JSON Example**:
```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.hero",
        "title": "Benvenuto",
        "subtitle": "Un comune da vivere",
        "content": "<p>Scopri i servizi</p>",
        "cta_text": "Scopri di più",
        "cta_link": "/servizi"
    }
}
```

### 2. FEATURES Blocks
**File**: `components/blocks/features/{grid,list,sidebar}.blade.php`

**Ispirazione**:
- Flowbite: Feature Sections (15 variants)
- Tailwind UI: Feature sections
- DaisyUI: Card

**Props**:
```php
@props([
    'title' => '',
    'sections' => [], // [{title, description, icon}]
    'columns' => 3
])
```

**JSON Example**:
```json
{
    "type": "features",
    "data": {
        "view": "pub_theme::components.blocks.features.grid",
        "title": "Servizi in evidenza",
        "sections": [
            {
                "title": "Servizi Digitali",
                "description": "Accedi ai servizi online",
                "icon": "it-services"
            }
        ]
    }
}
```

### 3. CARDS Blocks
**File**: `components/blocks/cards/{grid,list,masonry}.blade.php`

**Ispirazione**:
- Flowbite: Card components
- Tailwind UI: Cards
- DaisyUI: Card

**Props**:
```php
@props([
    'title' => '',
    'cards' => [], // [{title, description, image, url}]
    'layout' => 'grid',
    'columns' => 3
])
```

**JSON Example**:
```json
{
    "type": "cards",
    "data": {
        "view": "pub_theme::components.blocks.cards.grid",
        "title": "Argomenti",
        "cards": [
            {
                "title": "Iscrizioni",
                "description": "Servizi per iscrizioni",
                "url": "/argomento/iscrizioni"
            }
        ]
    }
}
```

### 4. LINKS Blocks
**File**: `components/blocks/links/{grid,list,navigation}.blade.php`

**Ispirazione**:
- Flowbite: Stacked Lists
- Tailwind UI: Link lists
- DaisyUI: Menu

**Props**:
```php
@props([
    'title' => '',
    'links' => [], // [{label, url, description, meta}]
    'layout' => 'list'
])
```

**JSON Example**:
```json
{
    "type": "links",
    "data": {
        "view": "pub_theme::components.blocks.links.list",
        "title": "Ultime notizie",
        "links": [
            {
                "label": "Notizia 1",
                "url": "/notizia/1",
                "description": "Descrizione",
                "meta": "18 mag 2026"
            }
        ]
    }
}
```

### 5. CTA Blocks
**File**: `components/blocks/cta/{default,banner,inline}.blade.php`

**Ispirazione**:
- Flowbite: CTA Sections (11 variants)
- Tailwind UI: CTA sections
- DaisyUI: Card + Button

**Props**:
```php
@props([
    'title' => '',
    'description' => '',
    'button_text' => '',
    'button_url' => '',
    'button_color' => 'bg-blue-600'
])
```

**JSON Example**:
```json
{
    "type": "cta",
    "data": {
        "view": "pub_theme::components.blocks.cta.default",
        "title": "Hai bisogno di aiuto?",
        "description": "Contattaci",
        "button_text": "Contatta",
        "button_url": "/contatti"
    }
}
```

### 6. INFO Blocks
**File**: `components/blocks/info/{default,grid,accordion}.blade.php`

**Ispirazione**:
- Flowbite: FAQs (7 variants)
- Tailwind UI: Info sections
- DaisyUI: Accordion

**Props**:
```php
@props([
    'title' => '',
    'items' => [], // [{icon, title, description}]
    'layout' => 'grid'
])
```

**JSON Example**:
```json
{
    "type": "info",
    "data": {
        "view": "pub_theme::components.blocks.info.default",
        "title": "Come cercare",
        "items": [
            {
                "icon": "search",
                "title": "Usa la ricerca",
                "description": "Cerca per parola chiave"
            }
        ]
    }
}
```

### 7. STATS Blocks
**File**: `components/blocks/stats/{default,overview,horizontal}.blade.php`

**Ispirazione**:
- Flowbite: Stats (8 variants)
- Tailwind UI: Stats
- DaisyUI: Stat

**Props**:
```php
@props([
    'title' => '',
    'stats' => [], // [{label, value, icon, change}]
    'layout' => 'grid'
])
```

**JSON Example**:
```json
{
    "type": "stats",
    "data": {
        "view": "pub_theme::components.blocks.stats.default",
        "title": "Il Comune in numeri",
        "stats": [
            {
                "label": "Abitanti",
                "value": "50.000",
                "icon": "users"
            }
        ]
    }
}
```

### 8. CONTACT Blocks
**File**: `components/blocks/contact/{default,card,form}.blade.php`

**Ispirazione**:
- Flowbite: Contact Sections (7 variants)
- Tailwind UI: Contact
- DaisyUI: Card

**Props**:
```php
@props([
    'title' => '',
    'office' => '',
    'address' => '',
    'phone' => '',
    'email' => '',
    'hours' => ''
])
```

**JSON Example**:
```json
{
    "type": "contact",
    "data": {
        "view": "pub_theme::components.blocks.contact.default",
        "title": "Contatti",
        "office": "Ufficio Anagrafe",
        "phone": "0123 456789",
        "email": "anagrafe@comune.it"
    }
}
```

### 9. BREADCRUMB Blocks
**File**: `components/blocks/breadcrumb/{default,minimal}.blade.php`

**Ispirazione**:
- Flowbite: Breadcrumbs (4 variants)
- Tailwind UI: Breadcrumbs
- DaisyUI: Breadcrumbs

**Props**:
```php
@props([
    'items' => [], // [{label, url}]
    'style' => 'default'
])
```

**JSON Example**:
```json
{
    "type": "breadcrumb",
    "data": {
        "view": "pub_theme::components.blocks.breadcrumb.default",
        "items": [
            {"label": "Home", "url": "/"},
            {"label": "Argomenti", "url": null}
        ]
    }
}
```

### 10. PARAGRAPH Blocks
**File**: `components/blocks/paragraph/{default,rich,centered}.blade.php`

**Ispirazione**:
- Flowbite: Content Sections (7 variants)
- Tailwind UI: Text sections
- DaisyUI: Typography

**Props**:
```php
@props([
    'content' => '',
    'class' => ''
])
```

**JSON Example**:
```json
{
    "type": "paragraph",
    "data": {
        "view": "pub_theme::components.blocks.paragraph.default",
        "content": "<p>Contenuto del paragrafo</p>",
        "class": "text-lg"
    }
}
```

## 📋 Block Types Completa

| Tipo | File Base | Ispirazione | Uso |
|------|-----------|-------------|-----|
| **hero** | `hero/hero.blade.php` | Flowbite Hero | Hero section |
| **features** | `features/grid.blade.php` | Flowbite Features | Features grid |
| **cards** | `cards/grid.blade.php` | Flowbite Cards | Cards grid |
| **links** | `links/list.blade.php` | Flowbite Lists | Link lists |
| **cta** | `cta/default.blade.php` | Flowbite CTA | Call-to-action |
| **info** | `info/default.blade.php` | Flowbite FAQs | Info sections |
| **stats** | `stats/default.blade.php` | Flowbite Stats | Statistics |
| **contact** | `contact/default.blade.php` | Flowbite Contact | Contact info |
| **breadcrumb** | `breadcrumb/default.blade.php` | Flowbite Breadcrumb | Navigation |
| **paragraph** | `paragraph/default.blade.php` | Flowbite Content | Text blocks |

## 🎯 Come Usare

### 1. Creare View Blocco
```blade
{{-- components/blocks/hero/hero.blade.php --}}
@props(['title', 'subtitle', 'content', 'cta_text', 'cta_link'])

<section class="hero bg-white text-gray-900 py-12">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold">{{ $title }}</h1>
        <p class="text-xl">{{ $subtitle }}</p>
        <div>{!! $content !!}</div>
        @if($cta_text)
            <a href="{{ $cta_link }}" class="btn btn-primary">{{ $cta_text }}</a>
        @endif
    </div>
</section>
```

### 2. Usare in JSON
```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.hero",
        "title": "Benvenuto",
        "subtitle": "Un comune da vivere"
    }
}
```

### 3. Renderizzare
```blade
@foreach($blocks as $block)
    @includeIf($block['data']['view'], ['data' => $block['data']])
@endforeach
```

## ✅ Checklist Implementazione

- [ ] Creare `hero/hero.blade.php`
- [ ] Creare `features/grid.blade.php`
- [ ] Creare `cards/grid.blade.php`
- [ ] Creare `links/list.blade.php`
- [ ] Creare `cta/default.blade.php`
- [ ] Creare `info/default.blade.php`
- [ ] Creare `stats/default.blade.php`
- [ ] Creare `contact/default.blade.php`
- [ ] Creare `breadcrumb/default.blade.php`
- [ ] Creare `paragraph/default.blade.php`

---

**Principio Guida**: Blocchi universali, riutilizzabili, non specifici per pagina.

**Riferimenti**:
- [Flowbite Blocks](https://flowbite.com/blocks/)
- [Tailwind UI Blocks](https://tailwindcss.com/plus/ui-blocks)
- [DaisyUI Components](https://daisyui.com/components/)
