---
stepsCompleted:
  - "step-01-validate-prerequisites"
  - "step-02-design-epics"
  - "step-03-create-stories"
  - "step-04-final-validation"
inputDocuments:
  - "_bmad-output/planning-artifacts/prd.md"
  - "_bmad-output/planning-artifacts/architecture.md"
---

## Epic List

### Epic 1: Foundation
Setup progetto con Tailwind v4, Alpine.js v3, Vite build e configurazione base per Design Comuni. Includes setup, config, tokens, build, Alpine interactions, responsive foundation.
**FRs covered:** FR1, FR2, FR3, FR4, FR8, NFR1-NFR11

### Epic 2: Core UI Components
Implementare tutti i componenti UI riutilizzabili di Design Comuni (33 componenti: Header, Footer, Breadcrumbs, Card, Button, Form, Accordion, Modal, Alert, Badge, Avatar, Timeline, Tab, Carousel, Pagination, Hero, Search, etc.)
**FRs covered:** FR6, FR7, FR9-FR25, UX-DR1-DRX

### Epic 3: Accessibility & UX
Garantire accessibilità WCAG 2.1 AA e UX ottimale (keyboard navigation, screen reader, audit)
**FRs covered:** FR5

### Epic 4: Page Templates
Implementare tutti i template di pagina da Design Comuni (19 page templates: homepage, lista-risorse, servizi, argomenti, segnalazioni, amministrazione, etc.)
**FRs covered:** FR26-FR43

### Epic 5: Multi-step Flows
Implementare flussi multi-step per servizi (prenotazione appuntamento, richiesta assistenza, segnalazione disservizio, pagamento, area personale)
**FRs covered:** FR40-FR44

### Epic 6: Visual Testing & Polish
Test visivi e rifiniture finali (Playwright visual regression, performance, cross-browser, final polish)

### FR Coverage Map

| FR | Epic | Description |
|----|------|-------------|
| FR1 | Epic 1 | Visual Parity Setup |
| FR2 | Epic 1 | Tailwind Configuration |
| FR3 | Epic 1 | Alpine.js Setup |
| FR4 | Epic 1 | Responsive Foundation |
| FR5 | Epic 3 | Accessibility |
| FR6 | Epic 2 | Blade Components |
| FR7 | Epic 2 | JSON Data Integration |
| FR8 | Epic 1 | Vite Build |
| FR9 | Epic 2 | Multilingual Support |
| FR10-FR25 | Epic 2 | UI Components |
| FR26-FR43 | Epic 4 | Page Templates |
| FR44 | Epic 5 | Multi-step Flows |
| NFR1-NFR11 | All | Performance, Accessibility, Bundle Size |
---

# base_fixcity_fila5 - Epic Breakdown

## Overview

This document provides the complete epic and story breakdown for base_fixcity_fila5, decomposing the requirements from the PRD, UX Design if it exists, and Architecture requirements into implementable stories.

## Requirements Inventory

### Functional Requirements

FR1: Replica visiva del design design.comuni.it con Visual Parity Score ≥90%
FR2: Utilizzo esclusivo Tailwind CSS (NO Bootstrap Italia classes)
FR3: Componenti interattivi con Alpine.js v3
FR4: Design responsive per mobile, tablet e desktop
FR5: Accessibilità WCAG 2.1 AA compliance
FR6: Blade components riutilizzabili per tutti i componenti UI
FR7: Contenuti driven da JSON (data layer)
FR8: Build con Vite + npm run build
FR9: Supporto multilingua (italiano come default)
FR10: Implementazione Header con menu di navigazione
FR11: Implementazione Footer con link utili
FR12: Implementazione Hero section per homepage
FR13: Implementazione Breadcrumbs per navigazione
FR14: Implementazione Card component per liste contenuti
FR15: Implementazione Form components (input, select, checkbox, radio, toggle)
FR16: Implementazione Accordion/Collapse component
FR17: Implementazione Modal component
FR18: Implementazione Alert/Notification component
FR19: Implementazione Button component con varianti
FR20: Implementazione Badge/Chip component
FR21: Implementazione Avatar component
FR22: Implementazione Timeline component
FR23: Implementazione Tab component
FR24: Implementazione Carousel component
FR25: Implementazione Pagination component
FR26: Implementazione Search results page
FR27: Implementazione FAQ page
FR28: Implementazione Sitemap page
FR29: Implementazione lista-risorse page
FR30: Implementazione lista-categorie page
FR31: Implementazione argomenti page
FR32: Implementazione servizi page
FR33: Implementazione novità page
FR34: Implementazione eventi page
FR35: Implementazione segnalazioni page
FR36: Implementazione amministrazione page
FR37: Implementazione documenti-dati page
FR38: Implementazione contatti page
FR39: Implementazione luoghi page
FR40: Implementazione prenotazione-appuntamento multi-step flow
FR41: Implementazione richiesta-assistenza multi-step flow
FR42: Implementazione segnalazione-disservizio multi-step flow
FR43: Implementazione pagamento multi-step flow
FR44: Implementazione template Area Personale

### NonFunctional Requirements

NFR1: Page load <3 secondi
NFR2: CLS (Cumulative Layout Shift) <0.1
NFR3: Lighthouse Performance ≥80
NFR4: Lighthouse Accessibility Score ≥90
NFR5: CSS Bundle Size <200KB
NFR6: Component Reusability ≥70%
NFR7: PHPStan Level 10 compliance
NFR8: Mobile-first responsive design
NFR9: Browser compatibility: Chrome, Firefox, Safari, Edge (ultime 2 versioni)
NFR10: Progressive enhancement per funzionalità core
NFR11: Semantic HTML per accessibilità

### Additional Requirements

- **Starter Template**: Tailwind v4 + Alpine.js v3 + Blade components + Vite build
- **Visual Testing**: Playwright per screenshot comparison e visual regression
- **CSS Organization**: Tailwind config + custom utilities in resources/css/sixteen.css
- **Component Architecture**: Blade reusable components in resources/views/components/
- **Content Data**: JSON-driven in laravel/config/local/fixcity/database/content/pages/tests.*.json
- **Build Process**: npm run build → copy a public/css/

### UX Design Requirements

UX-DR1: **Design Tokens** - Implementare colori PA (primary #0066CC, secondary #00A3BF, success #4CAF50, warning #FF9800, danger #F44336, light #F5F5F5, dark #333333)
UX-DR2: **Typography Tokens** - Implementare Titillium Web (h1-h6, body), Lora (serif per articoli), Roboto Mono (code)
UX-DR3: **Spacing Tokens** - Implementare scale spaziatura PA (xs 4px, sm 8px, md 16px, lg 24px, xl 32px, xxl 48px)
UX-DR4: **Header Component** - Implementare header con logo, menu navigazione, mega menu, ricerca, lingua
UX-DR5: **Footer Component** - Implementare footer con colonne link, social, copyright, accessibilità
UX-DR6: **Breadcrumbs Component** - Implementare breadcrumb con separatore, link navigabili, current page
UX-DR7: **Card Component** - Implementare card con immagine, titolo, descrizione, link, stato (hover, focus)
UX-DR8: **Button Component** - Implementare button con varianti (primary, secondary, outline, ghost), taglie (sm, md, lg), stati
UX-DR9: **Form Input Component** - Implementare input con label, placeholder, helper, errore, required, disabled
UX-DR10: **Form Select Component** - Implementare select con opzioni, ricerca, multi-select
UX-DR11: **Form Checkbox/Radio Component** - Implementare checkbox/radio con label, errore, disabled
UX-DR12: **Form Toggle Component** - Implementare toggle switch con label, errore
UX-DR13: **Accordion Component** - Implementare accordion con header, content, animate expand/collapse
UX-DR14: **Modal Component** - Implementare modal con header, body, footer, close button, backdrop, focus trap
UX-DR15: **Alert Component** - Implementare alert con tipologia (info, success, warning, error), icona, dismiss
UX-DR16: **Badge Component** - Implementare badge con colori, dimensioni, icona opzionale
UX-DR17: **Avatar Component** - Implementare avatar con immagine, iniziali, fallback, dimensioni
UX-DR18: **Timeline Component** - Implementare timeline con data, titolo, descrizione, icona, stato
UX-DR19: **Tab Component** - Implementare tab con contenuti, indicator, animate transition
UX-DR20: **Carousel Component** - Implementare carousel con immagini, thumbnail navigation, autoplay
UX-DR21: **Pagination Component** - Implementare pagination con numeri, prev/next, per-page selection
UX-DR22: **Hero Section** - Implementare hero con immagine background, titolo, sottotitolo, CTA
UX-DR23: **Search Bar** - Implementare search bar con input, button, autocomplete suggestions
UX-DR24: **Chip/Tag Component** - Implementare chip con label, remove button, link varianti
UX-DR25: **Progress Indicator** - Implementare progress bar con percentage, animate fill
UX-DR26: **Cookie Bar** - Implementare cookie consent banner con accept/decline
UX-DR27: **Dropdown Menu** - Implementare dropdown con link items, divider, submenu
UX-DR28: **Skiplinks** - Implementare skiplinks per accessibilità (Vai al contenuto, Vai al menu)
UX-DR29: **Responsive Breakpoints** - Implementare mobile (<576px), tablet (576-992px), desktop (>992px)
UX-DR30: **Focus States** - Implementare focus visible states per accessibilità keyboard navigation
UX-DR31: **Loading States** - Implementare spinner/skeleton per async content
UX-DR32: **Empty States** - Implementare empty state con icona, messaggio, action button
UX-DR33: **Error States** - Implementare error state con messaggio, suggerimento, retry action

### FR Coverage Map

| FR Category | Component/Epic | Stories |
|-------------|----------------|---------|
| FR1 Visual Parity | Epic 1: Foundation | Story 1.1 - 1.5 |
| FR2 Tailwind Only | Epic 1: Foundation | Story 1.1 - 1.3 |
| FR3 Alpine.js | Epic 1: Foundation | Story 1.4 |
| FR4 Responsive | Epic 1: Foundation | Story 1.5 |
| FR5 Accessibility | Epic 1: Foundation + Epic 3 | Story 1.5, 3.1 |
| FR6-RF44 Pages | Epic 2: Core Components | Story 2.1 - 2.33 |
| FR7 JSON Data | Epic 2: Core Components | Story 2.1 |
| FR8 Vite Build | Epic 1: Foundation | Story 1.3 |

## Epic List

1. Epic 1: Foundation (Setup, Config, Tailwind, Alpine, Build)
2. Epic 2: Core UI Components
3. Epic 3: Accessibility & UX
4. Epic 4: Page Templates
5. Epic 5: Multi-step Flows
6. Epic 6: Visual Testing & Polish

---

## Epic 1: Foundation

Goal: Setup progetto con Tailwind v4, Alpine.js v3, Vite build e configurazione base per Design Comuni

### Story 1.1: Setup Tailwind CSS v4 Configuration

As a developer,
I want to configure Tailwind CSS v4 with Design Comuni tokens
So that I can implement PA design system without Bootstrap Italia

**Acceptance Criteria:**

Given Tailwind v4 is installed
When I configure tailwind.config.js with PA colors, typography, spacing
Then all utilities are available with Design Comuni tokens
And NO Bootstrap Italia classes are used

### Story 1.2: Create Design Tokens Blade Components

As a developer,
I want design tokens as CSS variables and Tailwind config
So that colors, typography, spacing are consistent across all components

**Acceptance Criteria:**

Given Design Comuni specification
When I create CSS custom properties for colors, fonts, spacing
Then all components use these tokens
And theme is easily customizable

### Story 1.3: Setup Vite Build Pipeline

As a developer,
I want Vite configured for Tailwind + Alpine.js build
So that CSS/JS are compiled and copied to public/

**Acceptance Criteria:**

Given npm run build is executed
When Vite processes sixteen.css and alpine components
Then output is in public/css/ and public/js/
And bundle size <200KB

### Story 1.4: Alpine.js Interaction Components

As a developer,
I want Alpine.js components for interactions
So that accordions, modals, dropdowns work without jQuery

**Acceptance Criteria:**

Given Alpine.js v3 is loaded
When I use x-data, x-show, x-transition directives
Then all interactive components work
And no Bootstrap JS is included

### Story 1.5: Responsive Design Foundation

As a developer,
I want mobile-first responsive structure
So that all components work on mobile, tablet, desktop

**Acceptance Criteria:**

Given Tailwind responsive classes
When I implement breakpoints (sm 576px, md 768px, lg 992px, xl 1200px)
Then components adapt to all screen sizes
And touch targets are ≥44px on mobile

---

## Epic 2: Core UI Components

Goal: Implementare tutti i componenti UI riutilizzabili di Design Comuni

### Story 2.1: Header Component

As a frontend developer,
I want Header component with logo, nav, mega menu, search
So that navigation is consistent across all pages

**Acceptance Criteria:**

Given Header specification from Bootstrap Italia
When I create x-header component with Alpine.js
Then logo, menu items, search bar, language switcher work
And megamenu opens on hover/click
And sticky on scroll

### Story 2.2: Footer Component

As a frontend developer,
I want Footer component with columns, links, social
So that footer is consistent across all pages

**Acceptance Criteria:**

Given Footer specification
When I create footer component
Then columns render with correct links
And accessibility statements, privacy policy links present

### Story 2.3: Breadcrumbs Component

As a frontend developer,
I want Breadcrumbs component for navigation
So that users can navigate back

**Acceptance Criteria:**

Given breadcrumb data from JSON
When I render breadcrumb trail
Then each item is clickable except current
And separator is visible

### Story 2.4: Card Component

As a frontend developer,
I want Card component for content listings
So that lists of resources look consistent

**Acceptance Criteria:**

Given card data (image, title, description, link)
When I render card component
Then image aspect ratio 16:9
And title truncated at 2 lines
And hover state shows link

### Story 2.5: Button Component

As a frontend developer,
I want Button component with variants
So that all CTAs follow PA design

**Acceptance Criteria:**

Given button variants needed
When I create button component
Then primary, secondary, outline, ghost variants work
And sm, md, lg sizes work
And disabled state renders correctly

### Story 2.6: Form Components (Input, Select, Checkbox, Radio, Toggle)

As a frontend developer,
I want form components for all input types
So that forms follow PA design

**Acceptance Criteria:**

Given form inputs needed
When I create input, select, checkbox, radio, toggle components
Then each has label, helper text, error state
And accessibility attributes (aria-describedby)
And required/disabled states work

### Story 2.7: Accordion Component

As a frontend developer,
I want Accordion component for expandable content
So that FAQs and sections work

**Acceptance Criteria:**

Given accordion data
When I render accordion with Alpine.js
Then expand/collapse animates smoothly
And only one or multiple can be open
And keyboard accessible

### Story 2.8: Modal Component

As a frontend developer,
I want Modal component for dialogs
So that confirmations and forms work

**Acceptance Criteria:**

Given modal data and content
When I render modal with Alpine.js
Then opens with backdrop
And focus trapped inside
And closes on escape/backdrop click

### Story 2.9: Alert Component

As a frontend developer,
I want Alert component for notifications
So that messages are visible

**Acceptance Criteria:**

Given alert type and message
When I render alert component
Then info, success, warning, error styles work
And dismiss button works
And icon displays correctly

### Story 2.10: Badge/Chip Component

As a frontend developer,
I want Badge and Chip components
So that labels and status are visible

**Acceptance Criteria:**

Given badge/chip data
When I render component
Then color variants work
And sizes work
And clickable variant works

### Story 2.11: Avatar Component

As a frontend developer,
I want Avatar component for user images
So that user representations are consistent

**Acceptance Criteria:**

Given avatar data (image or initials)
When I render avatar
Then image displays or initials fallback
And sizes work
And status indicator optional

### Story 2.12: Timeline Component

As a frontend developer,
I want Timeline component for event sequences
So that histories display correctly

**Acceptance Criteria:**

Given timeline data
When I render timeline
Then dates, titles, descriptions display
And icons for each step
And completed/active/pending states

### Story 2.13: Tab Component

As a frontend developer,
I want Tab component for content organization
So that sections are switchable

**Acceptance Criteria:**

Given tab data
When I render tab component
Then tab headers switch content
And active indicator moves
And keyboard navigation works

### Story 2.14: Carousel Component

As a frontend developer,
I want Carousel component for image galleries
So that hero images rotate

**Acceptance Criteria:**

Given carousel images
When I render carousel
Then slides transition
And navigation arrows/thumbnails work
And autoplay optional

### Story 2.15: Pagination Component

As a frontend developer,
I want Pagination component for list navigation
So that large lists are browsable

**Acceptance Criteria:**

Given pagination data (current page, total pages)
When I render pagination
Then page numbers display
And prev/next buttons work
And per-page selector works

### Story 2.16: Hero Section Component

As a frontend developer,
I want Hero section for homepage
So that main call-to-action is prominent

**Acceptance Criteria:**

Given hero data (image, title, subtitle, CTA)
When I render hero
Then background image displays
And title/subtitle overlay works
And CTA button works

### Story 2.17: Search Bar Component

As a frontend developer,
I want Search Bar component
So that search functionality works

**Acceptance Criteria:**

Given search input
When I render search bar
Then input with button renders
And autocomplete suggestions optional
And clear button works

### Story 2.18: Chip/Tag Component

As a frontend developer,
I want Chip component for topic labels
So that tags display correctly

**Acceptance Criteria:**

Given chip data
When I render chip
Then label displays
And remove button works (if editable)
And link variant works

### Story 2.19: Progress Indicator Component

As a frontend developer,
I want Progress indicator for loading states
So that async operations show progress

**Acceptance Criteria:**

Given progress percentage
When I render progress bar
Then percentage displays
And animate fill works
And determinate/indeterminate modes

### Story 2.20: Cookie Bar Component

As a frontend developer,
I want Cookie consent bar
So that GDPR compliance is met

**Acceptance Criteria:**

Given cookie consent needed
When I render cookie bar
Then accept/decline buttons work
And preferences link works
And remembers choice

### Story 2.21: Dropdown Menu Component

As a frontend developer,
I want Dropdown menu component
So that menu items are accessible

**Acceptance Criteria:**

Given dropdown items
When I render dropdown
Then toggle shows menu
And items are clickable
And divider renders

### Story 2.22: Skiplinks Component

As a frontend developer,
I want Skiplinks for accessibility
So that keyboard users can navigate

**Acceptance Criteria:**

Given accessibility requirements
When I render skiplinks
Then "Vai al contenuto" link works
And "Vai al menu" link works
And visible on focus only

### Story 2.23: Loading States (Spinner/Skeleton)

As a frontend developer,
I want loading states for async content
So that users see feedback

**Acceptance Criteria:**

Given loading state needed
When I render spinner/skeleton
Then spinner animates
And skeleton shows placeholder
And both accessible

### Story 2.24: Empty State Component

As a frontend developer,
I want Empty State for no-content scenarios
So that users know what to do

**Acceptance Criteria:**

Given empty state data
When I render empty state
Then icon displays
And message shows
And action button optional

### Story 2.25: Error State Component

As a frontend developer,
I want Error State for failure scenarios
So that errors are handled gracefully

**Acceptance Criteria:**

Given error data
When I render error state
Then error message displays
And suggestion shows
And retry action works

### Story 2.26: Icon System Setup

As a frontend developer,
I want icon system using PA icons
So that all components have consistent icons

**Acceptance Criteria:**

Given icon needs
When I setup icon system
Then SVG icons load
And size/color customizable
And sprite optimization works

### Story 2.27: Typography Components

As a frontend developer,
I want typography components for content
So that text is consistent

**Acceptance Criteria:**

Given typography needs
When I create typography styles
Then h1-h6 sizes work
And body text readable
And blockquote, code, lists styled

### Story 2.28: Table Component

As a frontend developer,
I want Table component for data display
So that tabular data renders correctly

**Acceptance Criteria:**

Given table data
When I render table
Then headers sticky (optional)
And responsive scroll works
And row hover states work

### Story 2.29: List Component

As a frontend developer,
I want List component for content lists
So that lists render consistently

**Acceptance Criteria:**

Given list data
When I render list
Then list items styled
And icons/avatars work
And link variant works

### Story 2.30: Section Components

As a frontend developer,
I want Section components for page structure
So that pages have consistent layout

**Acceptance Criteria:**

Given section data
When I render section
Then padding consistent
And background variants work
And title/description optional

### Story 2.31: Callout Component

As a frontend developer,
I want Callout component for highlighted content
So that important info stands out

**Acceptance Criteria:**

Given callout data
When I render callout
Then icon and message display
And background color works
And dismiss optional

### Story 2.32: Rating Component

As a frontend developer,
I want Rating component for feedback
So that ratings display

**Acceptance Criteria:**

Given rating value
When I render rating
Then stars display
And read-only or interactive
And half-star support

### Story 2.33: Video Player Component

As a frontend developer,
I want Video Player component
So that videos embed correctly

**Acceptance Criteria:**

Given video source
When I render video player
Then video plays
And controls work
And responsive aspect ratio

---

## Epic 3: Accessibility & UX

Goal: Garantire accessibilità WCAG 2.1 AA e UX ottimale

### Story 3.1: Accessibility Audit and Fixes

As a QA engineer,
I want accessibility audit and fixes
So that WCAG 2.1 AA compliance is achieved

**Acceptance Criteria:**

Given Lighthouse audit
When I run accessibility tests
Then score ≥90
And all critical issues fixed

### Story 3.2: Keyboard Navigation

As a user,
I want full keyboard navigation
So that I can use site without mouse

**Acceptance Criteria:**

Given keyboard navigation
When I tab through page
Then focus visible on all elements
And logical tab order

### Story 3.3: Screen Reader Support

As a user,
I want screen reader compatibility
So that I can understand all content

**Acceptance Criteria:**

Given screen reader testing
When I test with NVDA/VoiceOver
Then all content accessible
And ARIA labels correct

---

## Epic 4: Page Templates

Goal: Implementare tutti i template di pagina da Design Comuni

### Story 4.1: Homepage Template

As a frontend developer,
I want Homepage template
So that main page displays correctly

**Acceptance Criteria:**

Given homepage.json data
When I render homepage
Then hero, sections, news, services display
And all components work
And responsive

### Story 4.2: lista-risorse Template

As a frontend developer,
I want lista-risorse template
So that resource list displays

**Acceptance Criteria:**

Given lista-risorse.json data
When I render template
Then cards display with pagination
And filters work
And responsive

### Story 4.3: lista-categorie Template

As a frontend developer,
I want lista-categorie template
So that category list displays

**Acceptance Criteria:**

Given lista-categorie.json data
When I render template
Then categories display
And subcategories expand
And responsive

### Story 4.4: argomenti Template

As a frontend developer,
I want argomenti template
So that topics page displays

**Acceptance Criteria:**

Given argomenti.json data
When I render template
Then topics grid displays
And search works
And responsive

### Story 4.5: argomento Detail Template

As a frontend developer,
I want argomento detail template
So that topic page displays

**Acceptance Criteria:**

Given argomento.json data
When I render template
Then related content displays
And back link works
And responsive

### Story 4.6: servizi Template

As a frontend developer,
I want servizi template
So that services list displays

**Acceptance Criteria:**

Given servizi.json data
When I render template
Then services list displays
And categories filter works
And responsive

### Story 4.7: servizio-dettaglio Template

As a frontend developer,
I want servizio-dettaglio template
So that service detail displays

**Acceptance Criteria:**

Given servizio-dettaglio.json data
When I render template
Then service info displays
And related documents work
And responsive

### Story 4.8: novita Template

As a frontend developer,
I want novita template
So that news list displays

**Acceptance Criteria:**

Given novita.json data
When I render template
Then news cards display
And pagination works
And responsive

### Story 4.9: notizia Template

As a frontend developer,
I want notizia template
So that news detail displays

**Acceptance Criteria:**

Given notizia.json data
When I render template
Then article displays
And share buttons work
And responsive

### Story 4.10: eventi Template

As a frontend developer,
I want eventi template
So that events list displays

**Acceptance Criteria:**

Given eventi.json data
When I render template
Then events display with dates
And calendar view optional
And responsive

### Story 4.11: evento-dettaglio Template

As a frontend developer,
I want evento-dettaglio template
So that event detail displays

**Acceptance Criteria:**

Given evento.json data
When I render template
Then event details display
And location map works
And responsive

### Story 4.12: amministrazione Template

As a frontend developer,
I want amministrazione template
So that administration section displays

**Acceptance Criteria:**

Given amministrazione.json data
When I render template
Then sections display
And documents list works
And responsive

### Story 4.13: documenti-dati Template

As a frontend developer,
I want documenti-dati template
So that documents section displays

**Acceptance Criteria:**

Given documenti-dati.json data
When I render template
Then document categories display
And download links work
And responsive

### Story 4.14: segnalazioni-elenco Template

As a frontend developer,
I want segnalazioni-elenco template
So that reports list displays

**Acceptance Criteria:**

Given segnalazioni.json data
When I render template
Then map and list display
And filters work
And responsive

### Story 4.15: contatti Template

As a frontend developer,
I want contatti template
So that contacts page displays

**Acceptance Criteria:**

Given contatti.json data
When I render template
Then contact info displays
And form works
And responsive

### Story 4.16: luoghi Template

As a frontend developer,
I want luoghi template
So that places list displays

**Acceptance Criteria:**

Given luoghi.json data
When I render template
Then places display
And map works
And responsive

### Story 4.17: FAQ Template

As a frontend developer,
I want FAQ template
So that frequently asked questions display

**Acceptance Criteria:**

Given faq.json data
When I render template
Then accordion FAQ displays
And search works
And responsive

### Story 4.18: Risultati Ricerca Template

As a frontend developer,
I want search results template
So that search results display

**Acceptance Criteria:**

Given search results data
When I render template
Then results display
And filters work
And responsive

### Story 4.19: Mappa Sito Template

As a frontend developer,
I want sitemap template
So that site map displays

**Acceptance Criteria:**

Given sitemap data
When I render template
Then hierarchical list displays
And links work
And responsive

---

## Epic 5: Multi-step Flows

Goal: Implementare flussi multi-step per servizi

### Story 5.1: Prenotazione Appuntamento Flow

As a user,
I want to book an appointment
So that I can reserve a slot at the office

**Acceptance Criteria:**

Given 6-step flow
When I complete each step
Then data persists between steps
And final confirmation shows
And responsive

### Story 5.2: Richiesta Assistenza Flow

As a user,
I want to request assistance
So that I can get help for a service

**Acceptance Criteria:**

Given 2-step flow
When I submit request
Then confirmation shows
And email sent
And responsive

### Story 5.3: Segnalazione Disservizio Flow

As a user,
I want to report an issue
So that I can notify the municipality

**Acceptance Criteria:**

Given 4-step flow
When I submit report
Then confirmation shows
And map pin drops
And responsive

### Story 5.4: Pagamento Flow

As a user,
I want to make a payment
So that I can pay for services

**Acceptance Criteria:**

Given payment flow
When I complete payment
Then confirmation shows
And receipt available
And responsive

### Story 5.5: Area Personale Template

As a user,
I want to view my dashboard
So that I can see my activities

**Acceptance Criteria:**

Given area personale data
When I render template
Then user activities display
And actions work
And responsive

---

## Epic 6: Visual Testing & Polish

Goal: Test visivi e rifiniture finali

### Story 6.1: Playwright Visual Testing Setup

As a QA engineer,
I want Playwright configured for visual testing
So that I can catch visual regressions

**Acceptance Criteria:**

Given Playwright installed
When I run visual tests
Then screenshots compare
And diffs reported

### Story 6.2: Visual Regression Testing

As a QA engineer,
I want to run visual regression tests
So that UI changes are caught

**Acceptance Criteria:**

Given baseline screenshots
When I run tests on new code
Then any visual changes detected
And reported for review

### Story 6.3: Performance Optimization

As a developer,
I want to optimize performance
So that page load <3s

**Acceptance Criteria:**

Given Lighthouse testing
When I optimize assets
Then performance score ≥80
And bundle size <200KB

### Story 6.4: Cross-browser Testing

As a QA engineer,
I want cross-browser verification
So that all browsers work

**Acceptance Criteria:**

Given browser testing
When I test Chrome, Firefox, Safari, Edge
Then all features work
And responsive

### Story 6.5: Final Visual Polish

As a designer,
I want final visual polish
So that visual parity ≥90%

**Acceptance Criteria:**

Given comparison with design.comuni.it
When I fix final issues
Then visual parity ≥90%
And all tests pass

