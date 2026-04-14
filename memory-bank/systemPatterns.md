# System Patterns

## System Architecture

- Modular monolith under `laravel/Modules`
- Theme layer under `laravel/Themes`
- Public web root under `public_html`
- Shared project guidance under `docs`

## Key Technical Decisions

- Actions over Services
- Xot base classes over framework base classes
- Folio, Volt, and Filament over ad hoc controllers where applicable
- Documentation should route to one source of truth instead of duplicating it

## Documentation Retrieval Pattern

1. `AGENTS.md`
2. `docs/README.md`
3. `docs/project/docs-governance.md`
4. `laravel/Modules/docs/README.md` or `laravel/Themes/docs/README.md`
5. target `docs/README.md`
6. topic files

## Documentation Anti-Duplication Pattern

- Canonical entrypoint: `README.md`
- Normal topic files: lowercase, date-free, hyphenated names
- Non-canonical locations to audit: `app/docs`, `resources/views/docs`, `docs/docs`
- Prefer thin indexes and direct links over copied content

## Design Patterns in Use

- Modular documentation roots
- Shallow indexes
- Archive as secondary context, not primary navigation
