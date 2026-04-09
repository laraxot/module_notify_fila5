# MCP Servers Configuration

**Last Updated**: 2026-04-09
**Config File**: `.qwen/mcp.json`

## Installed MCP Servers

### Memory & Knowledge

| Server | Package | Purpose | Status |
|---|---|---|---|
| **memory-bank** | `memory-bank-mcp` | Project memory bank with structured files (features, context, progress) | ✅ Installed |
| **knowledge-graph** | `mcp-server-memory` | Knowledge graph for semantic memory queries | ✅ Installed |
| **supermemory** | `opencode-supermemory` | Cloud persistent memory with AI search and user profiles | ✅ Installed |

### Development Tools

| Server | Package | Purpose | Status |
|---|---|---|---|
| **filesystem** | `@modelcontextprotocol/server-filesystem` | File system access with security constraints | ✅ Installed |
| **sequential-thinking** | `@modelcontextprotocol/server-sequential-thinking` | Structured reasoning and chain-of-thought | ✅ Installed |
| **laravel-boost** | Laravel Boost MCP | Laravel-specific tools (search-docs, tinker, browser-logs) | ✅ Installed |
| **flowbite** | `flowbite-mcp` | Flowbite UI component reference | ✅ Installed |
| **classmcp** | `classmcp` | PHP class introspection | ✅ Installed |

## Memory Servers Detail

### 1. Memory Bank (`memory-bank-mcp`)
**Location**: `npm global`
**Init**: `memory-bank-mcp init --directory .`
**Directory**: `/var/www/_bases/base_fixcity_fila5/memory-bank/`

**Structure**:
```
memory-bank/
├── projectbrief.md      # Project purpose and goals
├── productContext.md    # Product context and user needs
├── systemPatterns.md    # Architecture patterns and decisions
├── techContext.md       # Technology stack and constraints
├── activeContext.md     # Current work and recent decisions
├── progress.md          # What works, what's left, progress status
├── features/            # Feature specifications
│   └── sample-feature.md
```

**Commands**:
```bash
memory-bank-mcp init --directory .    # Initialize in project root
memory-bank-mcp serve --directory .   # Start MCP server
memory-bank-mcp list                  # List memory files
memory-bank-mcp read                  # Read all memory content
```

### 2. Knowledge Graph (`mcp-server-memory`)
**Location**: `npm global`
**Type**: Local SQLite + FTS5 knowledge graph
**Use Case**: Semantic search across project knowledge

### 3. Supermemory (`opencode-supermemory`)
**Location**: `npm package (bunx)`
**API Key**: `sm_BzH3Cugxk1hMDm5V1EHC2N_Jr9NfJdUqxlnPe21yb9q7FtbYMevTsoPtKZJEfBqdP4i81z6aJA34SF32Gx3PUa9`
**Tag**: `fixcity_fila5_project`
**Features**:
- Cross-project user profiles
- Project-specific memories with semantic search
- Keyword detection ("ricorda", "memorizza", "salva questa")
- Preemptive context compaction at 80% capacity

## Configuration Rules

### File Naming
- **NEVER** use dates in MCP config filenames
- Use lowercase with hyphens: `memory-bank`, `knowledge-graph`
- Config files go in `.qwen/mcp.json`

### Memory Organization
- **Project memory**: `memory-bank/` directory
- **Cloud memory**: Supermemory with tag `fixcity_fila5_project`
- **Knowledge graph**: Local SQLite in `.engram/` (if configured)

### DRY Prevention
- Each memory system has a distinct purpose
- Memory Bank = structured project documentation
- Supermemory = AI-learned context across sessions
- Knowledge Graph = semantic search engine
- **NO duplicate storage** - use cross-references

## See Also
- [Memory Bank Directory](../../memory-bank/)
- [Supermemory Setup](../../docs/project/supermemory-setup.md)
- [Laravel MCP Development](../../.qwen/skills/mcp-development/)
