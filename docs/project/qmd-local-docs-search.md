# QMD — ricerca locale su documentazione e note

**Riferimento upstream**: [github.com/tobi/qmd](https://github.com/tobi/qmd) (MIT).

## Scopo (business logic)

[QMD](https://github.com/tobi/qmd) (“Query Markup Documents”) è un **motore di ricerca tutto locale** per file Markdown (e contenuti indicizzabili): note, trascrizioni, knowledge base, **`docs/` di repository**. Combina:

- ricerca full-text **BM25**;
- ricerca semantica **vettoriale** (embedding);
- opzionalmente **reranking** via LLM (stack `node-llama-cpp` + modelli **GGUF** in locale).

Output pensati per **flussi agentici** (`--json`, `--files`, MCP).

## Perché nel progetto FixCity

- **Indicizzare** `docs/`, `laravel/Modules/*/docs/`, `laravel/Themes/*/docs/` senza inviare il corpus a servizi esterni.
- Dare agli agenti (o agli sviluppatori) **query** e **retrieve** coerenti con la policy “docs come memoria”.
- Opzionale: server **MCP** (`qmd mcp`) per integrazione Cursor/Claude con strumenti `query`, `get`, `multi_get`, `status`.

## Installazione (verificata)

```bash
npm install -g @tobilu/qmd
```

In questo ambiente risulta installato:

```text
qmd 0.9.0
```

Alternative da README upstream: `bun install -g @tobilu/qmd`, oppure `npx @tobilu/qmd` / `bunx @tobilu/qmd` senza install globale.

## Flusso minimo

Dalla root del clone (adattare i path):

```bash
# Collezioni: una o più directory di .md
qmd collection add ./docs --name fixcity-root-docs
qmd collection add ./laravel/Modules --name fixcity-modules --mask "**/docs/**/*.md"

# Contesto testuale (migliora rilevanza e spiegazioni nei risultati)
qmd context add qmd://fixcity-root-docs "Documentazione progetto FixCity (root docs/)"
qmd context add qmd://fixcity-modules "Documentazione moduli Laravel (path Modules/*/docs/)"

# Indicizzazione e embedding (embedding richiede modelli locali — vedi upstream)
qmd update
qmd embed

# Ricerca
qmd search "filament wizard"           # BM25, veloce
qmd vsearch "come configurare tema"   # solo vettoriale
qmd query "ticket wizard latitude"    # ibrido + rerank (qualità migliore)

# Stato
qmd status
```

## MCP

Avvio server (stdio, default per client MCP):

```bash
qmd mcp
```

HTTP (porta default 8181, modelli tenuti in memoria tra le richieste):

```bash
qmd mcp --http
```

Configurazione client: vedi [README QMD — MCP](https://github.com/tobi/qmd#mcp-server). Integrazione con indice Cursor del progetto: [docs/mcp/index.md](../mcp/index.md).

## Dipendenze e limiti

- **Embedding / query / rerank** in modalità completa dipendono da **modelli GGUF** e da `node-llama-cpp` (dettagli e download modelli nel README del repo).
- Indice e database sono **locali** (es. cache sotto `~/.cache/qmd` secondo documentazione upstream): non versionare l’indice nel repo salvo esigenze esplicite.

## Collegamenti

- [Indice documentazione progetto](../README.md)
- [MCP index](../mcp/index.md)
- Repository: [tobi/qmd](https://github.com/tobi/qmd)
