# MCP Servers - Module Context

**Module**: All Laraxot Modules  
**Last Updated**: 2026-04-09

## Overview

MCP servers are configured at project level (`.claude/mcp.json`) and apply to all modules. This document provides module-specific MCP usage guidelines.

## Master Documentation

See [Project MCP Servers](../../../docs/MCP_SERVERS.md) for complete server list, configuration, and usage examples.

## Module-Specific MCP Usage

### sqlite
- **DB Path**: `../../laravel/database/database.sqlite`
- **Use**: Query module tables, verify seeders, debug data
- **Example**: `SELECT * FROM tickets WHERE status = 'open' LIMIT 10`

### git
- **Scope**: Module file changes, blame analysis
- **Use**: Track module evolution, find when files were modified
- **Example**: `git blame Modules/Fixcity/app/Models/Ticket.php`

### filesystem
- **Scope**: Module directories
- **Use**: Explore module structure, find files by pattern
- **Example**: List all `*Resource.php` files in module

### memory
- **Use**: Store module-specific decisions, patterns, conventions
- **Example**: "Fixcity module uses XotBaseModel for all models"

### context7
- **Use**: Look up Laravel/Filament documentation for module development
- **Example**: "Filament resource best practices Laravel 12"

### puppeteer
- **Use**: Test module frontoffice pages, verify visual parity
- **Example**: Screenshot `/it/tests/segnalazione-crea`

---

*Cross-reference: [Project MCP Servers](../../../docs/MCP_SERVERS.md)*
