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
