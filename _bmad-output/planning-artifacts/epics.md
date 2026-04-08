---
stepsCompleted: ["step-01-validate-prerequisites"]
inputDocuments: 
  - "laravel/Themes/Sixteen/docs/PHASE-2-COMPREHENSIVE-STRATEGY.md"
  - "laravel/Themes/Sixteen/docs/PHASE-2-STRATEGY-FRAMEWORK.md"
  - "laravel/Themes/Sixteen/docs/PHASE-2-VISUAL-ENHANCEMENT.md"
---

# base_fixcity_fila5 - Phase 2 Epic Breakdown

## Project Context

**Phase**: 2 - CSS & JavaScript Visual Parity  
**Feature**: segnalazioni-elenco page  
**Reference**: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html  
**Local**: http://127.0.0.1:8000/it/tests/segnalazioni-elenco  
**Success Criteria**: Pixel-perfect visual match + 100% interactive parity + WCAG AA accessibility  

---

## Requirements Inventory

### Functional Requirements (FRs)

**CSS/Styling Layer**:
- FR1: Implement comprehensive design token system (colors, typography, spacing, shadows) matching AGID official palette
- FR2: Apply design token colors to all page components with zero hardcoded hex values
- FR3: Implement responsive typography (40px desktop → 28px mobile) for hero section
- FR4: Create hero section styling with background image, overlay, title + metadata
- FR5: Style tab navigation with active/inactive states, ARIA attributes, keyboard support
- FR6: Implement sidebar filter styling with custom checkboxes, categories, hierarchy
- FR7: Style cards grid with shadows, hover effects, smooth transitions (mobile 1-col, tablet 2-col, desktop 3-col)
- FR8: Create CTA section styling with primary button emphasis
- FR9: Style contacts section with link lists, icons, footer-style layout
- FR10: Implement accordion expand/collapse for cards with animated height transitions
- FR11: Apply hover states, focus indicators, active states to all interactive elements
- FR12: Create mobile-optimized styling (320px minimum width)

**JavaScript/Interaction Layer**:
- FR13: Implement tab switching behavior (click to activate, ARIA-selected update)
- FR14: Add keyboard navigation for tabs (Arrow keys, Enter for activation)
- FR15: Implement filter checkbox functionality with cascade filtering
- FR16: Create accordion toggle behavior with smooth height animation (200ms ease)
- FR17: Implement focus management and focus trapping in modals
- FR18: Add smooth fade transitions between tab content (opacity 150ms linear)
- FR19: Implement form validation feedback (if forms present)
- FR20: Create mobile-friendly interactions (touch-optimized tap targets)

**Performance & Quality**:
- FR21: Optimize CSS bundle size to < 150 KB (gzipped)
- FR22: Optimize JS bundle size to < 30 KB (gzipped)
- FR23: Achieve page load time < 3 seconds
- FR24: Ensure smooth animations @ 60fps (no dropped frames)

### Non-Functional Requirements (NFRs)

**Accessibility**:
- NFR1: All color contrasts meet WCAG AA standard (4.5:1 minimum for text)
- NFR2: All interactive elements have visible focus indicators (not outline:none)
- NFR3: Tab order correct and logical through all components
- NFR4: All ARIA attributes properly aligned with CSS visual states
- NFR5: Keyboard navigation fully functional (Tab, Arrow keys, Enter, Space, Escape)
- NFR6: Reduced motion support (@media prefers-reduced-motion) for all animations
- NFR7: Screen reader compatibility with semantic HTML + ARIA labels

**Performance**:
- NFR8: Lighthouse performance score ≥ 90 (all categories)
- NFR9: First Contentful Paint (FCP) < 1.5 seconds
- NFR10: Cumulative Layout Shift (CLS) < 0.1
- NFR11: CSS animations use only GPU-accelerated properties (transform, opacity)
- NFR12: No redundant CSS or unused selectors

**Browser/Device Support**:
- NFR13: Responsive design works on mobile (320px), tablet (768px), desktop (1200px+)
- NFR14: Cross-browser tested (Chrome, Firefox, Safari, Edge)
- NFR15: Mobile touch interactions optimized (minimum 48px tap targets)

**Code Quality**:
- NFR16: CSS follows design token pattern (no magic numbers)
- NFR17: JS uses Alpine.js patterns consistently (no framework bloat)
- NFR18: All CSS/JS properly documented with inline comments
- NFR19: Build process produces consistent, reproducible outputs

### UX Design Requirements

**Design Tokens**:
- UX-DR1: Create color palette with AGID primary green (#007a52), blue (#0066cc), semantic colors (success, error, warning)
- UX-DR2: Define typography scale (12px-40px, weights 400/600/700, Titillium Web font)
- UX-DR3: Create spacing scale (8px base unit: 4px, 8px, 12px, 16px, 24px, 32px, 48px)
- UX-DR4: Define shadow system (4-tier: sm, md, lg, xl with 0.05-0.2 opacity)
- UX-DR5: Create border-radius scale (4px, 8px, 12px, 16px standard variants)

**Component Styling**:
- UX-DR6: Hero section: 80px gap, 40px title (desktop), 28px (mobile), #191919 color
- UX-DR7: Tab navigation: Equal-width tabs, full-height bottom border indicator (#007a52), light green bg on active
- UX-DR8: Sidebar: 3-col sidebar + 8-col main (desktop), stacked (mobile), custom checkbox styling
- UX-DR9: Cards: #f5f7f9 background, 18px title, 600 weight, 1px border (#d9e1e8), shadows on hover
- UX-DR10: Accordion: Button 1rem padding, 600 weight, chevron rotates 180° on expand, 200ms height animation
- UX-DR11: Buttons: Primary #0066cc, hover #0059b3, full-width mobile, auto width desktop
- UX-DR12: CTA section: 30px h2, 14px paragraph, 12px margin-top, full-width button
- UX-DR13: Footer/Contacts: #f5f6f7 background, 48px padding (desktop), 32px (mobile)

**Responsive Design**:
- UX-DR14: Mobile-first approach: design for 320px minimum, enhance to 768px (tablet), 1200px (desktop)
- UX-DR15: Grid breakpoints: sm (576px), md (768px), lg (992px), xl (1200px)
- UX-DR16: Typography scales: responsive sizes per breakpoint (e.g., 28px mobile → 40px desktop)
- UX-DR17: Card grid: 1 column mobile, 2 columns tablet, 3 columns desktop
- UX-DR18: Forms: Full width mobile, constrained desktop, responsive input/select sizes

**Interactive States**:
- UX-DR19: All buttons have hover, active, disabled, loading states styled
- UX-DR20: Form inputs have focus, error, success, warning states with feedback
- UX-DR21: Links have hover, active, visited states (color change or underline)
- UX-DR22: Dropdowns/modals have smooth 150ms fade transitions
- UX-DR23: All state changes use CSS transitions, not hard jumps

**Accessibility Patterns**:
- UX-DR24: Focus indicators visible, 2-3px outline in primary color
- UX-DR25: Error messages display in red (#d9364f) with aria-invalid + aria-describedby
- UX-DR26: Success states show green (#00b373) with checkmark icon + aria-live region
- UX-DR27: Skip links for keyboard users to jump to main content
- UX-DR28: Modal focus trap: Tab cycles through focusable elements only

### Additional Requirements (Architecture/Technical)

- AR1: Do NOT modify HTML structure, semantic elements, or ARIA attributes (CSS/JS only)
- AR2: Do NOT touch Blade template logic, JSON content, or Alpine.js data structure
- AR3: Use Tailwind CSS v4.1.13 utility-first approach with @apply for custom components
- AR4: Implement CSS custom properties for all design tokens (var(--token-name) pattern)
- AR5: PostCSS plugins: import, nesting, autoprefixer (no SCSS required)
- AR6: Vite build pipeline: npm run dev (HMR), npm run build (compile), npm run copy (deploy)
- AR7: All colors/spacing/typography sourced from token system, not hardcoded
- AR8: Build outputs must be consistent and reproducible (deterministic hashes)
- AR9: Source maps disabled in production builds for security
- AR10: No 3rd-party CSS frameworks beyond Tailwind (Bootstrap Italia as reference only)

---

## FR Coverage Map

| FR | Component | Epic |
|----|-----------|------|
| FR1-FR3, FR21 | Design Tokens | Epic 1 |
| FR4-FR12, FR21 | Component Styling | Epic 2 |
| FR13-FR20, FR22 | JavaScript & Interactions | Epic 3 |
| FR13-FR20 | Responsive Design | Epic 4 |
| NFR1-7, FR23-24 | Verification & Performance | Epic 5 |
| UX-DR1-28, AR1-10 | Documentation | Epic 6 |

---

## Epic List

1. **Epic 1**: Design Tokens System & CSS Foundation (Executor #1)
2. **Epic 2**: Component Styling & Visual Parity (Executor #2)
3. **Epic 3**: JavaScript & Interactive Behavior (Executor #3)
4. **Epic 4**: Responsive Design & Mobile Optimization (Executor #3 parallel)
5. **Epic 5**: Verification, Testing & Performance Audit (Executor #1)
6. **Epic 6**: Documentation & Master Index Update (Researcher)

---

## Epic 1: Design Tokens System & CSS Foundation

**Goal**: Establish comprehensive token system with AGID colors, typography, spacing - foundation for all component styling

**Duration**: 45-60 minutes  
**Owner**: Executor #1  
**Dependencies**: None (can start immediately)  
**Blocks**: Epic 2 (components styling)

### Story 1.1: Extract & Document Design Tokens from AGID

As a frontend developer,
I want to extract exact color values, typography scales, and spacing units from AGID specifications,
So that all components use consistent, maintainable design tokens.

**Acceptance Criteria:**

**Given** the Design Comuni reference specification  
**When** I review official AGID color palette documentation  
**Then** I document primary green (#007a52), blue (#0066cc), semantic colors (success #00b373, danger #d9364f, warning #ffb300)  
**And** I capture typography: Titillium Web font, weights 400/600/700, sizes 12px-40px  
**And** I document spacing: 8px base unit with scales 4/8/12/16/24/32/48px  
**And** I document shadows: 4-tier system (sm/md/lg/xl) with opacity 0.05-0.2

### Story 1.2: Create _design-tokens.css with CSS Custom Properties

As a developer,
I want to define all design tokens as CSS custom properties in _design-tokens.css,
So that tokens can be reused across components and easily maintained.

**Acceptance Criteria:**

**Given** extracted token values from Story 1.1  
**When** I create resources/css/_design-tokens.css  
**Then** I define :root selector with organized token groups (--color-*, --font-*, --spacing-*, --shadow-*)  
**And** I use consistent naming: --color-primary-50/100/500/900, --font-family-sans, --spacing-4, --shadow-md  
**And** all values use hex colors (no rgb), rem/px units, and are fully documented with comments  
**And** file is <200 lines, easily scannable

### Story 1.3: Update tailwind.config.js with Token Definitions

As a developer,
I want to extend Tailwind configuration with design tokens,
So that utilities like text-primary, bg-primary, etc. work without manual CSS.

**Acceptance Criteria:**

**Given** CSS custom properties defined in _design-tokens.css  
**When** I update laravel/Themes/Sixteen/tailwind.config.js  
**Then** I add colors: { primary: '#007a52', success: '#00b373', danger: '#d9364f', ... }  
**And** I add typography: { fontFamily: { sans: 'Titillium Web' }, fontSize: { ... } }  
**And** I add spacing: { extend: { spacing: { 4: '1rem', 6: '1.5rem', ... } } }  
**And** build command produces no warnings/errors: npm run build

### Story 1.4: Create _color-palette.css for Tints/Shades

As a designer,
I want color palette with tints (light) and shades (dark) for each semantic color,
So that components can use color variations (hover, active, disabled states).

**Acceptance Criteria:**

**Given** primary colors (green, blue, etc.)  
**When** I create resources/css/_color-palette.css  
**Then** I generate 9-step scale for each color (50/100/200/300/400/500/600/700/800/900)  
**And** I use CSS variables: --color-primary-50: #e6f7f0, --color-primary-500: #007a52, --color-primary-900: #00361e  
**And** shades maintain WCAG AA contrast (4.5:1) when used for text  
**And** file is properly commented with usage examples

### Story 1.5: Document Design Tokens in DESIGN-TOKENS.md

As a developer,
I want comprehensive design tokens documentation,
So that team members understand naming conventions and usage patterns.

**Acceptance Criteria:**

**Given** all tokens defined in CSS  
**When** I create docs/DESIGN-TOKENS.md  
**Then** I include section: "Token Naming Convention" with examples  
**And** I include section: "Color System" with palette table (name/hex/usage)  
**And** I include section: "Typography Scale" with font-size, font-weight, line-height table  
**And** I include section: "Spacing Scale" with pixel/rem equivalents  
**And** I include section: "Shadow System" with 4-tier examples  
**And** I include copy-paste examples for each token type

---

## Epic 2: Component Styling & Visual Parity

**Goal**: Apply design tokens to all page components (hero, tabs, sidebar, cards, CTA, contacts) achieving pixel-perfect visual match

**Duration**: 60-90 minutes  
**Owner**: Executor #2  
**Dependencies**: Epic 1 (tokens ready)  
**Blocks**: Epic 5 (verification)

### Story 2.1: Style Hero Section (Title, Metadata, Background)

As a designer,
I want hero section styled exactly matching Design Comuni,
So that page opening creates immediate visual recognition.

**Acceptance Criteria:**

**Given** Phase 1 HTML structure for hero  
**When** I apply CSS styling  
**Then** H1 title is 40px (desktop), 28px (mobile), weight 700, color #191919  
**And** subtitle is 14px, color #5c6f82 (muted gray)  
**And** spacing is 80px gap (top/bottom) @desktop, 32px @mobile  
**And** background image displays with overlay (if applicable)  
**And** element responds to focus (outline visible)  
**And** screenshot matches reference exactly (pixel tolerance ±2px)

### Story 2.2: Style Tab Navigation (Active/Inactive States)

As a developer,
I want tab navigation styled with clear active/inactive differentiation,
So that users know which tab is active.

**Acceptance Criteria:**

**Given** tab HTML structure  
**When** I apply CSS for active/inactive states  
**Then** active tab has: bottom border #007a52, light green background rgba(0,122,82,0.04), weight 600  
**And** inactive tabs have: no bottom border, transparent background  
**And** hover state: text color darkens to #17324d, background lightens  
**And** all tabs have equal width  
**And** focus indicator visible (2px outline, primary color)  
**And** ARIA-selected attribute visually highlighted

### Story 2.3: Style Sidebar & Filter Components

As a designer,
I want filter sidebar styled with clear category hierarchy,
So that users can easily browse and select options.

**Acceptance Criteria:**

**Given** sidebar HTML (categories, checkboxes, hierarchy)  
**When** I apply CSS styling  
**Then** category titles are 12px uppercase, weight 600, color #17324d  
**And** checkboxes have custom styling: light border, medium green on hover  
**And** checked checkboxes show: green background, checkmark visible  
**And** indentation shows category hierarchy (16px per level)  
**And** layout is 3-col sidebar + 8-col main @desktop, stacked @mobile  
**And** focus indicators visible on all inputs

### Story 2.4: Style Cards Grid (Shadows, Hover, Transitions)

As a designer,
I want cards styled with subtle depth and smooth hover effects,
So that grid feels interactive and polished.

**Acceptance Criteria:**

**Given** cards HTML structure  
**When** I apply CSS styling  
**Then** card background: #f5f7f9, title 18px weight 600 color #17324d  
**And** border: 1px #d9e1e8, border-radius 4px  
**And** normal state shadow: 0 1px 2px rgba(0,0,0,0.05)  
**And** hover state shadow: 0 4px 8px rgba(0,0,0,0.1), transition 200ms ease-out  
**And** grid layout: 1-col mobile, 2-col tablet, 3-col desktop  
**And** cards don't shift on hover (shadow used, not translate)

### Story 2.5: Style Accordion Expand/Collapse Behavior

As a developer,
I want accordion sections expand/collapse smoothly,
So that content disclosure is elegant and non-jarring.

**Acceptance Criteria:**

**Given** accordion HTML (buttons + collapse divs)  
**When** I apply CSS transitions  
**Then** collapse div uses max-height animation: 0 → auto over 200ms  
**And** transition is: all 200ms ease-out  
**And** chevron icon rotates 180°: transform rotate(0) → rotate(180deg)  
**And** no layout shift during expand/collapse  
**And** focus indicator visible on buttons

### Story 2.6: Style CTA Section & Primary Buttons

As a designer,
I want CTA section prominently styled to encourage action,
So that call-to-action is visually emphasized.

**Acceptance Criteria:**

**Given** CTA HTML (heading, paragraph, button)  
**When** I apply CSS styling  
**Then** H2 is 30px, weight 700, color #17324d  
**And** paragraph is 14px, color #5c6f82, margin-top 12px  
**And** button background: #0066cc, hover: #0059b3, text: white  
**And** button has padding: 12px 24px, border-radius 4px  
**And** button has shadow on hover: 0 4px 12px rgba(0,102,204,0.3)  
**And** button full-width mobile, auto-width desktop  
**And** all focus/hover/active states smooth (200ms transition)

### Story 2.7: Style Footer/Contacts Section

As a designer,
I want footer section styled consistently with Design Comuni,
So that page ending feels professional and complete.

**Acceptance Criteria:**

**Given** footer/contacts HTML (links, icons)  
**When** I apply CSS styling  
**Then** background: #f5f6f7, padding: 48px top/bottom @desktop, 32px @mobile  
**And** link color: #0066cc, hover: #0059b3, underline on hover  
**And** icon size: 16-20px, aligned with text baseline  
**And** spacing between items: 16px margin-bottom  
**And** subtle top shadow/border to separate from content

---

## Epic 3: JavaScript & Interactive Behavior

**Goal**: Implement all interactive behaviors (tabs, filters, accordions, focus management) with keyboard support

**Duration**: 30-45 minutes  
**Owner**: Executor #3  
**Dependencies**: Epic 2 (CSS ready)  
**Blocks**: Epic 5 (verification)

### Story 3.1: Implement Tab Switching with Keyboard Navigation

As a developer,
I want tabs to switch on click and respond to keyboard,
So that users can navigate with mouse or keyboard.

**Acceptance Criteria:**

**Given** tab HTML with role="tab", aria-selected, aria-controls  
**When** user clicks a tab  
**Then** clicked tab gets aria-selected="true", others get aria-selected="false"  
**And** displayed tab panel gets role="tabpanel", aria-labelledby links to tab  
**And** keyboard: Arrow Right/Left moves focus to next/prev tab  
**And** keyboard: Enter/Space activates focused tab  
**And** Tab key moves focus to next focusable element after tabs  
**And** Escape key closes any open dropdowns/menus  
**And** no console errors on any interaction

### Story 3.2: Implement Filter Checkbox Functionality

As a developer,
I want filter checkboxes to update displayed content,
So that users can filter by multiple criteria.

**Acceptance Criteria:**

**Given** filter checkboxes in sidebar  
**When** user clicks a checkbox  
**Then** checkbox checked state updates (aria-checked, :checked CSS)  
**And** cards are filtered based on selected categories  
**And** uncheck all shows all cards  
**And** multiple filters work with AND logic (show only cards matching all selected)  
**And** filtering animation is smooth (fade in/out)  
**And** keyboard Tab navigates checkboxes  
**And** keyboard Space toggles checkbox

### Story 3.3: Smooth Tab Content Transitions

As a designer,
I want tab content changes to be smooth, not jarring,
So that page interactions feel polished.

**Acceptance Criteria:**

**Given** tab content in separate divs  
**When** user switches tabs  
**Then** old content fades out (opacity 1 → 0 in 150ms)  
**And** new content fades in (opacity 0 → 1 in 150ms, staggered)  
**And** no height changes or layout shifts during transition  
**And** transition uses CSS not JS (performance)  
**And** animation runs at 60fps (no dropped frames)

### Story 3.4: Add Focus Management & Accessibility JS

As a developer,
I want focus to manage properly for accessibility,
So that keyboard users can navigate efficiently.

**Acceptance Criteria:**

**Given** modal/dropdown components  
**When** modal opens  
**Then** focus moves to modal (first focusable element)  
**And** Tab key cycles only within modal (focus trap)  
**And** Escape key closes modal and returns focus to trigger button  
**And** focus indicator always visible (not outline:none)  
**And** all focusable elements have keyboard support (Enter/Space/Arrow)

### Story 3.5: Implement Form Validation Feedback

As a developer,
I want form validation to provide clear feedback,
So that users know which fields have errors.

**Acceptance Criteria:**

**Given** form inputs with validation rules  
**When** user submits invalid form  
**Then** invalid fields show: red border, aria-invalid="true", aria-describedby pointing to error message  
**And** error message displays below field in red (#d9364f)  
**And** error message has role="alert" for screen readers  
**And** on valid input, error clears and success checkmark displays  
**And** success state: green border, aria-invalid="false"  
**And** no page reload needed (validation happens on blur/submit)

---

## Epic 4: Responsive Design & Mobile Optimization

**Goal**: Ensure page is fully responsive and optimized for mobile (320px), tablet (768px), desktop (1200px)

**Duration**: 45-60 minutes  
**Owner**: Executor #3 (parallel with Epic 3)  
**Dependencies**: Epic 2 (base styling complete)  
**Blocks**: Epic 5 (verification)

### Story 4.1: Mobile Breakpoint Optimization (320px-576px)

As a designer,
I want mobile layout optimized for small screens,
So that page is usable on phones.

**Acceptance Criteria:**

**Given** desktop CSS styles  
**When** viewport is ≤576px  
**Then** card grid: 1 column (full width with 16px margin)  
**And** sidebar: stacks below main content (100% width)  
**And** hero: 28px title, 12px subtitle  
**And** typography: all font-sizes reduced by 10-15% for mobile  
**And** padding/margins: 16px base (not 24px)  
**And** buttons: full width (100%), 48px min height for touch targets  
**And** modals: full-width with 16px padding (not centered)  
**And** scrollable sections have proper overflow handling  
**And** no horizontal scroll at any resolution ≥320px

### Story 4.2: Tablet Breakpoint Optimization (576px-992px)

As a designer,
I want tablet layout balanced between mobile and desktop,
So that iPad experience is optimal.

**Acceptance Criteria:**

**Given** mobile CSS styles  
**When** viewport is 576px-992px  
**Then** card grid: 2 columns  
**And** sidebar: 25% width, next to main content at 75%  
**And** hero: 32px title (mid-size)  
**And** padding/margins: 20px base  
**And** buttons: auto-width, 44px min height  
**And** forms: 2-column layout if space permits

### Story 4.3: Desktop Refinement (992px+)

As a designer,
I want desktop layout with full spacing and optimization,
So that large screens show optimal content density.

**Acceptance Criteria:**

**Given** tablet CSS styles  
**When** viewport is ≥992px  
**Then** card grid: 3 columns  
**And** sidebar: 20% width, main content 80%  
**And** hero: 40px title, full spacing (80px gap)  
**And** padding/margins: 24px+ base  
**And** max-width constraint: 1200px container (if applicable)  
**And** spacing/gaps optimized for reading (not cramped)

### Story 4.4: Responsive Typography & Text Sizing

As a developer,
I want text to scale appropriately across breakpoints,
So that readability is maintained at all sizes.

**Acceptance Criteria:**

**Given** base font sizes defined in tokens  
**When** viewport changes  
**Then** H1: 28px (mobile) → 32px (tablet) → 40px (desktop)  
**And** body: 14px (mobile) → 15px (tablet) → 16px (desktop)  
**And** all line-heights scale proportionally  
**And** letter-spacing adjusted for smaller screens (tighter)  
**And** font-weights don't change (only sizes)

### Story 4.5: Responsive Images & Media

As a developer,
I want images to scale and load efficiently,
So that mobile bandwidth is conserved.

**Acceptance Criteria:**

**Given** images in hero and cards  
**When** rendered at different breakpoints  
**Then** images use srcset for multiple resolutions (1x, 2x)  
**And** background-image uses background-size: cover or contain appropriately  
**And** aspect-ratio locked (no layout shift on load)  
**And** alt text provided for all images

---

## Epic 5: Verification, Testing & Performance Audit

**Goal**: Verify visual parity, accessibility compliance, performance targets, and cross-browser compatibility

**Duration**: 45 minutes  
**Owner**: Executor #1  
**Dependencies**: Epic 2, 3, 4 (all implementation complete)  
**Blocks**: None (final step before documentation)

### Story 5.1: Visual Regression Testing & Screenshot Comparison

As a QA engineer,
I want to compare local page with Design Comuni reference,
So that visual parity is confirmed.

**Acceptance Criteria:**

**Given** reference: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html  
**And** local: http://127.0.0.1:8000/it/tests/segnalazioni-elenco  
**When** I take side-by-side screenshots at 1920x1080 (desktop)  
**Then** hero section: ≥98% pixel match  
**And** tabs section: ≥98% pixel match  
**And** cards section: ≥98% pixel match  
**And** footer: ≥98% pixel match  
**And** hover states: match reference (use video/GIF comparison)  
**And** responsive breakpoints tested: 320px, 768px, 1920px (≥95% match each)  
**And** differences documented with annotations (if any)

### Story 5.2: Accessibility Audit (WCAG AA Compliance)

As a QA engineer,
I want to verify accessibility compliance,
So that page is usable for all users.

**Acceptance Criteria:**

**Given** completed component styling and JavaScript  
**When** I run accessibility audit (e.g., axe DevTools, Wave, or wcag-validator)  
**Then** contrast ratio: ≥4.5:1 for all text (WCAG AA)  
**And** focus indicators: visible on all interactive elements (≥2px)  
**And** keyboard navigation: all functionality accessible (no mouse-only areas)  
**And** ARIA labels: present and correct for all dynamic content  
**And** semantic HTML: proper use of heading hierarchy, lists, buttons, links  
**And** color not sole indicator: error messages, success states use icons/text too  
**And** no errors in accessibility scanner (warnings <5)  
**And** screen reader tested: page readable and navigable (NVDA/JAWS simulation)

### Story 5.3: Performance Testing & Optimization

As a developer,
I want to measure and optimize performance,
So that page meets targets.

**Acceptance Criteria:**

**Given** deployed local page  
**When** I run Lighthouse audit  
**Then** Performance score: ≥90  
**And** Accessibility score: ≥90  
**And** Best Practices score: ≥90  
**And** SEO score: ≥90  
**And** First Contentful Paint (FCP): <1.5 seconds  
**And** Largest Contentful Paint (LCP): <2.5 seconds  
**And** Cumulative Layout Shift (CLS): <0.1  
**And** CSS bundle size: <150 KB (gzipped)  
**And** JS bundle size: <30 KB (gzipped)  
**And** Page load time: <3 seconds (on 4G connection)

### Story 5.4: Cross-Browser Compatibility Testing

As a QA engineer,
I want to verify page works across browsers,
So that users on any browser have consistent experience.

**Acceptance Criteria:**

**Given** completed page  
**When** tested on browsers: Chrome (latest), Firefox (latest), Safari (latest), Edge (latest)  
**Then** layout: no shifts or breaks  
**And** colors: display accurately (check CSS filter mode)  
**And** fonts: load and render correctly (web fonts, fallbacks)  
**And** animations: smooth (60fps) on all browsers  
**And** interactive features: fully functional (tabs, filters, modals)  
**And** responsive: works at all tested breakpoints (320px, 768px, 1920px)  
**And** no console errors on any browser

### Story 5.5: Document Findings in Verification Report

As a researcher,
I want to document all testing results,
So that stakeholders know verification status.

**Acceptance Criteria:**

**Given** all testing complete  
**When** I create verification report  
**Then** report includes: screenshot comparisons (reference vs local)  
**And** accessibility audit results (WCAG AA pass/fail)  
**And** performance metrics (Lighthouse, Core Web Vitals)  
**And** browser compatibility matrix (✅/❌ per browser)  
**And** any issues found with mitigation steps  
**And** sign-off: "VERIFIED" or "NEEDS WORK" status

---

## Epic 6: Documentation & Master Index Update

**Goal**: Document design tokens, CSS architecture, JS patterns, and update project master index

**Duration**: 45 minutes  
**Owner**: Researcher  
**Dependencies**: Epic 5 (verification complete)  
**Blocks**: None (final deliverable)

### Story 6.1: Document Design Tokens Usage

As a developer,
I want comprehensive design tokens documentation,
So that future developers know how to use them.

**Acceptance Criteria:**

**Given** design tokens implemented  
**When** I create docs/PHASE-2-DESIGN-TOKENS.md  
**Then** document includes: naming convention, color system table, typography scale, spacing scale  
**And** each section has copy-paste examples  
**And** usage patterns: "Use --color-primary for brand elements, --color-success for confirmations"  
**And** token list: all 50+ tokens with hex/value, CSS variable name, usage

### Story 6.2: Document CSS Architecture & Organization

As a developer,
I want to understand CSS file organization,
So that I can add new styles consistently.

**Acceptance Criteria:**

**Given** CSS files organized in resources/css/  
**When** I create docs/PHASE-2-CSS-ARCHITECTURE.md  
**Then** document explains: app.css entry point, @import structure, layer order  
**And** describes each CSS file: purpose, scope, what it styles  
**And** naming convention: BEM + Bootstrap Italia (.it-*) + Tailwind utilities  
**And** example: "To add new button style: extend _buttons.css using existing tokens"

### Story 6.3: Document JavaScript Patterns & Behaviors

As a developer,
I want to understand JS implementation patterns,
So that I can add new interactions consistently.

**Acceptance Criteria:**

**Given** JavaScript behaviors implemented  
**When** I create docs/PHASE-2-JAVASCRIPT.md  
**Then** document explains: Alpine.js usage, component structure, event handlers  
**And** describes each behavior: tab switching, filtering, accordion, form validation  
**And** code examples: copy-paste snippets for common interactions

### Story 6.4: Document Responsive Design Strategy

As a developer,
I want to understand responsive design approach,
So that I can implement responsive features correctly.

**Acceptance Criteria:**

**Given** responsive design implemented  
**When** I create docs/PHASE-2-RESPONSIVE-DESIGN.md  
**Then** document explains: mobile-first approach, breakpoints (320/576/768/992/1200)  
**And** describes changes per breakpoint: grid columns, font sizes, padding

### Story 6.5: Document Accessibility Compliance

As a developer,
I want accessibility patterns documented,
So that I can maintain WCAG AA compliance.

**Acceptance Criteria:**

**Given** accessibility features implemented  
**When** I create docs/PHASE-2-ACCESSIBILITY.md  
**Then** document includes: WCAG AA requirements checklist  
**And** contrast ratios: which colors pass 4.5:1 for text  
**And** keyboard navigation: Tab order, Arrow keys, Enter/Space/Escape handling

### Story 6.6: Update Master Index & Create Completion Report

As a researcher,
I want to update project index with Phase 2 documentation,
So that documentation is discoverable.

**Acceptance Criteria:**

**Given** all Phase 2 documentation created  
**When** I update laravel/Themes/Sixteen/docs/00-INDEX.md  
**Then** add Phase 2 section linking to all new docs  
**And** add completion report: "Phase 2 Visual Parity COMPLETE"  
**And** link to Phase 1 strategy for context

---

## Success Metrics

| Metric | Target | Verification Method |
|--------|--------|-------------------|
| Visual Parity | ≥98% pixel match | Side-by-side screenshot comparison |
| Accessibility | WCAG AA (4.5:1 contrast) | axe DevTools audit + screen reader test |
| Performance | Lighthouse ≥90 | Lighthouse CI report |
| Responsive | Works at 320/768/1920px | Manual testing at breakpoints |
| Interactions | All functional + keyboard nav | User acceptance testing + QA checklist |
| Documentation | 100% coverage | All 6 docs created + indexed |
| Timeline | <4 hours | Actual execution time tracking |

---

**Status**: READY FOR EXECUTION  
**Created**: 2026-04-08  
**Phase**: 2 - CSS & JavaScript Visual Parity  
**Project**: base_fixcity_fila5 / Sixteen Theme
