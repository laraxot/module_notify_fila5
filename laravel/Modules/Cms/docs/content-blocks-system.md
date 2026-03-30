# Sistema Content Blocks

## Panoramica

Il sistema Content Blocks utilizza il Builder di Filament per creare pagine dinamiche composte da blocchi riutilizzabili. Ogni pagina e` definita tramite file JSON che contengono la configurazione dei `content_blocks`.

## Principio fondamentale

Una pagina CMS completa non coincide quasi mai con un singolo blocco.

Regola pratica:
- `0` blocchi = scaffold tecnico iniziale, non conversione completata
- `1` blocco = caso raro e consapevole
- `2+` blocchi = baseline normale per una pagina realmente convertita

Questo deriva direttamente dalla semantica del `Builder` di Filament 5: il builder nasce per modellare una sequenza ordinabile di blocchi eterogenei, non per nascondere una pagina intera dentro un solo blob.

## Struttura dei Content Blocks

### Schema JSON Base

```json
{
    "id": "unique_id",
    "title": {
        "it": "Titolo in italiano",
        "en": "Title in english"
    },
    "slug": "page-slug",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "block_type",
                "data": {
                    "view": "pub_theme::components.blocks.category.view_name",
                    "property1": "value1",
                    "property2": "value2"
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
    },
    "created_at": "timestamp",
    "updated_at": "timestamp",
    "created_by": "user_id",
    "updated_by": "user_id"
}
```

## Scaffold vs conversione

Per le pagine `tests.*` del catalogo Design Comuni il repository puo` contenere scaffold JSON vuoti o quasi vuoti per stabilizzare il routing CMS:
- il file esiste
- lo `slug` e` coerente
- `x-page` puo` risolvere il contenuto

Questo NON significa che la pagina sia stata convertita davvero.

Una conversione reale richiede almeno:
1. analisi della pagina sorgente
2. scomposizione in blocchi logici
3. riuso dei blocchi gia` esistenti dove possibile
4. creazione di nuovi blocchi solo se il design non si lascia esprimere con quelli disponibili
5. popolamento di `content_blocks`, `sidebar_blocks` e `footer_blocks` in modo coerente

## Tipi di Blocchi Disponibili

### 1. Hero Block

Blocco principale della pagina con titolo, sottotitolo, immagine e call-to-action.

```json
{
    "type": "hero",
    "data": {
        "view": "pub_theme::components.blocks.hero.view_name",
        "title": "Titolo principale",
        "subtitle": "Sottotitolo descrittivo",
        "image": "url_immagine",
        "cta_text": "Testo bottone",
        "cta_link": "/events",
        "background_color": "bg-white",
        "text_color": "text-gray-900",
        "cta_color": "bg-indigo-600 hover:bg-indigo-700"
    }
}
```

### 2. Services Block

Blocchi elenco o griglia per servizi, voci o card coerenti con il tipo `services`.

```json
{
    "type": "services",
    "data": {
        "view": "pub_theme::components.blocks.services.grid",
        "title": "Titolo sezione",
        "sections": [
            {
                "title": "Titolo elemento",
                "description": "Descrizione dettagliata",
                "icon": "nome_icona"
            }
        ]
    }
}
```

### 3. Widget Block

Blocco per includere widget Filament dinamici.

```json
{
    "type": "widget",
    "data": {
        "view": "pub_theme::components.blocks.widget.simple",
        "widget": "Modules\ModuleName\Filament\Widgets\WidgetClass"
    }
}
```

### 4. Landing Page Block

Blocco specializzato per landing page.

```json
{
    "type": "landing-page",
    "data": {
        "view": "pub_theme::components.blocks.hero.landing-page",
        "title": "Titolo landing",
        "subtitle": "Sottotitolo",
        "image": "url_immagine",
        "cta_text": "Call to action",
        "cta_link": "/auth/register",
        "background_color": "bg-white",
        "text_color": "text-gray-900",
        "cta_color": "bg-indigo-600 hover:bg-indigo-700"
    }
}
```

## Sistema di Rendering

### BlockData Class
La classe `BlockData` gestisce la validazione e il rendering dei blocchi:

```php
class BlockData extends Data implements Wireable
{
    public string $type;
    public array $data;
    public string $view;

    public function __construct(string $type, array $data) {
        $this->type = $type;
        $this->data = $data;
        $view = Arr::get($data, 'view', 'ui::empty');
        if (!view()->exists($view)) {
            throw new \Exception('view not found: ' . $view);
        }
        $this->view = $view;
    }
}
```

### Rendering Process
1. Il JSON viene caricato dal modello `Page`
2. I `content_blocks` vengono processati da `BlockData::collect()`
3. Ogni blocco viene renderizzato tramite la sua view specificata
4. Le view sono organizzate nel tema attivo e nei moduli riusabili

## Convenzioni di Naming

### File JSON
- Posizionati in: `config/local/<directory progetto>/database/content/pages/`
- Naming pagina: `tests.<slug>.json` per le pagine demo CMS-driven
- In caso di collisione di basename: prefisso folder nel solo slug appiattito, ad esempio `tests.sito-index.json`

### View Blade
- Posizionate preferibilmente nel tema attivo: `Themes/{pub_theme}/resources/views/components/blocks/`
- Possono essere riusate anche dal modulo UI se gia` adeguate
- Namespace tema: `pub_theme::components.blocks.category.view_name`

### Proprietà Data
- Utilizzare `snake_case` per le proprietà nei data
- Mantenere coerenza con le convenzioni CSS e semantiche del blocco

## Best Practices

1. **Validazione View**: ogni blocco deve specificare una view esistente
2. **Localizzazione**: supportare sempre almeno italiano e inglese
3. **Riutilizzabilita`**: progettare blocchi per essere riutilizzabili tra pagine
4. **No mega-block**: evitare di inglobare una pagina intera in un solo blocco generico
5. **Performance**: evitare logica complessa nei template, delegare ai widget dove ha senso
6. **DRY + KISS**: prima cercare un blocco esistente nel tema o in `Modules/UI`, poi eventualmente estendere

## Integrazione con Filament Builder

Il sistema utilizza il Builder di Filament 5 per la gestione dinamica dei blocchi nell'interfaccia admin.

### Configurazione Builder

```php
Builder::make('content_blocks')
    ->blocks([
        Builder\Block::make('hero')
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('subtitle'),
                FileUpload::make('image'),
                TextInput::make('cta_text'),
                TextInput::make('cta_link'),
            ]),
        Builder\Block::make('services')
            ->schema([
                TextInput::make('title'),
                Repeater::make('sections')
                    ->schema([
                        TextInput::make('title'),
                        Textarea::make('description'),
                        TextInput::make('icon'),
                    ]),
            ]),
    ])
```

## Perche'

### Logica
Una pagina pubblica e` una composizione ordinata di unita` editoriali, non un frammento HTML monolitico.

### Visione
Il CMS deve permettere di spostare, riordinare, sostituire e riusare sezioni senza dover riscrivere la pagina da zero.

### Filosofia
Il blocco e` l'unita` minima significativa di authoring. La pagina e` l'orchestrazione dei blocchi.

### Politica
Il repository favorisce contenuti JSON + `x-page` + `pub_theme`, e scoraggia template statici special-case che bypassano il CMS.

### Religione
DRY + KISS: pochi blocchi ben progettati, riusati molte volte, invece di molte pagine speciali non componibili.

### Zen
Prima spezza, poi riusa, poi rifinisci. Non comprimere tutto in un solo blocco per fretta.

## Troubleshooting

### View Not Found
Errore: `view not found: pub_theme::components.blocks.category.view_name`
- verificare che il file blade esista nel percorso corretto
- controllare la sintassi del namespace della view

### Missing Properties
Errore: proprietà mancanti nel template
- verificare che tutte le proprietà richieste siano presenti nel data del blocco
- utilizzare `??` per valori opzionali

## Collegamenti
- [Builder - Filament 5.x](https://filamentphp.com/docs/5.x/forms/builder)
- [Architettura Content Blocks](./content_blocks_architecture.md)
- [CMS-Driven Pages](./cms-driven-pages-system.md)
- [BlockData Implementation](../app/Datas/BlockData.php)
- [Page Model](../app/Models/Page.php)
- [Theme Components](../../../Themes/Sixteen/resources/views/components/blocks/)

