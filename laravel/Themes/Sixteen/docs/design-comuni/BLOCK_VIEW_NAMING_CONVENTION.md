# Block View Naming Convention

**Version**: 2.0  
**Created**: 2026-03-30  
**Status**: Active  
**Owner**: Multi-Agent Team

## Golden Rule

Il prototipo corretto e`:

```text
pub_theme::components.blocks.<tipo_blocco>.<blade_del_blocco>
```

Il `tipo_blocco` deve essere una famiglia riusabile, non il nome di una pagina.

## Regola chiave

Corretto:
- `hero.main`
- `navigation.breadcrumb`
- `cards.featured`
- `grid.topics`
- `feedback.rating`
- `contact.card`
- `cta.banner`
- `footer.institutional`

Sbagliato:
- `tests.argomenti`
- `tests.argomenti.topics-grid`
- `tests.appuntamento-06-conferma`
- qualsiasi famiglia che coincida con uno slug di pagina o con un caso d'uso troppo specifico

## Perche'

### Logica
Il tipo identifica la famiglia funzionale del blocco. Il blade identifica la variante concreta.

### Visione
Le pagine devono essere ricostruibili con pochi mattoni stabili, non con componenti usa-e-getta pagina per pagina.

### Filosofia
Il blocco e` riusabile. La pagina e` composizione.

### Politica
Se un task viene dato a piu` agenti, una tassonomia riusabile evita collisioni semantiche e duplicazioni.

### Religione
DRY + KISS: stessa famiglia, stesso namespace, varianti piccole.

### Zen
Non chiamare un mattone col nome della casa.

## Pattern corretto

### Struttura JSON

```json
{
  "type": "grid",
  "data": {
    "view": "pub_theme::components.blocks.grid.topics",
    "title": "Esplora per argomento"
  }
}
```

### Traduzione file path

```text
laravel/Themes/Sixteen/resources/views/components/blocks/grid/topics.blade.php
```

## Tassonomia consigliata

Ispirata ai mattoni tipici di Flowbite, Tailwind UI Blocks e daisyUI.

### Navigation
- `navigation.breadcrumb`
- `navigation.header-main`
- `navigation.pagination`

### Hero / Header
- `hero.main`
- `hero.compact`
- `hero.page-intro`

### Cards
- `cards.featured`
- `cards.topic`
- `cards.service`
- `cards.event`

### Grid / List
- `grid.topics`
- `grid.services`
- `grid.resources`
- `list.links`
- `list.timeline`

### Content
- `content.rich-text`
- `content.split`
- `content.info`

### Feedback
- `feedback.rating`
- `feedback.alert`
- `feedback.progress`

### Contact
- `contact.card`
- `contact.directory`
- `contact.form`

### CTA
- `cta.banner`
- `cta.inline`
- `cta.panel`

### Form / Process
- `form.input-group`
- `form.steps`
- `steps.process`

### Footer
- `footer.institutional`
- `footer.links`

## Esempi corretti

### Breadcrumb

```json
{
  "type": "navigation",
  "data": {
    "view": "pub_theme::components.blocks.navigation.breadcrumb",
    "items": [
      {"label": "Home", "url": "/"},
      {"label": "Argomenti", "url": "/it/tests/argomenti"}
    ]
  }
}
```

### Intro di pagina

```json
{
  "type": "hero",
  "data": {
    "view": "pub_theme::components.blocks.hero.page-intro",
    "title": "Argomenti",
    "subtitle": "Esplora i contenuti per area tematica"
  }
}
```

### Griglia argomenti

```json
{
  "type": "grid",
  "data": {
    "view": "pub_theme::components.blocks.grid.topics",
    "cards": [
      {"title": "Agricoltura", "description": "..."},
      {"title": "Cultura", "description": "..."}
    ]
  }
}
```

### Feedback finale

```json
{
  "type": "feedback",
  "data": {
    "view": "pub_theme::components.blocks.feedback.rating",
    "title": "Quanto sono chiare le informazioni?"
  }
}
```

## Errori comuni

### Errore 1: pagina travestita da tipo

```json
{
  "type": "argomenti",
  "data": {
    "view": "pub_theme::components.blocks.tests.argomenti"
  }
}
```

Perche' e` sbagliato:
- `argomenti` e` una pagina o una sezione di dominio, non una famiglia di blocco
- `tests` e` un contenitore temporaneo, non una libreria di componenti finale

### Errore 2: profondita` eccessiva

```text
pub_theme::components.blocks.tests.argomenti.topics-grid
```

Perche' e` sbagliato:
- il pattern atteso e` a due segmenti dopo `blocks`
- `tests.argomenti` sta gia` introducendo una pseudo-famiglia pagina-specifica
- `topics-grid` dovrebbe essere il blade di una famiglia riusabile, ad esempio `grid.topics`

### Errore 3: type e view disallineati

```json
{
  "type": "hero",
  "data": {
    "view": "pub_theme::components.blocks.tests.intro"
  }
}
```

Meglio:

```json
{
  "type": "hero",
  "data": {
    "view": "pub_theme::components.blocks.hero.page-intro"
  }
}
```

## Regola operativa per FixCity

Per le pagine `tests.*`:
- `tests.<slug>` resta nello slug pagina
- non deve entrare nella tassonomia dei tipi blocco
- i tipi blocco devono essere generici e riusabili

Quindi una pagina come `/it/tests/argomenti` dovrebbe tendere a comporsi con blocchi come:
- `navigation.breadcrumb`
- `hero.page-intro`
- `cards.featured`
- `grid.topics`
- `feedback.rating`
- `contact.card`

## Mattoni di riferimento

Riferimenti ufficiali usati come ispirazione per le famiglie di blocco:
- Flowbite: componenti e layout Tailwind per navigation, cards, forms, tables
- Tailwind UI Blocks / Tailwind Plus UI Blocks: page sections, hero, feature sections, CTA, stats, lists
- daisyUI components: Navbar, Breadcrumbs, Card, List, Footer, Hero, Steps, Timeline, Alert, Progress, Table, Tabs, Drawer

## Best Practices

1. Il tipo deve essere corto, stabile e riusabile.
2. Il blade deve essere la variante della famiglia, non lo slug della pagina.
3. Il nome della pagina appartiene allo slug JSON, non al namespace del blocco.
4. Se un blocco non e` riusabile almeno in un'altra pagina, il nome e` sospetto.
5. Prima cerca una famiglia esistente, poi crea una nuova famiglia solo se davvero necessaria.
