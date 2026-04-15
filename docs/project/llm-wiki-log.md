# LLM Wiki Log

> Stato: append-only
> Aggiornato: 2026-04-14

Formato raccomandato:

```md
## [YYYY-MM-DD] type | title
- sources:
- pages:
- summary:
- next:
```

## [2026-04-14] decision | bootstrap llm wiki for fixcity
- sources:
  - karpathy gist `llm-wiki.md`
  - tobi/qmd README
  - repository docs structure
- pages:
  - `docs/project/karpathy-llm-wiki-adoption.md`
  - `docs/project/llm-wiki-index.md`
  - `docs/project/llm-wiki-log.md`
- summary:
  - adattato il pattern `raw sources -> wiki -> schema` alla struttura esistente del repository
  - definito `docs/project/` come punto iniziale del wiki layer
  - fissato catalogo e log persistenti per futura ingest e lint
- next:
  - popolare il catalogo con topic pages stabili ad alto riuso

## [2026-04-14] ingest | documentazione qmd + allineamento llm wiki
- sources:
  - [github.com/tobi/qmd](https://github.com/tobi/qmd) README / CHANGELOG (architettura v2, MCP, SDK)
  - [gist Karpathy LLM Wiki](https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f)
- pages:
  - `docs/project/qmd-local-docs-search.md` (espansione: pipeline, wiki vs qmd, MCP, upgrade)
  - `docs/project/karpathy-llm-wiki-adoption.md` (sezione ruoli distinti wiki vs QMD)
  - `docs/project/llm-wiki-index.md` (link a qmd + adozione)
  - `docs/README.md` (link rapido ad adozione Karpathy)
- summary:
  - chiarito che il wiki compilato e QMD risolvono problemi diversi (sintesi vs retrieval)
  - documentati MCP HTTP, evoluzione CLI/query, requisiti Node e aggiornamenti versione
- next:
  - valutare upgrade `qmd` oltre 0.9.0 dove l'ambiente lo consente (Node 22+)
  - aggiungere topic pages candidate quando i temi si ripetono
