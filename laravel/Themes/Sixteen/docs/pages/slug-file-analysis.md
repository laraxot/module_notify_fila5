# Analisi: File `[slug].blade.php` Mancante

> *"Il routing segue il pattern, come la vista segue il tipo."*

## 🔴 Situazione Attuale

**File Mancante**: `laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`

**File Esistente**: `laravel/Themes/Sixteen/resources/views/pages/tests/index.blade.php`

## 📊 Analisi Architetturale

### Pattern Folio + Volt Corretto

Per pagine dinamiche con slug, il pattern è:

```
Themes/Sixteen/resources/views/pages/tests/
├── index.blade.php          # /it/tests
└── [slug].blade.php         # /it/tests/{slug} (es: /it/tests/argomenti)
```

### Perché `[slug].blade.php` è NECESSARIO

**Senza `[slug].blade.php`**:
- ❌ `/it/tests/argomenti` → 404 Not Found
- ❌ Non funziona il routing dinamico
- ❌ Non si possono visualizzare pagine CMS-driven

**Con `[slug].blade.php`**:
- ✅ `/it/tests/argomenti` → Funziona!
- ✅ Routing dinamico per tutti gli slug
- ✅ Pagine CMS-driven renderizzate correttamente

## ✅ Implementazione Corretta

### File: `[slug].blade.php`

```blade
<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug = ''): void
    {
        $this->pageSlug = 'tests.' . $slug;
        $this->data = [
            'slug' => $slug,
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

### Differenze Chiave vs `index.blade.php`

| Aspetto | `index.blade.php` | `[slug].blade.php` |
|---------|-------------------|-------------------|
| **Route** | `/it/tests` | `/it/tests/{slug}` |
| **Name** | `tests.index` | `tests.view` |
| **Mount** | `$slug = 'tests.index'` | `$slug = 'tests.' . $slug` |
| **Purpose** | Lista pagine tests | Singola pagina test |

## 🎯 Pattern Folio + Volt per Tests

### Struttura Completa

```
Themes/Sixteen/resources/views/pages/tests/
├── index.blade.php              # /it/tests
├── [slug].blade.php             # /it/tests/{slug}
└── argomenti/
    └── index.blade.php          # /it/tests/argomenti (specifico)
```

### Quando Usare Ciascuno

| File | Route | Use Case |
|------|-------|----------|
| `index.blade.php` | `/it/tests` | Lista tutte le pagine test |
| `[slug].blade.php` | `/it/tests/{slug}` | Pagina test generica (fallback) |
| `argomenti/index.blade.php` | `/it/tests/argomenti` | Pagina test specifica (override) |

## 📚 Documentazione Correlata

### Interna
- [Folio + Volt Best Practices](../../../docs/folio-volt-best-practices.md)
- [Page Routing Architecture](./routing-architecture.md)
- [CMS-Driven Pages](../../../Modules/Cms/docs/cms-driven-pages.md)

### Esterna
- [Laravel Folio Docs](https://laravel.com/docs/11.x/folio)
- [Livewire Volt Docs](https://livewire.laravel.com/docs/volt)

## 🚀 Creazione File

### Comando per Creare

```bash
# Crea il file [slug].blade.php
cat > laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php << 'EOF'
<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug = ''): void
    {
        $this->pageSlug = 'tests.' . $slug;
        $this->data = [
            'slug' => $slug,
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
EOF
```

### Verifica

```bash
# Verifica che il file esista
ls -la laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php

# Testa la route
curl http://fixcity.local/it/tests/argomenti
```

## 🧘 Filosofia del Routing

### Il Principio del Minimo Privilegio

> *"Ogni route dovrebbe avere il minimo potere necessario per fare il suo lavoro"*

- `index.blade.php` → Lista (potere: leggere tutte le pagine)
- `[slug].blade.php` → Singola (potere: leggere una pagina)
- `argomenti/index.blade.php` → Specifica (potere: leggere solo argomenti)

### La Gerarchia delle Route

```
Generico → Specifico
  ↓
[slug].blade.php  (catch-all)
  ↓
argomenti/index.blade.php  (specifico override)
```

### Il Flusso dell'Energia

```mermaid
graph LR
    A[Request: /it/tests/argomenti] --> B{Folio Router}
    B -->|Cerca specifico| C[argomenti/index.blade.php]
    B -->|Fallback| D[[slug].blade.php]
    D --> E[Mount: slug=argomenti]
    E --> F[Load CMS Page]
    F --> G[Render View]
```

## 📋 Checklist Implementazione

- [ ] Creare `[slug].blade.php` in `pages/tests/`
- [ ] Testare route: `/it/tests/argomenti`
- [ ] Testare route: `/it/tests/altra-pagina`
- [ ] Verificare middleware PageSlugMiddleware
- [ ] Documentare pattern in docs
- [ ] Aggiornare indice pages

## ⚠️ Errori Comuni da Evitare

### 1. Dimenticare `mount()` con parametro

```blade
{{-- ❌ SBAGLIATO --}}
public function mount(): void
{
    $this->pageSlug = 'tests.index';  // Fisso!
}

{{-- ✅ CORRETTO --}}
public function mount(string $slug = ''): void
{
    $this->pageSlug = 'tests.' . $slug;  // Dinamico!
}
```

### 2. Usare Route Name Sbagliato

```blade
{{-- ❌ SBAGLIATO --}}
name('tests.index');  // Name di index!

{{-- ✅ CORRETTO --}}
name('tests.view');  // Name specifico per view
```

### 3. Dimenticare Middleware

```blade
{{-- ❌ SBAGLIATO --}}
// middleware(PageSlugMiddleware::class);  // Mancante!

{{-- ✅ CORRETTO --}}
middleware(PageSlugMiddleware::class);  // Necessario!
```

## 🔗 OpenViking URIs

- `viking://themes/sixteen/docs/pages/slug-file-analysis` - Questa analisi
- `viking://themes/sixteen/docs/folio-volt-patterns` - Pattern Folio + Volt
- `viking://modules/cms/docs/cms-driven-pages` - Pagine CMS-driven

---

**Versione**: 1.0  
**Data**: 2026-03-30  
**Stato**: ✅ Analisi Completa, Pronto per Implementazione  
**Prossimo Step**: Creare file `[slug].blade.php`

> *"Il routing dinamico è la Via per pagine infinite."*
