# Design Comuni Blade Components - Implementation Plan

**Created:** 2026-03-30
**Source:** Design Comuni Pagine Statiche v2.4.0
**Target:** Laravel Blade Templates with Bootstrap Italia

---

## Component Architecture

### Component Categories

| Category | Count | Components |
|----------|-------|------------|
| **Header** | 5 | Slim header, Brand, Navigation, Search, Mobile |
| **Footer** | 4 | Main footer, Links, Social, Institutions |
| **Cards** | 6 | Teaser, Image, Radio, Latest Messages, BG, Standard |
| **Forms** | 8 | Input, Select, Checkbox, Toggle, Upload, Autocomplete, Search, DatePicker |
| **Blocks** | 7 | Hero, Calendar, Events, News, Topics, Services, Administration |
| **Layouts** | 2 | Main layout, Page layout |
| **TOTAL** | **32** | |

---

## Component Index

### Header Components

1. **`header-slim.blade.php`** - Top bar with region link, language, login
2. **`header-brand.blade.php`** - Logo, brand text, social links
3. **`header-search.blade.php`** - Search button and modal
4. **`header-navigation.blade.php`** - Main navigation with megamenu
5. **`header-mobile.blade.php`** - Mobile hamburger menu

### Footer Components

1. **`footer-main.blade.php`** - Main footer structure
2. **`footer-links.blade.php`** - Link columns
3. **`footer-social.blade.php`** - Social media links
4. **`footer-institutions.blade.php`** - Institution logos

### Card Components

1. **`card-teaser.blade.php`** - Teaser card with image overlay
2. **`card-image.blade.php`** - Image card
3. **`card-radio.blade.php`** - Radio selection card
4. **`card-latest-messages.blade.php`** - Latest messages card
5. **`card-bg.blade.php`** - Background image card
6. **`card-standard.blade.php`** - Standard content card

### Form Components

1. **`form-input.blade.php`** - Text input field
2. **`form-select.blade.php`** - Select dropdown
3. **`form-checkbox.blade.php`** - Checkbox
4. **`form-toggle.blade.php`** - Toggle switch
5. **`form-upload.blade.php`** - File upload
6. **`form-autocomplete.blade.php`** - Autocomplete input
7. **`form-search.blade.php`** - Search input
8. **`form-datepicker.blade.php`** - Date picker

### Block Components

1. **`block-hero.blade.php`** - Hero section
2. **`block-calendar.blade.php`** - Calendar events
3. **`block-events.blade.php`** - Events list
4. **`block-news.blade.php`** - News list
5. **`block-topics.blade.php`** - Topics grid
6. **`block-services.blade.php`** - Services list
7. **`block-administration.blade.php`** - Administration section

### Layout Components

1. **`layouts/main.blade.php`** - Main layout with header/footer
2. **`layouts/page.blade.php`** - Page layout wrapper

---

## Page Templates (35 total)

### Generali (9 pages)
1. homepage.blade.php
2. domande-frequenti.blade.php
3. risultati-ricerca.blade.php
4. argomenti.blade.php
5. argomento.blade.php
6. lista-risorse.blade.php
7. lista-categorie.blade.php
8. lista-risorse-categorie.blade.php
9. mappa-sito.blade.php

### Amministrazione (2 pages)
10. amministrazione.blade.php
11. documenti-dati.blade.php

### Novità (2 pages)
12. novita.blade.php
13. novita-dettaglio.blade.php

### Servizi (3 pages)
14. servizi.blade.php
15. servizi-categoria.blade.php
16. servizio-dettaglio.blade.php

### Vivere il Comune (2 pages)
17. eventi.blade.php
18. evento-dettaglio.blade.php

### Prenotazione Appuntamento (8 pages)
19. appuntamento-01-ufficio.blade.php
20. appuntamento-01-ufficio-luogo.blade.php
21. appuntamento-02-data-orario.blade.php
22. appuntamento-03-dettagli.blade.php
23. appuntamento-04-richiedente.blade.php
24. appuntamento-04-richiedente-autenticato.blade.php
25. appuntamento-05-riepilogo.blade.php
26. appuntamento-06-conferma.blade.php

### Richiesta Assistenza (2 pages)
27. assistenza-01-dati.blade.php
28. assistenza-02-conferma.blade.php

### Segnalazione Disservizio (7 pages)
29. segnalazione-dettaglio.blade.php
30. segnalazione-01-privacy.blade.php
31. segnalazione-02-dati.blade.php
32. segnalazione-03-riepilogo.blade.php
33. segnalazione-04-conferma.blade.php
34. segnalazione-area-personale.blade.php
35. segnalazioni-elenco.blade.php

---

## Implementation Strategy

### Phase 1: Core Components (DONE FIRST)
1. Extract header components
2. Extract footer components
3. Create main layout

### Phase 2: Card Components
1. Extract all card variants
2. Document props and slots

### Phase 3: Form Components
1. Extract form elements
2. Add validation support

### Phase 4: Block Components
1. Extract content blocks
2. Create reusable sections

### Phase 5: Page Templates
1. Convert all 35 pages
2. Wire up components

### Phase 6: Documentation
1. Component index
2. Usage examples
3. Props documentation

---

## DRY + KISS Principles

### DRY (Don't Repeat Yourself)
- Each component defined ONCE
- Reuse across all pages
- Single source of truth

### KISS (Keep It Simple, Stupid)
- Simple @props declarations
- Clear slot usage
- Minimal nesting
- Easy to extend

---

## Bootstrap Italia Integration

**CSS Framework:** Bootstrap Italia (based on Bootstrap 5)
**Icons:** Bootstrap Italia SVG sprites
**Components:** Custom Bootstrap Italia components

### Required Assets
- `bootstrap-italia.min.css`
- `bootstrap-italia.min.js`
- SVG sprites
- Custom fonts

---

## Next Steps

1. ✅ Download all HTML templates
2. ✅ Create directory structure
3. ⏳ Extract header components
4. ⏳ Extract footer components
5. ⏳ Extract card components
6. ⏳ Extract form components
7. ⏳ Extract block components
8. ⏳ Create page templates
9. ⏳ Create documentation

---

*Implementation plan created for Design Comuni Blade components*
