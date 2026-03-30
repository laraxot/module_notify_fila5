# Design Comuni - Sistema Blocchi Filament

**Data**: 2026-03-30  
**Stato**: Documentazione Architetturale  
**Versione**: 1.1.0

## La Filosofia dei Blocchi

### Il Sistema CMS di Sixteen

Sixteen usa un sistema page builder basato su Filament Forms Builder. Ogni pagina e` composta da blocchi riutilizzabili gestiti tramite Filament.

## Regola non negoziabile

I JSON dentro `laravel/config/local/fixcity/database/content/pages/` solo in casi rari possono contenere un solo blocco utile.

Regola di conversione:
- `0` blocchi: scaffold tecnico o placeholder iniziale
- `1` blocco: eccezione motivata
- `2+` blocchi: caso normale di una pagina realmente convertita

Questa regola esiste per motivi tecnici e editoriali:
- il Builder di Filament modella liste ordinate di blocchi eterogenei
- l'admin deve poter inserire, spostare, clonare e sostituire sezioni
- una pagina monoblocco annulla il vantaggio del CMS e crea accoppiamento inutile

## Architettura dei Blocchi

### 1. Blocchi Filament (PHP)

Blocchi e builder esistenti vivono gia` nei moduli, quindi prima si riusa e poi si crea:

```text
Modules/UI/app/Filament/Blocks/
Modules/Blog/app/Filament/Blocks/
Modules/Fixcity/app/Filament/Blocks/
Modules/Geo/app/Filament/Blocks/
```

Esempi gia` presenti:
- `Hero`
- `Heading`
- `Paragraph`
- `Image`
- `ImageSpatie`
- `ImagesGallery`
- `Slider`
- `TicketListBlock`
- `MapBlock`

### 2. Componenti Blade riusabili

Nel tema Sixteen esistono gia` componenti riutilizzabili che possono diventare target dei blocchi JSON:

```text
Themes/Sixteen/resources/views/components/blocks/
```

Aree gia` presenti:
- `hero/*`
- `features/*`
- `services/*`
- `cta/*`
- `navigation/*`
- `cards/*`
- `forms/*`
- `stats/*`
- `tests/*`
- `widget/*`

### 3. Struttura JSON con piu` blocchi

Ogni pagina JSON deve essere pensata come composizione, non come dump:

```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.main",
                    "title": "Benvenuto",
                    "subtitle": "Sottotitolo",
                    "image": "/images/hero.jpg"
                }
            },
            {
                "type": "feature_sections",
                "data": {
                    "view": "pub_theme::components.blocks.features.grid",
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
                    "view": "pub_theme::components.blocks.cta.banner",
                    "title": "Call to Action",
                    "button_text": "Clicca qui",
                    "button_url": "/link"
                }
            }
        ],
        "en": []
    }
}
```

## Scaffold non significa conversione

Per il rollout delle pagine statiche Design Comuni e` legittimo creare prima il baseline dei file `tests.*.json` per stabilizzare:
- slug
- route Folio/Volt
- aggancio a `x-page`

Pero` il lavoro non si considera concluso finche` la pagina non viene spezzata in blocchi logici.

## Processo corretto di conversione pagina

1. studiare il template sorgente
2. individuare le sezioni semantiche
3. mappare ogni sezione su un blocco esistente
4. introdurre un nuovo blocco solo se i blocchi esistenti non bastano
5. popolare `content_blocks`, `sidebar_blocks`, `footer_blocks`
6. verificare in frontend la resa finale in Tailwind + Alpine + Vite

## Perche'

### Logica
Una pagina pubblica contiene header contestuale, breadcrumb, hero, corpo, liste, informazioni laterali, CTA, footer locale. Quasi mai tutto questo coincide con un solo blocco.

### Visione
L'obiettivo non e` replicare HTML statico. L'obiettivo e` ottenere una libreria di sezioni riusabili che permetta di ricostruire piu` pagine con meno codice.

### Filosofia
Le pagine sono composizione. I blocchi sono grammatica. Le view sono pronuncia.

### Politica
Ogni task puo` essere svolto da piu` agenti, quindi serve un contratto stabile: slug canonico, blocchi piccoli, naming coerente, niente mega-template privati che nessun altro puo` riusare.

### Religione
DRY + KISS: se due pagine condividono una sezione, condividono lo stesso blocco.

### Zen
Scomporre bene una pagina oggi evita cinque fork domani.

## Integrazione admin

Il backend deve riflettere questa filosofia tramite Filament Builder:
- blocchi ordinabili
- blocchi clonabili
- blocchi eterogenei
- etichette chiare
- preview ove utili

Riferimento ufficiale:
- https://filamentphp.com/docs/5.x/forms/builder

## Documenti correlati
- `README.md`
- `tests-slug-volt-folio.md`
- `static-pages-replication.md`
- `../../../Modules/Cms/docs/content-blocks-system.md`

