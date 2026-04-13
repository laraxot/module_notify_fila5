# Sixteen Theme Documentation Index

**Last verified**: 2026-04-09
**Status**: Active theme
**Focus area**: Design Comuni HTML parity on `Sixteen`

## Quick Navigation

### BMAD method (workflow ai, repo-wide)

- [bmad-method.md](./bmad-method.md) — puntatori a `docs/bmad/` e a `prompts/bmad.txt`
- Documentazione root: [../../../../docs/bmad/setup-guide.md](../../../../docs/bmad/setup-guide.md)

### Unified Ticket Wizard
- [../../../Modules/Fixcity/docs/ticket-wizard-frontoffice.md](../../../Modules/Fixcity/docs/ticket-wizard-frontoffice.md) - Design and architecture of the unified ticket creation wizard.
- Story BMAD (parity step 1: label **Autorizzazioni e condizioni**, CTA `mobile-full`, header/search con 7-29): [7-32](../../../../_bmad-output/implementation-artifacts/7-32-segnalazione-crea-design-comuni-step1-cta-stepper-labels-header-parity.md)
- Story BMAD (step 2: **Usa la tua posizione**, coordinate Ticket, `?step=2`): [7-33](../../../../_bmad-output/implementation-artifacts/7-33-segnalazione-crea-step2-geolocation-use-my-location-and-step-query.md)
- Story BMAD (refactor **Filament Schema Wizard** v5 al posto del Blade monolitico): [7-34](../../../../_bmad-output/implementation-artifacts/7-34-create-ticket-wizard-filament-schema-wizard-refactor.md)

### HTML parity — body minimale e scoping parity-safe
- [BODY_CLASS_RULE.md](./BODY_CLASS_RULE.md) — il `<body>` deve restare plain, senza classi custom.
- [architecture/CSS-SCOPING-RULE.md](./architecture/CSS-SCOPING-RULE.md) — usare hook strutturali reali (`#main-container`, `.steppers-*`, `.cmp-*`) o data attribute applicativi stabili.
- [STEPPER_MOBILE_FIRST_RULE.md](./STEPPER_MOBILE_FIRST_RULE.md) — stepper responsive senza selector runtime.
- Modulo Fixcity rule: [../../../Modules/Fixcity/docs/html-body-parity-rule.md](../../../Modules/Fixcity/docs/html-body-parity-rule.md)
- Story 1-3: [Stepper Responsive + No Italian + Body Plain](../../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md)
- Story 1-4: [segnalazione-crea Header Parity + Stepper Responsive](../../../.planning/stories/1-4-segnalazione-crea-header-parity-stepper-responsive.md)
- Story 1-5: [Geolocalizzazione "Usa la tua posizione" + Step Navigation](../../../.planning/stories/1-5-geolocation-step-navigation-segnalazione-crea.md)

### CSS/JS Parity Phase
- Story BMAD (parity **segnalazione-02-dati** HTML/visual): [7-3 segnalazione-02-dati html visual parity](../../../../_bmad-output/implementation-artifacts/7-3-segnalazione-02-dati-html-visual-parity.md)
- [css-js-parity.md](./css-js-parity.md) - CSS/JS visual parity plan, build process, checklist
- [text-paragraph-font-fix.md](./text-paragraph-font-fix.md) - Font fix: Lora → Titillium Web for .text-paragraph
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
