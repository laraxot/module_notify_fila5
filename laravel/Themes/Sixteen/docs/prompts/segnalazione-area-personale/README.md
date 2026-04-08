# HTML Parity Analysis: `segnalazione-area-personale`

**Date:** 2026-04-08
**Reference:** https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-area-personale.html
**Local:** http://127.0.0.1:8000/it/tests/segnalazione-area-personale
**Target:** 90% HTML structure parity on `body` markup, excluding `script` and `style`

## Tooling

- Script: `bashscripts/html/html-structure-compare.sh`
- Extractor: `bashscripts/html/compare-html-body.py`
- Output dir: `laravel/Themes/Sixteen/docs/prompts/segnalazione-area-personale/body-structure-comparison*`

## Current Measurements

- Pass 1 with generic JSON blocks: `54.4%`
- Pass 2 with `flow/area-personale/dashboard`: `51.1%`

## Findings

- The page now renders correctly through Folio after fixing blocking merge conflicts in Xot core files.
- `tests/[slug].blade.php` now follows the same Volt + `<x-layouts.app>` pattern used by the generic CMS page.
- The remaining parity gap is structural, not routing-related.
- Major sections still missing or incomplete versus the reference: breadcrumb fidelity, payments section, contact section, rating block, and additional page-index/navigation structure.
- The current dashboard component introduces many extra structural lines and still contains hardcoded UI strings that should move to translations or localized CMS data.

## Next Implementation Direction

1. Build a page-specific block for `segnalazione-area-personale` with the exact semantic sections from the reference.
2. Keep Bootstrap Italia class names in HTML where the reference uses them.
3. Do not load Bootstrap CSS/JS assets; styling remains Tailwind + `@apply`, interactions remain Alpine.
4. Remove hardcoded Blade strings and map labels to `fixcity::segnalazione.<collection>.<element>.<type>` keys or localized JSON data.

## Artifacts

- `body-structure-comparison/` contains the first full report.
- `body-structure-comparison-pass2/` contains the post-JSON-switch report.
