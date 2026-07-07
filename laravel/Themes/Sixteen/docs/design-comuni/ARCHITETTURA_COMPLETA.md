# 📜 Design Comuni - Architettura Completa del Sistema

**Data**: 2026-03-30  
**Stato**: Documentazione Definitiva  
**Versione**: 3.0.0 (Corretta e Completa)

## 🎯 La Verità Rivelata

### Il Sistema CMS di Sixteen

Sixteen usa un **sistema CMS JSON-based** che legge i contenuti da file invece che da database.

## 🏛️ Architettura COMPLETA

### 1. Route Folio + Volt
```
/it/tests/{slug}
    ↓
resources/views/pages/tests/[slug].blade.php
    ↓
Folio Route + Volt Component
```

### 2. Volt Component
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
```

### 3. Rendering con `<x-page>`
```blade
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

### 4. CMS Legge JSON
```
<x-page slug="tests.homepage" />
    ↓
Cerca: config/local/fixcity/database/content/pages/tests.homepage.json
    ↓
Carica blocchi JSON
    ↓
Renderizza blocchi
    ↓
Output HTML con Tailwind CSS
```

## 📁 Struttura File JSON

### Posizione
```
config/local/fixcity/database/content/pages/tests.{slug}.json
```

### Schema
```json
{
    "id": "tests-{slug}",
    "title": {
        "it": "Titolo",
        "en": "Title"
    },
    "slug": "tests.{slug}",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "title": "Hero Title",
                    "content": "Content"
                }
            }
        ]
    },
    "sidebar_blocks": {"it": []},
    "footer_blocks": {"it": ""}
}
```

## 🧩 Blocchi Disponibili

### Hero
```json
{
    "type": "hero",
    "data": {
        "title": "Titolo",
        "subtitle": "Sottotitolo",
        "content": "Contenuto HTML"
    }
}
```

### Breadcrumb
```json
{
    "type": "breadcrumb",
    "data": {
        "items": [
            {"label": "Home", "url": "/"},
            {"label": "Pagina", "url": null}
        ]
    }
}
```

### Card Grid
```json
{
    "type": "card_grid",
    "data": {
        "title": "Titolo sezione",
        "cards": [
            {
                "title": "Titolo card",
                "content": "Contenuto",
                "url": "/link"
            }
        ]
    }
}
```

### Text
```json
{
    "type": "text",
    "data": {
        "content": "<p>HTML content</p>"
    }
}
```

## 🔄 Flusso Completo

```
Browser: /it/tests/homepage
    ↓
Folio: resources/views/pages/tests/[slug].blade.php
    ↓
Volt: mount($slug='homepage')
    ↓
Set: $pageSlug = 'tests.homepage'
    ↓
Blade: <x-page slug="tests.homepage" />
    ↓
CMS: Cerca config/local/fixcity/database/content/pages/tests.homepage.json
    ↓
Sushi: Carica JSON come modello Eloquent
    ↓
Blocks: Itera su content_blocks
    ↓
Components: Renderizza ogni blocco
    ↓
CSS: Tailwind (design-comuni.css)
    ↓
Output: HTML finale
```

## 📊 Stato Pagine

### Esistenti
- ✅ `tests.appuntamento-06-conferma.json` - Già creata

### Da Creare (38)
- Generali: 8
- Amministrazione: 2
- Novità: 2
- Servizi: 3
- Vivere il Comune: 2
- Prenotazione: 7
- Assistenza: 2
- Segnalazione: 6
- **Totale**: 32

## 🎯 Cosa Fare

### 1. NON Creare Blade Statiche
```blade
❌ SBAGLIATO
resources/views/design-comuni/pages/homepage.blade.php
```

### 2. Creare File JSON
```json
✅ CORRETTO
config/local/fixcity/database/content/pages/tests.homepage.json
```

### 3. Usare Blocchi
```json
{
    "content_blocks": {
        "it": [
            {"type": "hero", "data": {...}},
            {"type": "card_grid", "data": {...}}
        ]
    }
}
```

### 4. CSS Tailwind
Già incluso in `resources/css/app.css`:
```css
@import "./design-comuni.css";
```

## 📝 Esempio Completo

### File: `tests.homepage.json`
```json
{
    "id": "tests-homepage",
    "title": {
        "it": "Homepage Design Comuni"
    },
    "slug": "tests.homepage",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "title": "Benvenuto nel Comune",
                    "subtitle": "Un comune da vivere",
                    "content": "<p>Scopri i servizi</p>"
                }
            },
            {
                "type": "card_grid",
                "data": {
                    "title": "Servizi",
                    "cards": [
                        {
                            "title": "Servizi Digitali",
                            "url": "/it/tests/servizi"
                        }
                    ]
                }
            }
        ]
    }
}
```

### Test
```
http://fixcity.local/it/tests/homepage
```

## 🔗 Riferimenti

### File Chiave
- `resources/views/pages/tests/[slug].blade.php` - Route Folio
- `config/local/fixcity/database/content/pages/*.json` - Pagine CMS
- `resources/css/design-comuni.css` - CSS Tailwind

### Documentazione
- `GUIDA_CREAZIONE_PAGINE_JSON.md` - Come creare JSON
- `ARCHITETTURA_E FILOSOFIA.md` - Filosofia
- `Modules/Cms/docs/content-storage.md` - Sistema CMS
- `Modules/Cms/docs/content_blocks_system.md` - Blocchi

## ✅ Lezioni Apprese

1. **Folio** per route file-based
2. **Volt** per componenti reattivi
3. **CMS JSON-based** per contenuti
4. **`<x-page>`** legge da file JSON
5. **Blocchi** definiscono contenuto
6. **Tailwind CSS** per styling
7. **NON creare** Blade statiche

## 🧘 Lo Zen del CMS

> "La pagina non è file Blade,  
> ma JSON che diventa contenuto.  
> Il blocco è l'atomo,  
> il CSS è Tailwind,  
> Folio è la via,  
> Volt è il motore."

---

**Stato**: ✅ Architettura completa compresa e documentata  
**Prossimo Step**: Creare 38 file JSON per pagine Design Comuni
