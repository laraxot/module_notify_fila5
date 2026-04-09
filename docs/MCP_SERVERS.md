# MCP Servers - FixCity Project

**Last Updated**: 2026-04-09  
**Configuration File**: `.claude/mcp.json`  
**Total Servers**: 10

---

## Overview

Model Context Protocol (MCP) servers provide tools and resources that AI agents can use to interact with external systems, access documentation, perform browser automation, and maintain persistent memory.

---

## Configured MCP Servers

### 1. filesystem
- **Package**: `@modelcontextprotocol/server-filesystem`
- **Purpose**: Read/write files, list directories, search files
- **Scope**: `/var/www/_bases/base_fixcity_fila5`
- **Use Cases**: File operations, codebase exploration, content management

### 2. memory
- **Package**: `@modelcontextprotocol/server-memory`
- **Purpose**: Persistent AI memory across sessions
- **Use Cases**: Remember project decisions, user preferences, codebase knowledge
- **Commands**: `read_memory`, `write_memory`, `search_memory`, `delete_memory`

### 3. fetch
- **Package**: `@modelcontextprotocol/server-fetch`
- **Purpose**: HTTP requests, web scraping, API calls
- **Use Cases**: Fetch reference pages, API testing, external data retrieval

### 4. sequential-thinking
- **Package**: `@modelcontextprotocol/server-sequential-thinking`
- **Purpose**: Structured multi-step reasoning
- **Use Cases**: Complex problem solving, architecture decisions, debugging

### 5. puppeteer
- **Package**: `@modelcontextprotocol/server-puppeteer`
- **Purpose**: Browser automation, screenshots, page interaction
- **Use Cases**: Visual parity verification, screenshot comparison, UI testing

### 6. sqlite
- **Package**: `@modelcontextprotocol/server-sqlite`
- **Purpose**: Database queries on project SQLite
- **DB Path**: `laravel/database/database.sqlite`
- **Use Cases**: Data inspection, CMS content verification, debugging

### 7. git
- **Package**: `@modelcontextprotocol/server-git`
- **Purpose**: Git operations, diff analysis, commit history
- **Repository**: `/var/www/_bases/base_fixcity_fila5`
- **Use Cases**: Change tracking, blame analysis, branch management

### 8. context7
- **Package**: `@upstash/context7-mcp`
- **Purpose**: Code documentation search across 8000+ libraries
- **Use Cases**: Laravel/Filament/Livewire docs lookup, API reference, best practices

### 9. mcp-deepwiki
- **Package**: `mcp-deepwiki`
- **Purpose**: Wikipedia knowledge retrieval
- **Use Cases**: Technical research, domain knowledge, general reference

### 10. supermemory
- **Package**: `supermemory-mcp`
- **Purpose**: Long-term AI memory with knowledge graph
- **API Key**: Configured via `SUPERMEMORY_API_KEY` env var
- **Use Cases**: Project context persistence, semantic search, memory retrieval
- **Container Tag**: `fixcity-project`

---

## Removed/Deprecated

| Server | Reason | Date |
|--------|--------|------|
| `@modelcontextprotocol/server-github` | Package deprecated (npm notice) | 2026-04-09 |
| `@anthropic-ai/mcp-server-playwright` | Redundant with existing puppeteer | 2026-04-09 |
| `mcp-screenshot-server` | Redundant with puppeteer | 2026-04-09 |
| `@modelcontextprotocol/server-everart` | No API key, unused | 2026-04-09 |

---

## Usage Examples

### Memory (Persistent Knowledge)
```
Use memory to:
- Store architecture decisions
- Remember coding conventions
- Track completed phases
- Store user preferences
```

### Context7 (Documentation Search)
```
Use context7 to:
- Look up Laravel 12 documentation
- Find Filament 3 patterns
- Check Livewire 3 APIs
- Search TailwindCSS utilities
```

### Puppeteer (Browser Automation)
```
Use puppeteer to:
- Take screenshots for visual parity
- Test page interactions
- Verify CSS rendering
- Compare reference vs local
```

### SuperMemory (Semantic Search)
```
Use supermemory to:
- Search project context semantically
- Retrieve past decisions
- Find related knowledge
- Build on previous work
```

---

## Architecture

```
AI Agent (Claude/Qwen)
    │
    ├── MCP: filesystem ──→ Project files
    ├── MCP: memory ──→ Persistent session memory
    ├── MCP: fetch ──→ Web/API requests
    ├── MCP: sequential-thinking ──→ Complex reasoning
    ├── MCP: puppeteer ──→ Browser automation
    ├── MCP: sqlite ──→ Database queries
    ├── MCP: git ──→ Version control
    ├── MCP: context7 ──→ Library documentation
    ├── MCP: mcp-deepwiki ──→ General knowledge
    └── MCP: supermemory ──→ Semantic memory + knowledge graph
```

---

## Configuration

### File Location
- **Primary**: `.claude/mcp.json` (project root)
- **Backup**: `docs/MCP_SERVERS.md` (this file)

### Environment Variables
```bash
SUPERMEMORY_API_KEY=sm_BzH3Cugxk1hMDm5V1EHC2N_Jr9NfJdUqxlnPe21yb9q7FtbYMevTsoPtKZJEfBqdP4i81z6aJA34SF32Gx3PUa9
```

### SQLite Database
```
laravel/database/database.sqlite
```

### Git Repository
```
/var/www/_bases/base_fixcity_fila5
```

---

## Adding New MCP Servers

### Process
1. Research the MCP server on npm/GitHub
2. Test availability: `npx -y <package-name> --help`
3. Add to `.claude/mcp.json` with proper configuration
4. Document in this file
5. Update the index below

### Naming Convention
- Use kebab-case for server names
- Prefix with purpose if ambiguous (e.g., `mcp-deepwiki`)
- Avoid deprecated packages

---

## Index Cross-References

### Module Docs
- See [Xot Module MCP Docs](../../laravel/Modules/Xot/docs/mcp-servers.md)
- See [Cms Module MCP Docs](../../laravel/Modules/Cms/docs/mcp-integration.md)

### Theme Docs
- See [Sixteen Theme MCP Docs](../../laravel/Themes/Sixteen/docs/mcp-servers.md)

### Project Docs
- See [AI Workflow](project/ai-workflow.md)
- See [Conventions](project/conventions.md)

---

## Maintenance

### Regular Tasks
- [ ] Check for deprecated packages (monthly)
- [ ] Test all servers are reachable (weekly)
- [ ] Update packages when new versions available (monthly)
- [ ] Review API key validity (quarterly)

### Troubleshooting
| Issue | Solution |
|-------|----------|
| MCP server not found | Run `npx -y <package> --help` to test |
| JSON parse error | Validate `.claude/mcp.json` syntax |
| Permission denied | Check file paths are absolute |
| API key expired | Update env var in mcp.json |

---

*Last updated: 2026-04-09*  
*Maintained by: AI Agents + Development Team*
