# Sixteen Theme Documentation Index

**Last verified**: 2026-04-09
**Status**: Active theme
**Focus area**: Design Comuni HTML parity on `Sixteen`

## Quick Navigation

### CSS/JS Parity Phase
- [css-js-parity.md](./css-js-parity.md) - CSS/JS visual parity plan, build process, checklist
- [segnalazione-css-diff.md](./segnalazione-css-diff.md) - Segnalazione CSS diff analysis

### Active segnalazione-dettaglio phase
- [prompts/segnalazione-dettaglio/index.md](./prompts/segnalazione-dettaglio/index.md) - Prompt index, phase rules, output location
- [prompts/segnalazione-dettaglio/body-structure-comparison/](./prompts/segnalazione-dettaglio/body-structure-comparison/) - HTML structure comparison artifacts
- [../../../../bashscripts/docs/html/compare-html.md](../../../bashscripts/docs/html/compare-html.md) - Agnostic comparison tool docs

### Theme implementation entrypoints
- `resources/views/pages/tests/[slug].blade.php` - Folio page entry for `/it/tests/*`
- `resources/views/pages/[container0]/[slug].blade.php` - Reference pattern for CMS-driven pages
- `config/local/fixcity/database/content/pages/tests.segnalazione-crea.json` - Ticket wizard entrypoint

## Notes

- HTML parity requires matching semantic tags, `id`s, and Bootstrap class names in the markup.
- Bootstrap Italia CSS/JS must not be loaded; visual behavior remains `TailwindCSS + Alpine.js`.
- Page-specific outputs belong in theme docs, not in `bashscripts`.
- **CSS/JS Phase Rule**: Once HTML reaches 90%+ parity, ONLY CSS/JS are modified. HTML is frozen.
- **Build Required**: After ANY CSS/JS change, run `npm run build && npm run copy` from `Themes/Sixteen/`.
- **No dates in .md filenames**: Dates go inside document body, never in filename.
