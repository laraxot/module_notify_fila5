# 🧩 Design Comuni - Sistema Blocchi Filament

**Data**: 2026-03-30  
**Stato**: Documentazione Architetturale  
**Versione**: 1.0.0

## 🎯 La Filosofia dei Blocchi

### Il Sistema CMS di Sixteen

Sixteen usa un sistema **page builder** basato su **Filament Forms Builder**. Ogni pagina è composta da **blocchi riutilizzabili** gestiti tramite Filament.

## 🏛️ Architettura dei Blocchi

### 1. Blocchi Filament (PHP)

I blocchi sono definiti in:
```
Modules/Cms/app/Filament/Blocks/
├── HeroBlock.php
├── FeatureSectionsBlock.php
├── CtaBlock.php
├── InfoBlock.php
├── ParagraphBlock.php
├── LinksBlock.php
├── NavigationBlock.php
├── ContactBlock.php
├── NewsletterBlock.php
├── StatsBlock.php
├── LogoBlock.php
├── SocialBlock.php
├── SocialLinksBlock.php
├── QuickLinksBlock.php
└── ActionsBlock.php
```

### 2. Struttura JSON con PIÙ Blocchi

Ogni pagina JSON deve contenere **MULTIPLI blocchi** nella sezione `content_blocks`:

```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.default",
                    "title": "Benvenuto",
                    "subtitle": "Sottotitolo",
                    "image": "/images/hero.jpg"
                }
            },
            {
                "type": "feature_sections",
                "data": {
                    "view": "pub_theme::components.blocks.feature_sections.default",
                    "title": "Caratteristiche",
                    "sections": [
                        {
                            "title": "Feature 1",
                            "description": "Descrizione",
                            "icon": "it-services"
                        }
                    ]
                }
            },
            {
                "type": "cta",
                "data": {
                    "view": "pub_theme::components.blocks.cta.default",
                    "title": "Call to Action",
                    "button_text": "Clicca qui",
                    "button_url": "/link"
                }
            }
        ]
    }
}
```

## 📋 Blocchi Disponibili

### HeroBlock
**Scopo**: Hero section principale della pagina

**Campi**:
- `title` (string) - Titolo principale
- `subtitle` (string) - Sottotitolo
- `image` (string) - URL immagine
- `cta_text` (string) - Testo bottone
- `cta_link` (string) - Link bottone
- `background_color` (string) - Colore sfondo
- `text_color` (string) - Colore testo

**Esempio**:
```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.default",
        "title": "Benvenuto nel Comune",
        "subtitle": "Un comune da vivere",
        "image": "/images/hero.jpg",
        "cta_text": "Scopri di più",
        "cta_link": "/it/tests/argomenti",
        "background_color": "bg-italia-blue-500",
        "text_color": "text-white"
    }
}
```

### FeatureSectionsBlock
**Scopo**: Sezioni con caratteristiche o servizi

**Campi**:
- `title` (string) - Titolo sezione
- `sections` (array) - Lista sezioni
  - `title` (string) - Titolo elemento
  - `description` (string) - Descrizione
  - `icon` (string) - Icona

**Esempio**:
```json
{
    "type": "feature_sections",
    "data": {
        "view": "pub_theme::components.blocks.feature_sections.default",
        "title": "Servizi in evidenza",
        "sections": [
            {
                "title": "Servizi Digitali",
                "description": "Accedi ai servizi online",
                "icon": "it-services"
            },
            {
                "title": "Amministrazione",
                "description": "Giunta e consiglio",
                "icon": "it-pa"
            }
        ]
    }
}
```

### CtaBlock
**Scopo**: Call-to-action con bottone

**Campi**:
- `title` (string) - Titolo
- `description` (string) - Descrizione
- `button_text` (string) - Testo bottone
- `button_url` (string) - Link bottone

**Esempio**:
```json
{
    "type": "cta",
    "data": {
        "view": "pub_theme::components.blocks.cta.default",
        "title": "Pronto a iniziare?",
        "description": "Scopri tutti i servizi disponibili",
        "button_text": "Vai ai servizi",
        "button_url": "/it/tests/servizi"
    }
}
```

### ParagraphBlock
**Scopo**: Blocco di testo semplice

**Campi**:
- `content` (string) - Contenuto HTML
- `class` (string) - Classi CSS aggiuntive

**Esempio**:
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

### InfoBlock
**Scopo**: Blocco informativo con icone

**Campi**:
- `title` (string) - Titolo
- `items` (array) - Lista elementi
  - `icon` (string) - Icona
  - `title` (string) - Titolo elemento
  - `description` (string) - Descrizione

### LinksBlock
**Scopo**: Lista di link

**Campi**:
- `title` (string) - Titolo
- `links` (array) - Lista link
  - `label` (string) - Etichetta
  - `url` (string) - URL

### NavigationBlock
**Scopo**: Navigazione della pagina

**Campi**:
- `items` (array) - Elementi navigazione
- `style` (string) - Stile navigazione

### ContactBlock
**Scopo**: Modulo di contatto

**Campi**:
- `title` (string) - Titolo
- `email` (string) - Email
- `phone` (string) - Telefono
- `address` (string) - Indirizzo

### NewsletterBlock
**Scopo**: Iscrizione newsletter

**Campi**:
- `title` (string) - Titolo
- `description` (string) - Descrizione
- `placeholder` (string) - Placeholder email

### StatsBlock
**Scopo**: Statistiche e numeri

**Campi**:
- `title` (string) - Titolo
- `stats` (array) - Lista statistiche
  - `label` (string) - Etichetta
  - `value` (string|number) - Valore
  - `icon` (string) - Icona

### LogoBlock
**Scopo**: Logo istituzionale

**Campi**:
- `logo` (string) - URL logo
- `title` (string) - Titolo
- `subtitle` (string) - Sottotitolo

### SocialBlock / SocialLinksBlock
**Scopo**: Link social media

**Campi**:
- `title` (string) - Titolo
- `links` (array) - Lista social
  - `platform` (string) - Piattaforma
  - `url` (string) - URL profilo

### QuickLinksBlock
**Scopo**: Link rapidi

**Campi**:
- `title` (string) - Titolo
- `links` (array) - Lista link rapidi

### ActionsBlock
**Scopo**: Azioni rapide

**Campi**:
- `actions` (array) - Lista azioni
  - `label` (string) - Etichetta
  - `icon` (string) - Icona
  - `url` (string) - URL

## 📝 Esempio Pagina Completa con PIÙ Blocchi

### Homepage (tests.homepage.json)

```json
{
    "id": "tests-homepage",
    "slug": "tests.homepage",
    "title": {
        "it": "Homepage - Il mio Comune",
        "en": "Homepage - My Municipality"
    },
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.default",
                    "title": "Il mio Comune",
                    "subtitle": "Un comune da vivere",
                    "content": "<p>Benvenuto nel portale del tuo Comune</p>",
                    "background_color": "bg-italia-blue-500",
                    "text_color": "text-white"
                }
            },
            {
                "type": "feature_sections",
                "data": {
                    "view": "pub_theme::components.blocks.feature_sections.default",
                    "title": "Servizi in evidenza",
                    "sections": [
                        {
                            "title": "Servizi Digitali",
                            "description": "Accedi ai servizi online",
                            "icon": "it-services"
                        },
                        {
                            "title": "Amministrazione",
                            "description": "Giunta e consiglio",
                            "icon": "it-pa"
                        },
                        {
                            "title": "Novità",
                            "description": "Comunicati e avvisi",
                            "icon": "it-info-circle"
                        }
                    ]
                }
            },
            {
                "type": "paragraph",
                "data": {
                    "view": "pub_theme::components.blocks.paragraph.default",
                    "content": "<p>Esplora per argomenti</p>",
                    "class": "text-center text-xl"
                }
            },
            {
                "type": "links",
                "data": {
                    "view": "pub_theme::components.blocks.links.grid",
                    "title": "Argomenti principali",
                    "links": [
                        {
                            "label": "Iscrizioni",
                            "url": "/it/tests/argomento/iscrizioni"
                        },
                        {
                            "label": "Estate in città",
                            "url": "/it/tests/argomento/estate"
                        },
                        {
                            "label": "Polizia locale",
                            "url": "/it/tests/argomento/polizia"
                        }
                    ]
                }
            },
            {
                "type": "cta",
                "data": {
                    "view": "pub_theme::components.blocks.cta.default",
                    "title": "Hai bisogno di aiuto?",
                    "description": "Contatta l'ufficio relazioni con il pubblico",
                    "button_text": "Contattaci",
                    "button_url": "/it/tests/assistenza"
                }
            }
        ],
        "en": []
    },
    "sidebar_blocks": {"it": []},
    "footer_blocks": {"it": ""}
}
```

## 🔄 Flusso di Rendering

1. **Caricamento JSON** → Il file JSON viene caricato dal CMS
2. **Parsing Blocchi** → I `content_blocks` vengono processati
3. **Rendering Sequenziale** → Ogni blocco viene renderizzato nell'ordine definito
4. **Output HTML** → L'HTML finale è la somma di tutti i blocchi

## ✅ Best Practices

### 1. Usare PIÙ Blocchi per Pagina
```json
❌ SBAGLIATO - Un solo blocco
{
    "content_blocks": {
        "it": [
            {"type": "hero", "data": {...}}
        ]
    }
}

✅ CORRETTO - Multipli blocchi
{
    "content_blocks": {
        "it": [
            {"type": "hero", "data": {...}},
            {"type": "feature_sections", "data": {...}},
            {"type": "paragraph", "data": {...}},
            {"type": "links", "data": {...}},
            {"type": "cta", "data": {...}}
        ]
    }
}
```

### 2. Riutilizzare Blocchi Esistenti
- Non creare nuovi tipi di blocco se esistono già
- Usare i 16 blocchi Filament disponibili
- Estendere solo se necessario

### 3. Mantenere Blocchi Piccoli
- Ogni blocco dovrebbe fare UNA cosa sola
- Comporre pagine complesse con blocchi semplici
- Seguire principio KISS

### 4. Usare View Corrette
```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.default"
    }
}
```

## 📚 Riferimenti

### File Blocchi Filament
- `Modules/Cms/app/Filament/Blocks/*.php`

### Documentazione
- `Modules/Cms/docs/content_blocks_system.md`
- `Modules/Cms/docs/content_blocks_architecture.md`

### View Blocchi
- `Themes/Sixteen/resources/views/components/blocks/`

---

**Lezione Appresa**: Le pagine JSON devono contenere MULTIPLI blocchi Filament, non uno solo. Ogni pagina è una composizione di blocchi riutilizzabili.

**Prossimo Step**: Aggiornare tutti i JSON esistenti per usare la struttura corretta con più blocchi.
