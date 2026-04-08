# HTML Structure Comparison

> **Purpose**: Master index for HTML structure comparison between Design Comuni reference pages and the Sixteen theme implementation.
> Bridges `bashscripts/html/` (agnostic tools) with `laravel/Themes/Sixteen/docs/` (project-specific output).

## Tools

| Script | Location | Purpose |
|--------|----------|---------|
| `compare-html-body.py` | [`bashscripts/html/compare-html-body.py`](bashscripts/html/compare-html-body.py) | Python comparison engine |
| `compare-html-body.sh` | [`bashscripts/html/compare-html-body.sh`](bashscripts/html/compare-html-body.sh) | Shell wrapper with project defaults |
| `html-structure-compare.sh` | [`bashscripts/html/html-structure-compare.sh`](bashscripts/html/html-structure-compare.sh) | Legacy shell comparison |

## Documentation

| Doc | Location |
|-----|----------|
| Script docs | [`bashscripts/docs/html/compare-html-body.md`](bashscripts/docs/html/compare-html-body.md) |
| Theme comparison results | [`laravel/Themes/Sixteen/docs/body-structure-comparison/README.md`](laravel/Themes/Sixteen/docs/body-structure-comparison/README.md) |

## How to Run

```bash
# Quick comparison with project defaults
bash bashscripts/html/compare-html-body.sh <page-name>

# With custom threshold
bash bashscripts/html/compare-html-body.sh <page-name> 85

# Verbose output
bash bashscripts/html/compare-html-body.sh <page-name> --verbose
```

## Target Pages

All Design Comuni static pages under `laravel/config/local/fixcity/database/content/pages/tests.*.json`:

- homepage
- argomenti, argomento
- servizi, servizio-dettaglio
- segnalazioni-elenco, segnalazione-dettaglio
- segnalazione-01-privacy, segnalazione-02-dati, segnalazione-03-riepilogo, segnalazione-04-conferma
- novita, novita-dettaglio
- eventi, evento-dettaglio
- amministrazione
- assistenza-01-dati, assistenza-02-conferma
- appuntamento-01-ufficio, appuntamento-02-data-orario, ...
- e altri...

## Goal

**≥90% HTML parity score** for all Design Comuni pages before production deployment.

Current methodology:
1. Replicate Bootstrap Italia HTML structure exactly (same tags, same classes, same `data-element` attributes)
2. Style with TailwindCSS `@apply` in `style-apply.css` (NOT Bootstrap CSS)
3. Add interactivity with Alpine.js (NOT Bootstrap JS)
4. Verify multilingual (NO hardcoded Italian strings)
5. Verify 5-level translation format: `namespace::context.collection.element.type`

## Bidirectional Links

- **Bashscripts index**: [`bashscripts/docs/00-INDEX.md`](bashscripts/docs/00-INDEX.md)
- **Theme docs index**: [`laravel/Themes/Sixteen/docs/00-index.md`](laravel/Themes/Sixteen/docs/00-index.md)
- **Design Comuni overview**: [`laravel/Themes/Sixteen/docs/design-comuni/README.md`](laravel/Themes/Sixteen/docs/design-comuni/README.md)
- **Block implementation guide**: [`laravel/Themes/Sixteen/docs/BLOCK_IMPLEMENTATION_GUIDE.md`](laravel/Themes/Sixteen/docs/BLOCK_IMPLEMENTATION_GUIDE.md)
