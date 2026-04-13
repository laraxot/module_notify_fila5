# HTML Body Parity Rule

Related:
- [Fixcity README](README.md)
- [Theme policy](../../Themes/Sixteen/docs/html-parity-body-policy.md)
- [Theme CSS scoping rule](../../Themes/Sixteen/docs/architecture/CSS-SCOPING-RULE.md)
- [Agent parity rule](../../../bashscripts/ai/.agents/docs/rules/html-parity.md)

## Permanent rule

> Il tag `<body>` deve restare plain e lo scoping parity deve usare il wrapper canonico `page-content[data-slug]`.

## Correct pattern

```blade
<div class="page-content content" data-slug="{{ $pageSlug }}" data-side="content">
  ...
</div>
```

```css
.page-content[data-slug="tests.segnalazione-02-dati"] .steppers-header {
  ...
}
```

## Wrong pattern

```blade
<body class="page-tests-segnalazione-02-dati">
<div class="tests-view-wrapper">
```

## Why

- `page-content[data-slug]` e un contratto del progetto.
- `tests-view-wrapper` e un dettaglio tecnico del runtime e non va promosso a regola.
- I fix di parity devono agganciarsi a markup stabile e documentato.

See also:
- [Fixcity README](README.md)
- [Theme policy](../../Themes/Sixteen/docs/html-parity-body-policy.md)
- [Theme CSS scoping rule](../../Themes/Sixteen/docs/architecture/CSS-SCOPING-RULE.md)

## Stories correlate

- **Story 1-3**: [Stepper Responsive + No Italian + Body Plain](../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md) — segnalazione-02-dati stepper CSS responsive, no hardcoded Italian, body plain
- **Story 1-4**: [segnalazione-crea Header Parity + Stepper Responsive](../../.planning/stories/1-4-segnalazione-crea-header-parity-stepper-responsive.md) — hamburger centering, "Cerca" visibility, language dropdown, stepper wizard responsive
- [Master Index](../../../docs/MODULE_DOCS_INDEX.md)
