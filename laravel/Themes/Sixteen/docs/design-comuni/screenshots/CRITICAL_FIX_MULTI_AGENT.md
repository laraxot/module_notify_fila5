# 🚨 FixCity Design Comuni - CRITICAL FIX REQUIRED

**Data**: 2026-03-30 16:35  
**Stato**: 🔴 **CRITICO - Sistema Non Funzionante**  
**Priorità**: 🔴 **EMERGENCY**

## 📊 Analisi Situazione

### Cosa Esiste ✅
1. **File JSON**: 35 file JSON in `config/local/fixcity/database/content/pages/`
2. **File Route**: `resources/views/pages/[slug].blade.php` (ma vuoto/404)
3. **Documentazione**: Completa in `docs/design-comuni/`

### Cosa NON Esiste ❌
1. **Route Folio**: File `[slug].blade.php` non implementa Folio
2. **View Blocchi**: `components/blocks/*` non esistono
3. **Componente Page**: `<x-page>` non esiste
4. **Folio Mount**: Configurazione Folio mancante

## 🐛 Root Cause Analysis

### Problema Principale
Il file `resources/views/pages/[slug].blade.php` esiste ma contiene solo:

```php
<?php
return response('Page not found!', 404);
?>
```

**Manca completamente**:
- Implementazione Folio
- Componente Volt
- Chiamata a `<x-page>`
- Rendering blocchi JSON

## 🔧 Soluzione Completa Multi-Agent

### Agente 1: Fix Route File
**File**: `resources/views/pages/[slug].blade.php`

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

### Agente 2: Create Page Component
**File**: `resources/views/components/page.blade.php`

```blade
@props([
    'side' => 'content',
    'slug' => '',
    'data' => []
])

@php
    // Load page from JSON
    $jsonPath = config_path('local/fixcity/database/content/pages/'.$slug.'.json');
    $pageData = file_exists($jsonPath) ? json_decode(file_get_contents($jsonPath), true) : null;
    
    // Get blocks for current language
    $blocks = $pageData['content_blocks'][app()->getLocale()] ?? $pageData['content_blocks']['it'] ?? [];
@endphp

<div class="page-content {{ $side }}">
    @foreach($blocks as $block)
        @if(isset($block['type']) && isset($block['data']['view']))
            @includeIf($block['data']['view'], ['data' => $block['data']])
        @endif
    @endforeach
</div>
```

### Agente 3: Create Block Views
**Directory**: `resources/views/components/blocks/`

Creare almeno questi file:

1. `breadcrumb/default.blade.php`
2. `hero/default.blade.php`
3. `links/grid.blade.php`
4. `links/list.blade.php`
5. `info/default.blade.php`
6. `cta/default.blade.php`
7. `feature_sections/default.blade.php`
8. `paragraph/default.blade.php`
9. `stats/default.blade.php`
10. `contact/default.blade.php`

### Agente 4: Configure Folio
**File**: `routes/web.php` o `providers/FolioVoltServiceProvider.php`

```php
<?php

namespace Modules\Cms\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class FolioVoltServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Folio::mount(
            __DIR__.'/../../Themes/Sixteen/resources/views/pages',
            '/it'
        );
    }
}
```

### Agente 5: Testing & Screenshots
**Task**:
1. Testare `/it/tests/argomenti`
2. Catturare screenshot
3. Confrontare con originale
4. Documentare differenze

## 📋 Checklist Completa

### Fase 1: Fix Route (Agente 1)
- [ ] Sostituire contenuto `[slug].blade.php`
- [ ] Implementare Folio + Volt
- [ ] Testare route existence

### Fase 2: Create Component (Agente 2)
- [ ] Creare `components/page.blade.php`
- [ ] Implementare lettura JSON
- [ ] Implementare rendering blocchi

### Fase 3: Create Views (Agente 3)
- [ ] Creare `breadcrumb/default.blade.php`
- [ ] Creare `hero/default.blade.php`
- [ ] Creare `links/grid.blade.php`
- [ ] Creare `links/list.blade.php`
- [ ] Creare `info/default.blade.php`
- [ ] Creare `cta/default.blade.php`
- [ ] Creare `feature_sections/default.blade.php`
- [ ] Creare `paragraph/default.blade.php`
- [ ] Creare `stats/default.blade.php`
- [ ] Creare `contact/default.blade.php`

### Fase 4: Configure Folio (Agente 4)
- [ ] Aggiornare `FolioVoltServiceProvider`
- [ ] Mount Folio routes
- [ ] Testare `/it/tests/*` routes

### Fase 5: Testing (Agente 5)
- [ ] Test `/it/tests/argomenti`
- [ ] Test `/it/tests/homepage`
- [ ] Test `/it/tests/servizi`
- [ ] Catturare screenshot
- [ ] Confrontare con originali
- [ ] Documentare differenze

## 📸 Screenshot Comparison

### Argomenti Page
| Originale | FixCity |
|-----------|---------|
| ![Originale](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html) | ![FixCity](http://fixcity.local/it/tests/argomenti) |
| ✅ 200 OK | ❌ 404 Not Found |
| ✅ Bootstrap Italia | ❌ Laravel Error |
| ✅ Hero + Grid | ❌ Error Page |

## 🎯 Timeline Emergency

| Fase | Agente | ETA | Stato |
|------|--------|-----|-------|
| Fix Route | Agente 1 | 15 min | ⏳ |
| Page Component | Agente 2 | 30 min | ⏳ |
| Block Views (10) | Agente 3 | 2 ore | ⏳ |
| Folio Config | Agente 4 | 15 min | ⏳ |
| Testing | Agente 5 | 30 min | ⏳ |
| **TOTALE** | | **3.5 ore** | 🔴 |

## 🚨 Azione Immediata Richiesta

**TUTTI GLI AGENTI**: Iniziare immediatamente i task assegnati

```bash
# Agente 1
nvim resources/views/pages/[slug].blade.php

# Agente 2
nvim resources/views/components/page.blade.php

# Agente 3
mkdir -p resources/views/components/blocks/{breadcrumb,hero,links,info,cta,feature_sections,paragraph,stats,contact}

# Agente 4
nvim Modules/Cms/Providers/FolioVoltServiceProvider.php

# Agente 5
mkdir -p docs/design-comuni/screenshots/
```

---

**Stato**: 🔴 **EMERGENCY - Sistema Down**  
**Coordinamento**: Multi-Agent AI Team  
**Scadenza**: URGENTE  
**Note**: Tutti gli agenti devono lavorare in parallelo
