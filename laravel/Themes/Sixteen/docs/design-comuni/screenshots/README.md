# 📸 Visual Analysis Index - Design Comuni

**Date**: 2026-03-30  
**Status**: ✅ **IN PROGRESS**  
**Pages Analyzed**: 5/38

---

## 📊 Analysis Summary

| Page | Reference | FixCity | Match | Priority | Analysis |
|------|-----------|---------|-------|----------|----------|
| **argomenti** | [Screenshot](screenshots/tests/argomenti-reference.png) | [Screenshot](screenshots/tests/argomenti-fixcity.png) | 20% | P0 | [Analysis](screenshots/tests/argomenti-analysis.md) |
| **appuntamento-06-conferma** | [Screenshot](screenshots/tests/appuntamento-06-conferma-reference.png) | [Screenshot](screenshots/tests/appuntamento-06-conferma-fixcity.png) | TBD | P0 | ⏳ Pending |
| **homepage** | [Screenshot](screenshots/tests/homepage-reference.png) | [Screenshot](screenshots/tests/homepage-fixcity.png) | TBD | P0 | ⏳ Pending |
| **servizi** | [Screenshot](screenshots/tests/servizi-reference.png) | [Screenshot](screenshots/tests/servizi-fixcity.png) | TBD | P1 | ⏳ Pending |
| **eventi** | [Screenshot](screenshots/tests/eventi-reference.png) | [Screenshot](screenshots/tests/eventi-fixcity.png) | TBD | P1 | ⏳ Pending |

**Overall Match**: 20% (1 page analyzed)  
**Target**: 95%  
**Gap**: 75%

---

## 🎯 Methodology

### 1. Capture Screenshots

**Tool**: Playwright

**Commands**:
```bash
# Capture reference
playwright screenshot --full-page \
  "https://italia.github.io/design-comuni-pagine-statiche/sito/{page}.html" \
  "docs/design-comuni/screenshots/tests/{page}-reference.png"

# Capture FixCity
playwright screenshot --full-page \
  "http://fixcity.local/it/tests/{page}" \
  "docs/design-comuni/screenshots/tests/{page}-fixcity.png"
```

### 2. Analyze Differences

**Categories**:
- Header (navigation, search, language, login)
- Hero (title, subtitle, styling)
- Content (grid, cards, typography, colors)
- Features (search, filter, sort)
- Footer (links, social, newsletter)
- Responsiveness (mobile, tablet, desktop)

### 3. Document Findings

**File**: `{page}-analysis.md`

**Structure**:
```markdown
# Visual Analysis: {Page}

## Screenshot Comparison
- Reference: {page}-reference.png
- FixCity: {page}-fixcity.png

## Differences Found
1. Header - Impact: HIGH, Priority: P0
2. Hero - Impact: MEDIUM, Priority: P1
...

## Action Plan
### P0 (Critical)
1. Task...

### P1 (High)
2. Task...

## Metrics
| Category | Reference | FixCity | Gap |
```

### 4. Assign Tasks (Multi-Agent)

**Agent A**: Frontend (Bootstrap Italia/Tailwind)  
**Agent B**: Components (Blade views)  
**Agent C**: Backend (JSON structure)  
**Agent D**: QA (Visual regression)

---

## 📁 File Structure

```
docs/design-comuni/screenshots/
├── tests/
│   ├── argomenti-reference.png
│   ├── argomenti-fixcity.png
│   ├── argomenti-analysis.md
│   ├── appuntamento-06-conferma-reference.png
│   ├── appuntamento-06-conferma-fixcity.png
│   ├── appuntamento-06-conferma-analysis.md
│   └── ...
└── README.md (this file)
```

---

## 🔄 Workflow

```
1. Capture Reference Screenshot
   ↓
2. Capture FixCity Screenshot
   ↓
3. Compare Visually
   ↓
4. Document Differences
   ↓
5. Create Action Plan
   ↓
6. Assign Multi-Agent Tasks
   ↓
7. Execute Fixes
   ↓
8. Re-capture & Verify
```

---

## ✅ Checklist

### Screenshots (38 pages)
- [x] argomenti
- [x] appuntamento-06-conferma
- [x] homepage
- [x] servizi
- [x] eventi
- [ ] ... (33 more)

### Analysis (38 pages)
- [x] argomenti
- [ ] appuntamento-06-conferma
- [ ] homepage
- [ ] servizi
- [ ] eventi
- [ ] ... (33 more)

### Fixes (Based on Priority)
- [ ] P0 items (Week 1)
- [ ] P1 items (Week 2)
- [ ] P2 items (Week 3)

---

## 📊 Progress Tracking

| Week | Goal | Status |
|------|------|--------|
| **Week 1** | Capture all 38 screenshots | 🟡 In Progress (5/38) |
| **Week 2** | Analyze all 38 pages | ⏳ Pending |
| **Week 3** | Execute P0 fixes | ⏳ Pending |
| **Week 4** | Execute P1 fixes | ⏳ Pending |
| **Week 5** | Execute P2 fixes | ⏳ Pending |
| **Week 6** | Final verification | ⏳ Pending |

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Argomenti Analysis** | `screenshots/tests/argomenti-analysis.md` |
| **Block View Convention** | `../../blocks/view-naming-philosophy.md` |
| **Design Comuni Integration** | `../integration-guide.md` |

---

**Status**: ✅ **IN PROGRESS**  
**Pages Captured**: 5/38  
**Pages Analyzed**: 1/38  
**Next**: Complete remaining 33 screenshots

**Visual analysis workflow established! 📸**
