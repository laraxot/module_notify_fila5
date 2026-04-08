# HTML Structure Comparison - Project Bridge Documentation

> **Purpose**: Connects the agnostic `bashscripts/html/html-structure-compare.sh` script
> to this specific project's Design Comuni implementation.
>
> This file lives in the **project root** because `bashscripts/` is shared across projects
> and cannot contain project-specific references.

## Quick Reference

| What | Where |
|------|-------|
| **Script** | `bashscripts/html/html-structure-compare.sh` |
| **Script docs** | `bashscripts/docs/html/html-structure-compare.md` |
| **Theme output** | `laravel/Themes/Sixteen/docs/html-structure-comparison/` |
| **Reference URL** | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html` |
| **Local URL** | `http://127.0.0.1:8000/it/tests/segnalazioni-elenco` |

## How to Run

### For segnalazioni-elenco page

```bash
bash bashscripts/html/html-structure-compare.sh \
  --reference "https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html" \
  --local "http://127.0.0.1:8000/it/tests/segnalazioni-elenco" \
  --output "laravel/Themes/Sixteen/docs/html-structure-comparison/segnalazioni-elenco" \
  --page-name "segnalazioni-elenco"
```

### For any other page

```bash
bash bashscripts/html/html-structure-compare.sh \
  --reference "https://italia.github.io/design-comuni-pagine-statiche/sito/{page}.html" \
  --local "http://127.0.0.1:8000/it/tests/{page}" \
  --output "laravel/Themes/Sixteen/docs/html-structure-comparison/{page}" \
  --page-name "{page}"
```

## Architecture

```
bashscripts/                          ← Agnostic (shared across projects)
└── html/
    └── html-structure-compare.sh     ← Generic comparison tool

docs/                                 ← Project bridge (THIS project)
└── html-structure-comparison.md      ← This file: maps script → project

laravel/Themes/Sixteen/docs/          ← Theme-specific output
└── html-structure-comparison/
    └── segnalazioni-elenco/
        ├── segnalazioni-elenco-comparison-report.json
        ├── segnalazioni-elenco-reference-body.txt
        ├── segnalazioni-elenco-local-body.txt
        └── segnalazioni-elenco-comparison-summary.md
```

## Bidirectional Links

- **Script**: See `bashscripts/html/html-structure-compare.sh`
- **Script documentation**: See `bashscripts/docs/html/html-structure-compare.md`
- **Theme docs index**: See `laravel/Themes/Sixteen/docs/00-index.md`
- **Design Comuni index**: See `laravel/Themes/Sixteen/docs/design-comuni/README.md`
- **Project README**: See `README.md`

## Configuration Pattern

The script accepts:
- `--reference URL` — The reference/design page URL
- `--local URL` — The local implementation URL
- `--output DIR` — Where to save comparison results
- `--page-name NAME` — Identifier for report files

All paths are relative to the project root. The script itself has NO hardcoded paths.

## Translation Rules

When fixing translations found during comparison:
- Pattern: `<namespace>::<context>.<collection>.<element>.<type>`
- Correct: `fixcity::segnalazione.fields.title.label`
- Wrong: `SEGNALAZIONE::SEGNALAZIONE.ELENCO.TITLE` (no namespace, missing type)
- Wrong: `fixcity::segnalazione.heading.title_label` (underscore instead of dot)

Namespace for this project: `fixcity`
Context examples: `fields`, `heading`, `buttons`, `messages`

## Page Architecture

- Single dynamic blade: `laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`
- JSON content: `laravel/config/local/fixcity/database/content/pages/tests.{slug}.json`
- NO dedicated blades per page (e.g., NO `segnalazioni-elenco.blade.php`)

## Related Documents

- [Design Comuni Block Analysis](../../_bmad-output/design-comuni-block-analysis.md)
- [Design Comuni Index](../../_bmad-output/DESIGN_COMUNI_INDEX.md)
- [Theme Architecture](../laravel/Themes/Sixteen/docs/architecture/README.md)
