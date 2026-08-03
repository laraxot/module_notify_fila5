---
title: "SuperMemory - AI Memory Infrastructure"
type: concept
tags: [supermemory, quickstart]
created: 2026-07-14
updated: 2026-07-14
qmd: "supermemory-quickstart supermemory - ai memory infrastructure"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./absolute-completion-100.md"
  - "./acronym-naming-conventions-1.md"
  - "./acronym-naming-conventions-2.md"
  - "./acronym-naming-conventions.md"
  - "./action-plan-immediate.md"
---

# SuperMemory - AI Memory Infrastructure

<<<<<<< HEAD
**Project**: Notify Platform  
**Last Updated**: 2026-04-09  
**API Key**: Configured (sm_BzH3Cugxk1hMDm5V1EHC2N_...)  
**Container Tag**: `laraxot`  
=======
**Project**: FixCity Platform  
**Last Updated**: 2026-04-09  
**API Key**: Configured (sm_BzH3Cugxk1hMDm5V1EHC2N_...)  
**Container Tag**: `fixcity`  
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
**User**: marco.sottana@gmail.com (Xot org)

## Overview

SuperMemory is the long-term and short-term memory and context infrastructure for AI agents. It provides persistent memory across conversations, semantic search, and knowledge graph capabilities.

**Master MCP Docs**: [Project MCP Servers](../../../docs/mcp-servers.md)

## Quick Start

### Verify Authentication
```bash
supermemory whoami
```

Expected output:
```
User:  marco.sottana@gmail.com
Org:   Xot (BzH3Cugxk1hMDm5V1EHC2N)
Plan:  free
Auth:  api-key (sm_BzH3Cugxk1hMDm5V1EHC2N_Jr9N****)
```

### Add Project Context
```bash
<<<<<<< HEAD
cd /var/www/_bases/base_ptvx_fila5
supermemory add --tag laraxot --file .supermemory/laraxot-context.md
=======
cd /var/www/_bases/base_fixcity_fila5
supermemory add --tag fixcity --file .supermemory/fixcity-context.md
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Search Memories
```bash
<<<<<<< HEAD
supermemory search "Notify architecture" --tag laraxot
supermemory search "Laravel Filament patterns" --tag laraxot
supermemory search "theme build process" --tag laraxot
=======
supermemory search "FixCity architecture" --tag fixcity
supermemory search "Laravel Filament patterns" --tag fixcity
supermemory search "theme build process" --tag fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Get Profile
```bash
<<<<<<< HEAD
supermemory profile --tag laraxot --query "project preferences"
=======
supermemory profile --tag fixcity --query "project preferences"
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

## Core Commands

| Command | Description | Example |
|---------|-------------|---------|
<<<<<<< HEAD
| `add` | Ingest content and extract memories | `supermemory add --tag laraxot --file docs/mcp-servers.md` |
| `search` | Search memories semantically | `supermemory search "ticket workflow" --tag laraxot` |
| `remember` | Store a specific memory | `supermemory remember "All models extend XotBaseModel" --tag laraxot` |
| `forget` | Remove a specific memory | `supermemory forget <memory-id>` |
| `update` | Update an existing memory | `supermemory update <memory-id> --content "..."` |
| `profile` | Get user/project profile | `supermemory profile --tag laraxot --query "preferences"` |
| `tags` | Manage container tags | `supermemory tags list` |
| `docs` | Manage documents | `supermemory docs list` |

## Notify Use Cases
=======
| `add` | Ingest content and extract memories | `supermemory add --tag fixcity --file docs/mcp-servers.md` |
| `search` | Search memories semantically | `supermemory search "ticket workflow" --tag fixcity` |
| `remember` | Store a specific memory | `supermemory remember "All models extend XotBaseModel" --tag fixcity` |
| `forget` | Remove a specific memory | `supermemory forget <memory-id>` |
| `update` | Update an existing memory | `supermemory update <memory-id> --content "..."` |
| `profile` | Get user/project profile | `supermemory profile --tag fixcity --query "preferences"` |
| `tags` | Manage container tags | `supermemory tags list` |
| `docs` | Manage documents | `supermemory docs list` |

## FixCity Use Cases
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

### 1. Project Context Persistence
Store project architecture decisions:
```bash
<<<<<<< HEAD
supermemory add --tag laraxot --content "Notify uses Nwidart modules + Laraxot extensions. All models extend XotBaseModel. Service providers extend XotBaseServiceProvider."
=======
supermemory add --tag fixcity --content "FixCity uses Nwidart modules + Laraxot extensions. All models extend XotBaseModel. Service providers extend XotBaseServiceProvider."
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### 2. Module-Specific Knowledge
Store module patterns:
```bash
<<<<<<< HEAD
supermemory add --tag laraxot --content "App module: Ticket model extends XotBaseModel, uses Filament resources for admin, Folio+Volt for frontoffice."
=======
supermemory add --tag fixcity --content "Fixcity module: Ticket model extends XotBaseModel, uses Filament resources for admin, Folio+Volt for frontoffice."
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### 3. Theme Conventions
Store theme development patterns:
```bash
<<<<<<< HEAD
supermemory add --tag laraxot --content "Sixteen theme: Bootstrap Italia classes replicated with Tailwind @apply. Vite outDir: './public', then npm run copy to public_html/themes/Sixteen/."
=======
supermemory add --tag fixcity --content "Sixteen theme: Bootstrap Italia classes replicated with Tailwind @apply. Vite outDir: './public', then npm run copy to public_html/themes/Sixteen/."
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### 4. Development Workflows
Store build processes:
```bash
<<<<<<< HEAD
supermemory remember "After ANY CSS/JS change in theme: cd Themes/Sixteen && npm run build && npm run copy" --tag laraxot
=======
supermemory remember "After ANY CSS/JS change in theme: cd Themes/Sixteen && npm run build && npm run copy" --tag fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### 5. Architectural Decisions
Store reasoning behind decisions:
```bash
<<<<<<< HEAD
supermemory add --tag laraxot --content "Decision: Use Actions over Services for business logic. Rationale: Queueable, testable, reusable. Spatie/laravel-queueable-action package."
=======
supermemory add --tag fixcity --content "Decision: Use Actions over Services for business logic. Rationale: Queueable, testable, reusable. Spatie/laravel-queueable-action package."
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

## Integration with AI Workflow

### Before Starting Work
```bash
# Get project context
<<<<<<< HEAD
supermemory profile --tag laraxot --query "Notify project architecture and conventions"

# Search for relevant patterns
supermemory search "Filament widget patterns" --tag laraxot
=======
supermemory profile --tag fixcity --query "FixCity project architecture and conventions"

# Search for relevant patterns
supermemory search "Filament widget patterns" --tag fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### During Development
```bash
# Store decisions
<<<<<<< HEAD
supermemory remember "Added file upload component to CreateTicketWizardWidget using wire:change" --tag laraxot

# Search for similar patterns
supermemory search "file upload Livewire" --tag laraxot
=======
supermemory remember "Added file upload component to CreateTicketWizardWidget using wire:change" --tag fixcity

# Search for similar patterns
supermemory search "file upload Livewire" --tag fixcity
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### After Completion
```bash
# Store completed work summary
<<<<<<< HEAD
supermemory add --tag laraxot --file path/to/session-summary.md
=======
supermemory add --tag fixcity --file path/to/session-summary.md
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

# Update project context if needed
supermemory update <context-memory-id> --content "Updated architecture..."
```

## Container Tags Strategy

| Tag | Purpose | Example Content |
|-----|---------|-----------------|
<<<<<<< HEAD
| `laraxot` | Project-wide context | Architecture, conventions, decisions |
| `laraxot-{module}` | Module-specific | Module patterns, models, resources |
| `laraxot-{theme}` | Theme-specific | Theme conventions, build process |
| `laraxot-{session}` | Session-specific | Session summary, decisions made |
=======
| `fixcity` | Project-wide context | Architecture, conventions, decisions |
| `fixcity-{module}` | Module-specific | Module patterns, models, resources |
| `fixcity-{theme}` | Theme-specific | Theme conventions, build process |
| `fixcity-{session}` | Session-specific | Session summary, decisions made |
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

## Best Practices

1. **Use Descriptive Content**: Be specific about what you're storing
<<<<<<< HEAD
2. **Tag Consistently**: Always use `laraxot` as base tag
=======
2. **Tag Consistently**: Always use `fixcity` as base tag
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
3. **Update Regularly**: Keep memories current with project evolution
4. **Search Before Adding**: Avoid duplicate memories
5. **Use Metadata**: Add metadata for better filtering:
   ```bash
<<<<<<< HEAD
   supermemory add --tag laraxot --content "..." --metadata '{"type":"architecture","module":"Xot"}'
=======
   supermemory add --tag fixcity --content "..." --metadata '{"type":"architecture","module":"Xot"}'
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
   ```

## Configuration

### MCP Configuration
Located in `laravel/.mcp.json`:
```json
{
  "supermemory": {
    "command": "supermemory",
    "args": [],
    "env": {
      "SUPERMEMORY_API_KEY": "sm_BzH3Cugxk1hMDm5V1EHC2N_..."
    }
  }
}
```

### CLI Configuration
<<<<<<< HEAD
Located in `~/.supermemory/projects/-var-www-_bases-base_ptvx_fila5/config.json`:
```json
{
  "apiKey": "sm_BzH3Cugxk1hMDm5V1EHC2N_...",
  "containerTag": "laraxot"
=======
Located in `~/.supermemory/projects/-var-www-_bases-base_fixcity_fila5/config.json`:
```json
{
  "apiKey": "sm_BzH3Cugxk1hMDm5V1EHC2N_...",
  "containerTag": "fixcity"
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
}
```

## Troubleshooting

### Authentication Issues
```bash
# Check authentication
supermemory whoami

# Re-authenticate if needed
<<<<<<< HEAD
supermemory init --api-key YOUR_KEY --container-tag laraxot --scope project
=======
supermemory init --api-key YOUR_KEY --container-tag fixcity --scope project
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### No Results from Search
- Try broader search terms
<<<<<<< HEAD
- Verify container tag: `--tag laraxot`
=======
- Verify container tag: `--tag fixcity`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
- Wait 1-2 minutes after adding content for processing

### Content Not Appearing
- Check file path is correct
- Verify content format (markdown preferred)
- Use `supermemory docs list` to see ingested documents

## Related Documentation

- **Master MCP Docs**: [Project MCP Servers](../../../docs/mcp-servers.md)
- **Xot Module MCP**: [Xot MCP Guide](../../Modules/Xot/docs/mcp-servers.md)
- **Theme MCP**: [Sixteen Theme MCP](../../Themes/Sixteen/docs/mcp-servers.md)
- **SuperMemory Skill**: [.qwen/skills/supermemory/](.qwen/skills/supermemory/)
- **SuperMemory Console**: https://console.supermemory.ai

---

*This document follows DRY+KISS principles. For general MCP server info, see the master doc.*
