# 📜 Design Comuni - Filosofia Architetturale

**Data**: 2026-03-30  
**Versione**: 1.0.0  
**Stato**: Documentazione Architetturale

## 🎯 La Religione: Folio + Volt + CMS

### Il Perché Architetturale

Il tema Sixteen non usa Blade templates tradizionali. Usa **Folio + Volt** con un sistema CMS dinamico.

#### Filosofia
```
NON creare pagine statiche → Creare route dinamiche che caricano contenuti dal CMS
```

### Architettura Corretta

#### 1. Route Dinamica (Folio + Volt)
```php
// resources/views/pages/tests/[slug].blade.php
name('tests.view');

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;  // tests.homepage, tests.argomenti
        $this->data = ['slug' => $slug];
    }
};
```

#### 2. CMS Page Component
```blade
<x-page side="content" :slug="$pageSlug" :data="$data" />
```

Questo componente:
- Carica la pagina dal CMS (database o JSON)
- Usa il sistema di blocchi/sezioni
- Supporta multi-lingua
- Supporta multi-side (content, sidebar, etc.)

#### 3. Sezioni (Header/Footer)
```blade
<x-section slug="header" />
<x-section slug="footer" />
```

Non sono componenti diretti, ma **sezioni CMS** caricate dinamicamente.

## 📁 Struttura Dati CMS

### Pagine nel CMS
```
pages/
├── tests/
│   ├── homepage.json
│   ├── argomenti.json
│   ├── appuntamento-06-conferma.json
│   └── ...
```

### Struttura Pagina JSON
```json
{
    "slug": "tests.homepage",
    "title": "Homepage",
    "blocks": [
        {
            "type": "hero",
            "side": "content",
            "data": {
                "title": "Benvenuto",
                "content": "..."
            }
        }
    ]
}
```

## 🎨 Componenti vs Sezioni

### ❌ SBAGLIATO (Approccio Tradizionale)
```blade
@include('design-comuni.pages.homepage')
<x-design-comuni-header />
```

### ✅ CORRETTO (Approccio Sixteen CMS)
```blade
<x-section slug="header" />
<x-page side="content" :slug="$pageSlug" :data="$data" />
<x-section slug="footer" />
```

## 🧘 Lo Zen del CMS

### I Tre Principi

1. **Niente è statico** - Tutto è dinamico dal CMS
2. **Slug sono universali** - `tests.homepage` carica da CMS
3. **Sezioni sono blocchi** - Header/footer sono blocchi CMS

### Il Ciclo di Vita

```
Request: /it/tests/homepage
    ↓
Folio Route: [slug].blade.php
    ↓
Volt Component: mount($slug='homepage')
    ↓
Set: $pageSlug = 'tests.homepage'
    ↓
Render: <x-page slug="tests.homepage" />
    ↓
CMS: Carica pagina da database/JSON
    ↓
Blocks: Renderizza blocchi della pagina
    ↓
Output: HTML finale
```

## 📋 Cosa Significa per Design Comuni

### Approccio CORRETTO

1. **NON creare** 39 file Blade statici
2. **Creare** 1 route dinamica `[slug].blade.php`
3. **Creare** 39 pagine nel CMS (JSON o database)
4. **Usare** blocchi/sezioni per header/footer
5. **Caricare** CSS Tailwind una volta

### Struttura Finale

```
resources/views/pages/tests/
├── [slug].blade.php          ← Route dinamica (Folio + Volt)
└── index.blade.php            ← Index con lista pagine

resources/design-comuni/
├── pages/                     ← Pagine CMS (NON Blade)
│   ├── homepage.json
│   ├── argomenti.json
│   └── ...
└── manifest.php               ← Metadata

Main_files/
├── five/src/
│   └── style.css              ← CSS Tailwind (2145 righe)
└── design-comuni-html/
    └── dist/                  ← HTML originali (riferimento)
```

## 🔄 Flusso di Lavoro

### 1. Creare Route Dinamica
```php
// [slug].blade.php
name('tests.view');
new class extends Component {
    public function mount(string $slug): void {
        $this->pageSlug = 'tests.'.$slug;
    }
};
```

### 2. Creare Pagina CMS
```json
// resources/design-comuni/pages/homepage.json
{
    "slug": "tests.homepage",
    "title": "Homepage Design Comuni",
    "blocks": [
        {
            "type": "hero",
            "content": "..."
        }
    ]
}
```

### 3. Usare Componenti Esistenti
```blade
<x-section slug="header" />
<x-page side="content" :slug="$pageSlug" :data="$data" />
<x-section slug="footer" />
```

## 🎯 Implicazioni Pratiche

### Per Design Comuni

1. **NON serve** creare 39 file `.blade.php`
2. **Serve** creare 39 pagine nel CMS
3. **CSS** è già caricato (design-comuni.css in app.css)
4. **Header/Footer** sono sezioni CMS

### Vantaggi

- ✅ **DRY**: 1 route, N pagine CMS
- ✅ **Manutenibile**: Modifiche al layout in 1 posto
- ✅ **Scalabile**: Nuove pagine senza nuovo codice
- ✅ **CMS-native**: Gli utenti possono creare pagine

## 📚 Riferimenti

### File Chiave
- `resources/views/pages/tests/[slug].blade.php` - Route dinamica
- `resources/views/components/page.blade.php` - CMS page renderer
- `resources/views/components/section.blade.php` - Section renderer

### Documentazione
- `docs/prompts/replikate.txt` - Istruzioni originali
- `docs/design-comuni/FINAL_STRUCTURE.md` - Struttura (da aggiornare)
- `docs/design-comuni/THEME_PLAN.md` - Piano (da aggiornare)

## ✅ Checklist Correzione

- [x] Capire filosofia Folio + Volt
- [x] Capire sistema CMS pages
- [x] Capire sezioni vs componenti
- [ ] Aggiornare `[slug].blade.php` con Folio + Volt
- [ ] Creare pagine CMS (JSON) invece di Blade
- [ ] Aggiornare documentazione
- [ ] Documentare nel README del modulo/tema

---

**Lezione Appresa**: Il tema Sixteen usa un approccio CMS-native con Folio + Volt. Non creare pagine Blade statiche, ma route dinamiche che caricano contenuti dal CMS.

**Prossimo Step**: Riscrivere `[slug].blade.php` con Folio + Volt e creare pagine CMS JSON.
