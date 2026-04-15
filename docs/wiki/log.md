# Wiki Log

> Status: append-only
> Updated: 2026-04-15

Recommended format:

```md
## [YYYY-MM-DD] type | title
- sources:
- pages:
- summary:
- next:
```

## [2026-04-15] decision | align fixcity llm wiki to docs/wiki
- sources:
  - Karpathy `llm-wiki.md`
  - `tobi/qmd` README
  - existing FixCity docs under `docs/project/`
- pages:
  - `docs/wiki/README.md`
  - `docs/wiki/index.md`
  - `docs/wiki/log.md`
  - `docs/wiki/concepts/llm-wiki-governance.md`
- summary:
  - fixed the repository mapping to use `docs/` as the raw corpus and `docs/wiki/` as the compiled wiki layer
  - kept the historical `docs/project/llm-wiki-*` files as compatibility shims
  - linked module and theme documentation indexes to the canonical wiki location
- next:
  - create the first reusable module and theme synthesis pages
  - install and verify QMD locally when the package installation completes
