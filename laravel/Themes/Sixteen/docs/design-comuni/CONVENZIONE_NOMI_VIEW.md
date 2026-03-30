# 🎨 Design Comuni - Convenzione Nomi View Blocchi

**Data**: 2026-03-30  
**Stato**: Documentazione Architetturale  
**Versione**: 1.0.0

## 🎯 La Regola Fondamentale

### Convenzione Nomi View

La view di un blocco DEVE seguire questa convenzione:

```
pub_theme::components.blocks.{tipo_blocco}.{nome_blade}
```

Dove:
- **{tipo_blocco}** = Il tipo di blocco (hero, paragraph, links, etc.)
- **{nome_blade}** = Il nome specifico del blade (default, main, enhanced, etc.)

## 📁 Struttura Directory

```
Themes/Sixteen/resources/views/components/blocks/
├── hero/
│   ├── default.blade.php
│   ├── main.blade.php
│   ├── enhanced.blade.php
│   └── about.blade.php
├── paragraph/
│   ├── default.blade.php
│   └── simple.blade.php
├── links/
│   ├── default.blade.php
│   ├── grid.blade.php
│   └── list.blade.php
├── feature_sections/
│   ├── default.blade.php
│   └── grid.blade.php
├── cta/
│   ├── default.blade.php
│   └── banner.blade.php
├── info/
│   ├── default.blade.php
│   └── grid.blade.php
├── stats/
│   ├── default.blade.php
│   └── overview.blade.php
├── contact/
│   ├── default.blade.php
│   └── card.blade.php
├── breadcrumb/
│   └── default.blade.php
└── ...
```

## 📝 Esempi Corretti

### Hero Block
```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.default",
        "title": "Benvenuto",
        "subtitle": "Un comune da vivere"
    }
}
```

### Paragraph Block
```json
{
    "type": "paragraph",
    "data": {
        "view": "pub_theme::components.blocks.paragraph.default",
        "content": "<p>Contenuto del paragrafo</p>"
    }
}
```

### Links Block
```json
{
    "type": "links",
    "data": {
        "view": "pub_theme::components.blocks.links.grid",
        "title": "Link utili",
        "links": [...]
    }
}
```

### Feature Sections Block
```json
{
    "type": "feature_sections",
    "data": {
        "view": "pub_theme::components.blocks.feature_sections.default",
        "title": "Sezioni",
        "sections": [...]
    }
}
```

### CTA Block
```json
{
    "type": "cta",
    "data": {
        "view": "pub_theme::components.blocks.cta.default",
        "title": "Call to Action",
        "button_text": "Clicca qui"
    }
}
```

### Info Block
```json
{
    "type": "info",
    "data": {
        "view": "pub_theme::components.blocks.info.default",
        "title": "Informazioni",
        "items": [...]
    }
}
```

### Stats Block
```json
{
    "type": "stats",
    "data": {
        "view": "pub_theme::components.blocks.stats.default",
        "title": "Statistiche",
        "stats": [...]
    }
}
```

### Contact Block
```json
{
    "type": "contact",
    "data": {
        "view": "pub_theme::components.blocks.contact.default",
        "title": "Contatti",
        "email": "info@comune.it"
    }
}
```

### Breadcrumb Block
```json
{
    "type": "breadcrumb",
    "data": {
        "view": "pub_theme::components.blocks.breadcrumb.default",
        "items": [...]
    }
}
```

## ❌ Errori da Evitare

### 1. View Mancante
```json
❌ SBAGLIATO
{
    "type": "hero",
    "data": {
        "title": "Benvenuto"
    }
}

✅ CORRETTO
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.default",
        "title": "Benvenuto"
    }
}
```

### 2. View con Nome Sbagliato
```json
❌ SBAGLIATO
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero",
        "title": "Benvenuto"
    }
}

✅ CORRETTO
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.default",
        "title": "Benvenuto"
    }
}
```

### 3. View con Percorso Sbagliato
```json
❌ SBAGLIATO
{
    "type": "hero",
    "data": {
        "view": "pub_theme::blocks.hero.default",
        "title": "Benvenuto"
    }
}

✅ CORRETTO
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.default",
        "title": "Benvenuto"
    }
}
```

## 🔍 Blocchi Disponibili

### Blocchi Base (con view `default.blade.php`)

1. **hero** → `pub_theme::components.blocks.hero.default`
2. **paragraph** → `pub_theme::components.blocks.paragraph.default`
3. **links** → `pub_theme::components.blocks.links.default` (o `grid`, `list`)
4. **feature_sections** → `pub_theme::components.blocks.feature_sections.default`
5. **cta** → `pub_theme::components.blocks.cta.default`
6. **info** → `pub_theme::components.blocks.info.default`
7. **stats** → `pub_theme::components.blocks.stats.default`
8. **contact** → `pub_theme::components.blocks.contact.default`
9. **breadcrumb** → `pub_theme::components.blocks.breadcrumb.default`

### Blocchi con Varianti

10. **links**
    - `pub_theme::components.blocks.links.grid`
    - `pub_theme::components.blocks.links.list`

11. **hero**
    - `pub_theme::components.blocks.hero.main`
    - `pub_theme::components.blocks.hero.enhanced`

12. **cta**
    - `pub_theme::components.blocks.cta.banner`

13. **stats**
    - `pub_theme::components.blocks.stats.overview`

## 📋 Template Pagina Completa

```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.default",
                    "title": "Il mio Comune",
                    "subtitle": "Un comune da vivere"
                }
            },
            {
                "type": "feature_sections",
                "data": {
                    "view": "pub_theme::components.blocks.feature_sections.default",
                    "title": "Servizi in evidenza",
                    "sections": [...]
                }
            },
            {
                "type": "paragraph",
                "data": {
                    "view": "pub_theme::components.blocks.paragraph.default",
                    "content": "<p>Contenuto</p>"
                }
            },
            {
                "type": "links",
                "data": {
                    "view": "pub_theme::components.blocks.links.grid",
                    "title": "Link",
                    "links": [...]
                }
            },
            {
                "type": "stats",
                "data": {
                    "view": "pub_theme::components.blocks.stats.default",
                    "title": "Statistiche",
                    "stats": [...]
                }
            },
            {
                "type": "cta",
                "data": {
                    "view": "pub_theme::components.blocks.cta.default",
                    "title": "Contattaci",
                    "button_text": "Vai"
                }
            }
        ]
    }
}
```

## ✅ Checklist Verifica

Per ogni blocco JSON:

- [ ] Il campo `"view"` è presente in `"data"`
- [ ] La view inizia con `pub_theme::components.blocks.`
- [ ] La view include il tipo di blocco: `.{tipo_blocco}.`
- [ ] La view include il nome del blade: `.{nome_blade}`
- [ ] Il formato completo è: `pub_theme::components.blocks.{tipo}.{blade}`

## 📚 Riferimenti

### Directory View Blocchi
- `Themes/Sixteen/resources/views/components/blocks/`

### Documentazione
- `SISTEMA_BLOCCHI_FILAMENT.md` - Sistema blocchi
- `AGGIORNAMENTO_JSON_MULTI_BLOCCHI.md` - Guida aggiornamento

---

**Lezione Appresa**: La view di ogni blocco DEVE seguire la convenzione `pub_theme::components.blocks.{tipo}.{blade}` per essere correttamente renderizzata dal sistema CMS.

**Prossimo Step**: Correggere tutti i file JSON esistenti per usare la convenzione corretta.
