# ✅ Route Dinamica Corretta - [slug].blade.php

**Data**: 2026-03-30  
**Correzione**: **Rimossi file blade errati**

## 🎯 Concetto Corretto

**USARE SOLO**: `resources/views/pages/tests/[slug].blade.php`

**NON CREARE**: File blade separati per ogni pagina

## ❌ Errore Commesso

### File Creati (SBAGLIATO)
```
resources/views/pages/tests/
├── amministrazione.blade.php          ❌ CANCELLATO
├── documenti-dati.blade.php           ❌ CANCELLATO
├── novita-dettaglio.blade.php         ❌ CANCELLATO
├── segnalazione-area-personale.blade.php  ❌ CANCELLATO
└── segnalazioni-elenco.blade.php      ❌ CANCELLATO
```

### Perché è Sbagliato ❌
1. **Duplicazione**: Ogni pagina ha il suo file blade
2. **Non manutenibile**: 39 file da mantenere
3. **Contro il pattern**: Folio usa route dinamiche
4. **Inutile**: I JSON contengono già tutta la struttura

## ✅ Soluzione Corretta

### File Unico Dinamico
```
resources/views/pages/tests/
├── [slug].blade.php          ✅ CORRETTO - Route dinamica
├── homepage.blade.php        ✅ CORRETTO - Pagina speciale
└── index.blade.php           ✅ CORRETTO - Index page
```

### Come Funziona ✅

```
URL: /it/tests/amministrazione
  ↓
Folio Route: [slug].blade.php
  ↓
Mount: $slug = 'amministrazione'
  ↓
Load JSON: tests.amministrazione.json
  ↓
Render: Content blocks dal JSON
  ↓
Output: HTML pagina
```

## 📁 Struttura Corretta

### Route Dinamica ([slug].blade.php)

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
    public ?array $pageData = null;

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.' . $slug;
        
        // Load page data from JSON
        $jsonPath = config_path('local/fixcity/database/content/pages/' . $this->pageSlug . '.json');
        
        if (file_exists($jsonPath)) {
            $this->pageData = json_decode(file_get_contents($jsonPath), true);
            $this->data = [
                'title' => $this->pageData['title']['it'] ?? ucfirst($slug),
                'slug' => $slug,
                'content_blocks' => $this->pageData['content_blocks']['it'] ?? [],
            ];
        } else {
            $this->data = [
                'title' => 'Pagina non trovata',
                'slug' => $slug,
                'error' => true,
            ];
        }
    }
};

?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        {{-- Skip Links --}}
        <a class="skiplinks" href="#main">Vai al contenuto principale</a>

        {{-- Header --}}
        <x-section slug="header" />

        {{-- Main Content --}}
        <main class="container py-8" id="main">
            @if(isset($this->data['error']))
                {{-- Error: Page not found --}}
                <div class="alert alert-danger">
                    Pagina non trovata: {{ $this->slug }}
                </div>
            @else
                {{-- Render content blocks from JSON --}}
                @foreach($this->getContentBlocks() as $block)
                    @includeIf($block['data']['view'], ['data' => $block['data']])
                @endforeach
            @endif
        </main>

        {{-- Footer --}}
        <x-section slug="footer" />
    </div>
    @endvolt
</x-layouts.app>
```

## 📊 Vantaggi Route Dinamica

### Prima (SBAGLIATO) ❌
```
39 file blade separati
Ogni pagina = 1 file blade
Difficile da mantenere
Duplicazione di codice
```

### Dopo (CORRETTO) ✅
```
1 file [slug].blade.php
Tutte le pagine = 1 file
Facile da mantenere
Nessuna duplicazione
```

## 🎯 Pattern Corretto

### JSON Files (GIÀ CORRETTI) ✅
```
config/local/fixcity/database/content/pages/
├── tests.homepage.json
├── tests.argomenti.json
├── tests.amministrazione.json
├── tests.documenti-dati.json
└── ... (39 totali)
```

### Blade Files (CORRETTI) ✅
```
resources/views/pages/tests/
├── [slug].blade.php      ← Route dinamica per TUTTE le pagine
├── homepage.blade.php    ← Solo se serve layout speciale
└── index.blade.php       ← Index page
```

## ✅ Verifica

### File Rimasti
```bash
ls resources/views/pages/tests/
# Deve mostrare:
# - [slug].blade.php
# - homepage.blade.php (opzionale)
# - index.blade.php
```

### File Cancellati
```bash
# Non devono esistere:
# - amministrazione.blade.php
# - documenti-dati.blade.php
# - novita-dettaglio.blade.php
# - etc.
```

## 📝 Lessons Learned

### Regola Fondamentale
**MAI creare file blade separati per pagine JSON**

### Pattern da Seguire
1. Creare JSON per ogni pagina
2. Usare `[slug].blade.php` per tutte le pagine
3. Il JSON contiene tutta la struttura
4. Il blade legge e renderizza il JSON

### Eccezioni
- `homepage.blade.php` - Solo se serve layout speciale
- `index.blade.php` - Per la lista pagine
- Altre pagine speciali - Solo se strettamente necessario

---

**Stato**: ✅ **CORRETTO - Solo route dinamica**  
**File Blade**: **1 ([slug].blade.php)**  
**JSON Files**: **39 (uno per pagina)**  
**Pattern**: **Dinamico, non statico**
