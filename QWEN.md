## Qwen Added Memories
- **Documentation System:** Master index at docs/MODULE_DOCS_INDEX.md with 7,305+ files (6,812 module docs, 325 theme docs, 15+ BMad docs, 153 project docs). All docs must have bidirectional links (min 3 cross-references). Vite config outDir: './public' is CORRECT - builds to local public/, then npm run copy copies to public_html/themes/Sixteen/.

- **BMad-METHOD Complete:** 15+ documents in _bmad-output/ (9 general BMad docs + 6+ Design Comuni docs). Design Comuni suite: PRD, Architecture, UI Spec, Epics, Sprint Plan, Block Analysis (38 pagine, 47 componenti), Index. All BMad docs linked to Master Index and module/theme docs with bidirectional links. Total project documentation: 552,500+ lines across 7,305+ files.

- **Design Comuni Italia Project:** BMad documentation complete for replicating 38 Design Comuni static pages. 6 sprints (12 weeks), 12 epics, 62 stories. Block analysis complete: 47 reusable components identified across 38 pages. Key architecture: single [slug].blade.php, JSON content blocks, universal reusable blocks, Tailwind @apply, Folio + Volt, WCAG 2.1 AA compliance. Docs: _bmad-output/design-comuni-*.md. Index: _bmad-output/DESIGN_COMUNI_INDEX.md. Block Analysis: _bmad-output/design-comuni-block-analysis.md (598 righe).

- **Design Comuni Block Analysis:** 38 pagine analizzate una per una. 47 componenti riutilizzabili identificati, organizzati in 5 tier. Tier 1 (7 componenti fondamentali): cmp-base (100%), cmp-breadcrumbs (97%), cmp-contacts (95%), cmp-rating (87%), cmp-hero (79%), cmp-card (92%), cmp-button (85%). 5 pattern architetturali: Lista, Dettaglio, Form Multi-Step, Riepilogo, Conferma. 8 famiglie componenti: Layout, Nav, Form, Card, Info, Button, Feedback, Specializzati.

- **Design Comuni Replication Rules:** Use Tailwind @apply (NOT Bootstrap imports), single [slug].blade.php for ALL pages, JSON content blocks (NOT hardcoded HTML), universal reusable blocks (NOT page-specific), <x-layouts.app> (NOT custom layouts), <x-section slug="header" /> (NOT inline HTML), <x-pub_theme:: namespace (NOT <x-sixteen::). Block types: hero, topics-grid, card, etc. (NOT tests.argomenti). Implement 47 components in 5 phases based on usage frequency.

- **Theme Detection:** APP_URL from .env → remove protocol → remove www → explode by "." → reverse array → join with "/" → config path. Example: http://fixcity.local → local/fixcity → laravel/config/local/fixcity/xra.php → pub_theme = "Sixteen" → Theme folder: laravel/Themes/Sixteen/

- **Vite Build for Themes:** outDir: './public' in vite.config.js, build in laravel/Themes/Sixteen/, copy to public_html/themes/Sixteen/ via npm run copy. Use @vite(['resources/css/app.css'], 'themes/Sixteen') with theme parameter. Bootstrap Italia replicated with Tailwind @apply in style-apply.css, NOT @import.

- **Vite @vite() Second Parameter:** For theme builds, MUST use @vite(['resources/css/app.css'], 'themes/Sixteen') with second parameter. Without it, Laravel looks in public_html/build/manifest.json (WRONG). With it, Laravel looks in public_html/themes/Sixteen/manifest.json (CORRECT). Theme is built independently in laravel/Themes/Sixteen/, outDir: './public', copied to public_html/themes/Sixteen/.

- **Page Component Architecture:** Cms module has Page.php component with all logic (JSON loading, block resolution). Theme blade MUST be minimal wrapper: `<x-cms-page :side="$side" :slug="$pageSlug" :data="$data" />`. DO NOT duplicate logic in theme blade. Docs: Modules/Cms/docs/PAGE_COMPONENT_ARCHITECTURE.md. Homepage /it/tests/homepage NOW WORKING!

- **Folio Pages Architecture (DRY + KISS):** ONLY 3 folders allowed in pages/: [container0] (dynamic CMS), auth (authentication), tests (Design Comuni). ALL page-specific folders DELETED (22 folders: administration, ambiente, article, articles, categories, cultura, dashboard, eventi, famiglia, genesis, lavoro, learn, mobilita, news, pages, profile, salute, segnalazioni, services, sport, tickets, turismo) + blade files (home.blade.php, homepage.blade.php, prova01.blade.php, segnalazioni.blade.php, show.blade.php, counter.blade.php, bootstrap-italia-showcase.blade.php). Pattern: pages/tests/[slug].blade.php handles ALL Design Comuni pages dynamically via JSON content. Forward-Only Git: study old versions, NEVER restore. Docs: Themes/Sixteen/docs/architecture/PAGE_ROUTING_ARCHITECTURE.md, Themes/Sixteen/docs/design-comuni/ARCHITECTURAL_DECISIONS.md.

- **Livewire Single Root Element:** Livewire/Volt components MUST have single root HTML element. Use wrapper div: `<div class="tests-view-wrapper">...</div>`. Multiple root elements cause exception. Fixed in pages/tests/[slug].blade.php.
- Forward-Only Git Rule: NEVER reset, revert, or checkout old commits. Always study existing code, understand it, then create NEW improvements that move forward. Merge conflicts are resolved by creating clean NEW code that incorporates the best of both versions, not by choosing one side.
- **CRITICAL: HTML Structural Parity è ESSENZIALE.** Replichiamo ESATTAMENTE la struttura HTML del reference (italia.github.io/design-comuni-pagine-statiche): stessi tag, stesse classi Bootstrap, stessi attributi `data-element`, stessa gerarchia. NON inventare classi custom - copiare dal reference. Poi parità visiva/funzionale con TailwindCSS @apply in `style-apply.css` e Alpine.js per interattività (NO `data-bs-*`, NO Bootstrap CSS/JS files). Documentazione: `laravel/Themes/Sixteen/docs/BLOCK_IMPLEMENTATION_GUIDE.md`.
- **CRITICAL: NO hardcoded language strings in blade templates.** ALL text must use translation helpers: `__('namespace::context.collection.element.type')`. Translation format MUST have 5 levels: `fixcity::segnalazione.fields.title.label`. WRONG: `fixcity::rating.title` (manca `.collection.`), `fixcity::rating.star.labels.5` (manca `.collection.`). CORRECT: `fixcity::rating.fields.title.label`, `fixcity::rating.fields.star.labels.5`. Translation files in `laravel/Modules/Fixcity/lang/{locale}/filename.php`. NEVER use hardcoded Italian ("Invia", "Grazie"), English ("Submit", "Thank you"), or ANY language. The site is multilingual (it, en, etc.).
- **Translation namespace pattern:** `namespace::context.collection.element.type`. Examples: `fixcity::rating.fields.title.label`, `fixcity::rating.fields.star.labels.5`, `fixcity::segnalazione.heading.title.label`. WRONG formats: `SEGNALAZIONE::SEGNALAZIONE.ELENCO.TITLE` (uppercase namespace), `fixcity::segnalazione.heading.title_label` (underscore instead of dot), `fixcity::rating.title` (missing `.collection.`).
- **Tests Pages Volt Pattern:** pages/tests/[slug].blade.php MUST: 1) Use Volt component class (new class extends Component) like pages/[container0]/[slug].blade.php, 2) Use <x-layouts.app> (NOT <x-layouts.design-comuni> or custom layouts), 3) NOT use raw @php blocks for data loading, 4) Use \Modules\Cms\Models\Page::getBlocksBySlug() for block loading, 5) Have single root wrapper div for Livewire, 6) Use translations __('namespace::key'), NO hardcoded Italian text.
- CRITICAL RULES for Fixcity/Laraxot project:
1. Translation format MUST be 5 levels: namespace::context.collection.element.type (e.g., fixcity::segnalazione.fields.title.label). WRONG if missing .collection.: fixcity::rating.title (invalid), fixcity::rating.fields.title.label (valid).
2. Bootstrap class names ARE USED in HTML markup for parity (row, col-12, btn, card, form-check, title-*, ecc.) but Bootstrap CSS/JS files are NEVER loaded. Styling via TailwindCSS @apply in style-apply.css. Interactivity via Alpine.js (x-data, @click, x-show). NEVER use data-bs-* attributes.
3. ALL blade text must use __('namespace::collection.element.type') - NO hardcoded strings in any language.
- HTML Structural Parity è ESSENZIALE, NON secondaria. Replichiamo ESATTAMENTE la struttura HTML del reference: stessi tag, stesse classi Bootstrap, stessi data-element, stessa gerarchia. NON inventare classi custom. Poi parità visiva/funzionale con TailwindCSS @apply e Alpine.js. Traduzioni 5 livelli: namespace::context.collection.element.type (es: fixcity::segnalazione.fields.title.label).

- **CRITICAL: Widget Naming — Use `Ticket` NOT `Segnalazione`.** All PHP/Filament widget classes for ticket creation MUST use `Ticket` in the name. Correct: `CreateTicketWizardWidget`. WRONG: `CreateSegnalazioneWizardWidget`, `SegnalazioneCreateWidget`. The single correct widget is `Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget`.

- **CRITICAL: Frontoffice Widget Architecture — NO Filament Schemas Wizard.** `Filament\Schemas\Components\Wizard` requires JS assets (`step`, `isFirstStep`, `filamentSchemaComponent`) NOT available in the frontoffice theme. Use pure Livewire state (`$currentStep`) with manual step navigation instead. The widget extends `BaseWidget` with `InteractsWithForms` + `InteractsWithActions`.

- **CRITICAL: Multi-Agent Collision Prevention.** Before creating/modifying any widget, form, or page: 1) grep for existing implementations, 2) read existing docs, 3) check if another agent already modified the file. If collision detected, merge the best approach, document the decision.

- **CRITICAL: NO dates in .md filenames.** Use `phpstan-fix-plan.md` NOT `phpstan-fix-plan-2026-03-02.md`. Dates go inside the document body, never in the filename.

- **CRITICAL: Always update docs on code changes.** When creating/modifying widgets, update: module docs (`Modules/*/docs/`), theme docs (`Themes/*/docs/`), indexes, and this QWEN.md if a new pattern emerges.

- **MCP Servers Configuration:** 8 MCP servers configured in `.qwen/settings.json`. See `docs/mcp/README.md` for complete documentation.
  - Development: laravel-boost, filament, filesystem
  - Testing: puppeteer (browser automation), playwright (visual parity)
  - Memory: supermemory (API + script), memory (session persistence)
  - Reasoning: sequential-thinking, notebooklm
  - Installed packages: @modelcontextprotocol/server-filesystem, puppeteer-mcp-server, @anthropic-ai/claude-code, supermemory (npm)
  - Supermemory API key: configured in `.env` (SUPERMEMORY_API_KEY)
  - Visual parity tool: `laravel/Themes/Sixteen/scripts/visual-parity.mjs`
  - Supermemory script: `laravel/Themes/Sixteen/scripts/supermemory-context.js`
  - All MCP docs indexed at `docs/mcp/index.md` and linked in `docs/README.md`

