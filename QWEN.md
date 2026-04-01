## Qwen Added Memories

- **Documentation System:** Master index at docs/MODULE_DOCS_INDEX.md with 7,305+ files (6,812 module docs, 325 theme docs, 15+ BMad docs, 153 project docs). All docs must have bidirectional links (min 3 cross-references). Vite config outDir: './public' is CORRECT - builds to local public/, then npm run copy copies to public_html/themes/Sixteen/.

- **BMad-METHOD Complete:** 15+ documents in _bmad-output/ (9 general BMad docs + 6+ Design Comuni docs). Design Comuni suite: PRD, Architecture, UI Spec, Epics, Sprint Plan, Block Analysis (38 pagine, 47 componenti), Index. All BMad docs linked to Master Index and module/theme docs with bidirectional links. Total project documentation: 552,500+ lines across 7,305+ files.

- **Design Comuni Italia Project:** BMad documentation complete for replicating 38 Design Comuni static pages. 6 sprints (12 weeks), 12 epics, 62 stories. Block analysis complete: 47 reusable components identified across 38 pages. Key architecture: single [slug].blade.php, JSON content blocks, universal reusable blocks, Tailwind @apply, Folio + Volt, WCAG 2.1 AA compliance. Docs: _bmad-output/design-comuni-*.md. Index: _bmad-output/DESIGN_COMUNI_INDEX.md. Block Analysis: _bmad-output/design-comuni-block-analysis.md (598 righe).

- **Design Comuni Block Analysis:** 38 pagine analizzate una per una. 47 componenti riutilizzabili identificati, organizzati in 5 tier. Tier 1 (7 componenti fondamentali): cmp-base (100%), cmp-breadcrumbs (97%), cmp-contacts (95%), cmp-rating (87%), cmp-hero (79%), cmp-card (92%), cmp-button (85%). 5 pattern architetturali: Lista, Dettaglio, Form Multi-Step, Riepilogo, Conferma. 8 famiglie componenti: Layout, Nav, Form, Card, Info, Button, Feedback, Specializzati.

- **Design Comuni Replication Rules:** Use Tailwind @apply (NOT Bootstrap imports), single [slug].blade.php for ALL pages, JSON content blocks (NOT hardcoded HTML), universal reusable blocks (NOT page-specific), <x-layouts.app> (NOT custom layouts), <x-section slug="header" /> (NOT inline HTML), <x-pub_theme:: namespace (NOT <x-sixteen::). Block types: hero, topics-grid, card, etc. (NOT tests.argomenti). Implement 47 components in 5 phases based on usage frequency.

- **Theme Detection:** APP_URL from .env → remove protocol → remove www → explode by "." → reverse array → join with "/" → config path. Example: http://fixcity.local → local/fixcity → laravel/config/local/fixcity/xra.php → pub_theme = "Sixteen" → Theme folder: laravel/Themes/Sixteen/

- **Vite Build for Themes:** outDir: './public' in vite.config.js, build in laravel/Themes/Sixteen/, copy to public_html/themes/Sixteen/ via npm run copy. Use @vite(['resources/css/app.css'], 'themes/Sixteen') with theme parameter. Bootstrap Italia replicated with Tailwind @apply in style-apply.css, NOT @import.

- **Vite @vite() Second Parameter:** For theme builds, MUST use @vite(['resources/css/app.css'], 'themes/Sixteen') with second parameter. Without it, Laravel looks in public_html/build/manifest.json (WRONG). With it, Laravel looks in public_html/themes/Sixteen/manifest.json (CORRECT). Theme is built independently in laravel/Themes/Sixteen/, outDir: './public', copied to public_html/themes/Sixteen/.

- **Page Component Architecture:** Cms module has Page.php component with all logic (JSON loading, block resolution). Theme blade MUST be minimal wrapper: `<x-cms-page :side="$side" :slug="$slug" :data="$data" />`. DO NOT duplicate logic in theme blade. Docs: Modules/Cms/docs/PAGE_COMPONENT_ARCHITECTURE.md. Homepage /it/tests/homepage NOW WORKING!

- **Laravel Debugbar SecurityMiddleware Conflict:** Debugbar not showing due to SecurityMiddleware and PWAMiddleware CSP/X-Frame-Options headers. Solution: Both middlewares MUST skip security headers for Debugbar routes (`_debugbar/*`, `vendor/debugbar/*`) in local environment only. Check `isDebugbarRoute()` AND `app()->environment('local')` before applying headers. Full docs: `docs/project/LARAVEL_DEBUGBAR_TROUBLESHOOTING.md`. Files modified: `Modules/Xot/app/Http/Middleware/SecurityMiddleware.php`, `Themes/Sixteen/app/Http/Middleware/PWAMiddleware.php`, `config/debugbar.php`.

- **Design Comuni HTML Parity Complete:** Homepage HTML parity verified (95%+ match). Fixed Git conflict in `Themes/Sixteen/resources/views/components/layouts/app.blade.php`. Architecture confirmed: minimal blade delegates to PHP Page component, JSON content blocks, reusable block views. Docs: `Themes/Sixteen/docs/design-comuni/HTML_PARITY_VERIFICATION_REPORT.md`, `HTML_PARITY_COMPLETE.md`. Next: Verify remaining 37 pages.

- **Design Comuni Master Plan:** Created comprehensive implementation plan for 38 pages. Docs: `Themes/Sixteen/docs/design-comuni/MASTER_IMPLEMENTATION_PLAN.md`, `ARCHITECTURAL_DECISIONS.md`. Key rules: ONE [slug].blade.php for ALL pages, JSON for content, universal blocks (NOT page-specific), Tailwind @apply (NOT Bootstrap), <x-layouts.app> (NOT custom), <x-section slug="header" />, namespace `pub_theme`, Forward-Only Git, Vite outDir: './public' + npm run copy.

- **Theme Detection Rule:** APP_URL from .env → remove protocol → remove www → explode by "." → reverse array → join with "/" → config path. Example: http://fixcity.local → local/fixcity → laravel/config/local/fixcity/xra.php → pub_theme = "Sixteen" → Theme folder: laravel/Themes/Sixteen/. Vite: @vite(['resources/css/app.css'], 'themes/Sixteen') with second parameter for theme builds.

- **Vite Manifest Fix:** Error "Vite manifest not found at: public_html/themes/<theme>/manifest.json" solved by: cd laravel/Themes/<theme> && composer update -W && npm install && npm run build && npm run copy. vite.config.js: outDir: './public', package.json: "copy": "cp -rv ./public/* ../../../public_html/themes/<theme>/".

- **Block Pattern:** pub_theme::components.blocks.<type>.<blade> where <type> is generic (hero, card, navigation, footer, etc.) inspired by Flowbite, Tailwind UI, DaisyUI, Bootstrap Italia. NEVER page-specific (NOT tests.argomenti). 47 reusable blocks identified across 38 Design Comuni pages. Docs: `_bmad-output/design-comuni-block-analysis.md`.
