# Visual Comparison Report: Argomenti Page

**Data**: 2026-03-30  
**Agente**: Multi-Agent Team  
**Status**: Critical Differences Found

## Pagine confrontate

| Pagina | URL | Stato |
|--------|-----|-------|
| Upstream | https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html | Reference |
| FixCity | http://fixcity.local/it/tests/argomenti | Runtime non sano |

## Differenze critiche identificate

### 1. Runtime locale non sano
La pagina locale non e` solo diversa: dal terminale va in timeout e la screenshot disponibile mostra quasi solo bianco.

### 2. Tassonomia blocchi sbagliata
L'errore originario non va risolto creando namespace del tipo:

```text
pub_theme::components.blocks.tests.argomenti.topics-grid
```

Questo pattern e` sbagliato perche':
- `tests.argomenti` non e` una famiglia riusabile di blocchi
- sta mescolando slug pagina e tassonomia componenti
- introduce un terzo livello improprio nel naming logico del blocco

### 3. Approccio corretto
Per replicare `argomenti.html`, la pagina va scomposta in famiglie riusabili, ad esempio:
- `navigation.breadcrumb`
- `hero.page-intro`
- `cards.featured`
- `grid.topics`
- `feedback.rating`
- `contact.card`
- `footer.institutional`

## Piano di fix

### Fase 1. Sanare runtime
- far rispondere `/it/tests/argomenti` senza timeout
- verificare asset e catena `x-page`
- rifare screenshot locale completa

### Fase 2. Sostituire i pseudo-tipi pagina-specifici
- eliminare ogni idea di `tests.argomenti` come famiglia di blocco
- usare famiglie riusabili ispirate ai mattoni di tema: hero, navigation, cards, grid, feedback, contact, footer

### Fase 3. Riallineare JSON
Esempio target per la pagina `tests.argomenti`:
- blocco `navigation` con view `pub_theme::components.blocks.navigation.breadcrumb`
- blocco `hero` con view `pub_theme::components.blocks.hero.page-intro`
- blocco `cards` con view `pub_theme::components.blocks.cards.featured`
- blocco `grid` con view `pub_theme::components.blocks.grid.topics`
- blocco `feedback` con view `pub_theme::components.blocks.feedback.rating`
- blocco `contact` con view `pub_theme::components.blocks.contact.card`

## Regola fissata
Lo slug pagina puo` essere `tests.argomenti`.
Il tipo blocco no.

Il prototipo corretto resta:

```text
pub_theme::components.blocks.<tipo_blocco>.<blade_del_blocco>
```

## Documenti correlati
- [Block View Naming Convention](../../design-comuni/BLOCK_VIEW_NAMING_CONVENTION.md)
