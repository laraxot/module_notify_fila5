# GSD Phase: CSS/JS Visual Parity - Segnalazione Pages

**Phase**: CSS/JS Parity
**Started**: 2026-04-09 10:00 UTC
**Status**: 🔄 IN PROGRESS - Phase 2 Active

---

## 🎯 Goal

Make all 7 segnalazione pages visually identical to their references working **ONLY** on CSS/JS files.

**Constraints**:
- ✅ HTML is LOCKED - DO NOT MODIFY (parity established)
- ✅ Work only in `laravel/Themes/Sixteen/resources/css/`
- ✅ Build with `npm run build && npm run copy`
- ✅ Use Playwright screenshots for verification
- ✅ Ticket naming (not Segnalazione) in PHP classes

---

## 📊 All 7 Pages Status

| Page | HTML Parity | CSS/JS Phase | Visual Analysis | Status |
|------|-------------|--------------|-----------------|--------|
| segnalazione-01-privacy | 99.5% | ✅ YES | Done | 🔄 CSS fixes applied |
| segnalazione-02-dati | 97.0% | ✅ YES | Done | 🔄 CSS fixes applied |
| segnalazione-03-riepilogo | 83.3% | ✅ YES | Done | 🔄 CSS fixes applied |
| segnalazione-area-personale | 91.9% | ✅ YES | Done | 🔄 CSS fixes applied |
| segnalazione-dettaglio | 86.8% | ✅ YES | Done | 🔄 CSS fixes applied |
| segnalazioni-elenco | 72.5% | ❌ NO | - | ⏳ Needs HTML fix |
| segnalazione-04-conferma | 43.6% | ❌ NO | - | ⏳ Needs HTML fix |
| **segnalazione-crea** | **83.6%** | ✅ YES | ✅ Done | 🔄 **Wizard active, CSS fixes needed** |

**6 out of 8 pages qualify for CSS/JS phase (>80% HTML parity)**

---

## ✅ Phase 1: Analysis & Foundation (COMPLETE)

### Tools Installed & Configured
- ✅ Supermemory SDK + API
- ✅ Playwright visual parity analysis
- ✅ HTML comparison scripts
- ✅ MCP servers (8 total)

### Baseline Analysis Complete
- All 8 pages analyzed
- Screenshots captured (local + reference)
- Font/color differences identified
- Global CSS issues documented

3. ✅ **Baseline Analysis Complete**
   - Screenshots: local.png, reference.png
   - Font analysis: 20 combinations compared
   - Color analysis: 11 differences found

4. ✅ **Reference Color System Added**
   - File: `segnalazione-parity.css` (lines 17-46)
   - Variables: `--bi-text-*`, `--bi-border-*`, `--bi-bg-*`
   - Source: Exact values from visual parity analysis

5. ✅ **text-paragraph Color Fixed**
   - Files modified: `style-apply.css:2227`, `segnalazione-parity.css:1729`
   - Change: `#5C6F82` → `#191919` (near black)
   - Reason: Reference uses dark text, not grayish-blue

6. ✅ **Alpine.js Duplicate Instance Fixed**
   - File: `app.js` (complete rewrite)
   - Problem: Alpine imported statically AND loaded by Livewire
   - Solution: Dynamic `import('alpinejs')` only if `window.Alpine` not set
   - Result: Alpine is now a separate chunk (45.78 kB) loaded only when needed
   - Build output: `app-BKq_DBcR.js` (16.14 kB) + `module.esm-DmcgkPTo.js` (45.78 kB)

7. ✅ **Documentation Updated**
   - Created: `docs/css-js-parity/segnalazione-01-privacy-css-fix.md`
   - Updated: `docs/README.md` (new index format)
   - Planning: This file

### Build Status
- ✅ CSS builds successfully (1,020.00 kB)
- ✅ Assets deployed to `public_html/themes/Sixteen/`
- ✅ No build errors or warnings

---

## ⏳ Phase 2: Color & Font Fixes (TODO)

### Remaining Issues to Fix

| Issue | Current | Target | Files to Modify | Priority |
|-------|---------|--------|-----------------|----------|
| Body text color | `rgb(34,34,34)` | `rgb(0,0,0)` | `style-apply.css` | 🔴 HIGH |
| Border colors | Missing | `#d4d4d4` | `segnalazione-parity.css` | 🟡 MEDIUM |
| Secondary text | `rgb(117,117,117)` | `rgb(69,90,100)` | `segnalazione-parity.css` | 🟡 MEDIUM |
| Font sizes 18px | Missing | Add | `segnalazione-parity.css` | 🟡 MEDIUM |
| Font sizes 16px | Missing | Add | `segnalazione-parity.css` | 🟡 MEDIUM |
| Font sizes 14px | Missing | Add | `segnalazione-parity.css` | 🟢 LOW |

### Action Plan

```css
/* 1. Body text color fix */
body, .segnalazione-privacy-page {
  color: #000000 !important; /* Pure black */
}

/* 2. Border color fix */
.breadcrumb, .steppers-header ul li, .form-check-input {
  border-color: var(--bi-border-light) !important; /* #d4d4d4 */
}

/* 3. Secondary text fix */
.text-muted, .breadcrumb-item.active, small {
  color: var(--bi-text-secondary) !important; /* #455a64 */
}

/* 4. Font size utilities */
.fs-18 { font-size: 18px !important; }
.fs-16 { font-size: 16px !important; }
.fs-14 { font-size: 14px !important; }
```

---

## ⏳ Phase 3: Verification (TODO)

1. ⏳ Run `npm run build && npm run copy`
2. ⏳ Take new screenshots with `visual-parity.mjs`
3. ⏳ Compare with baseline
4. ⏳ Verify visual parity > 90%
5. ⏳ Update documentation with results

---

## 🛠️ Tools Used

| Tool | Purpose | Status |
|------|---------|--------|
| **Playwright** | Screenshot capture + analysis | ✅ Installed & working |
| **Supermemory** | AI context indexing | ✅ SDK installed, API configured |
| **bashscripts/html/compare-html.sh** | HTML parity check | ✅ Working (99.8%) |
| **scripts/visual-parity.mjs** | Visual analysis | ✅ Created & tested |
| **scripts/supermemory-context.js** | Doc indexing | ✅ Created, needs testing |

---

## 📝 Decisions & Rationale

### Decision 1: Lock HTML at 99.8%
**Why**: HTML structure is already excellent. Further tweaks would yield diminishing returns. CSS/JS fixes will provide better visual ROI.

### Decision 2: Use CSS Variables for Colors
**Why**: Creates a single source of truth for Bootstrap Italia colors. Makes future updates easier and ensures consistency across all pages.

### Decision 3: Playwright Over Manual Screenshots
**Why**: Automated, repeatable, programmatic analysis. Can extract computed styles, not just visual comparison.

### Decision 4: Supermemory for AI Context
**Why**: Enables multi-agent collaboration. All agents can query the same context about project decisions, colors, fonts, and architecture.

---

## 🔗 Cross-References

- [Visual Parity Report](../../laravel/Themes/Sixteen/storage/visual-parity/segnalazione-01-privacy/analysis.json)
- [HTML Parity Report](../../bashscripts/html/output/report.md)
- [CSS Fix Documentation](../../laravel/Themes/Sixteen/docs/css-js-parity/segnalazione-01-privacy-css-fix.md)
- [Theme Docs Index](../../laravel/Themes/Sixteen/docs/README.md)
- [Design Comuni Reference](https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html)

---

**Next Agent**: Continue with Phase 2 color/font fixes. All context is in this file and linked documentation.
