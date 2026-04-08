# Body Structure Comparison

Canonical output area for HTML body structure comparisons between Design Comuni reference pages and Sixteen theme implementations.

## Canonical run: `segnalazioni-elenco`

Artifacts saved in [`./segnalazioni-elenco/`](./segnalazioni-elenco/):
- [`report.md`](./segnalazioni-elenco/report.md) — detailed report with identical, missing, different, and extra elements
- [`summary.json`](./segnalazioni-elenco/summary.json) — machine-readable parity summary
- [`reference-body.html`](./segnalazioni-elenco/reference-body.html) — reference body including `<body>`, without `<script>` and `<style>`
- [`local-body.html`](./segnalazioni-elenco/local-body.html) — local body including `<body>`, without `<script>` and `<style>`
- [`reference-structure.json`](./segnalazioni-elenco/reference-structure.json) — parsed reference tree
- [`local-structure.json`](./segnalazioni-elenco/local-structure.json) — parsed local tree

## Tooling

Agnostic tooling lives in `bashscripts`:
- [`bashscripts/body/html-structure-compare.sh`](../../../bashscripts/body/html-structure-compare.sh)
- [`bashscripts/html/compare-html-body.py`](../../../bashscripts/html/compare-html-body.py)
- [`bashscripts/html/README.md`](../../../bashscripts/html/README.md)
- [`bashscripts/docs/HTML-BODY-COMPARISON.md`](../../../bashscripts/docs/HTML-BODY-COMPARISON.md)

## Governance

- `bashscripts` stays reusable and project-agnostic.
- Theme-specific outputs stay under `laravel/Themes/Sixteen/docs/...`.
- The neutral bridge note lives in [`docs/theme/sixteen/analysis/body-structure-parity.md`](../../../../docs/theme/sixteen/analysis/body-structure-parity.md).
