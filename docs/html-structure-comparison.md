# HTML Structure Comparison Tools

Scripts for comparing HTML body structure between Design Comuni reference pages and local implementations.

## Scripts Location

| Script | Path | Purpose |
|--------|------|---------|
| Orchestrator | `bashscripts/html/html-structure-compare.sh` | Fetches HTML pages, runs comparison |
| Core | `bashscripts/html/compare-html-body.py` | Extracts body HTML, compares elements |

## Output Location

All comparison reports are saved to:
```
laravel/Themes/Sixteen/docs/body-structure-comparison/<page-name>/
```

Each page directory contains:
- `report.md` - Markdown parity report
- `diff_details.json` - Detailed JSON comparison
- `reference-body.html` - Cleaned reference body (no script/style)
- `local-body.html` - Cleaned local body
- `reference-structure.json` - Reference element tree
- `local-structure.json` - Local element tree

## Usage

```bash
# From project root
python3 bashscripts/html/compare-html-body.py <reference> <local> <page-name>

# Example with files
python3 bashscripts/html/compare-html-body.py \
  laravel/Themes/Sixteen/docs/prompts/segnalazione-dettaglio/reference.html \
  laravel/Themes/Sixteen/docs/prompts/segnalazione-dettaglio/local.html \
  segnalazione-dettaglio
```

## Reference HTML Location

Reference HTML files are stored in:
```
laravel/Themes/Sixteen/docs/prompts/<page-name>/reference.html
```

## Local HTML Location

Local HTML snapshots are stored in:
```
laravel/Themes/Sixteen/docs/prompts/<page-name>/local.html
```

## Rules

1. **No Bootstrap Italia**: Project uses TailwindCSS + Alpine.js only
2. **Translation keys**: All text must use `fixcity::segnalazione.context.key.type` pattern
3. **Page routing**: All test pages use `pages/tests/[slug].blade.php` with Volt component
4. **Layout**: Test pages use `<x-layouts.app>`, not `<x-layouts.design-comuni>`

## Related Documentation

- [Theme Architecture](../laravel/Themes/Sixteen/docs/architecture/README.md)
- [No Bootstrap Rule](../docs/rules/no-bootstrap-italia.md)
- [Design Comuni Index](../laravel/Themes/Sixteen/docs/design-comuni/README.md)
- [Body Structure Comparison Index](../laravel/Themes/Sixteen/docs/body-structure-comparison/INDEX.md)
