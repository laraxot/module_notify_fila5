# Header Argomenti - Report Frontoffice

Data: 2026-03-30

## Sintesi

L'header della pagina `/it/tests/argomenti` va servito come section di layout tramite `<x-section slug="header" />`.
La correzione è stata applicata nella section attiva del tema:

- `laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php`

## Correzione funzionale

Il markup della section è stato riallineato alla struttura del `cmp-header` ufficiale di Design Comuni:

- slim header con regione, lingua e accesso
- center header con brand, social e search
- navbar principale e secondaria con `Tutti gli argomenti` evidenziato
- variante mobile coerente con gli stessi dati di navigazione

## Build pipeline del tema

Per rendere effettiva la modifica lato frontoffice sono stati eseguiti:

```bash
cd laravel/Themes/Sixteen
npm install alpinejs
npm run build
npm run copy
```

## Nota operativa

`build` e `copy` non sono intercambiabili:

- `build` compila
- `copy` pubblica nel path servito dal webserver

## Stato verifica

- screenshot reference: disponibile
- screenshot locale: non ancora disponibile perché `fixcity.local` non completa il load della pagina entro 60 secondi

## Prossimo passo

Debug del timeout applicativo locale, poi nuova cattura screenshot e raffinamento visuale finale.
