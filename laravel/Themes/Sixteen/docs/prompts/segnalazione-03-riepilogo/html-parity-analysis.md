# HTML Parity Analysis — segnalazione-03-riepilogo

**Date:** 2026-04-08
**Reference:** https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-03-riepilogo.html
**Local:** http://127.0.0.1:8000/it/tests/segnalazione-03-riepilogo
**Blade:** `laravel/Themes/Sixteen/resources/views/components/blocks/tests/segnalazione-03-riepilogo.blade.php`
**JSON:** `laravel/config/local/fixcity/database/content/pages/tests.segnalazione-03-riepilogo.json`

---

## 📊 Status

**Parity Score:** ❌ FAIL (< 50%)
**BLOCK Items:** Multiple (see below)
**Verdict:** 🔴 BLOCKED — Fix HTML structure before CSS/JS

---

## 🔴 BLOCK — Missing Sections

### 1. Skiplink Missing
**Reference:**
```html
<div class="skiplink">
  <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
  <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
</div>
```
**Local:** ❌ Not present

### 2. Header Missing (Complete)
**Reference:** Full `<header class="it-header-wrapper">` with slim wrapper, nav wrapper, megamenu, social links, search modal trigger
**Local:** ❌ Not present (header provided by `<x-layouts.app>`, but needs verification for parity)

### 3. Steppers Content Structure Mismatch
**Reference:**
```html
<div class="steppers">
  <div class="steppers-header">
    <ul>
      <li class="confirmed">Autorizzazioni e condizioni <svg>...</svg></li>
      <li class="confirmed">Dati di segnalazione <svg>...</svg></li>
      <li class="active">Riepilogo</li>
    </ul>
    <span class="steppers-index" aria-hidden="true">3/3</span>
  </div>
</div>
```
**Local:** ✅ Structure present but needs class verification

### 4. Callout Warning Block
**Reference:**
```html
<div class="callout callout-highlight ps-3 warning">
  <div class="callout-title mb-20 d-flex align-items-center">
    <svg class="icon icon-sm"><use href="...#it-horn"></use></svg>
    <span>Attenzione</span>
  </div>
  <p class="titillium text-paragraph">Le informazioni che hai fornito...</p>
</div>
```
**Local:** ❌ Not present

### 5. "Segnalazione" Card (Disservizio Summary)
**Reference:** Multi-section card with "Disservizio" title, cmp-info-summary with Modifica link, address, type, title, details, images
**Local:** ⚠️ Partial — structure differs (uses `summary` array from JSON, not matching reference layout)

### 6. "Dati Generali" Section
**Reference:** Two cmp-card blocks — "Autore della segnalazione" (with name, CF) and "Contatti" (phone, email)
**Local:** ⚠️ Partial — JSON has `user` data but blade template structure doesn't match reference

### 7. Footer Missing
**Reference:** Full `<footer class="it-footer">` with institutional links, contacts, social
**Local:** ❌ Provided by layout but needs parity verification

---

## 🟠 FLAG — Structural Mismatches

### 1. Hardcoded Italian Text
**Found:** `"Conferma e invia"`, `"Indietro"`, `"Salva Richiesta"`, `"Contatta il comune"`, etc.
**Required:** `__('fixcity::segnalazione.fields.XXX.label')` format

### 2. Merge Conflict Markers
**Found:** `<<<<<<< HEAD`, `=======`, `>>>>>>> 36abb5a44` in blade file
**Impact:** 500 error on page load

### 3. Data Attributes Mismatch
**Reference:** Uses `data-element` attributes for key elements
**Local:** Missing `data-element` on many elements

### 4. Modal Structure
**Reference:** Uses `data-bs-toggle="modal"` with Bootstrap Italia modal
**Local:** Uses Alpine.js `x-show` + `x-cloak` but also has `data-bs-toggle` — inconsistent

---

## 🟡 WARN — Class/Attribute Differences

### 1. Bootstrap Classes Present ✅
The blade correctly uses Bootstrap Italia class names (`container`, `row`, `col-12`, `btn`, `card`, etc.) for HTML parity.

### 2. Missing `data-element` Attributes
Key elements missing `data-element` attributes that reference uses for accessibility and JS hooks.

---

## 🏷️ Semantic Analysis

### Semantic IDs Required
| ID | Reference | Local |
|----|-----------|-------|
| `main-container` | ✅ | ✅ |
| `footer` | ✅ | ❌ (layout provides) |
| `search-modal` | ✅ | ❌ |
| `modal-terms` | ✅ | ✅ |

### Semantic HTML5 Tags Required
| Tag | Reference | Local |
|-----|-----------|-------|
| `<header>` | ✅ | ⚠️ (via layout) |
| `<main>` | ✅ | ⚠️ (via layout) |
| `<nav>` | ✅ (breadcrumb, nav-steps) | ✅ |
| `<footer>` | ✅ | ⚠️ (via layout) |
| `<section>` | ✅ (it-page-section) | ⚠️ |
| `<ol>` | ✅ (breadcrumb) | ✅ |

---

## 🎯 Action Items (Priority Order)

1. **Fix merge conflict markers** in blade file (causes 500 error)
2. **Replace hardcoded Italian** with 5-level translations
3. **Add callout warning block** before "Segnalazione" section
4. **Fix card structure** to match reference (Disservizio card, Dati Generali)
5. **Add `data-element` attributes** to key elements
6. **Verify header/footer parity** with layout component
7. **Re-run comparison** to verify ≥90% parity

---

## Reference HTML Structure (Key Sections)

The reference page has this body structure:
1. `div.skiplink` — Accessibility skip links
2. `header.it-header-wrapper` — Full header with slim + nav + megamenu
3. `main`
   - `div#main-container.container`
     - `div.cmp-breadcrumbs`
     - `div.cmp-heading` (h1 title)
     - `div.steppers` (step indicator)
     - `div.steppers-content`
       - `div.callout.callout-highlight.warning` (warning message)
       - `h2` "Segnalazione"
       - `div.cmp-card` (Disservizio details)
       - `h2` "Dati Generali"
       - `div.cmp-card` (Autore)
       - `div.cmp-card` (Contatti)
     - `div.cmp-nav-steps` (prev/save/send buttons)
4. `div.cmp-modal` (terms modal)
5. `div.bg-grey-card.shadow-contacts` (contact card)
6. `footer.it-footer` — Full footer

---

*Generated by manual analysis. Run `bash bashscripts/html/compare-html-body.sh segnalazione-03-riepilogo` for automated comparison.*
