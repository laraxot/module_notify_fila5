# Pages Content Blocks - Guida alla Conversione

## Panoramica

I file JSON in `config/local/[project_name]/database/content/pages/` definiscono le pagine del sito. Ogni pagina può contenere uno o più blocchi (`content_blocks`) che vengono renderizzati nell'ordine specificato.

> **Nota**: Sostituisci `[project_name]` con il nome effettivo del tuo progetto (es: `fixcity`, `myproject`, etc.)

## Struttura JSON Base

```json
{
    "id": "tests.homepage",
    "title": {
        "it": "Homepage",
        "en": "Homepage"
    },
    "slug": "tests.homepage",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "page_block",
                "data": {
                    "view": "pub_theme::components.blocks.tests.reference-page",
                    "title": "Homepage",
                    "category": "Generali",
                    "summary": "La homepage del sito comunale.",
                    "source_url": "https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html",
                    "slug": "tests.homepage"
                }
            }
        ],
        "en": []
    },
    "sidebar_blocks": {
        "it": [],
        "en": []
    },
    "footer_blocks": {
        "it": "",
        "en": ""
    }
}
```

## Regola: Multiple Blocchi per Conversione Completa

** PRINCIPIO**: Ogni pagina **DEVE** contenere più blocchi per essere convertita correttamente. Un singolo blocco è accettabile solo in casi eccezionali.

### Perché Più Blocchi?

1. **Modularità**: Ogni sezione della pagina può essere gestita separatamente
2. **Riutilizzo**: I blocchi possono essere riutilizzati in altre pagine
3. **Manutenzione**: Modifiche局部i non affectano l'intera pagina
4. **Filament Builder**: L'interfaccia admin supporta drag & drop per riordinare
5. **Traduzione**: Ogni blocco può avere versioni lingue diverse

### Esempio: Da 1 Blocco a Multipli

**PRIMA (1 blocco - DA EVITARE)**:
```json
"content_blocks": {
    "it": [
        {
            "type": "page_block",
            "data": {
                "view": "pub_theme::components.blocks.tests.reference-page",
                "title": "Homepage",
                ...
            }
        }
    ]
}
```

**DOPO (multipli blocchi - CONSIGLIATO)**:
```json
"content_blocks": {
    "it": [
        {
            "type": "hero",
            "data": {
                "view": "pub_theme::components.blocks.hero.homepage",
                "title": "Benvenuto",
                "subtitle": "La piattaforma per [tuo servizio principale]"
            }
        },
        {
            "type": "servizi_list",
            "data": {
                "view": "pub_theme::components.blocks.widget.servizi",
                "title": "I nostri servizi"
            }
        },
        {
            "type": "novita",
            "data": {
                "view": "pub_theme::components.blocks.latest.news",
                "title": "Ultime notizie"
            }
        },
        {
            "type": "contact",
            "data": {
                "view": "pub_theme::components.blocks.contact.form",
                "title": "Contattaci"
            }
        }
    ]
}
```

> **Nota**: Nell'esempio sopra, `pub_theme` è il namespace del tema. Sostituisci con il namespace del tuo tema (es: `sixteen`, `mytheme`, etc.).

## Tipi di Blocchi Disponibili

### Blocchi di Contenuto
- `hero` - Hero section principale
- `title` - Titolo sezione
- `paragraph` - Testo formattato
- `image` / `image_spatie` - Immagini
- `images_gallery` - Galleria immagini

### Blocchi Speciali
- `widget` - Widget Filament
- `rating` - Sistema valutazioni
- `chart` - Grafici

### Blocchi di Layout
- `feature_sections` - Sezioni con caratteristiche
- `landing_page` - Landing page
- `page_block` - Blocco generico di riferimento

## Gestione in Amministrazione (Filament)

I blocchi vengono gestiti tramite [Filament Builder](https://filamentphp.com/docs/5.x/forms/builder):

```php
// Esempio di configurazione Builder
Builder::make('content_blocks')
    ->blocks([
        Builder\Block::make('hero')
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('subtitle'),
                FileUpload::make('image'),
            ]),
        Builder\Block::make('paragraph')
            ->schema([
                RichEditor::make('content'),
            ]),
        // Altri blocchi...
    ])
    ->collapsible();
```

### Vantaggi del Builder Filament
- **Drag & Drop**: Riordinamento intuitivo
- **Validazione**: Controllo automatico dati
- **Preview**: Anteprima in tempo reale
- **Versioning**: Gestione versioni

## Convenzioni di Naming

### File JSON
- Posizione: `config/local/<directory>/database/content/pages/`
- Naming: `kebab-case.json` (es: `tests.homepage.json`)

### View Blade
- Posizione: `Themes/*/resources/views/components/blocks/`
- Struttura: `category/view_name.blade.php`
- Namespace: `pub_theme::components.blocks.category.view_name`

## Best Practices

1. **Sempre multipli blocchi**: Tranne casi eccezionali
2. **Un blocco per sezione**: Non combinare contenuti diversi
3. **Localizzazione**: Supportare sempre almeno italiano e inglese
4. **Validazione view**: Ogni blocco DEVE avere una view esistente
5. **Fallback**: Prevedere fallback per view mancanti
6. **Tipizzazione**: Usare i tipi di blocco appropriati

## Riferimenti

- [Content Blocks Architecture](./content_blocks_architecture.md)
- [Content Blocks System](./content_blocks_system.md)
- [Filament Builder Docs](https://filamentphp.com/docs/5.x/forms/builder)
- [BlockData Implementation](../app/Datas/BlockData.php)
- [ArticleContent Example (Blog Module)](../../Blog/app/Filament/Fields/ArticleContent.php)
