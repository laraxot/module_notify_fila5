# Analisi Errore: tests.argomenti Block Type

> *"Il tipo segue la funzione, come la vista segue il tipo."*

## 🔴 Errore Rilevato

```
Unable to locate a class or view for component 
[pub_theme::components.blocks.tests.argomenti.topics-grid]
```

## 📊 Analisi Comparativa

### Design Comuni Reference
**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html

**Struttura**:
```
┌─────────────────────────────────────┐
│ Header (Comune, Navigazione)        │
├─────────────────────────────────────┤
│ Breadcrumb: Home / Lista Argomenti  │
├─────────────────────────────────────┤
│ H1: ARGOMENTI                       │
│ Descrizione                         │
├─────────────────────────────────────┤
│ SEZIONE 1: IN EVIDENZA              │
│ ┌─────┐ ┌─────┐ ┌─────┐            │
│ │Card │ │Card │ │Card │            │
│ └─────┘ └─────┘ └─────┘            │
├─────────────────────────────────────┤
│ SEZIONE 2: ESPLORA PER ARGOMENTO    │
│ ┌─────┬─────┬─────┬─────┐          │
│ │Card │Card │Card │Card │          │
│ ├─────┼─────┼─────┼─────┤          │
│ │Card │Card │Card │Card │          │
│ └─────┴─────┴─────┴─────┘          │
├─────────────────────────────────────┤
│ Feedback (Valutazione 1-5 stelle)   │
└─────────────────────────────────────┘
```

**Componenti**:
- **Framework**: Bootstrap 4/5 (NON Tailwind)
- **Layout**: Grid system (`.row`, `.col-*`)
- **Cards**: `.card`, `.card-body`, `.card-title`
- **Responsive**: 1 colonna mobile → 2 tablet → 3-4 desktop

### Nostra Implementazione (Attuale)

**Configurazione JSON ERRATA**:
```json
{
    "id": "tests.argomenti",
    "content_blocks": {
        "it": [
            {
                "type": "tests.argomenti",  ❌ SBAGLIATO!
                "data": {
                    "view": "pub_theme::components.blocks.tests.argomenti.topics-grid"
                }
            }
        ]
    }
}
```

**Problema**: `tests.argomenti` NON è un tipo di blocco canonico!

---

## 🎯 La Soluzione: Correggere il Tipo di Blocco

### Principio Fondamentale

```
{theme}::components.blocks.{TYPE}.{VIEW}
                    ↑        ↑
                 Tipo     Vista
```

### Tipo Corretto

Per una pagina "Argomenti", il tipo dovrebbe essere:

| Opzione | Tipo | Vista | Match |
|---------|------|-------|-------|
| **Opzione 1** | `topics` | `topics.grid` | ✅ 9/10 |
| **Opzione 2** | `categories` | `categories.grid` | ✅ 8/10 |
| **Opzione 3** | `feature_sections` | `features.argomenti` | ✅ 7/10 |
| **Opzione 4** | `card_grid` | `card_grid.topics` | ✅ 7/10 |

**Raccomandazione**: Usare **`topics`** come tipo canonico

---

## ✅ Implementazione Corretta

### 1. JSON Configuration (CORRETTO)

```json
{
    "id": "argomenti",
    "title": {
        "it": "Argomenti",
        "en": "Topics"
    },
    "content_blocks": {
        "it": [
            {
                "type": "topics",  ✅ CORRETTO!
                "data": {
                    "view": "pub_theme::components.blocks.topics.argomenti",
                    "title": "Esplora per argomento",
                    "featured_topics": ["cultura", "sport", "famiglia"],
                    "all_topics": ["agricoltura", "animali", "tasse", ...]
                }
            }
        ]
    }
}
```

### 2. View Blade (Da Creare)

**File**: `Themes/Sixteen/resources/views/components/blocks/topics/argomenti.blade.php`

```blade
{{-- @layout('pub_theme::layouts.default') --}}

@section('content')
<div class="container py-5">
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Lista Argomenti</li>
        </ol>
    </nav>

    {{-- Header --}}
    <h1 class="mb-4">{{ $title ?? 'Argomenti' }}</h1>
    
    {{-- Featured Topics (IN EVIDENZA) --}}
    @if(isset($featured_topics))
    <section class="mb-5">
        <h2 class="h4 mb-3">In Evidenza</h2>
        <div class="row g-4">
            @foreach($featured_topics as $topic)
            <div class="col-12 col-md-4">
                @include('pub_theme::components.blocks.topics._card', [
                    'topic' => $topic,
                    'featured' => true
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- All Topics (ESPLORA PER ARGOMENTO) --}}
    @if(isset($all_topics))
    <section>
        <h2 class="h4 mb-3">Esplora per Argomento</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($all_topics as $topic)
            <div class="col">
                @include('pub_theme::components.blocks.topics._card', [
                    'topic' => $topic,
                    'featured' => false
                ])
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Feedback Section --}}
    @include('pub_theme::components.feedback.star-rating')
</div>
@endsection
```

### 3. Partial Card Component

**File**: `Themes/Sixteen/resources/views/components/blocks/topics/_card.blade.php`

```blade
{{-- Card Topic Component --}}
{{-- Ispirato a Design Comuni + Bootstrap Italia --}}

<div class="card h-100 shadow-sm border-0">
    <div class="card-body">
        <h3 class="card-title h5">
            <a href="{{ $topic['url'] ?? '#' }}" class="text-decoration-none stretched-link">
                {{ $topic['title'] ?? $topic }}
            </a>
        </h3>
        @if(isset($topic['description']))
        <p class="card-text text-muted">
            {{ Str::limit($topic['description'], 100) }}
        </p>
        @endif
    </div>
    @if($featured ?? false)
    <div class="card-footer bg-transparent border-0">
        <span class="badge bg-primary">In evidenza</span>
    </div>
    @endif
</div>
```

---

## 📚 Riferimenti UI Frameworks

### Flowbite → Tailwind Conversion

**Flowbite Blog Grid Card** → **Nostro Topics Card**:

```blade
{{-- Flowbite Original --}}
<article class="bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="p-5">
        <h3 class="text-xl font-bold tracking-tight text-gray-900">
            <a href="#">Topic Title</a>
        </h3>
        <p class="mb-3 mt-2 font-light text-gray-500">Description...</p>
    </div>
</article>

{{-- Nostra Versione (Design Comuni + Tailwind) --}}
<div class="card h-100 shadow-sm border-0">
    <div class="card-body">
        <h3 class="card-title h5">
            <a href="#" class="text-decoration-none stretched-link">
                Topic Title
            </a>
        </h3>
        <p class="card-text text-muted">Description...</p>
    </div>
</div>
```

### DaisyUI → Bootstrap Conversion

**DaisyUI Card** → **Nostro Topics Card**:

```blade
{{-- DaisyUI Original --}}
<div class="card w-96 bg-base-100 shadow-xl">
  <div class="card-body">
    <h2 class="card-title">Topic Title</h2>
    <p>Description...</p>
  </div>
</div>

{{-- Nostra Versione (Bootstrap Italia) --}}
<div class="card h-100 shadow-sm">
  <div class="card-body">
    <h2 class="card-title h5">Topic Title</h2>
    <p class="card-text">Description...</p>
  </div>
</div>
```

---

## 🗂️ File da Creare/Modificare

### Checklist Implementazione

- [ ] **1. Creare vista topics/argomenti**
  - File: `Themes/Sixteen/resources/views/components/blocks/topics/argomenti.blade.php`
  
- [ ] **2. Creare partial card**
  - File: `Themes/Sixteen/resources/views/components/blocks/topics/_card.blade.php`
  
- [ ] **3. Correggere JSON configurazione**
  - File: `config/local/fixcity/database/content/pages/tests.argomenti.json`
  - Change: `"type": "tests.argomenti"` → `"type": "topics"`
  
- [ ] **4. Aggiornare BlockData (se necessario)**
  - File: `Modules/Cms/app/Datas/BlockData.php`
  - Add: Validation per tipo `topics`
  
- [ ] **5. Documentare nuovo tipo**
  - File: `laravel/Modules/Cms/docs/blocks/topics.md`
  - Include: Esempi, riferimenti Design Comuni

---

## 📊 Confronto Visivo (Screenshots)

### Screenshot Disponibili

Percorso: `laravel/Modules/Cms/docs/blocks/screenshots/`

| File | Descrizione |
|------|-------------|
| `reference-desktop.png` | Design Comuni a 1920px |
| `reference-tablet.png` | Design Comuni a 768px |
| `reference-mobile.png` | Design Comuni a 375px |
| `our-implementation-*.png` | Nostra implementazione (attualmente 404) |

### Differenze Chiave

| Aspetto | Design Comuni | Nostra Implementazione |
|---------|---------------|------------------------|
| **Framework** | Bootstrap 4/5 | Bootstrap Italia |
| **Grid** | `.row .col-*` | Tailwind grid (da implementare) |
| **Cards** | `.card .card-body` | DaisyUI/Flowbite (da standardizzare) |
| **Responsive** | 1→2→4 colonne | Da implementare |
| **Feedback** | Stelle + Survey | Da implementare |

---

## 🎨 Design System Integration

### Bootstrap Italia → Tailwind Mapping

```
Bootstrap Italia          → Tailwind CSS
.card                     → .bg-white.rounded-lg.shadow
.card-body                → .p-6
.card-title               → .text-xl.font-bold
.card-text                → .text-gray-600
.row                      → .grid.grid-cols-1.md:grid-cols-3
.col-4                    → .col-span-1
.g-4                      → .gap-4
```

### DaisyUI Integration

Se usiamo DaisyUI come base:

```blade
{{-- DaisyUI Card Grid --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($topics as $topic)
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h3 class="card-title">{{ $topic }}</h3>
            <a href="#" class="btn btn-primary btn-sm">Esplora</a>
        </div>
    </div>
    @endforeach
</div>
```

---

## 📖 Documentazione Correlata

### Interna
- [Zen Philosophy](./ZEN_PHILOSOPHY.md) - Perché il tipo deve essere canonico
- [Architecture Vision](./ARCHITECTURE_VISION.md) - Roadmap block types
- [View Naming Philosophy](./view-naming-philosophy.md) - La regola `{type}.{view}`

### Esterna
- [Design Comuni Argomenti](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Flowbite Blocks](https://flowbite.com/blocks/)
- [DaisyUI Components](https://daisyui.com/components/)
- [Tailwind Plus UI Blocks](https://tailwindcss.com/plus/ui-blocks)

---

## 🚀 Next Steps

### Immediato (Oggi)
1. ✅ Correggere JSON: `tests.argomenti` → `topics`
2. ✅ Creare vista: `components.blocks.topics.argomenti`
3. ✅ Testare route: `/it/tests/argomenti`

### Short-term (Questa Settimana)
1. Implementare feedback section (stelle + survey)
2. Aggiungere responsive behavior completo
3. Creare documentazione per tipo `topics`

### Long-term (Questo Mese)
1. Canonizzare tipo `topics` nei documenti ufficiali
2. Creare varianti: `topics.grid`, `topics.list`, `topics.featured`
3. Integrare con Design Comuni pattern library

---

## 📝 OpenViking URIs

- `viking://modules/cms/docs/blocks/argomenti-error-analysis` - Questo documento
- `viking://modules/cms/docs/blocks/topics` - Tipo topics (da creare)
- `viking://themes/sixteen/docs/blocks/topics` - Implementazione tema

---

**Versione**: 1.0  
**Data**: 2026-03-30  
**Stato**: ✅ Analisi Completa  
**Prossimo Step**: Implementazione correzione

> *"Meglio un tipo canonico oggi, che un tests.argomenti per sempre."*
