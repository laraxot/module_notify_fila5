# Wiki Overview

> **Purpose**: High-level synthesis of the entire wiki's knowledge
> **Scope**: Project-wide concepts, entities, and decisions
> **Updated**: 2026-04-15

---

## What is This Wiki?

This is a **Karpathy-style LLM Wiki** — a persistent, LLM-maintained knowledge base where knowledge compounds over time. Instead of re-deriving answers from raw documents per query, the LLM incrementally builds structured, interlinked markdown files.

**Key Principles**:
- **Persistent**: Knowledge doesn't vanish after a query session
- **Compounding**: Each new source enriches existing structure
- **LLM-Owned**: Agent handles all bookkeeping (summarizing, filing, cross-referencing)
- **Local-First**: Plain markdown files in Git, no databases required

## Architecture

### Three-Layer Model

1. **`raw/`** (Immutable) — Curated source documents, never modified by LLM
2. **`wiki/`** (LLM-Owned) — Dynamically maintained knowledge pages
3. **`AGENTS.md`** (Schema) — Instructions that enforce structure and workflows

### Directory Structure

```
docs/
├── raw/                 # Immutable sources
│   ├── articles/        # Web articles, blog posts
│   ├── papers/          # Academic papers
│   ├── repos/           # GitHub repository docs
│   ├── data/            # Structured data (CSV, JSON)
│   └── assets/          # Images, attachments
│
└── wiki/                # LLM-generated knowledge
    ├── concepts/        # Topic/theme pages
    ├── entities/        # People, orgs, modules
    ├── sources/         # Source summaries
    ├── comparisons/     # Cross-source analysis
    ├── decisions/       # Architecture decisions
    ├── troubleshooting/ # Bug fixes, resolutions
    ├── index.md         # Content catalog
    ├── log.md           # Activity log
    └── overview.md      # This file
```

## Progetto: FixCity (base_fixcity_fila5)

**Stack**: Laravel 11 + Filament 5 + Laraxot pattern  
**Moduli**: 18 (Xot, Cms, UI, Lang, User, Fixcity, Blog, Geo, Media, Notify, Activity, Comment, Rating, Seo, Tenant, Job, Gdpr, AI)  
**Temi**: 2 (Sixteen — Design Comuni/Bootstrap Italia, TwentyOne — cinematic/prediction market)  
**Raw docs totali**: ~14.000 file  

### Mapping Karpathy → FixCity

| Karpathy | FixCity | Note |
|----------|---------|------|
| `raw/` | `./docs/` + ogni `Modules/*/docs/` | Documenti sorgente (immutabili) |
| `wiki/` | `./docs/wiki/` + ogni `Modules/*/docs/wiki/` | Conoscenza compilata dall'LLM |
| `AGENTS.md` | `./docs/wiki/AGENTS.md` | Schema multi-agent |
| `index.md` | `./docs/wiki/index.md` | Catalogo globale |
| `log.md` | `./docs/wiki/log.md` | Log append-only |

## Current State

**Status**: Bootstrap attivo — first reusable module pages compiled (2026-04-15)

| Livello | Wiki dirs | Pagine compilate | Raw docs |
|---------|-----------|------------------|----------|
| Root `docs/wiki/` | ✅ | 2 | ~150 |
| Module wikis | ✅ pilot attivi | 3 AI pages + existing local scaffolds | module-specific corpora |
| Theme wikis | ✅ scaffold presenti | 0 | theme-specific corpora |

**Pagine compilate:**
- `docs/wiki/concepts/llm-wiki-governance.md` — project wiki mapping
- `docs/wiki/modules/ai-module.md` — project-level AI module summary
- `laravel/Modules/AI/docs/wiki/overviews/ai-module.md` — local AI module overview
- `laravel/Modules/AI/docs/wiki/concepts/ai-mcp-governance.md` — AI MCP synthesis
- `laravel/Modules/AI/docs/wiki/concepts/local-first-ollama-strategy.md` — local-first runtime policy

**Last Ingestion**: 2026-04-15 (AI module)  
**Last Lint**: Mai  
**Health**: ✅ Struttura valida, first real module compilation in place

## Next Steps

### Priorità 1: Moduli Core (subito)

Ingerire i documenti SSOT di ogni modulo core:

1. **AI** — MCP contracts, Ollama policy, tool routing ✅ compiled
2. **Xot** — foundation and architecture summaries
3. **Cms** — `content-blocks-system.md`, `folio-routing-locale.md`
4. **UI** — `components.md`, `filament-components-usage.md`
5. **Lang** — translation and localization synthesis

### Priorità 2: Temi

1. **Sixteen** — `design-comuni/README.md`, `AGID_CHECKLIST.md`
2. **TwentyOne** — `ZEN_ARCHITECTURE_PHILOSOPHY.md`, `KINETIC_WEB_DESIGN_SPEC.md`

### Priorità 3: Active Usage

1. Usare la wiki per tutte le query architetturali
2. Lint settimanale
3. Ogni nuova feature → aggiorna la wiki del modulo interessato

## How to Use

### Ingest a Source

```
User: "ingest docs/raw/articles/filename.md"

LLM: Reads source → creates wiki pages → updates index & log → commits
```

### Query the Wiki

```
User: "How does LMSR work?"

LLM: Searches index → reads relevant pages → synthesizes answer with citations
```

### Lint the Wiki

```
User: "lint wiki"

LLM: Scans for contradictions, orphans, stale claims → reports findings → applies fixes
```

## Related Resources

- [Integration Guide](README.md) - Complete setup and usage guide
- [Agent Instructions](AGENTS.md) - Schema file for LLM agents
- [Activity Log](log.md) - Chronological record of wiki activity
- [Karpathy's Original Gist](https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f)

---

_This overview is synthesized from the wiki's current state and will be updated as knowledge compounds._
