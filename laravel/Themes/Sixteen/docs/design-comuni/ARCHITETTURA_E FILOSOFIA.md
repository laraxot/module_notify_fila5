# 📜 Design Comuni - Architettura e Filosofia

**Data**: 2026-03-30  
**Stato**: Documentazione Architetturale  
**Versione**: 2.0.0 (Corretta)

## 🎯 La Verità Architetturale

### Il Sistema Sixteen: Folio + Volt + CMS

Il tema Sixteen usa **Laravel Folio** per route file-based e **Livewire Volt** per componenti reattivi.

## 🏛️ Architettura CORRETTA

### 1. Route Folio ([slug].blade.php)

```php
<?php
declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.view');

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = ['slug' => $slug];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        <x-section slug="header" />
        <x-page side="content" :slug="$pageSlug" :data="$data" />
        <x-section slug="footer" />
    </div>
    @endvolt
</x-layouts.app>
```

### 2. Cosa Succede

```
/it/tests/homepage
    ↓
Folio: resources/views/pages/tests/[slug].blade.php
    ↓
Volt Component: mount($slug='homepage')
    ↓
Set: $pageSlug = 'tests.homepage'
    ↓
Render: <x-page slug="tests.homepage" />
    ↓
CMS/Logic: Carica contenuto pagina
    ↓
Output: HTML con Tailwind CSS
```

## 📁 Struttura Reale

### Views (Folio Routes)
```
resources/views/pages/tests/
├── [slug].blade.php          ← Route dinamica Folio + Volt
└── index.blade.php            ← Index
```

### Design Comuni Pages (JSON/Blade)
```
Main_files/design-comuni-pages/
├── sito/
│   ├── homepage.html          ← HTML originali (riferimento)
│   ├── argomenti.html
│   └── ...
└── servizi/
    └── ...
```

### CSS (Tailwind)
```
resources/css/
├── app.css                    ← Import principale
└── design-comuni.css          ← CSS convertito (2145 righe)
```

## 🎨 Componenti e Sezioni

### Namespace: `pub_theme::`

```blade
{{-- Layout --}}
<x-layouts.app>

{{-- Sezioni --}}
<x-section slug="header" />
<x-section slug="footer" />

{{-- Pagina CMS --}}
<x-page side="content" :slug="$pageSlug" :data="$data" />
```

## 🔄 Flusso CORRETTO

### 1. CSS Tailwind
```css
/* resources/css/app.css */
@import "./design-comuni.css";  /* 2145 righe */
```

### 2. Route Folio
```php
// [slug].blade.php
name('tests.view');
new class extends Component {
    public function mount(string $slug): void {
        $this->pageSlug = 'tests.'.$slug;
    }
};
```

### 3. Rendering
```blade
<x-section slug="header" />
<x-page side="content" :slug="$pageSlug" :data="$data" />
<x-section slug="footer" />
```

## ✅ Cosa Fare per Design Comuni

### Opzione A: Pagine Blade Statiche (SEMPLICE)

1. **Creare** route Folio `[slug].blade.php`
2. **Creare** Blade pages in `resources/views/design-comuni/`
3. **Includere** dalla route:
   ```blade
   @include('pub_theme::design-comuni.pages.'.$slug)
   ```

### Opzione B: CMS Pages (COMPLESSA)

1. **Creare** route Folio `[slug].blade.php`
2. **Creare** JSON pages in `resources/design-comuni/pages/`
3. **Caricare** da CMS/database

## 🎯 Scelta per Design Comuni

Per le 39 pagine statiche di Design Comuni, usiamo **Opzione A** (Blade statiche):

### Perché
- ✅ Pagine già definite (39 HTML)
- ✅ Contenuti statici (non CMS)
- ✅ Più semplice da mantenere
- ✅ Tailwind CSS già integrato

### Struttura
```
resources/views/pages/tests/
├── [slug].blade.php          ← Route dinamica
└── index.blade.php            ← Index

resources/views/design-comuni/pages/
├── homepage.blade.php         ✅
├── argomenti.blade.php        ✅
└── ...                        ⏳ 37 da creare
```

## 📝 Implementazione Pratica

### 1. Route Folio ([slug].blade.php)

```php
<?php
declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.view');

new class extends Component {
    public string $slug = '';
    
    public function mount(string $slug): void
    {
        $this->slug = $slug;
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        <x-section slug="header" />
        
        {{-- Include static Blade page --}}
        @includeIf('pub_theme::design-comuni.pages.'.$slug)
        
        <x-section slug="footer" />
    </div>
    @endvolt
</x-layouts.app>
```

### 2. Blade Page (homepage.blade.php)

```blade
{{-- resources/views/design-comuni/pages/homepage.blade.php --}}
<div class="design-comuni-homepage">
    {{-- Hero Section --}}
    <section class="it-hero-wrapper">
        <h1>Homepage</h1>
        {{-- ... contenuto ... --}}
    </section>
</div>
```

### 3. CSS

Già incluso in `resources/css/app.css`:
```css
@import "./design-comuni.css";
```

## 🔗 Riferimenti

### File
- `resources/views/pages/tests/[slug].blade.php` - Route Folio
- `resources/views/design-comuni/pages/*.blade.php` - Pagine
- `resources/css/design-comuni.css` - CSS Tailwind

### Documentazione
- `docs/design-comuni/ARCHITECTURAL_PHILOSOPHY.md` - Filosofia (da correggere)
- `docs/design-comuni/THEME_PLAN.md` - Piano
- `docs/prompts/replikate.txt` - Istruzioni originali

## ✅ Lezioni Apprese

1. **Folio** per route file-based
2. **Volt** per componenti reattivi
3. **pub_theme::** per namespace componenti
4. **<x-section>** per header/footer
5. **Tailwind CSS** già integrato
6. **NON creare** file HTML in resources/

## 🧘 Lo Zen

> "La via di Sixteen non è creare pagine statiche,  
> ma route dinamiche che includono contenuti.  
> Il CSS è Tailwind, il namespace è pub_theme,  
> le sezioni sono blocchi, Folio è la via."

---

**Stato**: ✅ Architettura compresa  
**Prossimo Step**: Implementare correttamente
