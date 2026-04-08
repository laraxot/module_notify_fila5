# HTML Structure Comparison - Project Bridge Documentation

> **Purpose**: Connect the agnostic `bashscripts/html/html-structure-compare.sh` script
> to this specific project implementation.
>
> This file lives in the **project root** because `bashscripts/` is shared and must stay agnostic.

## Quick Reference

| What | Where |
|------|-------|
| **Script** | `bashscripts/html/html-structure-compare.sh` |
| **Script docs** | `bashscripts/docs/html/html-structure-compare.md` |
| **Theme output** | `laravel/Themes/Sixteen/docs/body-structure-comparison/segnalazioni-elenco/` |
| **Prompt/docs area** | `laravel/Themes/Sixteen/docs/prompts/segnalazione_disservizio/` |
| **Reference URL** | `https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html` |
| **Local URL** | `http://127.0.0.1:8000/it/tests/segnalazioni-elenco` |

## How to Run

### For `segnalazioni-elenco`

```bash
bash bashscripts/html/html-structure-compare.sh \
  --reference "https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html" \
  --local "http://127.0.0.1:8000/it/tests/segnalazioni-elenco" \
  --output-dir "laravel/Themes/Sixteen/docs/body-structure-comparison/segnalazioni-elenco" \
  --page-name "segnalazioni-elenco" \
  --threshold 90
```

## Architecture

```text
bashscripts/                          ← Agnostic (shared across projects)
└── html/
    ├── html-structure-compare.sh
    └── compare-html-body.py

docs/                                 ← Project bridge
└── html-structure-comparison.md

laravel/Themes/Sixteen/docs/
├── body-structure-comparison/
│   └── segnalazioni-elenco/
│       ├── report.md
│       ├── summary.json
│       ├── diff_details.json
│       ├── reference-body.html
│       ├── local-body.html
│       ├── reference-structure.json
│       └── local-structure.json
└── prompts/
    └── segnalazione_disservizio/
        ├── README.md
        ├── local_segnalazioni.html
        └── segnalazioni-elenco-html-parity-analysis.md
```

## Translation Rules

When fixing translation keys found during comparison:
- Pattern: `<namespace>::<context>.<collection>.<element>.<type>`
- Correct: `fixcity::segnalazione.fields.title.label`
- Wrong: `SEGNALAZIONE::SEGNALAZIONE.ELENCO.TITLE`
- Wrong: `fixcity::segnalazione.heading.title_label`

## Page Architecture

- Single dynamic blade: `laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`
- JSON content: `laravel/config/local/fixcity/database/content/pages/tests.{slug}.json`
- No dedicated blade for `segnalazioni-elenco`