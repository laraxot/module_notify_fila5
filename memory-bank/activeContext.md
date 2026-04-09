# Active Context - FixCity Project

**Last Updated**: 2026-04-09

## Current Work

### Phase CSS/JS - Segnalazione Pages
- **segnalazione-01-privacy**: 80.6% HTML parity → CSS/JS phase active
- **Other 6 pages**: Below 80%, need HTML structural fixes first

### MCP Infrastructure
- Installed and configured 8 MCP servers
- Memory systems: memory-bank, knowledge-graph, supermemory
- Development tools: filesystem, sequential-thinking, laravel-boost, flowbite, classmcp

### Widget Development
- `CreateTicketWizardWidget`: 3-step wizard with file upload, user info fields
- Font fix: Lora → Titillium Web for .text-paragraph

## Recent Decisions

1. **HTML Parity Threshold**: Only pages > 80% proceed to CSS/JS phase
2. **MCP Organization**: All MCP docs in `docs/project/`, config in `.qwen/mcp.json`
3. **No Dates in Filenames**: All .md files use stable names, dates in body only
4. **Widget Naming**: Use `Ticket` not `Segnalazione` in PHP class names

## Active Files Being Modified

- `laravel/Themes/Sixteen/resources/css/segnalazione-parity.css` - Font and color fixes
- `laravel/Themes/Sixteen/resources/css/style-apply.css` - Text paragraph font fix
- `laravel/Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php` - Wizard with upload
- `.qwen/mcp.json` - MCP server configuration

## Next Steps

1. Fix HTML structure for pages below 80% parity
2. Continue CSS/JS work on segnalazione-01-privacy
3. Consolidate duplicate MCP docs found across the project
