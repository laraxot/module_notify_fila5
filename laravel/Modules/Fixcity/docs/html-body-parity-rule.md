# HTML Body Parity Rule

## Regola Permanente

> **Il tag `<body>` deve essere SEMPRE plain: `<body>` — SENZA classi, SENZA attributi.**

Questa regola si applica a **TUTTE** le pagine del progetto, inclusi:
- Pagine Design Comuni (`/tests/*`)
- Pagine frontoffice Fixcity
- Pagine CMS
- Tutte le altre pagine

### Motivazione

Il reference [Design Comuni](https://italia.github.io/design-comuni-pagine-statiche/sito/) usa `<body>` senza classi. Per **HTML structural parity**:
- ✅ Reference: `<body>` (nessuna classe)
- ✅ Nostro codice: `<body>` (nessuna classe)

### Come gestire styling pagina-specific

TUTTA la styling pagina-specific si gestisce via **CSS/JS**, NON con classi sul `<body>`:

#### Pattern preferito: Wrapper con data attribute

```blade
<!-- Nella pagina [slug].blade.php -->
<div class="tests-view-wrapper" data-slug="{{ $slug }}">
  ...
</div>
```

```css
/* CSS: scoped al wrapper */
.tests-view-wrapper[data-slug="segnalazione-02-dati"] .stepper { ... }
```

### Implementazione nel Layout

File: `Themes/Sixteen/resources/views/components/layouts/main.blade.php`

```blade
<body>
    {{ $slot }}
    ...
</body>
```

✅ **CORRETTO** — `<body>` senza classi, senza attributi.

### MAI Usare

```blade
<!-- ❌ SBAGLIATO -->
<body class="page-tests-segnalazione-02-dati">
<body @class(['dc-homepage-parity' => $isHomepageParity])>
<body x-data="{ page: 'segnalazione' }">
```

## Correlato: Stepper Responsive + No Hardcoded Italian

Questa regola è parte della story [1-3](../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md) che copre:
1. Stepper CSS responsive mobile/tablet
2. NO hardcoded Italian nelle blade templates
3. Body tag plain enforcement

## Riferimenti Bidirezionali

- **Policy completa**: [Themes/Sixteen/docs/html-parity-body-policy.md](../../Themes/Sixteen/docs/html-parity-body-policy.md)
- **CSS/JS parity**: [Themes/Sixteen/docs/css-js-parity.md](../../Themes/Sixteen/docs/css-js-parity.md)
- **Design Comuni Architettura**: [Themes/Sixteen/docs/design-comuni/ARCHITECTURAL_DECISIONS.md](../../Themes/Sixteen/docs/design-comuni/ARCHITECTURAL_DECISIONS.md)
- **Ticket Wizard Frontoffice**: [ticket-wizard-frontoffice.md](./ticket-wizard-frontoffice.md)
- **Story 1-3**: [../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md](../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md)
- **Master Index**: [../../../docs/MODULE_DOCS_INDEX.md](../../../docs/MODULE_DOCS_INDEX.md)
