# Design Comuni Replication Roadmap

## Milestone: v1.0 - Complete Design Comuni Replication

**Goal**: Replicate all 38 Design Comuni static pages using Tailwind CSS + Alpine.js with JSON-driven content blocks.

**Timeline**: 12 weeks (3 months)
**Start Date**: April 2026
**End Date**: June 2026

---

## Phase Structure

### Phase 1: Foundation & Homepage (Weeks 1-2) ✅ IN PROGRESS
**Goal**: Establish architecture, fix multiple root elements, achieve 100% HTML parity for homepage

**Tasks**:
1. ✅ Fix Livewire multiple root elements error (9 files fixed)
2. ✅ Create research document (.planning/research/design-comuni-pages.md)
3. ⏳ Achieve 100% HTML parity for `/it/tests/homepage`
   - Header: Match https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html
   - Footer: Match exact structure and styling
   - Main content: All sections pixel-perfect
4. ⏳ Create JSON content file: `laravel/config/local/fixcity/database/content/pages/tests.homepage.json`
5. ⏳ Document header/footer architecture in `Themes/Sixteen/docs/HEADER_FOOTER_ARCHITECTURE.md`
6. ⏳ Create screenshot comparison analysis in `Themes/Sixteen/docs/screenshots/homepage-comparison.md`

**Success Criteria**:
- [ ] HTML inside `<body>` tag is 100% identical (excluding scripts)
- [ ] Visual appearance matches 100% (colors, spacing, typography)
- [ ] Header uses `<x-section slug="header" />`
- [ ] Footer uses `<x-section slug="footer" />`
- [ ] Tailwind @apply used (NO Bootstrap Italia CDN imports)
- [ ] Vite build works: `npm run build` in `laravel/Themes/Sixteen/`
- [ ] Manifest generated: `public_html/themes/Sixteen/manifest.json`

**Deliverables**:
- Homepage JSON block structure
- Header component (universal, reusable)
- Footer component (universal, reusable)
- Screenshot analysis with differences and fixes

---

### Phase 2: List Pages (Weeks 3-4)
**Goal**: Implement 8 list-type pages with universal components

**Pages**:
1. `/it/tests/argomenti` ← argomenti.html
2. `/it/tests/amministrazione` ← amministrazione.html
3. `/it/tests/documenti-dati` ← documenti-dati.html
4. `/it/tests/novita` ← novita.html
5. `/it/tests/servizi` ← servizi.html
6. `/it/tests/eventi` ← eventi.html
7. `/it/tests/faq` ← faq.html
8. `/it/tests/mappa-sito` ← mappa-sito.html

**Components to Build**:
- `topics-grid` - Grid of topic cards
- `news-list` - List of news cards
- `service-list` - List of service cards
- `event-list` - List of event cards
- `admin-list` - List of administration cards
- `doc-list` - List of document cards
- `faq-accordion` - Accordion for FAQ
- `sitemap-tree` - Tree structure for sitemap

**JSON Files**:
- `tests.argomenti.json`
- `tests.amministrazione.json`
- `tests.documenti-dati.json`
- `tests.novita.json`
- `tests.servizi.json`
- `tests.eventi.json`
- `tests.faq.json`
- `tests.mappa-sito.json`

**Success Criteria**:
- [ ] All 8 pages render correctly
- [ ] Universal components reused across pages
- [ ] JSON blocks properly structured
- [ ] Responsive design works (mobile, tablet, desktop)
- [ ] WCAG 2.1 AA accessibility compliance

---

### Phase 3: Detail Pages (Weeks 5-6)
**Goal**: Implement 4 detail-type pages with navscroll and related content

**Pages**:
1. `/it/tests/novita/{slug}` ← novita-dettaglio.html
2. `/it/tests/servizi/{slug}` ← servizio-dettaglio.html
3. `/it/tests/eventi/{slug}` ← evento-dettaglio.html
4. `/it/tests/documenti/{slug}` ← documento-dettaglio.html

**Components to Build**:
- `navscroll` - Sticky navigation for sections
- `detail-hero` - Hero section for detail pages
- `related-content` - Related items section
- `tag-list` - List of tags
- `share-buttons` - Social sharing buttons
- `rating-widget` - Feedback rating component
- `timeline` - Timeline for events/news

**JSON Files**:
- `tests.novita-detail.json`
- `tests.servizi-detail.json`
- `tests.eventi-detail.json`
- `tests.documenti-detail.json`

**Success Criteria**:
- [ ] Navscroll works with sticky positioning
- [ ] Related content shows dynamically
- [ ] Tag system works
- [ ] Rating component submits feedback
- [ ] Share buttons integrate with social networks

---

### Phase 4: Multi-Step Forms - Part 1 (Weeks 7-8)
**Goal**: Implement appointment booking flow (8 pages)

**Flow**: Prenotazione Appuntamento (6 steps + confirmation)

**Pages**:
1. `/it/tests/appuntamento/01-ufficio` ← appuntamento-01-ufficio.html
2. `/it/tests/appuntamento/01-luogo` ← appuntamento-01-ufficio-luogo.html
3. `/it/tests/appuntamento/02-data` ← appuntamento-02-data-orario.html
4. `/it/tests/appuntamento/03-dettagli` ← appuntamento-03-dettagli.html
5. `/it/tests/appuntamento/04-richiedente` ← appuntamento-04-richiedente.html
6. `/it/tests/appuntamento/04-auth` ← appuntamento-04-richiedente-autenticato.html
7. `/it/tests/appuntamento/05-riepilogo` ← appuntamento-05-riepilogo.html
8. `/it/tests/appuntamento/06-conferma` ← appuntamento-06-conferma.html

**Components to Build**:
- `steps-progress` - Progress indicator for multi-step forms
- `form-input` - Universal input field
- `form-select` - Universal select dropdown
- `form-autocomplete` - Autocomplete input
- `form-radio-group` - Radio button group
- `form-checkbox` - Checkbox with label
- `form-date-picker` - Date picker
- `form-time-picker` - Time picker
- `summary-box` - Summary/confirmation box
- `confirmation-card` - Confirmation with QR code

**JSON Files**:
- `tests.appuntamento-step-*.json` (8 files)

**Success Criteria**:
- [ ] Form state persists across steps
- [ ] Validation works client-side and server-side
- [ ] Progress indicator updates correctly
- [ ] Summary shows all selected options
- [ ] Confirmation generates unique code
- [ ] Alpine.js handles form interactions
- [ ] Accessibility: keyboard navigation, ARIA labels

---

### Phase 5: Multi-Step Forms - Part 2 (Weeks 9-10)
**Goal**: Implement assistance request and service disruption flows (11 pages)

**Flow 1**: Richiesta Assistenza (2 steps)
**Flow 2**: Segnalazione Disservizio (7 steps + personal area + list)

**Pages**:
1. `/it/tests/assistenza/01-dati` ← assistenza-01-dati.html
2. `/it/tests/assistenza/02-conferma` ← assistenza-02-conferma.html
3. `/it/tests/segnalazione/01-privacy` ← segnalazione-01-privacy.html
4. `/it/tests/segnalazione/02-dati` ← segnalazione-02-dati.html
5. `/it/tests/segnalazione/03-riepilogo` ← segnalazione-03-riepilogo.html
6. `/it/tests/segnalazione/04-conferma` ← segnalazione-04-conferma.html
7. `/it/tests/segnalazione/area-personale` ← segnalazione-area-personale.html
8. `/it/tests/segnalazioni/elenco` ← segnalazioni-elenco.html

**Components to Build**:
- `file-upload` - File upload with drag & drop
- `privacy-consent` - Privacy checkbox with modal
- `captcha-widget` - CAPTCHA integration
- `personal-area` - Dashboard for user submissions
- `submission-list` - List of user submissions
- `status-badge` - Status indicator (open, in_progress, resolved)

**JSON Files**:
- `tests.assistenza-step-*.json` (2 files)
- `tests.segnalazione-step-*.json` (6 files)
- `tests.segnalazioni-elenco.json`

**Success Criteria**:
- [ ] File upload works with validation
- [ ] Privacy consent tracked
- [ ] Personal area shows user data
- [ ] Status badges update dynamically
- [ ] Form submissions saved to database
- [ ] Email notifications sent

---

### Phase 6: Polish & Documentation (Weeks 11-12)
**Goal**: Final polish, accessibility audit, performance optimization, complete documentation

**Tasks**:
1. Accessibility audit (WCAG 2.1 AA)
   - Color contrast verification
   - Keyboard navigation testing
   - Screen reader compatibility
   - ARIA labels validation

2. Performance optimization
   - Lighthouse scores >90 (Performance, Accessibility, Best Practices, SEO)
   - Image optimization
   - CSS/JS minification
   - Lazy loading for images and components

3. Documentation completion
   - Component documentation (47 components)
   - Block type documentation
   - JSON structure guide
   - Developer onboarding guide

4. Testing
   - Pest PHP tests for all components
   - Browser tests for critical flows
   - Visual regression tests

**Deliverables**:
- `Themes/Sixteen/docs/COMPONENT_CATALOG.md` - All 47 components documented
- `Themes/Sixteen/docs/BLOCK_TYPES.md` - All block types with examples
- `Themes/Sixteen/docs/JSON_STRUCTURE.md` - JSON schema and examples
- `Themes/Sixteen/docs/ACCESSIBILITY_AUDIT.md` - WCAG 2.1 AA compliance report
- `Themes/Sixteen/docs/PERFORMANCE_REPORT.md` - Lighthouse scores and optimizations
- `Themes/Sixteen/docs/DEVELOPER_GUIDE.md` - Onboarding guide for new developers

**Success Criteria**:
- [ ] All pages pass WCAG 2.1 AA audit
- [ ] Lighthouse scores >90 on all pages
- [ ] 100% test coverage for critical paths
- [ ] Documentation complete with bidirectional links
- [ ] Master index updated with all new docs

---

## Component Inventory (47 Total)

### Tier 1: Critical (Implement First) - 7 components
1. `cmp-base` - Base wrapper component (100% usage)
2. `cmp-breadcrumbs` - Breadcrumb navigation (97% usage)
3. `cmp-contacts` - Contact information block (95% usage)
4. `cmp-rating` - Rating/feedback component (87% usage)
5. `cmp-hero` - Hero section (79% usage)
6. `cmp-card` - Generic card component (92% usage)
7. `cmp-button` - Button component (85% usage)

### Tier 2: High Priority - 12 components
8. `cmp-navscroll` - Sticky navigation
9. `cmp-steps-progress` - Multi-step progress indicator
10. `cmp-form-input` - Input field
11. `cmp-form-select` - Select dropdown
12. `cmp-form-checkbox` - Checkbox
13. `cmp-form-radio` - Radio button
14. `cmp-accordion` - Accordion/collapsible section
15. `cmp-tabs` - Tab navigation
16. `cmp-modal` - Modal dialog
17. `cmp-summary-box` - Summary/confirmation box
18. `cmp-status-badge` - Status indicator
19. `cmp-personal-area` - User dashboard

### Tier 3: Medium Priority - 15 components
20. `cmp-topics-grid` - Grid of topic cards
21. `cmp-news-list` - List of news cards
22. `cmp-event-list` - List of event cards
23. `cmp-service-list` - List of service cards
24. `cmp-admin-list` - List of administration cards
25. `cmp-doc-list` - List of document cards
26. `cmp-faq-accordion` - FAQ accordion
27. `cmp-sitemap-tree` - Sitemap tree
28. `cmp-detail-hero` - Detail page hero
29. `cmp-related-content` - Related items
30. `cmp-tag-list` - Tag list
31. `cmp-share-buttons` - Social sharing
32. `cmp-timeline` - Timeline component
33. `cmp-calendar-view` - Calendar view
34. `cmp-map-view` - Map with markers

### Tier 4: Low Priority - 8 components
35. `cmp-search-bar` - Search input
36. `cmp-filter-panel` - Filter options
37. `cmp-feedback-form` - Feedback form
38. `cmp-appointment-form` - Appointment booking form
39. `cmp-contact-form` - Contact form
40. `cmp-data-table` - Data table
41. `cmp-info-list` - Info list
42. `cmp-file-upload` - File upload

### Tier 5: Specialized - 5 components
43. `cmp-carousel` - Image carousel
44. `cmp-gallery` - Photo gallery
45. `cmp-video-player` - Video player
46. `cmp-chart` - Data visualization
47. `cmp-infographic` - Infographic display

---

## GitHub Issues Strategy

### Epic Issues (High-level tracking)
1. **Epic #1**: Foundation & Homepage
2. **Epic #2**: List Pages Implementation
3. **Epic #3**: Detail Pages Implementation
4. **Epic #4**: Multi-Step Forms - Appointment Booking
5. **Epic #5**: Multi-Step Forms - Assistance & Reports
6. **Epic #6**: Polish, Testing & Documentation

### Issue Templates

#### Component Implementation Issue
```markdown
## Component: [Component Name]
**Type**: [Layout/Content/Navigation/Interactive/Data Display]
**Priority**: [Tier 1-5]
**Used by**: [List of pages]

## Requirements
- [ ] Create Blade component: `Themes/Sixteen/resources/views/components/blocks/<type>/<component>.blade.php`
- [ ] Create Tailwind styles with @apply in `style-apply.css`
- [ ] Add Alpine.js interactions if needed
- [ ] Ensure WCAG 2.1 AA compliance
- [ ] Write Pest tests
- [ ] Document in `COMPONENT_CATALOG.md`

## Acceptance Criteria
- [ ] Component renders correctly on all screen sizes
- [ ] Component passes accessibility audit
- [ ] Component is reusable (NOT page-specific)
- [ ] Component follows DRY + KISS principles

## References
- Design Comuni example: [URL]
- Tailwind UI inspiration: [URL]
- Flowbite reference: [URL]
```

#### Page Implementation Issue
```markdown
## Page: [Page Name]
**URL**: `/it/tests/[slug]`
**Source**: [Design Comuni URL]
**Epic**: [Epic #]

## Requirements
- [ ] Create JSON content file: `laravel/config/local/fixcity/database/content/pages/tests.[slug].json`
- [ ] Define blocks structure
- [ ] Ensure all components exist (link to component issues)
- [ ] Verify HTML parity with source page
- [ ] Create screenshot comparison analysis

## JSON Structure
```json
{
  "slug": "tests.[slug]",
  "title": "[Page Title]",
  "blocks": [
    {
      "type": "[block_type]",
      "view": "pub_theme::components.blocks.[type].[variant]",
      "data": { ... }
    }
  ]
}
```

## Acceptance Criteria
- [ ] HTML inside <body> matches source (excluding scripts)
- [ ] Visual appearance is pixel-perfect
- [ ] All components are universal (NOT page-specific)
- [ ] JSON structure is valid
- [ ] Page passes Lighthouse audit (>90 all categories)

## Screenshot Analysis
- [ ] Header comparison: [screenshot + analysis]
- [ ] Footer comparison: [screenshot + analysis]
- [ ] Main content comparison: [screenshot + analysis]
```

---

## GitHub Discussions Strategy

### Discussion Categories
1. **Architecture Decisions** - RFC for major technical decisions
2. **Component Design** - Proposals for new components
3. **Block Types** - Discussion on JSON block structures
4. **Accessibility** - WCAG compliance strategies
5. **Performance** - Optimization techniques
6. **Q&A** - General questions and troubleshooting

### Discussion Templates

#### Architecture Decision Record (ADR)
```markdown
# ADR: [Title]

## Status
[Proposed | Accepted | Deprecated | Superseded]

## Context
What is the issue that we're seeing that is motivating this decision?

## Decision
What is the change that we're proposing and/or doing?

## Consequences
What becomes easier or more difficult to do because of this change?

## References
- Related issues: #[issue numbers]
- Related docs: [doc links]
```

#### Component Design Proposal
```markdown
# Component Design Proposal: [Component Name]

## Summary
Brief description of the component

## Use Cases
- Page 1: [URL]
- Page 2: [URL]
- ...

## Proposed API
```blade
<x-pub_theme::blocks.[type].[component]
  :data="$data"
  :options="$options"
/>
```

## Design References
- Design Comuni: [URL]
- Tailwind UI: [URL]
- Flowbite: [URL]
- DaisyUI: [URL]

## Implementation Plan
- [ ] Create Blade component
- [ ] Add Tailwind @apply styles
- [ ] Add Alpine.js interactions
- [ ] Write tests
- [ ] Document usage

## Questions for Discussion
1. [Question 1]
2. [Question 2]
```

---

## Documentation Index

### Master Index Files
- `docs/MODULE_DOCS_INDEX.md` - Master index for all module docs
- `Themes/Sixteen/docs/THEME_INDEX.md` - Master index for theme docs
- `_bmad-output/DESIGN_COMUNI_INDEX.md` - BMad documentation index

### New Documentation Files to Create

#### Architecture Docs
- `Themes/Sixteen/docs/architecture.md` - Overall architecture
- `Themes/Sixteen/docs/BLOCK_SYSTEM.md` - JSON block system
- `Themes/Sixteen/docs/COMPONENT_SYSTEM.md` - Component architecture
- `Themes/Sixteen/docs/HEADER_FOOTER_ARCHITECTURE.md` - Header/footer patterns

#### Component Docs
- `Themes/Sixteen/docs/COMPONENT_CATALOG.md` - All 47 components documented
- `Themes/Sixteen/docs/BLOCK_TYPES.md` - All block types with examples
- `Themes/Sixteen/docs/JSON_STRUCTURE.md` - JSON schema and examples

#### Quality Docs
- `Themes/Sixteen/docs/ACCESSIBILITY_AUDIT.md` - WCAG 2.1 AA compliance
- `Themes/Sixteen/docs/PERFORMANCE_REPORT.md` - Lighthouse scores
- `Themes/Sixteen/docs/TESTING_STRATEGY.md` - Testing approach

#### Developer Docs
- `Themes/Sixteen/docs/DEVELOPER_GUIDE.md` - Onboarding guide
- `Themes/Sixteen/docs/CONTRIBUTING.md` - Contribution guidelines
- `Themes/Sixteen/docs/CODE_CONVENTIONS.md` - Coding standards

---

## Success Metrics

### Code Quality
- [ ] PHPStan Level 10 compliance
- [ ] Pint code style (PSR-12)
- [ ] Pest test coverage >80%
- [ ] No duplicate code (DRY)
- [ ] Simple, readable code (KISS)

### Design Quality
- [ ] 100% HTML parity with Design Comuni
- [ ] 100% visual parity (colors, spacing, typography)
- [ ] Responsive design (mobile, tablet, desktop)
- [ ] WCAG 2.1 AA accessibility compliance
- [ ] Lighthouse scores >90 (all categories)

### Documentation Quality
- [ ] All components documented with examples
- [ ] All block types documented
- [ ] Bidirectional links between all docs
- [ ] Master index updated
- [ ] Developer onboarding guide complete

### Performance Metrics
- [ ] Page load time <2s
- [ ] Time to Interactive <3s
- [ ] Total bundle size <500KB
- [ ] No unused CSS
- [ ] Optimized images (WebP, lazy loading)

---

## Risk Management

### Technical Risks
1. **Bootstrap Italia dependency** - Mitigation: Use Tailwind @apply, not CDN imports
2. **Component complexity** - Mitigation: Start with Tier 1 components, iterate
3. **Performance degradation** - Mitigation: Regular Lighthouse audits, optimization sprints
4. **Accessibility gaps** - Mitigation: Continuous testing, not just at the end

### Schedule Risks
1. **Scope creep** - Mitigation: Strict adherence to 38 pages, no extras
2. **Component reuse** - Mitigation: Regular code reviews, enforce DRY
3. **JSON structure changes** - Mitigation: Version control, backward compatibility
4. **Testing debt** - Mitigation: Test-driven development, write tests first

---

## Communication Plan

### Daily
- Update `.planning/STATE.md` with current phase and task
- Commit atomic changes with conventional commits
- Update GitHub issues with progress

### Weekly
- Review sprint progress
- Update roadmap if needed
- Create screenshot comparisons for completed pages

### Per Phase
- Phase retrospective
- Update PROJECT.md with lessons learned
- Archive completed phase docs

---

## Tooling & Resources

### MCP Servers
- OpenViking (global) - Project context and memory
- NotebookLM - Documentation and research
- UI/UX Pro Max - Design system and components
- Frontend Design - UI implementation

### Skills
- GSD (Get Shit Done) - Project management
- BMAD - Business analysis and requirements
- Ralph Loop - Autonomous execution
- Superpowers - Enhanced AI capabilities

### Development Tools
- Laravel Folio - File-based routing
- Livewire Volt - Single-file components
- Tailwind CSS v4 - Utility-first CSS
- Alpine.js - Lightweight JavaScript
- Pest PHP - Testing framework
- PHPStan Level 10 - Static analysis
- Laravel Pint - Code formatter

---

## Next Steps

1. ✅ Review this roadmap
2. ⏳ Create GitHub epics (6 epics)
3. ⏳ Create GitHub issues for Phase 1 components
4. ⏳ Create GitHub discussions for architecture decisions
5. ⏳ Start Phase 1: Homepage implementation
6. ⏳ Document progress in `.planning/STATE.md`

---

**Roadmap Version**: 1.0
**Last Updated**: April 1, 2026
**Status**: Ready for execution
**Next Action**: Create GitHub issues and start Phase 1
