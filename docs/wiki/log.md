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

## [2026-04-15] ingest | Karpathy LLM Wiki — adozione moduli/temi
- Fonte: https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f
- Mapping adottato: `docs/` = raw layer, `docs/wiki/` = wiki layer, `docs/.schema/WIKI_SCHEMA.md` = schema
- Creato: `docs/project/llm-wiki-module-adoption.md` — guida completa per moduli e temi
- Creato: `wiki/log.md` in 18 moduli/temi mancanti (Activity, Blog, Cms, Comment, Fixcity, Gdpr, Geo, Job, Lang, Media, Notify, Rating, Seo, Tenant, UI, User, Xot, TwentyOne)
- Aggiornato: `raw/index.md` in tutti i moduli/temi con mapping corretto
- Aggiornato: `docs/wiki/index.md` — tabella moduli/temi con link wiki
