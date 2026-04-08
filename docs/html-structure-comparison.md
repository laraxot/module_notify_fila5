# HTML Structure Comparison - Project Integration

**Purpose**: Connects the agnostic `bashscripts/html/` comparison tools to the FixCity Fila5 project context.

---

## Overview

This project uses HTML structure comparison tools to measure parity between:
- **Reference**: Design Comuni static pages (`https://italia.github.io/design-comuni-pagine-statiche/sito/<page>.html`)
- **Local**: FixCity test pages (`http://127.0.0.1:8000/it/tests/<page>`)

The tools in `bashscripts/html/` are **project-agnostic** — they contain no hardcoded paths. This document bridges them to project-specific locations.

---

## Tool Locations

| Tool | Location | Purpose |
|------|----------|---------|
| Python comparer | `bashscripts/html/compare-html-body.py` | Core comparison engine |
| Bash wrapper | `bashscripts/html/html-structure-compare.sh` | URL derivation + orchestrator |
| Body extraction | `bashscripts/html/extract-body-html.py` | Extract `<body>` without scripts |
| Element comparison | `bashscripts/html/compare_elements.py` | Structural comparison |

---

## Project-Specific Paths

### Input
- **Reference URL**: `https://italia.github.io/design-comuni-pagine-statiche/sito/<page_name>.html`
- **Local URL**: `http://127.0.0.1:8000/it/tests/<page_name>`

### Output
- **Reports**: `laravel/Themes/Sixteen/docs/body-structure-comparison/<page_name>/`
  - `report.md` — Full markdown report
  - `diff_details.json` — Structured JSON details
- **HTML Snapshots**: `laravel/Themes/Sixteen/docs/prompts/<page>/`
  - `reference_<page>.html` — Raw reference HTML
  - `local_<page>.html` — Raw local HTML

---

## Usage

### Quick Comparison

```bash
bashscripts/html/html-structure-compare.sh segnalazioni-elenco
```

### Any Page

```bash
bashscripts/html/html-structure-compare.sh <page_name>
```

### Custom URLs

```bash
python3 bashscripts/html/compare-html-body.py \
  "https://example.com/reference.html" \
  "http://localhost:8000/custom-page" \
  "custom-page"
```

---

## Current Status

| Page | Parity Score | Status |
|------|-------------|--------|
| segnalazioni-elenco | **77.8%** | 🔄 In progress (target: 90%) |

### Key Gaps (segnalazioni-elenco)
- Rating section structure differs (cmp-rating__card-first/second)
- Modal: reference has `modal-disservizio`, local has `modal-categories`
- Card image classes: extra `mb-3 mb-lg-0` in local
- Header center wrapper class differences
- Some accordion `pb-0` inconsistencies

---

## Architecture

### How It Works

```
┌─────────────────────────────────────────────────┐
│  bashscripts/html/ (Agnostic Tools)             │
│                                                   │
│  html-structure-compare.sh                       │
│    └── compare-html-body.py                      │
│         ├── Fetch HTML (HTTP)                    │
│         ├── Extract <body> (no script/style)    │
│         ├── Parse elements (tag, attrs, depth)  │
│         ├── Align via LCS                        │
│         └── Classify: ✅ ⚠️ ❌ ➕                │
└──────────────────┬──────────────────────────────┘
                   │
                   ▼
┌─────────────────────────────────────────────────┐
│  laravel/Themes/Sixteen/docs/ (Project Output)  │
│                                                   │
│  body-structure-comparison/<page>/               │
│    ├── report.md                                  │
│    └── diff_details.json                         │
│                                                   │
│  prompts/<page>/                                  │
│    ├── reference_<page>.html                     │
│    └── local_<page>.html                         │
└─────────────────────────────────────────────────┘
```

### Translation Key Convention

All text in Blade templates MUST use translation keys following the pattern:
```
fixcity::segnalazione.<collection>.<key>.<type>
```

**Examples:**
- ✅ `fixcity::segnalazione.heading.title.label`
- ✅ `fixcity::segnalazione.breadcrumb.home.label`
- ❌ `SEGNALAZIONE::SEGNALAZIONE.ELENCO.TITLE` (wrong namespace)
- ❌ `fixcity::segnalazione.heading.title_label` (underscore instead of dot)

---

## Related Documentation

- **bashscripts docs**: [`bashscripts/docs/html/README.md`](../../bashscripts/docs/html/README.md)
- **Theme docs index**: [`laravel/Themes/Sixteen/docs/00-index.md`](laravel/Themes/Sixteen/docs/00-index.md)
- **Master index**: [`docs/MODULE_DOCS_INDEX.md`](MODULE_DOCS_INDEX.md)
- **Design Comuni plan**: [`laravel/Themes/Sixteen/docs/design-comuni-html-parity-plan.md`](laravel/Themes/Sixteen/docs/design-comuni-html-parity-plan.md)

---

## Workflow

1. **Fetch** reference and local HTML
2. **Extract** body content (no scripts/styles)
3. **Compare** element-by-element
4. **Review** report for gaps
5. **Fix** Blade templates or JSON content
6. **Re-run** comparison to verify improvement
7. **Commit** when target parity reached

---

**Last Updated**: 2026-04-08
**Next Review**: 2026-04-15
**Owner**: Frontend Team
