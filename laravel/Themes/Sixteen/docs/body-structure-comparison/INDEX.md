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
- [`bashscripts/html/html-structure-compare.sh`](../../../bashscripts/html/html-structure-compare.sh)
- [`bashscripts/html/compare-html-body.py`](../../../bashscripts/html/compare-html-body.py)
- [`bashscripts/html/README.md`](../../../bashscripts/html/README.md)
- [`bashscripts/docs/html/html-structure-compare.md`](../../../bashscripts/docs/html/html-structure-compare.md)
- [`docs/html-structure-comparison.md`](../../../docs/html-structure-comparison.md)
- [`../prompts/segnalazione_disservizio/README.md`](../prompts/segnalazione_disservizio/README.md)

## Governance

- `bashscripts` stays reusable and project-agnostic.
- Theme-specific outputs stay under `laravel/Themes/Sixteen/docs/...`.
- The root bridge note for this repo lives in [`docs/html-structure-comparison.md`](../../../docs/html-structure-comparison.md).
