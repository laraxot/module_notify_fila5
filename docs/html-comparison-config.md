---
title: "HTML Structure Comparison Configuration"
type: concept
tags: [html, comparison, config]
created: 2026-07-14
updated: 2026-07-14
qmd: "html-comparison-config html structure comparison configuration"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./-repos.md"
  - "./-todo.md"
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./AGENTS.md"
  - "./ANALISI-COMPLETA-.deprecated.md.md"
  - "./CHANGELOG.md"
related:
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./ANALISI-COMPLETA-2025-10-01.md"
  - "./COMPLETAMENTO-PROGETTO-2025-10-01.md"
  - "./DOCUMENTATION_IMPROVEMENT_SUMMARY_2026-03-13.md"
  - "./GITHUB_ISSUES_RECOMMENDATIONS_2026-03-02.md"
  - "./IMPLEMENTATION_SUMMARY_2025-01-27.md"
---

# HTML Structure Comparison Configuration

This file provides project-specific paths for the agnostic bashscripts/html/ tools.

## Reference Files

- **Reference HTML**: `laravel/Themes/Sixteen/docs/prompts/segnalazione_disservizio/reference_segnalazioni.html`
- **Local HTML**: `laravel/Themes/Sixteen/docs/prompts/segnalazione_disservizio/local_segnalazioni.html` (generated)
- **Output Directory**: `laravel/Themes/Sixteen/docs/body-structure-comparison/`

## Usage

```bash
# From project root
bash bashscripts/html/html-structure-compare.sh segnalazioni-elenco \
  laravel/Themes/Sixteen/docs/prompts/segnalazione_disservizio/reference_segnalazioni.html \
  laravel/Themes/Sixteen/docs/prompts/segnalazione_disservizio/local_segnalazioni.html
```

## Pages to Compare

| Page | Reference URL | Local URL | Reference File |
|------|--------------|-----------|----------------|
| Segnalazioni Elenco | https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html | http://127.0.0.1:8000/it/tests/segnalazioni-elenco | `prompts/segnalazione_disservizio/reference_segnalazioni.html` |

## Theme

- **Theme**: Sixteen
- **Theme Path**: `laravel/Themes/Sixteen/`
- **Build Command**: `cd laravel/Themes/Sixteen && npm run build && npm run copy`
