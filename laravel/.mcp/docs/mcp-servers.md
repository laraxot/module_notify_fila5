# MCP Server Configuration

**Ultimo aggiornamento**: 2026-04-09  
**Config**: `laravel/.mcp/servers.json`  
**Totale server**: 5 (4 attivi, 1 disabled)

## 📋 Server Configurati

| # | Server | Command | Scopo | Status |
|---|--------|---------|-------|--------|
| 1 | `memory` | `npx @modelcontextprotocol/server-memory` | Knowledge Graph Memory - contesto persistente tra sessioni | 🟢 Attivo |
| 2 | `filesystem` | `npx @modelcontextprotocol/server-filesystem` | Accesso filesystem nel project root | 🟢 Attivo |
| 3 | `fetch` | `npx @modelcontextprotocol/server-fetch` | Fetch URL per ricerca e reference | 🟢 Attivo |
| 4 | `sequential-thinking` | `npx @modelcontextprotocol/server-sequential-thinking` | Ragionamento strutturato per problemi complessi | 🟢 Attivo |
| 5 | `laravel-boost` | `bash curl ...` | Laravel-specific AI context | 🔴 Disabled |

## 🧠 Memory Server - Dettagli

### Cos'è
Il **Knowledge Graph Memory MCP Server** (`@modelcontextprotocol/server-memory`) crea un grafo di conoscenza locale che persiste tra le sessioni AI.

### Come funziona
- Salva entità, relazioni e osservazioni in un grafo locale
- Permette query semantiche sul contesto del progetto
- Mantiene memoria di decisioni, pattern e convenzioni

### Tools disponibili
- `create_entities` - Crea entità nel grafo
- `create_relations` - Crea relazioni tra entità
- `add_observations` - Aggiungi osservazioni a entità
- `read_graph` - Leggi il grafo corrente
- `search_nodes` - Cerca nodi per query
- `open_nodes` - Apri nodi specifici

### Utilizzo pratico
```
# Salva una decisione architetturale
memory: create_entities → "Filament Resource Pattern"
memory: add_observations → "Usa XotBaseResource, non Filament Resource diretto"

# Recupera convenzioni in una sessione futura
memory: search_nodes → "Filament patterns"
```

## 📁 Filesystem Server - Dettagli

### Configurazione
```json
{
  "command": "npx",
  "args": ["-y", "@modelcontextprotocol/server-filesystem", "/var/www/_bases/base_fixcity_fila5"]
}
```

### Tools disponibili
- `read_file` - Leggi contenuto file
- `write_file` - Scrivi contenuto file
- `edit_file` - Modifica file esistente
- `list_directory` - Lista directory
- `search_files` - Cerca file per pattern
- `get_file_info` - Info metadata file

## 🌐 Fetch Server - Dettagli

### Utilizzo
- Fetch di pagine web per ricerca reference
- Download di documentazione ufficiale
- Verifica di URL esterni

## 🤔 Sequential Thinking Server - Dettagli

### Utilizzo
- Problemi complessi che richiedono ragionamento step-by-step
- Analisi di bug difficili
- Decisioni architetturali

## 📁 Struttura File

```
laravel/.mcp/
├── servers.json          # Configurazione principale MCP
└── docs/
    └── mcp-servers.md    # Questa documentazione
```

## 🔗 Collegamenti

- **Qwen settings**: `.qwen/settings.json` → sezione `tools.mcp`
- **Claude config**: `bashscripts/ai/.claude/mcp.json`
- **Docs master**: [Master Index](../../../docs/README.md)

## 🚀 Installazione Nuovi Server

1. Cerca il pacchetto: `npm search mcp-server <nome>`
2. Installa: `npm install -g @org/server-name@latest`
3. Aggiungi a `servers.json`:
   ```json
   "nome-server": {
     "command": "npx",
     "args": ["-y", "@org/server-name"],
     "disabled": false
   }
   ```
4. Aggiorna questa documentazione
5. Aggiorna l'index dei docs
