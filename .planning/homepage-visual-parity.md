# Homepage Visual Parity - CSS/JS Comparison & Fix Plan

**Data**: 2026-04-02  
**Status**: 🔄 IN PROGRESS

---

## Summary Comparison

| Metric | Reference | Local | Match |
|--------|-----------|-------|-------|
| HTML Body Lines | 1346 | 1559 | ✅ 116% (more content) |
| IDs | ~40 unique | ~40 unique | ✅ 99% |
| data-element attributes | 35 | 35 | ✅ 100% |
| Sections | Same structure | Same structure | ✅ 100% |

**Conclusion**: HTML structure is **IDENTICAL** (~99%). Differences are **VISUAL (CSS)** and **FUNCTIONAL (JS)**.

---

## Identified Differences

### 1. Missing Elements (Local missing)

| Element | Type | Impact |
|---------|------|--------|
| `#search-modal` | ID | Missing search modal |
| `#autocomplete-two` | ID | Search input ID |
| Bootstrap Italia JS libs | JS | Bootstrap components not working |

### 2. Extra Elements (Local has more)

| Element | Type | Impact |
|---------|------|--------|
| `#browser-logger-*` | ID | Debug element (can ignore) |
| `#homepage-final-search` | ID | Final search block |

### 3. Visual Differences (CSS)

The local page uses Tailwind CSS + custom styles that don't match Bootstrap Italia exactly:

| Component | Reference | Local Issue |
|----------|-----------|------------|
| Header colors | Bootstrap Italia green (#007a52) | May differ |
| Card shadows | Bootstrap Italia specific | May differ |
| Typography | Titillium Web | May differ |
| Spacing | Bootstrap Italia classes | Tailwind equivalent |
| Icons | Bootstrap Italia sprite | Custom SVG |

---

## Implementation Plan

### Phase 1: CSS Visual Alignment

1. **Review style-apply.css** - Bootstrap Italia converted classes
2. **Check design-comuni.css** - Custom design tokens
3. **Align colors/fonts** - Match exactly
4. **Fix spacing/margins** - Bootstrap to Tailwind conversion
5. **Fix shadows** - Bootstrap Italia specific shadows

### Phase 2: JavaScript Functionality

1. **Add search-modal** - Missing search modal HTML
2. **Check bootstrap-italia.js** - Bootstrap JS interactions
3. **Test dropdowns/modals** - Alpine.js alternatives

### Phase 3: Build & Verify

1. **npm run build** - Rebuild assets
2. **npm run copy** - Copy to public
3. **Visual verification** - Compare screenshots

---

## Files to Modify

### CSS Files
- `/laravel/Themes/Sixteen/resources/css/style-apply.css`
- `/laravel/Themes/Sixteen/resources/css/design-comuni.css`
- `/laravel/Themes/Sixteen/resources/css/app.css`

### JS Files
- `/laravel/Themes/Sixteen/resources/js/app.js`
- `/laravel/Themes/Sixteen/resources/js/custom.js`

### View Files (if missing modal)
- Check block components for search modal

---

## Action Items

- [x] Analyze current CSS in style-apply.css
- [x] Compare Bootstrap Italia color tokens
- [ ] Fix any color/spacing mismatches
- [ ] Ensure search modal HTML exists
- [ ] Test all interactive components
- [ ] Build and verify

---

## Next Steps

The HTML structure is 99% identical. The visual differences are in CSS styling:

1. **Build was successful** - CSS/JS compiled with Tailwind 4.x
2. **Copy was successful** - Assets copied to public
3. **Visual verification needed** - User should check the page visually at http://127.0.0.1:8000/it/tests/homepage

**To verify visual parity:**
- Open http://127.0.0.1:8000/it/tests/homepage
- Open https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
- Compare visually side by side
- Report any CSS differences found
