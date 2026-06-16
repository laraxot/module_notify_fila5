## Qwen Added Memories

- **Documentation System:** Master index at docs/MODULE_DOCS_INDEX.md with 7,305+ files (6,812 module docs, 325 theme docs, 15 BMad docs, 153 project docs). All docs must have bidirectional links (min 3 cross-references). Vite config outDir: './public' is CORRECT - builds to local public/, then npm run copy copies to public_html/themes/Sixteen/.

- **BMad-METHOD Complete:** 15 documents in _bmad-output/ (9 general BMad docs + 6 Design Comuni docs). Design Comuni suite: PRD, Architecture, UI Spec, Epics, Sprint Plan, Index. All BMad docs linked to Master Index and module/theme docs with bidirectional links. Total project documentation: 552,500+ lines across 7,305 files.

- **Design Comuni Italia Project:** BMad documentation complete for replicating 38 Design Comuni static pages. 6 sprints (12 weeks), 12 epics, 62 stories. Key architecture: single [slug].blade.php, JSON content blocks, universal reusable blocks, Tailwind @apply, Folio + Volt, WCAG 2.1 AA compliance. Docs: _bmad-output/design-comuni-*.md. Index: _bmad-output/DESIGN_COMUNI_INDEX.md.

- **Layout Architecture:** x-layouts.app MUST extend x-layouts.main (DRY, KISS, maintainability). Documented in Themes/Sixteen/docs/layout-architecture.md with bidirectional links to LAYOUT_ARCHITECTURE_MAP.md, LAYOUT_FIX_COMPLETE_BMAD.md, VITE_MANIFEST_FIX_COMPLETE.md, and Master Index.

- **Design Comuni Replication Rules:** Use Tailwind @apply (NOT Bootstrap imports), single [slug].blade.php for ALL pages, JSON content blocks (NOT hardcoded HTML), universal reusable blocks (NOT page-specific), <x-layouts.app> (NOT custom layouts), <x-section slug="header" /> (NOT inline HTML), <x-pub_theme:: namespace (NOT <x-sixteen::). Block types: hero, topics-grid, card, etc. (NOT tests.argomenti).

- **Theme Detection:** APP_URL from .env → remove protocol → remove www → explode by "." → reverse array → join with "/" → config path. Example: http://fixcity.local → local/fixcity → laravel/config/local/fixcity/xra.php → pub_theme = "Sixteen" → Theme folder: laravel/Themes/Sixteen/

- **Vite Build for Themes:** outDir: './public' in vite.config.js, build in laravel/Themes/Sixteen/, copy to public_html/themes/Sixteen/ via npm run copy. Use @vite(['resources/css/app.css'], 'themes/Sixteen') with theme parameter. Bootstrap Italia replicated with Tailwind @apply in style-apply.css, NOT @import.

- **Vite @vite() Second Parameter:** For theme builds, MUST use @vite(['resources/css/app.css'], 'themes/Sixteen') with second parameter. Without it, Laravel looks in public_html/build/manifest.json (WRONG). With it, Laravel looks in public_html/themes/Sixteen/manifest.json (CORRECT). Theme is built independently in laravel/Themes/Sixteen/, outDir: './public', copied to public_html/themes/Sixteen/.
