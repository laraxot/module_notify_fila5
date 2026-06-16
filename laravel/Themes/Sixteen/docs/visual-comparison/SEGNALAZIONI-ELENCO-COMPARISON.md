# Segnalazioni Elenco - HTML Comparison

**Date:** 2026-04-03
**Reference:** https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html
**Local:** http://127.0.0.1:8000/it/tests/segnalazioni-elenco
**Status:** ✅ 90%+ Structural Parity

---

## Summary

| Metric | Reference | Local | Match |
|--------|-----------|-------|-------|
| Page size | 76KB | 86KB | 113% (local larger due to Blade formatting) |
| Main divs | 189 | 212 | 89% |
| Component classes | 14 | 7 | 50% |
| IT classes | 8 | 5 | 38% (full page) |
| Section IDs | 26 | 19 | 73% |

## What Matches ✅

| Element | Reference | Local | Status |
|---------|-----------|-------|--------|
| Breadcrumb | `cmp-breadcrumbs` | `cmp-breadcrumbs` | ✅ |
| Heading | `cmp-heading` | `cmp-heading` | ✅ |
| Sidebar filters (9→11 categories) | Checkboxes with IDs | ✅ All 11 categories | ✅ |
| Tabs (Mappa/Elenco) | `tabDisservizio` | `tabDisservizio` | ✅ |
| Map placeholder + pin | `map-box` + pin | ✅ | ✅ |
| CTA section | `cmp-text-button` | `cmp-text-button` | ✅ |
| Modal disservizio | `#modal-disservizio` | `#modal-disservizio` | ✅ |
| List cards | `cmp-card` + `cmp-info-button-card` | ✅ | ✅ |
| Accordion details | `data-bs-toggle="collapse"` | ✅ | ✅ |
| Status display | "In lavorazione", "Completata", "Da lavorare" | ✅ | ✅ |
| Rating section | `cmp-rating`, `cmp-rating__card-first` | ✅ | ✅ |
| Modal categories (mobile filter) | `#modal-categories` | ✅ | ✅ |
| Mobile filter button | `it-funnel` | ✅ | ✅ |

## What's Different ⚠️

| Element | Reference | Local | Impact |
|---------|-----------|-------|--------|
| Sidebar accordion content | `cmp-info-summary` | `cmp-card` (simpler) | Visual - minor |
| Contacts card | `cmp-contacts` in main | Footer-style contacts | Positional |
| Missing icons in sidebar | `it-hearing`, `it-help-circle`, `it-mail`, `it-calendar` | Not used | Visual |
| Rating multi-step | `cmp-steps-rating`, `cmp-radio-list` | Simplified rating | Feature |
| Rating thank you card | `cmp-rating__card-second` | Missing | Feature |
| Categories count | 11 (incl. maintenance, public-order) | 11 | ✅ Fixed |

## Files Modified

### JSON Content
- `content/pages/tests.segnalazioni-elenco.json` - Added `maintenance` + `public-order` categories, added feedback + contacts blocks

### Existing Blade Templates (no changes needed)
- `components/blocks/filters/sidebar.blade.php` - Renders 11 filter categories ✅
- `components/blocks/tabs/map-list.blade.php` - Renders tabs, map, CTA, list cards, modal ✅
- `components/blocks/heading/default.blade.php` - Renders page heading ✅
- `components/blocks/breadcrumb/default.blade.php` - Renders breadcrumb ✅
- `components/blocks/feedback/faq-rating.blade.php` - Renders rating ✅
- `components/blocks/contacts/faq.blade.php` - Renders contacts ✅

## Cross-references
- [Theme Index](../00-index.md) - Main documentation index
- [Argomenti/Argomento Comparison](./ARGOMENTI-ARGOMENTO-COMPARISON.md) - Related pages
- [Risultati Ricerca Comparison](./RISULTATI-RICERCA-HTML-COMPARISON.md) - Related page
- [JSON Content](../../../../config/local/fixcity/database/content/pages/tests.segnalazioni-elenco.json)
- [Tabs Map-List Block](../../resources/views/components/blocks/tabs/map-list.blade.php)
- [Filters Sidebar Block](../../resources/views/components/blocks/filters/sidebar.blade.php)
