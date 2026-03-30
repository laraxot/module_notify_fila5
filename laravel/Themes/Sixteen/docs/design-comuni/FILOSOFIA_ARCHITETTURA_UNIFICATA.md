# 🧘 FixCity Design Comuni - Filosofia e Architettura Unificata

**Data**: 2026-03-30  
**Versione**: 2.0 - Folio + Volt Standard  
**Stato**: Documento Maestro

## 🎯 La Filosofia Unificata

### Pattern Standard per Tutte le Pagine

**TUTTE** le pagine Folio devono seguire questo pattern:

```php
<?php

declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('{route.name}');

new class extends Component {
    public string $pageSlug = '';
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = '{category}.{slug}';
        $this->data = [
            'title' => 'Page Title',
        ];
    }
};

?>

<x-layouts.app>
    @volt('{route.name}')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

## 📚 Principi Fondamentali

### 1. DRY (Don't Repeat Yourself)

❌ **SBAGLIATO**: Logica PHP inline nei blade
```blade
@php
    $manifestPath = config_path('...');
    $files = glob($manifestPath.'*.json');
    // ... logica complessa
@endphp
```

✅ **CORRETTO**: Logica nel componente `<x-page>`
```blade
<x-page side="content" :slug="$pageSlug" :data="$data" />
```

### 2. KISS (Keep It Simple, Stupid)

❌ **COMPLESSO**: 100 righe di logica in ogni pagina
```php
// 100 righe di PHP...
```

✅ **SEMPLICE**: 10 righe di configurazione
```php
name('tests.index');
$this->pageSlug = 'tests.index';
```

### 3. Single Source of Truth (SSOT)

❌ **DUPLICATO**: Contenuto in più file
```
- Contenuto in Blade
- Contenuto in JSON
- Contenuto in PHP
```

✅ **UNICO**: Contenuto solo in JSON
```
- JSON: config/local/fixcity/database/content/pages/*.json
- Blade: Solo rendering
- PHP: Solo configurazione
```

## 🏛️ Architettura Unificata

### Struttura File

```
resources/views/pages/{category}/
├── [slug].blade.php          ← Route dinamica (Folio + Volt)
└── index.blade.php           ← Index page (Folio + Volt)
```

### Pattern `[slug].blade.php`

```php
<?php
declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('{category}.view');

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = '{category}.'.$slug;
        $this->data = ['slug' => $slug];
    }
};
?>

<x-layouts.app>
    @volt('{category}.view')
    <div>
        <x-section slug="header" />
        <main id="main-container" role="main">
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </main>
        <x-section slug="footer" />
    </div>
    @endvolt
</x-layouts.app>
```

### Pattern `index.blade.php`

```php
<?php
declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('{category}.index');

new class extends Component {
    public string $pageSlug = '';
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = '{category}.index';
        $this->data = [
            'title' => 'Index Title',
        ];
    }
};
?>

<x-layouts.app>
    @volt('{category}.index')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

## 📦 Componente `<x-page>`

### Responsabilità UNICA

Il componente `<x-page>` ha UNA sola responsabilità:

> **Leggere il JSON e renderizzare i blocchi**

### Implementazione

```blade
@props(['side' => 'content', 'slug' => '', 'data' => []])

@php
    // 1. Load JSON
    $jsonPath = config_path('local/fixcity/database/content/pages/'.$slug.'.json');
    $pageData = file_exists($jsonPath) 
        ? json_decode(file_get_contents($jsonPath), true) 
        : null;
    
    // 2. Get blocks for current language
    $blocks = $pageData 
        ? ($pageData['content_blocks'][app()->getLocale()] ?? $pageData['content_blocks']['it'] ?? [])
        : [];
@endphp

<div class="page-content {{ $side }}">
    @if(count($blocks) > 0)
        @foreach($blocks as $block)
            @includeIf($block['data']['view'], $block['data'])
        @endforeach
    @else
        {{-- Fallback: Show error --}}
        <div class="error-message">
            Pagina non trovata: {{ $slug }}
        </div>
    @endif
</div>
```

## 🎯 Block Types Universali

### Convention Nomi

```
pub_theme::components.blocks.{type}.{variant}

Esempi:
- pub_theme::components.blocks.hero.hero
- pub_theme::components.blocks.cards.grid
- pub_theme::components.blocks.links.list
```

### Block Types Disponibili

| Tipo | View | Props |
|------|------|-------|
| **hero** | `hero.hero` | title, subtitle, content, cta |
| **breadcrumb** | `breadcrumb.default` | items [{label, url}] |
| **paragraph** | `paragraph.default` | content, class |
| **cards** | `cards.grid` | cards [{title, description, url}] |
| **info** | `info.default` | items [{icon, title, description}] |
| **cta** | `cta.default` | title, button_text, button_url |
| **features** | `features.grid` | sections [{title, description, icon}] |
| **stats** | `stats.default` | stats [{label, value, icon}] |
| **contact** | `contact.default` | office, phone, email, hours |
| **links** | `links.list` | links [{label, url, description}] |

## 📋 Checklist Uniformità

Per ogni nuova pagina:

- [ ] Usare pattern Folio + Volt standard
- [ ] Nome route: `{category}.{action}`
- [ ] Mount: `$this->pageSlug = '{category}.{slug}'`
- [ ] Usare `<x-page>` per rendering
- [ ] Contenuto in JSON, non in Blade
- [ ] Block types universali, non specifici
- [ ] Documentare in `docs/design-comuni/`

## 🔗 Riferimenti

### File Pattern
- `resources/views/pages/tests/[slug].blade.php` - Pattern dinamico
- `resources/views/pages/tests/index.blade.php` - Pattern index

### Documentazione
- `UNIVERSAL_BLOCK_TYPES.md` - Block types universali
- `CONVENZIONE_NOMI_VIEW.md` - Convention nomi view
- `FIXCITY_ZEN.md` - Filosofia generale

## ✅ Esempi Pratici

### Esempio 1: Pagina Dinamica

**File**: `resources/views/pages/tests/[slug].blade.php`

```php
<?php
declare(strict_types=1);

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

### Esempio 2: Index Page

**File**: `resources/views/pages/tests/index.blade.php`

```php
<?php
declare(strict_types=1);

use function Laravel\Folio\name;
use Livewire\Volt\Component;

name('tests.index');

new class extends Component {
    public string $pageSlug = '';
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = 'tests.index';
        $this->data = [
            'title' => 'Design Comuni Test Pages',
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.index')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

### Esempio 3: JSON Page

**File**: `config/local/fixcity/database/content/pages/tests.index.json`

```json
{
    "slug": "tests.index",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.hero",
                    "title": "Test Pages"
                }
            },
            {
                "type": "links",
                "data": {
                    "view": "pub_theme::components.blocks.links.list",
                    "links": [...]
                }
            }
        ]
    }
}
```

---

**Principio Guida**: Uniformità, DRY, KISS, SSOT

**Stato**: ✅ **Architettura Unificata e Documentata**
