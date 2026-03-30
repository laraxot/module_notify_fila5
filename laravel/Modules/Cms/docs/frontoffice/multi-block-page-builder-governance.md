# Multi-Block Page Builder Governance

## Sintesi
Nel CMS FixCity una pagina pubblica non e un blob HTML. E una composizione di blocchi governata da JSON tenant e amministrata tramite builder Filament.

## Evidenza nel codice
`Modules/Cms/app/Filament/Resources/PageResource.php` usa:
- `PageContentBuilder::make('content_blocks')`
- `PageContentBuilder::make('sidebar_blocks')`
- `PageContentBuilder::make('footer_blocks')`

Questo implica che la visione corretta e blocco-centrica.

## Conseguenze architetturali
- lo slug pagina identifica il contenitore editoriale
- `content_blocks` rappresenta la sequenza principale dei blocchi
- la route Folio resta sottile
- `x-page` legge i blocchi e li rende in ordine
- la redazione puo spezzare, riordinare e sostituire le parti della pagina

## Regola per le repliche Design Comuni
Quando si replica una pagina statica esterna:
- non copiare l'HTML in un singolo blocco enorme
- non usare include diretti dalla route
- individuare i segmenti semantici della pagina
- trasformare quei segmenti in blocchi Blade riusabili
- serializzare la composizione nel JSON tenant della pagina

## Pattern operativo
1. studiare il template sorgente
2. riconoscere i segmenti funzionali
3. creare o riusare i blocchi
4. comporre i blocchi nel JSON `tests.<slug>.json`
5. verificare il rendering tramite `/it/tests/<slug>`
