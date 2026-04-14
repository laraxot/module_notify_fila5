# Qwen Added Memories (Modular)

Questa documentazione è stata divisa in moduli per una gestione più efficiente del contesto.

## Moduli Memorie

- [Sistema Documentazione](./.agents/docs/main-rules/qwen-docs-index.md)
- [Stato BMad-METHOD](./.agents/docs/main-rules/qwen-bmad-status.md)
- [Progetto Design Comuni](./.agents/docs/main-rules/qwen-design-comuni.md)
- [Tema & Vite](./.agents/docs/main-rules/qwen-theme-vite.md)
- [Architettura](./.agents/docs/main-rules/qwen-architecture.md)
- [Regole Critiche](./.agents/docs/main-rules/qwen-critical-rules.md) — body plain, header parity, stepper responsive, multilingual
- [Filament Wizard Rule](./laravel/Modules/Fixcity/docs/filament-wizard-rule.md) — NO Blade step management, use Filament Wizard Schema
- [Module Boundary Philosophy](./laravel/Modules/Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md) — Geo OWNS geolocation, NO Blade::render hacks, use AddressInput
- [Token Efficiency](./docs/token-efficiency-religion.md) — Reduce tokens 50-90% via grep-first, diffs, scoping, tables, batch

---
**See also:**
- [CLAUDE.md](./CLAUDE.md)
- [AGENTS.md](./AGENTS.md)
- [GEMINI.md](./GEMINI.md)

*Ultimo aggiornamento: Aprile 2026*

## Qwen Added Memories
- REGOLA CRITICA FILAMENT: NON usare MAI ->label() o ->placeholder() su componenti Filament. LangServiceProvider applica automaticamente label, placeholder, helpText, description via traduzioni. Script pre-commit bashscripts/check-auto-label-violations.sh blocca violazioni. Documento: laravel/Modules/Xot/docs/filament/widgets/no-label-placeholder-religion.md
- TOKEN EFFICIENCY RELIGION: Grep-first (70-90% saving), Diffs vs full files (70-85%), Scope context precisely (50-70%), Reference don't repeat (60%), Tables vs prose (20-30%), /clear between tasks (30-60%), Batch related requests (40%), Use code not LLM (100%). Documento: docs/token-efficiency-religion.md. Memoria: .qwen/memories/token-efficiency.md
- TRANSLATION NAMESPACE RELIGION: Use DOMAIN not UI component for translations. CORRECT: __('fixcity::ticket.sections.summary.label'). WRONG: __('fixcity::create_ticket_wizard.summary.label'). Domain = ticket/user/order (business concept), NOT widget/form/page (UI component). Files: docs/translation-namespace-religion.md, Modules/Fixcity/lang/{it,en}/ticket.php
- TRANSCHOICE DRY RELIGION: Use ONE trans_choice key for all cases (0, 1, many). CORRECT: 'images_uploaded' => '{0} Nessuna|{1} :count immagine|[2,*] :count immagini'. WRONG: Separate keys like 'no_images', 'one_image', 'many_images'. Messages go under messages.*, rules go under rules.*. NEVER duplicate. Docs: docs/trans-choice-dry-religion.md
- LOCATION SPINNER UX PHILOSOPHY: "Never leave the user wondering." Every async action MUST show a loading state. AddressInput component (Modules/Geo) uses Alpine v3 x-data with inline spinner SVG + Tailwind animate-spin. Pattern: x-data="{ loading: false }" → x-on:click="getLocation()" → loading=true → navigator.geolocation → finally { loading=false }. File: Modules/Geo/resources/views/filament/forms/components/address-input.blade.php. Doc: Modules/Geo/docs/location-spinner-ux.md. Design Comuni compliance: Bootstrap Italia icon classes + Tailwind animation. Specific error messages for PERMISSION_DENIED, TIMEOUT, POSITION_UNAVAILABLE.
